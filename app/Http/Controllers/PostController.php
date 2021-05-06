<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function postsIndex() {
        $categories = Category::all();

        return view('posts.postsIndex', compact('categories'));
    }

    public function allPosts() {


        return view('posts.allPosts');
    }

    public function filteredPosts() {

        return view('posts.posts');
    }

    public function createPost(Request $request) {

        $request->validate([
            'title'=>'required|max:120',
            'text'=>'required|max:2000',
            'image'=>'required|max:1999',
        ]);

        $file = $request->file('image');
        $newName = uniqid("",true) . "." . $file->getClientOriginalExtension(); //simple protection from name collision in our case

        Storage::disk('post-images')->put($newName, $file->get()); //use storage facade to save on custom disk

        Post::create([
            'user_id' => $request->Auth::id(),
            'category ' => $request->category,
            'title' => $request->title,
            'content' => $request->body,
            'image' => $request->image
        ]);

        return redirect()->route('allPosts');

    }

    public function removePost() {

        return view('posts.posts');
    }

    public function updatePost() {

        return view('posts.posts');
    }
}
