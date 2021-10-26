@extends('layouts.main') 

@section('css')
<style>
    .add_to{
        background-color: transparent;
        border: 2px dashed #008A69;
    }
</style>
@endsection

@section('content')
    <div class="container-fluid px-3 py-5 ">
        <div class="row">
            <div class="col">
                <h1> Group your Events </h1>
                <div class="row my-5">
                    <div class="col-sm-4 col-md-3">
                        <a class="btn btnPrimary"  data-toggle="modal" data-target="#addNewCollectionModal">
                            Add
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row py-3">
          @forelse ($collections as $collection)
              <div class="col-md-3">
                  <div class="card shadow">
                      @if($collection->event_collections->first())
                        <img src="{{asset("images/event/".$collection->event_collections->first()->event->featured_image)}}" class="card-img-top" alt="{{$collection->name}}">
                      @else 
                        <img src="https://www.online-tech-tips.com/wp-content/uploads/2020/04/WallpaperCraft.jpg.optimal.jpg" class="card-img-top" alt="{{$collection->name}}">
                      @endif
                      <div class="card-body">
                          <a href="{{route('collection.info', $collection->reference)}}"><h5 class="text-dark  card-title">{{ $collection->name }}</h5></a>
                      </div>
                  </div>
              </div>
          @empty
              <div class="col-md-12 text-center">
                  <p>No collections to display.</p>
              </div>
          @endforelse
          {{$collections->links()}}
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
            <form action="{{route('collection.store')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">COLLECTION NAME</label>
                        <input type="text" name="name" id="" class="form-control form-control-lg" placeholder="" aria-describedby="helpId">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btnPrimary">Create Collection</button>
                </div>
            </form>
          </div>
        </div>
      </div>
@endsection