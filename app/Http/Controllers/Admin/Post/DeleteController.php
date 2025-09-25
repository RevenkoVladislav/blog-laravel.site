<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeleteController extends Controller
{
    public function __invoke(Post $post)
    {
        if ($post->main_image && $post->main_image !== 'images/main_default.jpg' && Storage::disk('public')->exists($post->main_image)) {
            Storage::disk('public')->delete($post->main_image);
            $post->update(['main_image' => 'images/main_default.jpg']);
        }

        if ($post->preview_image && $post->preview_image !== 'images/preview_default.jpg' && Storage::disk('public')->exists($post->preview_image)) {
            Storage::disk('public')->delete($post->preview_image);
            $post->update(['preview_image' => 'images/preview_default.jpg']);
        }

        $post->tags()->detach();

        $post->delete();
        return redirect()->route('admin.post.index');
    }
}
