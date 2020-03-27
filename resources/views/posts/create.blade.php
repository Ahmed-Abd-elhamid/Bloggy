@extends('layouts.app')

@section('title')
<title>Create Post</title>
@endsection

@section('head')
@include('layouts.header')
@endsection

@section('body')
<div class="container m-5 bg-dark text-white p-5">
<form method="POST" action="{{route('posts.store')}}">
    @csrf
    <div class="form-group">
      <label >Title</label>
      <input name="title" type="text" class="form-control" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Description</label>
      <textarea name="description" class="form-control"></textarea>
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
        @foreach($users as $user)
          <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Post</button>
  </form>
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
