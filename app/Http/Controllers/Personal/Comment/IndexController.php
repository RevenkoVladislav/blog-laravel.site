<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();
        return view('personal.comment.index', compact('user'));
    }
}
