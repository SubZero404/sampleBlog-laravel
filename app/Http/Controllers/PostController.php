<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        return view('index',compact('posts'));
    }

    public function create() {
        return view('create');
    }

    public function addPost(Request $request) {
        $post = new Post;
        if (!empty($request->title)) {
            $title = $request->title;
            $post->title = $title;
        }
        if (!empty($request->description)) {
            $description = $request->description;
            $post->description = $description;
        }
        $post->save();
        return redirect()->route('index.post')->with('status','Post is created');
    }

    public function showPost($id) {
        if ($post = Post::find($id)) {
            return view('show',compact('post'));
        }else {
            return redirect()->route('index.post');
        }
    }

    public function destroy($id) {
        Post::find($id)->delete();
        return redirect()->route('index.post')->with('status','Post is deleted');
    }

    public function editPost($id) {
        $post = Post::find($id);
        return view('edit',compact('post'));
    }

    public function updatePost(Request $request,$id) {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->update();
        return redirect()->route('post.show',$id)->with('status','Post is edited');
    }
}
