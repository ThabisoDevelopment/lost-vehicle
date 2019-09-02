@extends('layouts.app')

@section('content')
<div class="container">
	 <div class="row">
	 	@if (count($brands) > 0)
	 		<!--start foreach loop-->
	        @foreach ($brands as $brand)
		    	<div class="col-sm-6 col-md-3">
		          <div class="card mb-4 shadow-xsm">
		            <div class="card-body">
		                <h5 class="card-title"> {{ $brand->name }} </h5>
		                <h6 class="card-subtitle mb-2 text-muted">Since: {{ $brand->created_at->format('d-M -Y') }}</h6>
		                @if ($brand->brand_active)
							<p class="text-success">Activate</p>
							<div class="btn-group">
								<a href="{{ url('/brand/'.$brand->id) }}" class="btn btn-sm btn-outline-info">View</a>
	                        	<a href="{{ url('/brand/edit/'.$brand->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>
							</div>
		                @else
			                <p class="card-text text-secondary">Not Active</p>
			                <a href="{{ url('/brand/'.$brand->id) }}" class="btn btn-sm btn-outline-info">view</a>
		                @endif
		                
		            </div>
		          </div>
		        </div>
	        @endforeach
	        <!--end foreach loop-->
	        {{-- Pagination --}}
	        <div class="col-md-12">
	        	{{ $brands->links() }}
	        </div>

	 	@else
	 		<div class="col-md-12 justify-content-center">
	 			<h2 class="text-center"> There are no Brands for Cars</h2>
	 		</div>
	 	@endif
    </div>
	
</div>
@endsection