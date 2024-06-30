<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    public function login(Request $request)
    {
        return view("pages.front.login");
    }

    public function prosesLogin(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required|min:6",
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();

            return redirect()->intended('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function register()
    {
        return view("pages.front.register");
    }

    public function prosesRegister(Request $request)
    {
        $request->validate([
            "first_name" => "required|string",
            "last_name" => "required|string",
            "email" => "required|email",
            "password" => "required|min:6",
        ]);

        $data = $request->except("_token");
        $data["password"] = Hash::make($request->password);

        $user = User::create($data);

        if (Auth::attempt(['email' => $user->email, 'password' => $request->password])) {
            $request->session()->regenerate();

            return redirect()->intended('home');
        }
    }
}
