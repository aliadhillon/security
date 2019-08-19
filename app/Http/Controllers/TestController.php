<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;

class TestController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $data = [
            'name' => 'Something',
            'email' => 'email3@test.com',
            'password' => Hash::make('passoword')
        ];
        $user = new User($data);
        dd($user->create($data)); 
        return view('test')->with('msg', $user->create($data) ? 'Saved':'Not');
    }
}
