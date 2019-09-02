@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-2">
        	<div class="card">
        		<div class="card-body">
        			<h2 class="card-title">Incident No: 20180{{ $incident->id }}</h2>
        		</div>
        	</div>
        </div>
    </div>
    <incident-show :incident="{{ json_encode($incident) }}">
        
    </incident-show>
</div>
@endsection