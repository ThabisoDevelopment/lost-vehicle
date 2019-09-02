@extends('layouts.app')

@section('content')
<div class="container">
	    <div class="row">
	        <!--show select brabd --> 
	        <div class="col-md-5">
	          <div class="card mb-4">
	            <div class="card-body">
	                <h2 class="card-title mb-4"> {{ $brand->name }} </h2>
	                <h5 class="card-subtitle mb-3 text-muted"> {{ $brand->created_at->format('d-M-Y') }} </h5>
	                {{-- Check if brand is Currently Active --}}
	                @if ($brand->brand_active)
	                	<p class="card-text text-success mb-3"> {{ $brand->name }} is currently Active</p>
	                	<div class="d-flex justify-content-between align-items-center">
		                    <div class="btn-group">
		                        <a href="{{ url('brand/delete/'.$brand->id) }}" class="btn btn-outline-danger">Delete</a>
		                        <a href="{{ url('brand/deactivate/'.$brand->id) }}" class="btn btn-outline-warning">Deactivate</a>
		                    </div>
		                    <a href="{{ url('/brand/edit/'.$brand->id) }}" class="card-link">Edit</a>
		                </div>
		            @else
		            	<p class="card-text text-danger mb-3"> {{ $brand->name }} is Not Active</p>
		            	<div class="d-flex justify-content-between align-items-center">
		                    <div class="btn-group">
		                        <a href="{{ url('brand/delete/'.$brand->id) }}" class="btn btn-outline-danger">Delete</a>
		                        <a href="{{ url('brand/activate/'.$brand->id) }}" class="btn btn-outline-success">Activate</a>
		                    </div>
		                </div>
	                @endif
	                {{-- End if --}}
	            </div>
	          </div>
	        </div>
	        <!--end selected brand-->
	        <div class="col-md-7">
	            <ul class="list-group">
	            	<li class="list-group-item mb-2">2018 - Model</li>
	            	<li class="list-group-item mb-2">2017 - Model</li>
	            	<li class="list-group-item mb-2">2016 - Model</li>
	            	<li class="list-group-item mb-2">2015 - Model</li>
	            	<li class="list-group-item mb-2">2014 - Model</li>
	            	<li class="list-group-item mb-2">2013 - Model</li>
	            	<li class="list-group-item mb-2">2012 - Model</li>
	            	<li class="list-group-item mb-2">2011 - Model</li>
	            	<li class="list-group-item mb-2">2010 - Model</li>
	            	<li class="list-group-item">2009 - Model</li>
	            </ul>
	        </div>
	    </div>
</div>
@endsection