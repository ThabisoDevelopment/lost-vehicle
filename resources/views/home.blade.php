@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-2">
                <div class="card-body">
                    <h3 class="card-title text-success">Latest Incidents Reported</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        @if (count($incidents) > 0)
            {{-- Start foreach loop here --}}
            @foreach ($incidents as $incident)
                <div class="col-md-4">
                  <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Repoterd on:  {{ $incident->created_at->format('d-M -Y') }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Client No: 20180{{ $incident->client_id}}</h6>
                        {{-- Check if incident is Currently Active --}}
                        @if ($incident->case_active)
                            <p class="card-text text-success">Case No: {{ $incident->id }} is Still Active</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ url('/incident/deactivate/'.$incident->id) }}" class="btn btn-sm btn-outline-warning">Deactive</a>
                                </div>
                                <a href="{{ url('/incident/'.$incident->id) }}" class="card-link">View</a>
                            </div>
                        @else
                            <p class="card-text text-danger">Case No: {{ $incident->id }} is NOT Active</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ url('/incident/activate/'.$incident->id) }}" class="btn btn-sm btn-outline-success">Activate</a>
                                </div>
                                <a href="{{ url('/incident/'.$incident->id) }}" class="card-link">View</a>
                            </div>
                        @endif
                        {{-- End if --}}
                    </div>
                  </div>
                </div>
            @endforeach
            {{-- End foreach loop --}}
        @else
            <div class="col-md-12">
                <h2 class="text-center">Thera are NO Latest Incidents Reported!</h2>
            </div>
        @endif

    </div>
</div>
@endsection
