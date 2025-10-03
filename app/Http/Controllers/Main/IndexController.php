<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        //заготовка страницы под главную страницу (на будущшее)
        return redirect()->route('post.index');
    }
}
