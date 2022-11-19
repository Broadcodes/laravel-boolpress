<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:30',
            // 'slug' => 'required|string|max:255'
        ], [
            'required' => 'Il campo è obbligatorio',
            'string' => 'Il campo deve essere una stringa',
            'max' => 'Il campo deve avere una lunghezza massima di :max caratteri'
        ]);

        $newCategoty = $request->all();
        $category = new Category();
        $slug = Str::slug($newCategoty['name']);
        $category['slug'] = $slug;
        $category->fill($newCategoty);
        $category->save();

        return redirect()->route('admin.categories.index');
    }

    public function show(Category $category)
    {
        $posts = Post::all()->where('category_id', $category->id);
        return view('admin.categories.show', compact(['posts', 'category']));
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {

        $request->validate([
            'name' => 'required|string|max:30',
            // 'slug' => 'required|string|max:255'
        ], [
            'required' => 'Il campo è obbligatorio',
            'string' => 'Il campo deve essere una stringa',
            'max' => 'Il campo deve avere una lunghezza massima di :max caratteri'
        ]);

        $editCategoty = $request->all();
        $slug = Str::slug($editCategoty['name']);
        $editCategoty['slug'] = $slug;
        $category->update($editCategoty);

        return redirect()->route('admin.categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index');
    }
}
