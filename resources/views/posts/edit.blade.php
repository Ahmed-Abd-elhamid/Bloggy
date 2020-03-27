@extends('layouts.app')

@section('title')
<title>Edit Post</title>
@endsection

@section('head')
@include('layouts.header')
@endsection

@section('body')

<div class="container m-5" style="background-image: url('../images/consultation.jpg');">
  <div class="row justify-content-md-left">
<form method="POST" action="{{route('posts.update',['post' => $post->id])}}">
    @method('PUT')
    @csrf
    <div class="form-group">
      <label >Title</label>
      <input name="title" type="text" class="form-control" aria-describedby="emailHelp" value="{{$post->title}}">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Description</label>
      <textarea name="description" class="form-control">{{$post->description}}</textarea>
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1">Categories</label>
      <br>
          <input type="radio" name="category" value="art"> Art
          <input type="radio" name="category" value="social"> Social
          <input type="radio" name="category" value="sport"> Sport
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
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>
@endsection

@section('foot')
@include('layouts.footer')
@endsection
