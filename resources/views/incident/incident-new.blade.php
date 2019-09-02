@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if (session('step2') or session('step3'))
            @else
                <div class="card mt-5">
                    <div class="card-body">
                        <h2 class="card-title">New Client Form</h2>
                        <form action="{{ url('/incident/create/step1') }}" method="POST" class="mb-4">
                            <div class="form-group mb-3">
                                <label for="clientsname">Firstname</label>
                                <input type="text" class="form-control" name="client_firstname" id="clientsname">
                            </div>
                            <div class="form-group mb-3">
                                <label for="clientsurname">Lastname</label>
                                <input type="text" class="form-control" name="client_lastname" id="clientsurname">
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="Submit" class="btn btn-outline-success">create client account</button>
                        </form>
                        <a href="{{ url('/incident/create/step1') }}" class="card-link">Already have Lost Vehicle client Acount!</a>
                    </div>
                </div>
            @endif

            @if (session('step2'))
                <div class="card">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title"><small>Step:2</small> Vehicle Details Form</h2>
                            <h5 class="card-text text-warning">all fields are required!</h5>
                            <form action="{{ url('/incident/create/step2') }}" method="POST">
                                <div class="form-group">
                                    <label for="select">Select Brand</label>
                                    <select class="form-control" id="select" name="car_brand">
                                        <option> -- select brand here --</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="name">Car Name</label>
                                    <input type="text" class="form-control" name="car_name" id="name" placeholder="eg: WRX STI">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="model">Car Model</label>
                                    <input type="text" class="form-control" name="car_model" id="model" placeholder="eg: 2014">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="color">Color</label>
                                    <input type="text" class="form-control" name="car_color" id="color" placeholder="eg: blue">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="type">Car Type</label>
                                    <input type="text" class="form-control" name="car_type" id="type" placeholder="eg: Sedan">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="reg">Car Registration Number</label>
                                    <input type="text" class="form-control" name="car_reg" id="reg" placeholder="eg: JSW 878 GP">
                                </div>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="Submit" class="btn btn-outline-success">Submit vehicle details</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif

             @if (session('step3'))
                <div class="card mt-5">
                    <div class="card-body">
                        <h2 class="card-title"><small>Step:3</small> New Incident Form</h2>
                        <form action="{{ url('/incident/create/step3') }}" method="POST">
                            <div class="form-group">
                                <label for="selectbrand">Select Brand</label>
                                <select class="form-control" id="selectbrand" name="brand_id">
                                    <option> -- select brand here --</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="selectcar">Select Vehicle</label>
                                <select class="form-control" id="selectcar" name="vehicle_id">
                                    <option> -- select vehicle here --</option>
                                    @foreach ($vehicles as $vehicle)
                                        <option value="{{ $vehicle->id }}">{{$vehicle->model}} {{$vehicle->name}} {{$vehicle->type}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="selectClient">Select Client</label>
                                <select class="form-control" id="selectClient" name="client_id">
                                    <option> -- select cliecnt here --</option>
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}">{{ $client->lastname }} {{ $client->firstname }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="Submit" class="btn btn-outline-success">submit new incident</button>
                        </form>
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>
@endsection