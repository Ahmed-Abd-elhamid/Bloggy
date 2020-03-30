@extends('layouts.app')

@section('title')
<title>Create Post</title>
@endsection

@section('head')
@include('layouts.header')
@endsection

@section('body')
<div class="container m-5 bg-dark text-white p-5">
<form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
  {{ csrf_field() }}
    <div class="form-group">
      <h3 >Title</h3>
      <input name="title" type="text" class="form-control" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <h3 for="exampleInputPassword1">Description</h3>
      <textarea name="description" class="form-control"></textarea>
    </div>

    <div class="form-group">
      <h3 for="exampleInputPassword1">Category</h3>
      <br>
          <input type="radio" name="category" value="art"> Art
          <input type="radio" name="category" value="social"> Social
          <input type="radio" name="category" value="sport"> Sport
    </div>

    <div class="form-group">
      <h3 for="exampleInputPassword1">Users</h3>
      <select name="user_id" class="form-control">
        @foreach($users as $user)
          <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
        </select>
    </div>

    <div class="form-group">
      <h3 for="exampleInputPassword1">Image</h3>
      <input type="file" class="form-control" name="image"/>
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
