<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RestoreController extends Controller
{
    public function __invoke()
    {
        $trashed = User::onlyTrashed();

        if($trashed->count() === 0){
            return redirect()->route('admin.user.index')->with('info', 'Нечего восстанавливать');
        } else {
            $trashed->restore();
            return redirect()->route('admin.user.index')->with('info', 'Пользователи восстановлены');
        }
    }
}
