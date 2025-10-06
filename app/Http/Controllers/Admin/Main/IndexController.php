<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __invoke()
    {
        $data = [];
        $data['usersCount'] = User::all()->count();
        $data['postsCount'] = Post::all()->count();
        $data['categoriesCount'] = Category::all()->count();
        $data['tagsCount'] = Tag::all()->count();
        $data['commentsCount'] = Comment::all()->count();
        $data['likedUsers'] = DB::table('post_user_likes')->count();
        return view('admin.main.index', compact('data'));
    }
}
