<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard()
    {
        $posts = Post::all();

        return view('dashboard', compact('posts'));
    }
}
