<?php

namespace App\Http\Controllers\Admin\Auth;
use App\Domain\Users\Models\User;
use App\Http\Controllers\Auth\LoginController as LoginForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class LoginController extends LoginForm
{
//    protected $role = User::ROLE_ADMIN;
    protected $formBlade = 'admin.auth.login';

    public function authenticated(Request $request, $user)
    {
        if (!$user->isAdmin() && !$user->isUser() && !$user->isManager()) {
            Auth::guard()->logout();
            $request->session()->invalidate();
            throw ValidationException::withMessages([
                $this->username() => [trans('auth.failed')],
            ]);
        }
    }
}
