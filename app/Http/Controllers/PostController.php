<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();

        return view('dashboard', compact('posts'));
    }

    public function categoryposts(Category $category) {
        $posts = Post::where('category_id', $category->id)->get();

        return view('categoryposts', compact('posts', 'category'));
    }

    public function users() {
        $users = User::all();
        return view('users', compact('users'));
    }

    public function authorposts(User $user) {
        $posts = Post::where('user_id', $user->id)->get();

        return view('authorposts', compact('posts', 'user'));
    }

    public function create() {
        $categories = Category::get();
        return view('create', compact('categories'));
    }

    public function store(Request $request) {
        
        $this->validate($request, [
            'category_id' => 'required|numeric',
            'post' => 'required',
        ]);

        Post::create([
            'user_id'   => auth()->user()->id,
            'category_id' => $request->category_id,
            'post'      => $request->post
        ]);

        return redirect('/dashboard');
    }
}
