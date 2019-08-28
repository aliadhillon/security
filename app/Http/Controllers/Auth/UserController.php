<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
