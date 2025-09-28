<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateNameRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UpdateNameController extends Controller
{
    public function __invoke(UpdateNameRequest $request, User $user)
    {
        $data = $request->validated();
        $user->update($data);
        return redirect()->route('admin.user.show', ['user' => $user]);
    }
}
