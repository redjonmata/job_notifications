<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::paginate(10);

        return response()->json($blogs,200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:255',
            'description' => 'required',
            'image' => 'required'
        ]);

        $blog = Blog::create($request->all());

        return response()->json([
            'message' => 'New blog created!',
            'blog' => $blog
        ],201);
    }

    public function show($id)
    {
        $notification = Blog::find($id);

        return response()->json($notification);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable',
            'slug' => 'nullable',
            'description' => 'nullable',
            'image' => 'nullable'
        ]);

        $blog = Blog::find($id);

        $blog->update($request->all());

        return response()->json([
            'message' => 'Blog updated!',
            'blog' => $blog
        ],200);
    }

    public function destroy($id)
    {
        $blog = Blog::find($id);

        if (empty($blog)) {
            return response()->json([
                'message' => 'Couldn\'t delete blog. Blog does not exist!'
            ],404);
        }

        $blog->delete();

        return response()->json([
            'message' => 'Successfully deleted task!'
        ],200);
    }
}
