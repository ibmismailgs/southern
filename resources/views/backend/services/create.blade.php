@extends('layouts.main')
@section('title', 'Create Service')
@section('content')

@push('head')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    .dropify-wrapper .dropify-message p {
        font-size: initial;
    }
</style>

@endpush

<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="fa fa-users bg-blue"></i>
                    <div class="d-inline pt-5">
                        <h5 class="pt-10" >Create Service</h5>
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
                        <form enctype="multipart/form-data" action="{{ route('our-services.store') }}" method="POST">
                            @csrf

                            <div class="row">

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="title">Title<span class="text-red">*</span></label>

                                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{old('title')}}" placeholder="Enter service title" required>

                                        @error('title')
                                        <span class="text-danger" role="alert">
                                            <p>{{ $message }}</p>
                                        </span>
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">

                                        <label for="icon">Icon <span class="text-red">* </span>  @error('logo')
                                        <span class="text-danger" role="alert">
                                           {{ $message }}
                                        </span>
                                        @enderror </label>

                                        <input data-height="220" type="file" class="dropify form-control @error('icon') is-invalid @enderror" name="icon" id="icon" placeholder="icon" required>

                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="description">Description<span class="text-red">*</span></label>

                                        <textarea class="form-control html-editor @error('title') is-invalid @enderror" name="description" id="description" cols="10" rows="2" placeholder="Write description here" required>{!! old('description') !!}</textarea>


                                        @error('description')
                                        <span class="text-danger" role="alert">
                                            <p>{{ $message }}</p>
                                        </span>
                                        @enderror

                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <button title="Create" type="submit" class="btn btn-primary mr-2">Create</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function() {
        $('.dropify').dropify();
    });
    $('#description').summernote({
            height: 100,
    });
</script>

@endpush
@endsection

