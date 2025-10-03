<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        {
            //Добавляем свойства comments_count и liked_users_count для каждого поста, чтобы вывести их общее количество
            $dataPost = Post::withCount(['comments', 'likedUsers']);

            $posts = $dataPost->paginate(6);
            $randomPosts = $dataPost->get()->random(4);
            $likedPosts = $dataPost->orderBy('liked_users_count', 'DESC')->get()->take(4);
            // orderBy, чтобы отсортировать по самым наибольшим лайкам,
            // likedUsers это метод отношения из модели Post
            // данный метод посчитает сколько пользователей поставит лайк и вернет через отношение, т.е при dd будет аттрибут "liked_users_count" => к примеру со значением 5 и т.д.
            // get() указываем чтобы получить коллекцию из наших постов
            // take() сколько постов получить
            return view('post.index', ['posts' => $posts, 'randomPosts' => $randomPosts, 'likedPosts' => $likedPosts]);
        }
    }
}
