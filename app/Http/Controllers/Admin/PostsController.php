<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller {

    public function index() {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function create() {
        //
    }

    public function store(Request $request) {
        //
    }

    public function show(Post $post) {
        // dd($post);
        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post) {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post) {
        //
    }

    public function destroy(Post $post) {
        //
    }
}
