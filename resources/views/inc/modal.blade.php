<!-- Modal -->
<div class="modal fade" id="create_new_brand" tabindex="-1" role="dialog" aria-labelledby="brandModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="brandModalLabel">Create New Brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="/brands" method="POST">
            <div class="form-group mb-3">
              <label for="brandInput">Brand Name</label>
              <textarea class="form-control" name="brand_name" id="brandInput" rows="2"></textarea>
            </div>
            <div class="custom-control custom-checkbox mb-3">
              <input type="checkbox" class="custom-control-input" id="brandcheck" name="brand_active">
              <label class="custom-control-label" for="brandcheck">Active</label>
            </div>
             <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="Submit" class="btn btn-primary">Submit</button>
          </form>
      </div>
    </div>
  </div>
</div>