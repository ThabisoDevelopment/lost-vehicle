@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    	<div class="col-md-12">
    		  <h3 class="text-center text-success">All Clients</h3>
    	</div>

    	<div class="col-md-3">
    		<div class="card">
    			<div class="card-header bg-info">Create New Client</div>
    			<div class="card-body">
    				<form action="{{ url('/client/create') }}" method="POST">
			            <div class="form-group mb-3">
			              <label for="clientsname">Firstname</label>
			              <input type="text" class="form-control" name="client_firstname" id="clientsname">
			            </div>
			            <div class="form-group mb-3">
			              <label for="clientsurname">Lastname</label>
			              <input type="text" class="form-control" name="client_lastname" id="clientsurname">
			            </div>
		             <input type="hidden" name="_token" value="{{ csrf_token() }}">
		            <button type="Submit" class="btn btn-block btn-outline-success">new client</button>
		         	</form>
    			</div>
    		</div>
    	</div>

    	<div class="col-md-9">
    		@if (count($clients) > 0)
				<ul class="list-group list-group-flush">
				@foreach ($clients as $client)
	                <li class="list-group-item d-flex justify-content-between align-items-center mb-2">
	                	<a href="">
							{{ $client->firstname }} {{ $client->lastname }}	                	</a>
	                    <a href="{{ url('/client/delete/'.$client->id) }}" class="text-danger" class="">Remove</a>
	                </li>
				@endforeach
				</ul>
				{{-- Pagination --}}
				{{ $clients->links() }}
			@else
				<h3>There are no Clients</h3>
			@endif
    	</div>
        
    </div>
</div>
@endsection