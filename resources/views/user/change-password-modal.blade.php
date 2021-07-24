<!-- Change password Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-body">
            <div class="container">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold">Verify Your Password </h5>
            <p class="mb-0"> Re-enter your Mogbomoya password to continue.</p>
            <form action="{{ route('user.update.password') }}" method="POST" class="py-4">
                @csrf
                <div class="form-group">
                    @if (auth()->user()->password != '')
                        <label for="">CURRENT PASSWORD</label>
                        <input type="text" name="current_password" id="oldPassword" class="form-control form-control-lg" placeholder="Old Password" aria-describedby="helpId">
                        @error('current_password')
                            <b class="text-danger">{{ $message }} </b>
                        @enderror
                    @endif
                </div>
                <div class="form-group">
                    <label for="">NEW PASSWORD</label>
                    <input type="text" name="new_password" id="newPassword" class="form-control form-control-lg" placeholder="New Password" aria-describedby="helpId">
                    @error('new_password')
                        <b class="text-danger">{{ $message }} </b>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">CONFIRM PASSWORD</label>
                    <input type="text" name="new_confirm_password" id="cPassword" class="form-control form-control-lg" placeholder="Confirm Password" aria-describedby="helpId">
                    @error('new_confirm_password')
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

