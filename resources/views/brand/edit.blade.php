
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
          <div class="card mb-4 shadow-sm">
              <div class="card-body">
                <form action="/brand/update/{{$brand->id}}" method="POST">
                  <div class="form-group mb-3">
                    <label for="brandInput">Brand Name</label>
                    <textarea class="form-control" name="brand_name" id="brandInput" rows="2">{{ $brand->name }}</textarea>
                  </div>
                  @if ($brand->brand_active)
                      <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="brandcheckupdate" name="brand_active" checked>
                        <label class="custom-control-label" for="brandcheckupdate" >Active</label>
                      </div>
                  @else
                      <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="brandcheckupdate" name="brand_active" unchecked>
                        <label class="custom-control-label" for="brandcheckupdate" >Active</label>
                      </div>
                  @endif
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="Submit" class="btn btn-primary">Update Brand</button>
                </form>

              </div>
            </div>
        </div>
    </div>
</div>
@endsection