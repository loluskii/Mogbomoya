<!-- Modal -->
<div class="modal fade" id="updateInterestModal{{$interest->id}}" tabindex="-1" role="dialog"
  aria-labelledby="updatenterestModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="updatenterestModalTitle">Add Interest</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('admin.interest.update', $interest->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" value="{{$interest->name}}" class="form-control mb-3">
            @error('name')
            <b class="text-danger">{{ $message }} </b>
            @enderror
          </div>
          <div class="form-group">
            <label for="">Icon</label>
            <br />
            <img src="{{secure_asset("images/icons/$interest->icon")}}" alt="{{$interest->name}}">
            <br />
            <input type="file" name="icon" class="form-control mb-3">
            @error('icon')
            <b class="text-danger">{{ $message }} </b>
            @enderror
          </div>
          <input type="submit" class="btn btn-success" value="Update">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>