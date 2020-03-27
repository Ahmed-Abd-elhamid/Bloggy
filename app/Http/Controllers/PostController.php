<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\User;
Use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    //

    public function index (){

      $posts = Post::all();
      return view('posts.index', [
          'posts' => $posts,
      ]);
    }

      public function show(Request $request){
          $postId = $request->post;
          $post = Post::find($postId);

          return view('posts.show',[
              'post' => $post,
          ]);
      }

      public function destroy(Request $request){
          $postId = $request->post;
          Post::destroy($postId);

          return redirect()->back()->with('alert', 'Deleted!');
}



    public function create(){
      $users = User::all();

      return view('posts.create', [
        'users' => $users
      ]);
    }

    public function store(PostRequest $request){
      Post::create([
        'title' => $request->title,
        'description' => $request->description,
        'category' => $request->category,
        'user_id' => $request->user_id,
      ]);

      return redirect()->route('posts.index');

    }

    public function  edit(Request $request){
      $users = User::all();
      $postId = $request->post;
      $post = Post::find($postId);

      return view('posts.edit',[
          'post' => $post,
          'users' => $users,
      ]);

    }

    public function update(PostRequest $request){

      $postId = $request->post;
      $post = Post::find($postId);
      $input = $request->all();
      $post->fill($input)->save();

      return redirect()->route('posts.index')->with('alert', 'Updated!');

    }
}
