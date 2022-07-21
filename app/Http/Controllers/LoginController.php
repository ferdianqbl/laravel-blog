<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function view()
    {
        return view('login.index', ['title' => 'Login']);
    }

    public function authenticate(Request $req)
    {
        $validateData = $req->validate([
            'username' => 'required|min:3|max:255|alpha_dash',
            'password' => [
                'required', 'min:8', 'max:255',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/'
            ],
        ]);

        // dd($validateData);

        if (Auth::attempt($validateData)) {
            $req->session()->regenerate();
            // return redirect()->intended('dashboard')->with('username', $validateData['username']);
            return redirect()->intended('dashboard');
        }
        // dd(Auth::attempt($validateData));
        return back()->with('loginStatus', 'Login failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
