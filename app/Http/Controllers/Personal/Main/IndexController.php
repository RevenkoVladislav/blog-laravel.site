<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();
        $data['commentsCount'] = $user->comments->count();
        $data['likesCount'] = $user->likedPosts->count();
        return view('personal.main.index', ['user' => $user, 'data' => $data]);
    }
}
