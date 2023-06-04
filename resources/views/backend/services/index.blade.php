@extends('layouts.main')
@section('title', 'Services List')
@section('content')
@push('head')
<link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/jquery-toast-plugin/dist/jquery.toast.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/toggle.css') }}">
<style>
    /* #logo{
        border-radius: 50% !important;
    } */
</style>
@endpush
    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="fa fa-users bg-blue"></i>
                        <div class="d-inline pt-5">
                            <h5 class="pt-10" >Services List</h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="page-title-actions float-right">
                        <a title="Create" href="{{ route('our-services.create') }}" type="button" class="btn btn-sm btn-primary">
                            <i class="fas fa-plus mr-1"></i>
                            Create
                        </a>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3">
                    <div class="card-body">

                        <table id="data_table" class="table table-bordered table-striped data-table table-hover">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Icon</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('script')
    <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-toast-plugin/dist/jquery.toast.min.js')}}"></script>
    <script src="{{ asset('js/alerts.js')}}"></script>
    <script src="{{ asset('plugins/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script>

    $(document).ready( function () {
    var dTable = $('#data_table').DataTable({
        order: [],
        lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        processing: true,
        responsive: false,
        serverSide: true,
        scroller: {
            loadingIndicator: false
        },
        language: {
              processing: '<i class="ace-icon fa fa-spinner fa-spin orange bigger-500" style="font-size:60px;margin-top:50px;"></i>'
            },
        pagingType: "full_numbers",
        ajax: {
            url: "{{route('our-services.index')}}",
            type: "get"
        },

        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: true},
            {data: 'title', name: 'title' , searchable: true},
            {data: 'description', name: 'description' , searchable: true},
            {data: 'status', name: 'status', searchable: false},
            {data: 'icon', name: 'icon', searchable: false},
            {data: 'action', searchable: false, orderable: false}
        ],
        dom: "<'row'<'col-sm-2'l><'col-sm-7 text-center'B><'col-sm-3'f>>tipr",
                buttons: [
                        {
                            extend: 'copy',
                            className: 'btn-sm btn-info',
                            title: 'Services List',
                            header: true,
                            footer: true,
                            exportOptions: {
                                columns: ['0,1'],
                            }
                        },
                        {
                            extend: 'csv',
                            className: 'btn-sm btn-success',
                            title: 'Services List',
                            header: true,
                            footer: true,
                            exportOptions: {
                                columns: ['0,1'],
                            }
                        },
                        {
                            extend: 'excel',
                            className: 'btn-sm btn-dark',
                            title: 'Services List',
                            header: true,
                            footer: true,
                            exportOptions: {
                                columns: ['0,1'],
                            }
                        },
                        {
                            extend: 'pdf',
                            className: 'btn-sm btn-primary',
                            title: 'Services List',
                            pageSize: 'A2',
                            header: true,
                            footer: true,
                            exportOptions: {
                                columns: ['0,1'],
                            }
                        },
                        {
                            extend: 'print',
                            className: 'btn-sm btn-danger',
                            title: 'Services List',
                            pageSize: 'A2',
                            header: true,
                            footer: true,
                            orientation: 'landscape',
                            exportOptions: {
                                columns: ['0,1'],
                                stripHtml: false
                            }
                        }
                    ],
        });
    });

    $('#data_table').on('click', '#delete[href]', function (e) {
            e.preventDefault();
            var url = $(this).attr('href');
            swal({
                    title: `Are you sure ?`,
                    text: "Want to delete this record?",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: {submit: true, _method: 'delete', _token: "{{ csrf_token() }}"}
                }).always(function (data) {
                    $('#data_table').DataTable().ajax.reload();
                    if (data.success === true) {
                        showSuccessToast(data.message);
                    }else{
                        showDangerToast(data.message);
                    }
                });
            }
            });
        });

        $('.card-body').on('click', '.changeStatus', function (e) {
        e.preventDefault();
        var id = $(this).attr('getId');
            swal({
                title: `Are you sure?`,
                text: `Want to change this status?`,
                buttons: true,
                dangerMode: true,
            }).then((changeStatus) => {
        if (changeStatus) {
            $.ajax({
                'url':"{{ route('services-status') }}",
                'type':'get',
                'dataType':'json',
                'data':{id:id},
                success:function(data)
                {
                    $('#data_table').DataTable().ajax.reload();
                    if (data.success === true) {
                        showSuccessToast(data.message);
                    }else{
                        showDangerToast(data.message);
                    }
                }
            });
        }
        });
     })


    @if(Session::has('success'))
        showSuccessToast("{{ Session::get('success') }}");
    @elseif(Session::has('error'))
        showDangerToast("{{ Session::get('error') }}");
    @endif
</script>
@endpush
@endsection
