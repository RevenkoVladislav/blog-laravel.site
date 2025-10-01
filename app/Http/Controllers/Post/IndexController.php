<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        {
            $posts = Post::paginate(6);
            $randomPosts = Post::get()->random(4);
            $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(4);
            // orderBy, чтобы отсортировать по самым наибольшим лайкам,
            // likedUsers это метод отношения из модели Post
            // данный метод посчитает сколько пользователей поставит лайк и вернет через отношение, т.е при dd будет аттрибут "liked_users_count" => к примеру со значением 5 и т.д.
            // get() указываем чтобы получить коллекцию из наших постов
            // take() сколько постов получить
            return view('post.index', ['posts' => $posts, 'randomPosts' => $randomPosts, 'likedPosts' => $likedPosts]);
        }
    }
}
