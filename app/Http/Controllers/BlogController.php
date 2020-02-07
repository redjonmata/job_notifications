<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function showBlogs()
    {
        $blogs = Blog::all();

        return view('blog')->with(compact('blogs'));
    }

    public function showBlog($slug)
    {
        $blog = Blog::where('slug',$slug)->first();

        return view('single_blog')->with(compact('blog'));
    }
}
