@extends('layouts.app')

@section('title')
<title>Home</title>
@endsection

@section('head')
@include('layouts.header')
@endsection

@section('body')
<div class="container m-5">
      <div class="container m-5">
          <table class="table table-primary text-center">
            <thead class="thead-dark">
                <tr>
                  <th scope="col h3">ID</th>
                  <th scope="col h3">Title</th>
                  <th scope="col h3">Description</th>
                  <th scope="col h3">category</th>
                  <th scope="col h3">User Name</th>
                  <th scope="col h3">Created At</th>
                  <th scope="col h3" colspan="3">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($posts as $post)
                <tr>
                <th scope="row">{{ $post->id }}</th>
                  <td>{{ $post->title }}</td>
                  <td>{{ $post->description }}</td>
                  <td>{{ $post->category}}</td>
                  <td>{{ $post->created_at}}</td>
                  <td>{{ $post->user->name}}</td>

                <td><form method="GET" action="{{route('posts.show',['post' => $post->id])}}">
                  @csrf

                  <button type="submit" class="btn btn-primary">Post Details</button>
                </form></td>

                <td><form method="POST" action="{{route('posts.destroy',['post' => $post->id])}}">
                  @method('DELETE')
                  @csrf
                <button type="submit" class="btn btn-danger">Delete Post</button>
                </form></td>

                <td><form method="POST" action="{{route('posts.update',['post' => $post->id])}}">
                  @method('PUT')
                  @csrf
                <button type="submit" class="btn btn-success">Update Post</button>
                </form></td>

              </tr>
              @endforeach
              </tbody>
            </table>
            <a href="{{route('posts.create')}}" class="btn btn-success mb-5">Create Post</a>
      </div>

@endsection

@section('foot')
@include('layouts.footer')
@endsection
