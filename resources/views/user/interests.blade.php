@extends('layouts.account-nav') 

@section('css')
<style>
  body{
    overflow-x: hidden;
  }
  label{
    background-color: white;
    border: none;

  }
  
  label.active, .active{
    border: 2px solid aquamarine;
  }
.card{
    border: none;
}



/* @media only screen and (max-width: 600px) {
 */

</style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3 col-3 fixed-top one pl-0 d-md-block d-none d-sm-none">
                <img src="{{ asset('images/interests-sidenav.svg') }}" alt="">
        </div>
        <div class="col-md-1 col-1"></div>
        <div class="col-md-8 offset-sm-3 px-0" style="height: 105vh;">
            @include('user.partial-nav')
                        <div class="container pt-2 mt-5">
              {{-- {{ $interests }} --}}
                    <h3 style="font-weight: bold">Pick your Interests</h3>
                    <p><small>Follow at least 3 topics to get event recommendations tailored for you.</small></p>
                    <form action="{{ route('user.interests.update')}}" method="POST" class="pt-4" autocomplete="off">
                        @csrf
                        <div class="row" id="interestsCat">
                          @foreach($interests as $key => $interest)
                          <div class="col-sm-3 col-6 mb-3">
                            <div>
                              <label class="mb-0 w-100" id="{{$interest->id}}" style="padding: 0;" onclick="selectInterest('{{$interest->id}}')">
                                <input type="checkbox" name="interests[]" value="{{$interest->name}}" style="display: none"> 
                                <div class="card">
                                  <div class="card-body">
                                      <h3 class="card-title text-center"><img src="{{asset("images/icons/$interest->icon")}}" alt="" srcset=""></h3>
                                      <p class="card-text text-center">{{$interest->name}}</p>  
                                  </div>
                                </div>
                              </label>
                            </div>
                          </div>
                          @endforeach
                          <div class="col-12 py-4">
                            <button class="btn btnPrimary" type="submit">Save Interests</button>
                          </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection


@section('script')


<script>

    let selectedInterests = [];
    
    function selectInterest(id){
      // selectInterest.preventDefault();
      // event.preventDefault();
      if(document.getElementById(id).classList.contains("active")){
        document.getElementById(id).classList.remove("active");
      }else{
        document.getElementById(id).classList.add("active");

      }
      
    }



</script>
@endsection