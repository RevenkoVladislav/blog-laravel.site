<?php

namespace App\Http\Controllers\Admin\Like;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
        public function __invoke(Post $post, User $user)
    {
        // Отвязываем пользователя от поста (удаляем лайк)
        $post->likedUsers()->detach($user->id);

        return redirect()->back();
    }
}
