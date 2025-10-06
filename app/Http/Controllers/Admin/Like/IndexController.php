<?php

namespace App\Http\Controllers\Admin\Like;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::with('likedUsers')->get();
        return view('admin.like.index', ['posts' => $posts]);
    }
}
