<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard()
    {
        $posts = Post::orderBy('id', 'desc')->get();
        $user = auth()->user();

        return view('dashboard', compact('posts', 'user'));
    }
}
