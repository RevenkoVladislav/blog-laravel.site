<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();
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

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            abort(500);
        }
    }

    public function update($post, $data)
    {
        try {
            DB::beginTransaction();

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

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            abort(500);
        }

        return $post;
    }

    public function delete($post)
    {
        try {
            DB::beginTransaction();
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
            DB::commit();

        } catch (\Exception $exception) {
            DB::rollback();
            abort(500);
        }
    }
}
