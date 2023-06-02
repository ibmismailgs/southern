@extends('layouts.main')
@section('title', 'Corporate Client Deatils')
@section('content')

    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="fa fa-users bg-blue"></i>
                        <div class="d-inline pt-5">
                            <h5 class="pt-10" >{{ $data->client_name }} <span style="font-weight: normal">Deatils</span> </h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="page-title-actions float-right">
                        <a title="Back" href="{{ URL::previous() }}" type="button" class="btn btn-sm btn-dark">
                            <i class="fas fa-arrow-left mr-1"></i>
                            Back
                        </a>

                        <a title="Create" href="{{ route('corporate-client.create') }}" type="button" class="btn btn-sm btn-primary">
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
                            <div class="col-md-12"> <strong>Client Name </strong> <span class="ml-10">{{ $data->client_name ?? '--'}} </span></div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12"> <strong>Web Address </strong> <span class="ml-10">{{ $data->website ?? '--'}} </span></div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12"> <strong>Phone </strong> <span class="ml-10">{{ $data->phone ?? '--'}} </span></div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12"> <strong>Email </strong> <span class="ml-10">{{ $data->email ?? '--'}} </span></div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12"> <strong>Address </strong> <span class="ml-10">{!! $data->address ?? '--' !!} </span></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12"> <strong>Logo </strong> <span class="ml-10"><img id="logo" height="150px" width="200px" src="{{ asset('img/clientlogo/'.$data->logo)}}" alt="Photo" title="Logo"> </span></div>
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
