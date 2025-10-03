<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class RestoreController extends Controller
{
    public function __invoke()
    {
        $trashed = Category::onlyTrashed();

        if($trashed->count() === 0){
            return redirect()->route('admin.category.index')->with('info', 'Нечего восстанавливать');
        } else {
            $trashed->restore();
            return redirect()->route('admin.category.index')->with('info', 'Категории восстановлены');
        }
    }
}
