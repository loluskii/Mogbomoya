<!-- Change Email Modal -->
<div class="modal fade" id="changeEmailModal" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-body">
            <div class="container">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold">Change Email </h5>
            <p class="mb-0"> Re-enter your Mogbomoya password to continue.</p>
            <form action="{{route('user.update.email')}}" method="POST" class=" pt-1 pb-4" autocomplete="off">
                @csrf
                <div class="form-group">
                    @if (auth()->user()->password != '')
                        <label for="">CURRENT PASSWORD</label>
                        <input type="password" name="current_password" class="form-control form-control-lg" placeholder="Current Password" aria-describedby="helpId">
                        @error('current_password')
                            <b class="text-danger">{{ $message }} </b>
                        @enderror
                    @endif
                </div>
                <div class="form-group">
                    <label for="">NEW EMAIL</label>
                    <input type="email" name="email"  class="form-control form-control-lg" placeholder="New Email" aria-describedby="helpId">
                    @error('email')
                        <b class="text-danger">{{ $message }} </b>
                    @enderror
                </div>
                {{-- <div class="form-check">
                    <input type="checkbox" class="form-check-input checkbox" id="exampleCheck1">
                    <label class="form-check-label pt-1"  for="exampleCheck1">Show Password</label>
                </div>  --}}
                <div class="py-3">
                    <button type="submit" class="btn btnPrimary btn-block py-2">Save changes</button>
                </div>
            </form>
            </div>
        </div>
        
        </div>
    </div>
</div>

