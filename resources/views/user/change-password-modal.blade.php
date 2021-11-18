<!-- Change password Modal -->

<style>
.field-icon {
    float: right;
    margin-right: 10px;
    margin-top: -30px;
    position: relative;
    z-index: 2;
    color: grey;
}
</style>
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-body">
            <div class="container">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold">Change My Password </h5>
            <label class="mb-0 font-weight-light"> {{ auth()->user()->password != '' ? 'Update your current password': 'You have not set a default password. Please enter your new password.' }} Update your current password</label>
            <form action="{{ route('user.update.password') }}" method="POST" class="py-4">
                @csrf
                <div class="form-group">
                    @if (auth()->user()->password != '')
                        <label for="">CURRENT PASSWORD</label>
                        <input type="password" name="current_password" id="password-field" class="form-control form-control-lg" placeholder="Old Password" aria-describedby="helpId">
                        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        @error('current_password')
                            <b class="text-danger">{{ $message }} </b>
                        @enderror
                    @endif
                </div>
                <div class="form-group">
                    <label for="">NEW PASSWORD</label>
                    <input type="password" name="new_password" id="password-field" class="form-control form-control-lg" placeholder="New Password" aria-describedby="helpId">
                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    @error('new_password')
                        <b class="text-danger">{{ $message }} </b>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">CONFIRM PASSWORD</label>
                    <input type="password" name="new_confirm_password" id="password-field" class="form-control form-control-lg" placeholder="Confirm Password" aria-describedby="helpId">
                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    @error('new_confirm_password')
                        <b class="text-danger">{{ $message }} </b>
                    @enderror
                </div>
                <div class="py-3">
                    <button type="submit" class="btn btnPrimary btn-block py-2">Save changes</button>
                </div>
            </form>
            </div>
        </div>
        
        </div>
    </div>
</div>


<script>
$(".toggle-password").click(function() {

    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});
</script>