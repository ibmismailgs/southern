@extends('layouts.main')
@section('title', 'Menu List')
@section('content')
@push('head')
<link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/jquery-toast-plugin/dist/jquery.toast.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/toggle.css') }}">
@endpush
    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="fa fa-bars bg-blue"></i>
                        <div class="d-inline pt-5">
                            <h5 class="pt-10" >Menu List</h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    @can('manage_user')
                        <div class="page-title-actions float-right">
                            <a title="Create" href="#" type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addMenu">
                                <i class="fas fa-plus mr-1"></i>
                                Create
                            </a>

                        </div>
                    @endcan
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
                                        <th>Status</th>
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

    {{-- add modal --}}
     <div class="modal fade" id="addMenu" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="demoModalLabel">{{ __('Create Menu')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form class="forms-sample add-menu" enctype="multipart/form-data" action="#" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">Title<span class="text-red">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" placeholder="Enter title" required>

                                    @error('title')
                                    <span class="text-danger" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">Status<span class="text-red">*</span></label>
                                <div class="col-sm-10">
                                    <select name="status" id="status" class="form-control  @error('status') is-invalid @enderror">
                                        <option value="1" @if (old('status') == "1") {{ 'selected' }} @endif>Active</option>
                                        <option value="0" @if (old('status') == "0") {{ 'selected' }} @endif>Inactive</option>
                                    </select>

                                    @error('status')
                                    <span class="text-danger" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('Close')}}</button>
                        <button type="button" id="save" class="btn btn-primary">{{ __('Create')}}</button>
                    </div>
                </div>
            </div>
        </div>

    {{-- edit modal --}}
     <div class="modal fade" id="editMenu" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="demoModalLabel">{{ __('Edit Menu')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form id="edit-menu" action="#">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">Title<span class="text-red">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" name="title" id="editTitle" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" placeholder="Enter title" required>

                                    <input type="hidden" id="editId">

                                    @error('title')
                                    <span class="text-danger" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">Status<span class="text-red">*</span></label>
                                <div class="col-sm-10">
                                    <select name="status" id="editStatus" class="form-control  @error('status') is-invalid @enderror">
                                        <option value="1" @if (old('status') == "1") {{ 'selected' }} @endif>Active</option>
                                        <option value="0" @if (old('status') == "0") {{ 'selected' }} @endif>Inactive</option>
                                    </select>

                                    @error('status')
                                    <span class="text-danger" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('Close')}}</button>
                        <button type="button" id="update" class="btn btn-primary">{{ __('Update')}}</button>
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

    // add menu
         $(document).ready(function($){
             $('#save').on('click',function (event) {
                event.preventDefault();

                var url = "{{ route('menu.store') }}";
                var title = $('#title').val();
                var status = $('#status').val();

                $.ajax({
                    url: url,
                    type: "get",
                    data: {
                        title : title,
                        status : status,
                    },
                    success: function(data) {
                        if (data.success === true) {
                            showSuccessToast(data.message);
                            $('#data_table').DataTable().ajax.reload();
                            $('#add-menu').trigger('clear');
                            $('#add-menu')[0].reset();
                        }else{
                            showDangerToast(data.message);
                            $('#addMenu').modal('show');
                        }
                    },

                });
                $.noConflict();
                $('#addMenu').modal('hide');
            });
        });

        //edit menu
        $('#data_table').on('click', '#edit[href]', function (e) {
            e.preventDefault();
            var url = $(this).attr('href');

            $.ajax({
                type: "GET",
                url: url,
                success: function(resp) {
                    $('#editTitle').val(resp.title);
                    $('#editStatus').val(resp.status);
                    $('#editId').val(resp.id);
                }
            });
        });

        $('#update').on('click',function (event) {
                event.preventDefault();
                var id = $('#editId').val();
                var title = $('#editTitle').val();
                var status = $('#editStatus').val();

                var url = '{{ route("menu.update",":id") }}';

                $.ajax({
                url: url.replace(':id', id),
                'type':'GET',
                'data':{
                    title:title,
                    status:status,
                },
                success:function(data)
                {
                    if (data.success === true) {
                        showSuccessToast(data.message);
                        $('#data_table').DataTable().ajax.reload();
                        $('#editMenu').modal('hide');
                    }else{
                        showDangerToast(data.message);
                        $('#editMenu').modal('show');
                    }
                }
            });

            });

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
            url: "{{route('menu.index')}}",
            type: "get"
        },

        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: true},
            {data: 'title', name: 'title' , searchable: true},
            {data: 'status', name: 'status', searchable: false},
            {data: 'action', searchable: false, orderable: false}
        ],
        dom: "<'row'<'col-sm-2'l><'col-sm-7 text-center'B><'col-sm-3'f>>tipr",
                buttons: [
                        {
                            extend: 'copy',
                            className: 'btn-sm btn-info',
                            title: 'Menu List',
                            header: true,
                            footer: true,
                            exportOptions: {
                                columns: ['0,1'],
                            }
                        },
                        {
                            extend: 'csv',
                            className: 'btn-sm btn-success',
                            title: 'Menu List',
                            header: true,
                            footer: true,
                            exportOptions: {
                                columns: ['0,1'],
                            }
                        },
                        {
                            extend: 'excel',
                            className: 'btn-sm btn-dark',
                            title: 'Menu List',
                            header: true,
                            footer: true,
                            exportOptions: {
                                columns: ['0,1'],
                            }
                        },
                        {
                            extend: 'pdf',
                            className: 'btn-sm btn-primary',
                            title: 'Menu List',
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
                            title: 'Menu List',
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
                'url':"{{ route('menu-status') }}",
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
