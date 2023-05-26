@extends('layouts.main')
@section('title', 'Edit Corporate Client')
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
                        <h5 class="pt-10" >Edit Corporate Client</h5>
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
                        <form enctype="multipart/form-data" action="{{ route('corporate-client.update', $data->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="client_name">Client Name<span class="text-red">*</span></label>

                                        <input type="text" class="form-control @error('client_name') is-invalid @enderror" name="client_name" id="client_name" value="{{ $data->client_name }}" placeholder="Enter company name" required>

                                        @error('client_name')
                                        <span class="text-danger" role="alert">
                                            <p>{{ $message }}</p>
                                        </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="website">Website Url<span class="text-red">*</span></label>

                                        <input type="text" class="form-control @error('website') is-invalid @enderror" name="website" id="website" value="{{ $data->website }}" placeholder="Enter web address" required>

                                        @error('website')
                                        <span class="text-danger" role="alert">
                                            <p>{{ $message }}</p>
                                        </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="phone">Phone<span class="text-red">*</span></label>

                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ $data->phone }}" placeholder="Enter phone number" required>

                                        @error('phone')
                                        <span class="text-danger" role="alert">
                                            <p>{{ $message }}</p>
                                        </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email<span class="text-red">*</span></label>

                                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $data->email }}" placeholder="Enter emaill address" required>

                                        @error('email')
                                        <span class="text-danger" role="alert">
                                            <p>{{ $message }}</p>
                                        </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="address">Address<span class="text-red">*</span></label>

                                        <textarea class="form-control html-editor @error('title') is-invalid @enderror" name="address" id="address" cols="10" rows="2" placeholder="Write address" required>{!! $data->address !!}</textarea>

                                        @error('address')
                                        <span class="text-danger" role="alert">
                                            <p>{{ $message }}</p>
                                        </span>
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">

                                        <label for="logo">Logo<span class="text-red">* </span>  @error('Logo')

                                        <span class="text-danger" role="alert">
                                           {{ $message }}
                                        </span>
                                        @enderror </label>

                                        <div class="input-field">

                                            <input data-height="220" type="file" class="dropify form-control @error('logo') is-invalid @enderror" id="logo" name="logo" title="Logo" data-default-file="{{ asset('img/clientlogo/'.$data->logo) }}" />

                                            <input type="hidden" name="current_logo" value="{{ $data->logo }}" />
                                        </div>

                                        @error('logo')
                                        <span class="text-danger" role="alert">
                                            <p>{{ $message }}</p>
                                        </span>
                                        @enderror

                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <button title="Create" type="submit" class="btn btn-primary mr-2">Update</button>
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
    $('#address').summernote({
            height: 100,
    });
</script>

@endpush
@endsection

