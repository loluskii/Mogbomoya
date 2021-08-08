<!-- Modal -->
<div class="modal fade" id="inviteModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="addNewInterestModalTitle">Invite Friend</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('event.invite', $event->reference)}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Email/Username</label>
                <input type="text" name="invitee" class="form-control mb-3">
                @error('invitee')
                    <b class="text-danger">{{ $message }} </b>
                @enderror
            </div>
           
            <input type="submit" class="btn btn-success" value="Invite">
        </form>
      </div>
      
    </div>
  </div>
</div>