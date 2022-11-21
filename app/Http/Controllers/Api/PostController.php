<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Post;
use Error;

class PostController extends Controller
{
    public function index()
    {

        try{
            $posts = Post::paginate(6);

            $data = [
                'results' => $posts,
                'success' => true
            ];
        } catch(Error $e){
            $data = [
                'error' => $e->message,
                'success' => false
            ];
        }

        return response()->json($data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Post $post)
    {
        $data = [
            'results' => $post,
            'success' => true
        ];

        return response()->json($data);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
