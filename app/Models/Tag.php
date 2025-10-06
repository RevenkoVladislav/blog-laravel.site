<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tags';
    protected $fillable = ['title'];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tags', 'tag_id', 'post_id');
    }

    protected static function booted()
    {
        static::deleting(function ($tag) {
            // Если физическое удаление
            if ($tag->isForceDeleting()) {
                // Сначала отвязываем все посты
                $tag->posts()->detach();
            }
        });
    }
}
