@extends('layouts.account-nav')

@section('css')
<style>
  .card {
    border: none;
  }

  #sidebar {
    width: 30%;
    margin: 0;
    float: left;
  }

  #products {
    width: 70%;
    margin: 0;
    float: right;
    left: 30%;
  }

  @media(min-width:991px) {}

  @media(min-width:768px) and (max-width:991px) {}

  @media(min-width:568px) and (max-width:767px) {

    #sidebar {
      display: none
    }

    #products {
      width: 100%;
    }


  }

  @media(max-width:567px) {
    .navbar {
      background-color: white;
    }

    #products {
      width: 100%;
      padding: 5px;
      margin: 0;
      float: right
    }

    .checkbox-content {
      width: auto;
    }

    .col-auto {
      padding-left: 0;
    }




    .cont {
      width: auto;
    }


    #sidebar {
      display: none
    }
  }

  .container {
    max-width: 99vw;
    margin: 15px auto;
    padding: 0 15px;
  }

  .checkbox-content {
    text-align: center;
    border-radius: 3px;
    box-shadow: 0 2px 4px 0 rgba(219, 215, 215, 0);
    border: solid 2px transparent;
    background: #fff;
    padding: 15px;
    transition: .3s ease-in-out all;
    height: 100%;
    max-width: 185px;
    min-width: 150px;
  }

  .checkbox-content img {
    width: 30%;
    margin: 0 auto;
  }

  .checkbox-label {
    position: relative;
  }

  .checkbox-label input {
    display: none;
  }

  .checkbox-label .icon {
    width: 20px;
    height: 20px;
    border: solid 2px #e3e3e3;
    border-radius: 50%;
    position: absolute;
    top: 10px;
    left: 10px;
    transition: .3s ease-in-out all;
    transform: scale(1);
    z-index: 1;
  }

  .checkbox-label .icon:before {
    content: "\f00c";
    position: absolute;
    width: 100%;
    height: 100%;
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    font-size: 12px;
    color: #000;
    text-align: center;
    opacity: 0;
    transition: .2s ease-in-out all;
    transform: scale(2);
  }

  .checkbox-label input:checked+.icon {
    background: #008A69;
    border-color: #008A69;
    transform: scale(1.2);
  }

  .checkbox-label input:checked+.icon:before {
    color: #fff;
    opacity: 1;
    transform: scale(.8);
  }

  .checkbox-label input:checked~.checkbox-content {
    box-shadow: 0 2px 4px 0 rgba(219, 215, 215, 0.5);
    border: solid 1px #008A69;
  }
</style>
@endsection

@section('content')

<section id="sidebar">
  <img src="{{ secure_asset('images/interests-sidenav.svg') }}" style="width:100%">
</section>
<section id="products">
  @include('user.partial-nav')
  <div class="container pt-2 mt-3">
    <h3 style="font-weight: bold">Pick your Interests</h3>
    <p><small>Follow at least 3 topics to get event recommendations tailored for you.</small></p>
    <form action="{{ route('user.interests.update')}}" method="POST" class="pt-4" autocomplete="off">
      @csrf
      <div class="container px-sm-2 px-0">
        <div class="row mx-0 px-0">
          @foreach($interests as $key => $interest)
          <div class="col-auto mb-3 justify-content-center">
            <label class="checkbox-label">
              <input type="checkbox" value="{{encrypt($interest->id)}}" name="interests[]">
              <span class="icon"></span>
              <div class="checkbox-content">
                <img class="mt-2 img img-fluid" src="{{secure_asset("images/icons/$interest->icon")}}"
                style="width:45px;
                height: 45px;">
                <p class="pt-2" style="font-size: 13px;">{{$interest->name}}</p>
              </div>
            </label>
          </div>
          @endforeach
          <div class="col-md-12">
            <input type="submit" value="Save" class="btn btn-success px-5">
            <a href="{{route('index.view')}}" class="btn btn-dark">Skip for now</a>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>
@endsection