<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    protected $formBlade;

    public function username()
    {
        return 'username';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->redirectTo = '/'.\LaravelLocalization::getCurrentLocale();
        $this->middleware('guest')->except('logout');
    }

    protected function credentials(Request $request)
    {
        return [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
//            'role' => $this->role,
            'active' => 1
        ];
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view($this->formBlade);
    }

    protected function loggedOut(Request $request)
    {
        return redirect()->to($this->redirectTo);
    }

    protected function authenticated(Request $request, $user)
    {
        return redirect()->to($this->redirectTo);
    }
}
