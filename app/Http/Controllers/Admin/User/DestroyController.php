<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke()
    {
        $trashedUsers = User::onlyTrashed()->get();
        //нужно получить коллекцию пользователей и в цикле пройтись по ним и вызывать удаление, которое
        //стригерит методы при удалении из модели User

        if ($trashedUsers->count() === 0) {
            return redirect()->route('admin.user.index')
                ->with('info', 'Корзина пуста');
        } else {

            foreach ($trashedUsers as $user) {
                $user->forceDelete();
            }

            return redirect()->route('admin.user.index')
                ->with('info', 'Корзина пользователей очищена');
        }
    }
}
