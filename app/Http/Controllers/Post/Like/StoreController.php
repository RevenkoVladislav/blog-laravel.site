<?php

namespace App\Http\Controllers\Post\Like;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(Post $post)
    {
        //отношение лайков к юзерам, toggle() проверяет есть ли лайк у данного пользователя к посту
        auth()->user()->likedPosts()->toggle($post);
        return redirect()->route('post.index', $post);
    }
}
