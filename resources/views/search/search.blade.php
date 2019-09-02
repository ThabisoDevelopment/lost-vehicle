@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h3 class="text-success mb-2">Results for "{{ $search_key }}"</h3>
        @if (count($brands) > 0)
            <div class="col-md-12 mb-3">
                <div class="list-group">
                    @foreach ($brands as $brand)
                        <a href="{{ url('/brand/'.$brand->id) }}" class="list-group-item list-group-item-action text-info">{{ $brand->name }}</a>
                    @endforeach 
                </div> 
            </div>
        @endif

        @if (count($clients) > 0)
            <div class="col-md-12 mb-3">
                <div class="list-group">
                    @foreach ($clients as $client)
                        <a href="{{ url('/client/'.$client->id) }}" class="list-group-item list-group-item-action text-info">{{ $client->firstname }} {{ $client->lastname }}</a>
                    @endforeach 
                </div> 
            </div>
        @endif
            
        @if (count($incidents) > 0)
            <div class="col-md-12 mb-3">
                <div class="list-group">
                    @foreach ($incidents as $incident)
                        <a href="{{ url('/incident/'.$incident->id) }}" class="list-group-item list-group-item-action text-info">{{ $incidents->id }} {{ $incidents->created_at }}</a>
                    @endforeach 
                </div> 
            </div>
        @endif

         @if (count($vehicles) > 0)
            <div class="col-md-12 mb-3">
                <div class="list-group">
                    @foreach ($vehicles as $vehicle)
                        <a href="{{ url('/brand/'.$vehicle->brand_id) }}" class="list-group-item list-group-item-action text-info">{{ $vehicle->name }} {{ $vehicle->model }} {{ $vehicle->color }} {{ $vehicle->type }} {{ $vehicle->registration }}</a>
                    @endforeach 
                </div> 
            </div>
        @endif
    </div>
</div>
@endsection
