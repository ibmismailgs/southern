@extends('layouts.main')
@section('title', 'Sub-Menu List')
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
                            <h5 class="pt-10" >Sub-Menu List</h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    @can('manage_user')
                        <div class="page-title-actions float-right">
                            <a title="Create" href="#" type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addSubMenu">
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
                                        <th>Menu</th>
                                        <th>Sub-Menu</th>
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
     <div class="modal fade" id="addSubMenu" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="demoModalLabel">{{ __('Create Sub-Menu')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form class="forms-sample add-sub-menu" id="add-sub-menu" enctype="multipart/form-data" action="#" method="POST">
                            @csrf

                            <div class="form-group row">
                                <label for="menu_id" class="col-sm-3 col-form-label">Menu<span class="text-red">*</span></label>
                                <div class="col-sm-9">
                                    <select name="menu_id" id="menu_id" class="form-control  @error('menu_id') is-invalid @enderror">
                                        <option value="">Select Menu</option>

                                        @foreach ($menus as $key => $menu)
                                            <option value="{{ $menu->id }}" > {{ $menu->title }}</option>
                                        @endforeach

                                    </select>

                                    @error('menu_id')
                                    <span class="text-danger" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-sm-3 col-form-label">Sub-Menu<span class="text-red">*</span></label>

                                <div class="col-sm-9">
                                    <input type="text" name="sub_menu_title" id="sub_menu_title" value="{{ old('sub_menu_title') }}" class="form-control @error('sub_menu_title') is-invalid @enderror" placeholder="Enter sub menu" required>

                                    @error('sub_menu_title')
                                    <span class="text-danger" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title" class="col-sm-3 col-form-label">Status<span class="text-red">*</span></label>
                                <div class="col-sm-9">
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
                        <button type="button" id="save" class="btn btn-primary">{{ __('Save')}}</button>
                    </div>
                </div>
            </div>
        </div>

    {{-- edit modal --}}
     <div class="modal fade" id="editSubMenu" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="demoModalLabel">{{ __('Edit Sub-Menu')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form id="edit-sub-menu" action="#">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="menu_id" class="col-sm-3 col-form-label">Menu<span class="text-red">*</span></label>
                                <div class="col-sm-9">
                                    <select name="menu_id" id="editMenu" class="form-control editMenu @error('menu_id') is-invalid @enderror">
                                        <option value="">Select Menu</option>

                                        @foreach ($menus as $key => $menu)
                                            <option value="{{ $menu->id }}" > {{ $menu->title }}</option>
                                        @endforeach

                                    </select>

                                    @error('menu_id')
                                    <span class="text-danger" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sub_menu_title" class="col-sm-3 col-form-label">Sub-Menu<span class="text-red">*</span></label>

                                <div class="col-sm-9">
                                    <input type="text" name="sub_menu_title" id="editSubMenuTitle" value="{{ old('sub_menu_title') }}" class="form-control editSubMenuTitle @error('sub_menu_title') is-invalid @enderror" placeholder="Enter sub menu" required>

                                    <input type="hidden" id="editId">

                                    @error('sub_menu_title')
                                    <span class="text-danger" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title" class="col-sm-3 col-form-label">Status<span class="text-red">*</span></label>
                                <div class="col-sm-9">
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

        // add sub-menu
        $(document).ready(function($){
             $('#save').on('click',function (event) {
                event.preventDefault();
                var post_url = "{{ route('sub-menu.store') }}";
                var sub_menu_title = $('#sub_menu_title').val();
                var status = $('#status').val();
                var menu_id = $('#menu_id').val();

                $.ajax({
                    url: post_url,
                    type: "get",
                    data: {
                        sub_menu_title : sub_menu_title,
                        status : status,
                        menu_id : menu_id,
                    },
                    success: function(data) {
                        if (data.success === true) {
                            showSuccessToast(data.message);
                            $('#data_table').DataTable().ajax.reload();
                            $('#add-sub-menu').trigger('clear');
                            $('#add-sub-menu')[0].reset();
                        }else{
                            showDangerToast(data.message);
                        }
                    },

                });
                // Close Modal After Process Complete
                $.noConflict();
                $('#addSubMenu').modal('hide');
            });
        });

        //edit sub-menu
        $('#data_table').on('click', '#edit[href]', function (e) {
            e.preventDefault();
            var url = $(this).attr('href');

            $.ajax({
                type: "GET",
                url: url,
                success: function(resp) {
                    $('.editMenu').val(resp.menu_id);
                    $('.editSubMenuTitle').val(resp.sub_menu_title);
                    $('#editStatus').val(resp.status);
                    $('#editId').val(resp.id);
                }
            });
        });

        $('#update').on('click',function (event) {
                event.preventDefault();
                var id = $('#editId').val();
                var menu_id = $('#editMenu').val();
                var sub_menu_title = $('.editSubMenuTitle').val();
                var status = $('#editStatus').val();

                var url = '{{ route("sub-menu.update",":id") }}';

                $.ajax({
                url: url.replace(':id', id),
                'type':'GET',
                'data':{
                    menu_id:menu_id,
                    sub_menu_title:sub_menu_title,
                    status:status,
                },
                success:function(data)
                {
                    if (data.success === true) {
                        showSuccessToast(data.message);
                        $('#data_table').DataTable().ajax.reload();
                        $('#editSubMenu').modal('hide');
                    }else{
                        showDangerToast(data.message);
                        $('#editSubMenu').modal('show');
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
            url: "{{route('sub-menu.index')}}",
            type: "get"
        },

        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: true},
            {data: 'title', name: 'title' , searchable: true},
            {data: 'sub_menu_title', name: 'sub_menu_title' , searchable: true},
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
                'url':"{{ route('sub-menu-status') }}",
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

    //  var i = 1;
    //     $("#add").click(function () {
    //         if( i < 10 ){
    //         ++i;
    //         $("#AddField").append(`<div class="row" id="removed">

    //             <div class="col-sm-12">
    //                 <div class="form-group">
    //                     <div class="d-flex">

    //                 <input type="text" name="sub_menu_title[]" id="sub_menu_title" value="{{ old('sub_menu_title') }}" class="form-control @error('sub_menu_title') is-invalid @enderror" placeholder="Enter sub-menu title" required>

    //                 <button style="margin-left: 5px; height:35px; font-size:14px; text-align:center" type="button" name="del" id="del" class="btn btn-danger btn_remove">-</button>

    //                 @error('sub_menu_title')
    //                 <span class="text-danger" role="alert">
    //                     <p>{{ $message }}</p>
    //                 </span>
    //                 @enderror
    //                 </div>

    //                 </div>
    //             </div>

    //         </div>`);
    //     }else{
    //         alert("You can not add more options");
    //     }
    // });

    //     $(document).on('click', '.btn_remove', function() {
    //         $(this).parents('#removed').remove();
    //         i--;
    //     });



    @if(Session::has('success'))
        showSuccessToast("{{ Session::get('success') }}");
    @elseif(Session::has('error'))
        showDangerToast("{{ Session::get('error') }}");
    @endif
</script>
@endpush
@endsection
