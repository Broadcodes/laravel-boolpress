<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Category $category)
    {
        $posts = Post::all()->where('category_id', $category->id);
        return view('admin.categories.show', compact(['posts', 'category']));
    }

    public function edit(Category $category)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Category $category)
    {
        //
    }
}
