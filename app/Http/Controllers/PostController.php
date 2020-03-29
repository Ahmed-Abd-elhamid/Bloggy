<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Post;
use App\User;
use App\Image;
Use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class PostController extends Controller
{
    //

    public function index (){

      return view('posts.index', [
          'posts' => Post::paginate(2),
      ]);
    }

      public function show(Request $request){

          return view('posts.show',[
              'post' => Post::find($request->post),
          ]);
      }

      public function destroy(Request $request){

          Post::destroy($request->post);

          return redirect()->back()->with('warning','Delected successfully!');;
        }



    public function create(){

      return view('posts.create', [
        'users' => User::all()
      ]);
    }

    public function store(PostRequest $request){

      $image = $this->storeImage($request);

      $validatedData = $request->validate(['title'=>'unique:posts']);

      Post::create([
        'title' => $request->title,
        'description' => $request->description,
        'category' => $request->category,
        'user_id' => $request->user_id,
        'image_id' => $image->id,
      ]);

      return redirect()->route('posts.index');

    }

    public function  edit(Request $request){

      return view('posts.edit',[
          'post' => Post::find($request->post),
          'users' => User::all(),
      ]);

    }

    public function update(PostRequest $request){

      $post = Post::find($request->post);
      $post->fill($request->all())->save();

      return redirect()->route('posts.index')->with('success','Item created successfully!');

    }

    private function storeImage($request){
      $cover = $request->file('image');
      $extension = $cover->getClientOriginalExtension();
      Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));

      $image = new Image();
      $image->mime = $cover->getClientMimeType();
      $image->original_filename = $cover->getClientOriginalName();
      $image->filename = $cover->getFilename().'.'.$extension;
      $image->save();

      return $image;
    }
}
