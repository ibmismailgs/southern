@extends('layouts.main')
@section('title', 'Create Menu')
@section('content')

    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="fa fa-bars bg-blue"></i>
                        <div class="d-inline pt-5">
                            <h5 class="pt-10" >Create Menu</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-title-actions float-right">
                        <a title="Back Button" href="{{ url()->previous() }}" type="button" class="btn btn-sm btn-dark">
                            <i class="fas fa-arrow-left mr-1"></i>
                            Back
                        </a>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <!-- start message area-->
            @include('include.message')
            <!-- end message area-->
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-body">
                        <form action="{{route('menu.store')}}" method="POST">
                            @csrf

                            <div class="form-row">

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="title">Title<span class="text-red">*</span></label>

                                        <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" placeholder="Enter menu title" required>

                                        @error('title')
                                        <span class="text-danger" role="alert">
                                            <p>{{ $message }}</p>
                                        </span>
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="status">Status<span class="text-red">*</span></label>
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

                            </div>

                            <div class="row mt-10">
                                <div class="col-sm-12 ">
                                    <button type="submit" class="btn form-bg-success mr-2">Create</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
