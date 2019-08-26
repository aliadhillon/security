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


    public function __construct()
    {
        $this->middleware('auth:admin')->except(['logout', 'showLoginForm', 'register']);
    }

    public function register()
    {
        $admin = Admin::create([
            'name' => 'Admin',
            'email' => 'admin@security.test',
            'password' => Hash::make('password')
        ]);

        if ($admin) {
            Auth::guard('admin')->login($admin);

            return redirect()->route('admin.dashboard');    
        }

        return redirect()->route('welcome');
        
    }

    public function showLoginForm()
    {
        return view('auth.admin_login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()
            ->withInput($request->only('email', 'remember'))
            ->withErrors($this->username(), __('auth.failed'));
    }


    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('welcome');
    }


}
