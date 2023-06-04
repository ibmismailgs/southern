@extends('layouts.main')
@section('title', 'Service Deatils')
@section('content')

    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="fa fa-users bg-blue"></i>
                        <div class="d-inline pt-5">
                            <h5 class="pt-10" >Service Deatils</h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="page-title-actions float-right">
                        <a title="Back" href="{{ URL::previous() }}" type="button" class="btn btn-sm btn-dark">
                            <i class="fas fa-arrow-left mr-1"></i>
                            Back
                        </a>

                        <a title="Create" href="{{ route('our-services.create') }}" type="button" class="btn btn-sm btn-primary">
                            <i class="fas fa-plus mr-1"></i>
                            Create
                        </a>
                    </div>
                </div>

            </div>
        </div>

        <div class="row" id="printableArea">
            <div class="col-md-12">
                <div class="card p-3">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-12"> <strong>Service Title </strong> <span class="ml-15">{{ $data->title ?? '--'}} </span></div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-12"> <strong>Icon </strong> <span class="ml-15"><img id="icon" height="150px" width="200px" src="{{ asset('img/services/'.$data->icon)}}" alt="Photo" title="Icon"> </span></div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-12 d-flex"> <strong>Description </strong> <span class="ml-15">{!! $data->description ?? '--' !!} </span></div>
                        </div>
                        <hr>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('script')
    <script>
        function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
    </script>
@endpush
@endsection
