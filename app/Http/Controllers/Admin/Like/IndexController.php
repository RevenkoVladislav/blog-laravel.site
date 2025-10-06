<?php

namespace App\Http\Controllers\Admin\Like;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('admin.like.index');
    }
}
