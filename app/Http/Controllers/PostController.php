<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\User;

class PostController extends Controller
{
    //

    public function index (){

      $posts = Post::all();
      // dd($posts);

      return view('posts.index', [
          'posts' => $posts,
      ]);    }

      public function show()
      {
          $request = request();

          $postId = $request->post;

          $post = Post::find($postId);

          // dd($post);
          return view('posts.show',[
              'post' => $post,
          ]);
      }

      public function destroy()
      {
          $request = request();

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

    public function store(){

      $request = request();

      // dd($request->category);
      // dd($request->user_id);

      Post::create([
        'title' => $request->title,
        'description' => $request->description,
        'category' => $request->category,
        'user_id' => $request->user_id,
      ]);

      return redirect()->route('posts.index');

    }

    public function  edit(){

      $post = Post::find($postID);



      // post::update([
      //   'title' => $request->title,
      //   'description' => $request->description,
      //   'category' => $request->category,
      //   'user_id' => $request->user_id,
      // ]);

      return redirect()->route('posts.index');

    }

    public function update(){

      $users = User::all();

      $request = request();

      $postId = $request->post;

      $post = Post::find($postId);

      return view('posts.update',[
          'post' => $post,
          'users' => $users,
      ]);
    }
}
