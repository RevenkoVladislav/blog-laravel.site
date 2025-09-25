<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        try {
            $data = $request->validated();

            if (!empty($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }

            if (!empty($data['main_image'])) {
                if ($post->main_image && Storage::disk('public')->exists($post->main_image) && $post->main_image !== 'images/main_default.jpg') {
                    Storage::disk('public')->delete($post->main_image);
                } //удаляем старую картинку если добавлена новая и старая не дефолтная
                $data['main_image'] = Storage::disk('public')->put('images', $data['main_image']);
            }

            if (!empty($data['preview_image'])) {
                if ($post->preview_image && Storage::disk('public')->exists($post->preview_image) && $post->preview_image !== 'images/preview_default.jpg') {
                    Storage::disk('public')->delete($post->preview_image);
                } //удаляем старое превью если добавлено новое и старое не дефолтная
                $data['preview_image'] = Storage::disk('public')->put('images', $data['preview_image']);
            }

            $post->update($data);
            $post->tags()->sync($tagIds ?? []);
        } catch (\Exception $exception) {
            abort(404);
        }
        return redirect()->route('admin.post.index');
    }
}
