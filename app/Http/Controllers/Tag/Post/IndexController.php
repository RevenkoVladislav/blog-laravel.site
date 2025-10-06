<?php

namespace App\Http\Controllers\Tag\Post;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Tag $tag)
    {
        $posts = $tag->posts()->paginate(6);
        return view('tag.post.index', ['posts' => $posts, 'tag' => $tag]);
    }
}
