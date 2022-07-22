@if (auth()->user()->password != '')
<div class="modal fade" id="deactivateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-body">
            <div class="container">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold">Verify Your Password </h5>
            <p class="mb-0"> Re-enter your Mogbomoya password to continue.</p>
            <form action="{{ route('user.deactivate') }}" method="POST" class="py-4">
                @csrf
                <div class="form-group">
                        <label for="">CURRENT PASSWORD</label>
                        <input type="text" name="current_password" id="oldPassword" class="form-control form-control-lg" placeholder="Current Password" aria-describedby="helpId">
                        @error('current_password')
                            <b class="text-danger">{{ $message }} </b>
                        @enderror
                    
                </div>
               
                <div class="form-check">
                    <input type="checkbox" class="form-check-input checkbox" id="exampleCheck1">
                    <label class="form-check-label pt-1"  for="exampleCheck1">Show Password</label>
                </div> 
                <div class="py-3">
                    <button type="submit" class="btn btnPrimary py-2">Save changes</button>
                </div>
            </form>
            </div>
        </div>
        
        </div>
    </div>
</div>
@endif