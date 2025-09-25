<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        try {
            $data = $request->validated();

            if (!empty($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }

            if (!empty($data['main_image'])) {
                $data['main_image'] = Storage::disk('public')->put('images', $data['main_image']);
            }

            if (!empty($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('images', $data['preview_image']);
            }

            $post = Post::create($data);
            $post->tags()->sync($tagIds ?? []);
        } catch (\Exception $exception) {
            abort(404);
        }

        return redirect()->route('admin.post.index');
    }
}
