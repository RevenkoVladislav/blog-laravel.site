<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke()
    {
        $trashed = Tag::onlyTrashed()->get();
        //получаем коллекцию

        if ($trashed->isEmpty()) {
            return redirect()->route('admin.tag.index')
                ->with('info', 'Корзина пуста');
        }

        foreach ($trashed as $tag) {
            $tag->forceDelete();
        }

        return redirect()->route('admin.tag.index')
            ->with('info', 'Корзина тэгов очищена');
    }

}
