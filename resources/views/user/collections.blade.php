@extends('layouts.main') 

@section('css')
<style>
    .card{
        background-color: transparent;
        border: 2px dashed #008A69;
    }
</style>
@endsection

@section('content')
    <div class="container py-5 ">
        <div class="row">
            <div class="col">
                <h1> Collections </h1>
                <div class="row my-5">
                    <div class="col-sm-4 col-md-3">
                        <a  data-toggle="modal" data-target="#addNewCollectionModal">
                            <div class="card">
                                <div class="card-body text-center p-5">
                                    <div class="">
                                        <img src="{{asset('images/icons/plus.svg')}}" alt="" srcset="">
                                    </div>
                                </div>
                            </div>
                        </a>
                        <p class="mt-2">Add new collection</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addNewCollectionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add New Collection</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="https://google.com">
                  <div class="form-group">
                    <label for="">COLLECTION NAME</label>
                    <input type="text" name="collection_name" id="" class="form-control form-control-lg" placeholder="" aria-describedby="helpId">
                  </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btnPrimary">Create Collection</button>
            </div>
          </div>
        </div>
      </div>
@endsection