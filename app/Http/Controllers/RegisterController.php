<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function view()
    {
        return view('register.index', ['title' => 'Register']);
    }

    public function store(Request $req)
    {
        $validatedData = $req->validate([
            'name' => 'required|min:3|max:255',
            'email' => ['required', 'email'],
            'username' => ['required', 'min:3', 'max:255', 'unique:users', 'alpha_dash'],
            'email' => ['required', 'email:rfc,dns', 'unique:users'],
            'password' => [
                'required', 'min:8', 'max:255',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/'
            ],
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        // session(['username' => $validatedData['username']]);
        // $req->session()->flash('success', 'You have successfully registered!');

        // return redirect('/login')->with([
        //     'success' => 'You have successfully registered!',
        //     'username' => $validatedData['username'],
        // ]);
        return redirect('/login')->with('success', 'You have successfully registered!');
    }
}
