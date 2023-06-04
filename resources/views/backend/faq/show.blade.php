@extends('layouts.main')
@section('title', 'Faq Deatils')
@section('content')

    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="fa fa-question bg-blue"></i>
                        <div class="d-inline pt-5">
                            <h5 class="pt-10" >Faq Deatils</h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="page-title-actions float-right">
                        <a title="Back" href="{{ URL::previous() }}" type="button" class="btn btn-sm btn-dark">
                            <i class="fas fa-arrow-left mr-1"></i>
                            Back
                        </a>

                        <a title="Create" href="{{ route('faq.create') }}" type="button" class="btn btn-sm btn-primary">
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

                        <div class="row">
                            <div class="col-md-12"> <strong>Title</strong>
                                <p class="mt-10 text-muted">{{ $data->title ?? '--' }}</p>
                            </div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12"> <strong>Description</strong>
                                <p class="mt-10 text-muted">{!! $data->description ?? '--' !!}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
