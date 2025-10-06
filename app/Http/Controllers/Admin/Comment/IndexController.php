<?php

namespace App\Http\Controllers\Admin\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $comments = Comment::all();
        return view('admin.comment.index', ['comments' => $comments]);
    }
}
