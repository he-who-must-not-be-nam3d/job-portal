<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //Show login/registration page
    public function auth()
    {
        return view('auth/home');
    }

    //Logout Logged in User
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('deleteMessage', 'You have been logged out!!');
    }

    //Login A user
    public function login(Request $request)
    {
        // $incomingData = $request->validate([
        //     'loginemail' => 'required',
        //     'loginpassword' => 'required'
        // ]);
        $incomingData = validator(request()->all(), [
            'loginemail' => ['required', 'email'],
            'loginpassword' => 'required'
        ])->validate();

        if (auth()->attempt(['email' => $incomingData['loginemail'], 'password' => $incomingData['loginpassword']])) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'Login Succesful');
        } else {
            return redirect()->back()->withErrors(['email' => 'Invalid Credentials']);
        }
    }

    //Register A new user
    public function create(Request $request)
    {
        $incomingData = $request->validate([
            'name' => ['required', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'confirmed']
        ]);
        $incomingData['password'] = bcrypt($incomingData['password']);
        $user = User::create($incomingData);
        auth()->login($user);
        return redirect('/')->with('message', 'User created and logged in succesfully');
    }
}
