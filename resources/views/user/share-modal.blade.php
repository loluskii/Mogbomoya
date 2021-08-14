<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Share your Event Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="mb-2">
                <p class="mb-0">Facebook</p>
                <div class="form-row mb-1">
                    <div class="col-10">
                        <input class="form-control" disabled value="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}">
                    </div>
                    <div class="col-2">
                        <button class="btn btn-sm btn-primary py-2" type="submit"> <i class="fa fa-clone"></i> </button>
                    </div>
                </div>
            </div>
            <div class="mb-2">
                <p class="mb-0">WhatsApp</p>
                <div class="form-row mb-1">
                    <div class="col-10">
                        <input class="form-control" disabled value="whatsapp://send?text=Mogbomoya Event {{url()->current()}}">
                    </div>
                    <div class="col-2">
                        <button class="btn btn-sm btn-primary py-2" type="submit"> <i class="fa fa-clone"></i> </button>
                    </div>
                </div>
            </div>
            <div class="mb-1">
                <p class="mb-0">Twitter</p>
                <div class="form-row mb-1">
                    <div class="col-10">
                        <input class="form-control" disabled value="https://twitter.com/intent/tweet?text=Mogbomoya Event {{url()->current()}}">
                    </div>
                    <div class="col-2">
                        <button class="btn btn-sm btn-primary py-2" type="submit"> <i class="fa fa-clone"></i> </button>
                    </div>
                </div>    
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


<script>
    function myFunction() {
        var copyText = document.getElementById("myInput");
        copyText.select();
        copyText.setSelectionRange(0, 99999)
        document.execCommand("copy");
        alert("Copied the text: " + copyText.value);
    }
</script>