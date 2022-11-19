<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class PostsController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact(['categories', 'tags']));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|max:200',
            'description' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'exists:tags,id'
        ], [
            'required' => 'Il campo è obbligatorio',
            'max' => 'Puoi inserire fino ad un massimo di :max caratteri',
            'category_id.exists' => 'La categoria non esiste',
            'tags.exists' => 'Il tag non esiste'
        ]);

        $postForm = $request->all();
        $postForm['category_id'] = $request['categories'];
        $post = new Post();
        $post->fill($postForm);
        $slug = Str::slug($post->title);
        $slug_base = $slug;
        $counter = 1;
        $existingPost = Post::where('slug', $slug)->first();
        while ($existingPost) {
            $slug = $slug_base . '_' . $counter;
            $counter++;
            $existingPost = Post::where('slug', $slug)->first();
        }
        $post->slug = $slug;
        $post->save();

        if(array_key_exists('tags', $postForm)){
            $post->tags()->sync($postForm['tags']);
        }

        return redirect()->route('admin.posts.show', $post->id);
    }

    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact(['post', 'categories', 'tags']));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:200',
            'description' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'exists:tags,id'
        ], [
            'required' => 'Il campo è obbligatorio',
            'max' => 'Puoi inserire fino ad un massimo di :max caratteri',
            'category_id.exists' => 'La categoria non esiste',
            'tags.exists' => 'Il tag non esiste'
        ]);

        $postForm = $request->all();

        if ($post->title != $postForm['title']) {
            $slug = Str::slug($post->title);
            $slug_base = $slug;
            $counter = 1;
            $existingPost = Post::where('slug', $slug)->first();
            while ($existingPost) {
                $slug =  $slug_base . '_' . $counter;
                $counter++;
                $existingPost = Post::where('slug', $slug)->first();
            }

            $postForm['slug'] = $slug;
        }

        $post->update($postForm);

        if(array_key_exists('tags', $postForm)){
            $post->tags()->sync($postForm['tags']);
        } else {
            $post->tags()->sync([]);
        }

        return redirect()->route('admin.posts.show', $post->id);
    }

    public function destroy(Post $post)
    {
        $post->tags()->sync([]);
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
