<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class RestoreController extends Controller
{
    public function __invoke()
    {
        $trashed = Tag::onlyTrashed();

        if($trashed->count() === 0){
            return redirect()->route('admin.tag.index')->with('info', 'Нечего восстанавливать');
        } else {
            $trashed->restore();
            return redirect()->route('admin.tag.index')->with('info', 'Тэги восстановлены');
        }
    }
}
