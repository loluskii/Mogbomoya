@extends('events.main')
@section('css')
<style>
    body{
        margin: 0;
    }
    .left {
        height: 100%; 
        width: 400px;
        position: fixed; 
        z-index: 1; 
        top: 0; 
        left: 0;
        background-image: url('../images/side-bar.svg');
        overflow-x: hidden; 
        overflow-y: hidden;
    }
   .right{
       height: 150vh;
      
   }
</style>
@endsection

<div class="left"></div>
<div class="right bg-light">
    <div class="row">
        div.col-md-6
    </div>
</div>