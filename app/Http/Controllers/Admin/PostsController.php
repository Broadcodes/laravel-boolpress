<?php

namespace App\Http\Controllers\Admin;

use App\Posts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller {

    public function index() {
        $posts = Posts::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function create() {
        //
    }

    public function store(Request $request) {
        //
    }

    public function show(Posts $posts) {
        dd($posts);
        return view('admin.posts.show', compact('posts'));
    }

    public function edit(Posts $posts) {
        return view('admin.posts.edit', compact('posts'));
    }

    public function update(Request $request, Posts $posts) {
        //
    }

    public function destroy(Posts $posts) {
        //
    }
}
