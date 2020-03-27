
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
          <p class="card-text">{{$post->description}}</p>
          <p><b>Category:</b> {{$post->category}} | <b>Author:</b> {{$post->user->name}}</p>

        </div>
      </div>
  </div>
</div>
@endsection

@section('foot')
@include('layouts.footer')
@endsection
