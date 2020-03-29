
@extends('layouts.app')

@section('title')
<title>Post Details</title>
@endsection

@section('head')
@include('layouts.header')
@endsection

@section('body')
<div class="container m-5 p-5" style="background-image: url('../images/consultation.jpg');">
  <div class="row justify-content-md-center">
    <div class="card col-9 text-center bg-dark text-white" style="width: 25rem;">
        <div class="card-body">
        <h2 class="card-title border border-danger bg-danger">{{$post->title}}</h2>
          <hr>
          @if ($post->image)
          <p class="card-text"><img src="{{url('uploads/'.$post->image->filename)}}" width="600" alt="mdb logo"></p>
          @else
          <p class="card-text"><img src="https://previews.123rf.com/images/pavelstasevich/pavelstasevich1811/pavelstasevich181101028/112815904-no-image-available-icon-flat-vector-illustration.jpg" width="600" alt="mdb logo"></p>
          @endif
          <p><b>Category:</b> {{$post->category}} | <b>Author:</b> {{$post->user->name}}</p>
          <p class="card-text">{{$post->description}}</p>

        </div>
      </div>
  </div>
</div>
@endsection

@section('foot')
@include('layouts.footer')
@endsection
