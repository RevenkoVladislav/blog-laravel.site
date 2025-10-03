<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke()
    {
        $trashed = Post::onlyTrashed();

        if ($trashed->count() === 0) {
            return redirect()->route('admin.post.index')
                ->with('info', 'Корзина пуста');
        } else {

            $trashed->forceDelete();

            return redirect()->route('admin.post.index')
                ->with('info', 'Корзина постов очищена');
        }
    }
}
