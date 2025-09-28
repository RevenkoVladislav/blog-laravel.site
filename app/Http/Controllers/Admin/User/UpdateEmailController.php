<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateEmailRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UpdateEmailController extends Controller
{
    public function __invoke(UpdateEmailRequest $request, User $user)
    {
        $data = $request->validated();
        $user->update($data);
        return redirect()->route('admin.user.show', ['user' => $user]);
    }
}
