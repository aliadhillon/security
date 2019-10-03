<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = 'admin';

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function showLoginForm()
    {
        return view('auth.admin_login');
    }

    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'email' => ['required', 'email'],
    //         'password' => ['required']
    //     ]);
    //     dd(Auth::attempt(['email' => 'ali.dhllon102@gmail.com', 'password' => 'password']));
    //     dd($request->all());
    //     if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
    //        dd(Auth::guard('admin')->check());
    //         return redirect()->intended(route('admin.dashboard'));
    //     }

    //     return back()
    //         ->withInput($request->only('email', 'remember'))
    //         ->withErrors($this->username(), __('auth.failed'));
    // }


    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('welcome');
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'email';
    }



}
