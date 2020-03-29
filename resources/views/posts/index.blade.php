@extends('layouts.app')

@section('title')
<title>Home</title>
@endsection

@section('head')
@include('layouts.header')
@endsection

@section('body')




<div class="container m-auto">
  @if ($message = Session::get('success'))

  <div class="alert alert-success alert-block">

  	<button type="button" class="close" data-dismiss="alert">×</button>

          <strong>{{ $message }}</strong>

  </div>

  @endif
  @if ($message = Session::get('warning'))
  <div class="alert alert-warning alert-block">
  	<button type="button" class="close" data-dismiss="alert">×</button>
  	<strong>{{ $message }}</strong>
  </div>
  @endif
      <div class="container justify-content">
          <table class="table table-primary text-center">
            <thead class="thead-dark">
                <tr>
                  <th scope="col" class="align-middle h5">ID</th>
                  <th scope="col" class="align-middle h5">Title</th>
                  <th scope="col" class="align-middle h5">Slug</th>
                  <th scope="col" class="align-middle h5">Description</th>
                  <th scope="col" class="align-middle h5">category</th>
                  <th scope="col" class="align-middle h5">Image</th>
                  <th scope="col" class="align-middle h5">User Name</th>
                  <th scope="col" class="align-middle h5">Created At</th>
                  <th scope="col" class="align-middle h5" colspan="3">Actions</th>
                </tr>
              </thead>
              <tbody >
                @foreach($posts as $post)
                <tr>
                <th scope="row" class="align-middle">{{ $post->id }}</th>
                <td class="align-middle">{{ $post->title }}</td>
                  <td class="align-middle">{{ $post->slug }}</td>
                  <td class="align-middle">{{ $post->description }}</td>
                  <td class="align-middle">{{ $post->category}}</td>
                  @if ($post->image)
                  <td class="align-middle"><img src="{{url('uploads/'.$post->image->filename)}}" width="100" alt="mdb logo"></td>
                  @else
                  <td class="align-middle"><img src="https://previews.123rf.com/images/pavelstasevich/pavelstasevich1811/pavelstasevich181101028/112815904-no-image-available-icon-flat-vector-illustration.jpg" width="100" alt="mdb logo"></td>
                  @endif
                  <td class="align-middle">{{ $post->user->name}}</td>
                  <td class="align-middle">{{ $post->created_at}}</td>


                <td class="align-middle"><form method="GET" action="{{route('posts.show',['post' => $post->id])}}">
                  @csrf

                  <button type="submit" class="btn btn-primary">Post Details</button>
                </form></td>

                <td  class="align-middle"><form method="POST" action="{{route('posts.destroy',['post' => $post->id])}}" id="delet">
                  @method('DELETE')
                  @csrf
                <button type="button" class="del btn btn-danger">Delete Post</button>
                </form></td>

                <td  class="align-middle"><form method="GET" action="{{route('posts.edit',['post' => $post->id])}}">
                  @csrf
                <button type="submit" class="up btn btn-success">Update Post</button>
                </form></td>

              </tr>
              @endforeach
              </tbody>
            </table>
            {!! $posts->render() !!}
            <a href="{{route('posts.create')}}" class="btn btn-success mb-5">Create Post</a>
      </div>

@endsection

@section('foot')
@include('layouts.footer')
@endsection
