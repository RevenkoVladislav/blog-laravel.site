<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(Comment $comment)
    {
        $user = auth()->user();
        return view('personal.comment.edit', ['comment' => $comment, 'user' => $user]);
    }
}
