@extends('layouts.main')
@section('title', 'Update Faq')
@section('content')

<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="fa fa-question bg-blue"></i>
                    <div class="d-inline pt-5">
                        <h5 class="pt-10" >Update Faq</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
            <div class="page-title-actions float-right">
                <a title="Back" href="{{ URL::previous() }}" type="button" class="btn btn-sm btn-dark">
                    <i class="fas fa-arrow-left mr-1"></i>
                    Back
                </a>
            </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form enctype="multipart/form-data" action="{{ route('faq.update', $data->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="title">Title<span class="text-red">*</span></label>

                                        <textarea class="form-control @error('title') is-invalid @enderror" name="title" id="title" cols="10" rows="2">{!! $data->title !!}</textarea>

                                        @error('title')
                                        <span class="text-danger" role="alert">
                                            <p>{{ $message }}</p>
                                        </span>
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="description">Description<span class="text-red">*</span></label>

                                        <textarea class="form-control html-editor @error('description') is-invalid @enderror" name="description" id="description" cols="20" rows="7">{!! $data->description !!}</textarea>

                                        @error('description')
                                        <span class="text-danger" role="alert">
                                            <p>{{ $message }}</p>
                                        </span>
                                        @enderror

                                    </div>
                                </div>

                            </div>

                            <div class="row mt-5">
                                <div class="col-sm-12">
                                    <button title="Update" type="submit" class="btn btn-primary mr-2">Update</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

