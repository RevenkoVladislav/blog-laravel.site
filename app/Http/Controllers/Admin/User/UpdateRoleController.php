<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateRoleRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UpdateRoleController extends Controller
{
    public function __invoke(UpdateRoleRequest $request, User $user)
    {
        $data = $request->validated();
        $user->update($data);
        return redirect()->route('admin.user.show', ['user' => $user]);
    }
}
