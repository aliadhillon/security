<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }

    /**
     * Show the User Profile
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile()
    {
        $user = Auth::user();
        $created = Carbon::parse($user->created_at)->toDateString();
        return view('admin.profile')->with([
            'name' => $user->name,
            'email' => $user->email,
            'created' => $created,
            'posts' => $user->posts->count()
            ]);
    }

    /**
     * Delete User Account
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function destroy()
    {
        Auth::user()->delete();
        return Redirect::to('/')->with('msg', 'Your profile has been deleted successfully');
    }
}
