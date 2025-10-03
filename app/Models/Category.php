<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'categories';
    protected $fillable = [
        'title'
    ];


    public static function booted()
    {
        static::deleting(function ($category) {
            //защита системной категории
            if ($category->is_system) {
                throw new \Exception('Эта категория защищена от удаления !');
            }

            //Ищем категорию "Без категории"
            $defaultCategory = Category::where('is_system', true)->first();
            if(!$defaultCategory){
                throw new \Exception('Системная категория не найдена !');
            }

            //Перенос всех категорий на "Без категории" при удалении
            $category->posts()->update(['category_id' => $defaultCategory->id]);
        });
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
