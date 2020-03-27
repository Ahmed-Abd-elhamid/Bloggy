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
<form method="GET" action="{{route('posts.edit',['post' => $post->id])}}">
    @csrf
    <div class="form-group">
      <label >Title</label>
      <input name="title" type="text" class="form-control" aria-describedby="emailHelp" value="{{$post->title}}">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Description</label>
      <textarea name="description" class="form-control">
        {{$post->description}}
      </textarea>
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1">Categories</label>
      <select name="category" class="form-control" value="{{$post->category}}">
          <option value="art">Art</option>
          <option value="social">Social</option>
          <option value="sport">Sport</option>
        </select>
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1">Users</label>
      <select name="user_id" class="form-control">
          <option value="{{$post->user_id}}">{{$post->user->name}}</option>
        @foreach($users as $user)
        @if($post->user_id != $user->id)
          <option value="{{$user->id}}">{{$user->name}}</option>
        @endif
        @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>
</div>
@endsection

@section('foot')
@include('layouts.footer')
@endsection
