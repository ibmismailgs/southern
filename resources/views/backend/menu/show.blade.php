@extends('layouts.main')
@section('title', 'Menu Details')
@section('content')

    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="fa fa-bars bg-blue"></i>
                        <div class="d-inline pt-5">
                            <h5 class="pt-10" >Menu Details</h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    @can('manage_user')
                        <div class="page-title-actions float-right">
                            <a title="Create" href="{{ route('menu.create') }}" type="button" class="btn btn-sm btn-success">
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
                            <table class="table table-bordered table-striped table-hover col-md-12  text-center">
                                <thead>
                                    <tr class="btn-primary text-center">
                                        <td colspan="2">Menu Details</td>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td width="50%">Menu Title</td>
                                        <td width="50%" style="word-break: break-word;">{{ $data->title ?? '--' }}</td>
                                    </tr>

                                    <tr>
                                        <td width="50%">Status</td>
                                        <td width="50%" style="word-break: break-word;">
                                            @if($data->status == 1)
                                              <span class="badge badge-success" title="Active">Active</span>
                                            @elseif($data->status == 0)
                                              <span class="badge badge-danger" title="Inactive">Inactive</span>
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <td width="50%">Created At</td>
                                        <td width="50%" style="word-break: break-word;">{{ date('m F, Y', strtotime($data->created_at)) ?? '--'  }}</td>
                                    </tr>

                                    <tr>
                                        <td width="50%">Created By</td>
                                        <td width="50%" style="word-break: break-word;">{{ Auth::user()->name }}</td>
                                    </tr>

                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>

@endsection
