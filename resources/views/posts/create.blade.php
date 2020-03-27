@extends('layouts.app')

@section('title')
<title>Create Post</title>
@endsection

@section('head')
@include('layouts.header')
@endsection

@section('body')
<div class="container m-5" style="background-image: url('../images/consultation.jpg');">
  <div class="row justify-content-md-left">
<form method="POST" action="{{route('posts.store')}}">
    @csrf
    <div class="form-group">
      <label >Title</label>
      <input name="title" type="text" class="form-control" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Description</label>
      <textarea name="description" class="form-control">

      </textarea>
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1">Categories</label>
      <select name="category" class="form-control">
          <option value="art">Art</option>
          <option value="social">Social</option>
          <option value="sport">Sport</option>
        </select>
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1">Users</label>
      <select name="user_id" class="form-control">
        @foreach($users as $user)
          <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Post</button>
  </form>
</div>
</div>
@endsection

@section('foot')
@include('layouts.footer')
@endsection
