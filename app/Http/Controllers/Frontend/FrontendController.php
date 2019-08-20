<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class FrontendController extends Controller
{
    /**
     * This will return the welcome page
     */

    public function welcome()
    {
        return view('frontend.welcome');
    }

    /**
     * This will return the blog view with posts
     */

    public function blog()
    {
        $posts = Post::latest()->get();
        return view('frontend.blog')->with('posts', $posts);
    }
    
}
