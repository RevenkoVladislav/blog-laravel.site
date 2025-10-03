<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke()
    {
        $trashed = Tag::onlyTrashed();

        if ($trashed->count() === 0) {
            return redirect()->route('admin.tag.index')
                ->with('info', 'Корзина пуста');
        } else {

            $trashed->forceDelete();

            return redirect()->route('admin.tag.index')
                ->with('info', 'Корзина тэгов очищена');
        }
    }
}
