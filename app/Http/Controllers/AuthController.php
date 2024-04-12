<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('Auth.login');
    }

    public function register()
    {
        if (Auth::check()) {
            return redirect()->route('student'); // Redirect if already logged in
        }

        $user = new User(); // Create a new instance of the User model
        return view('Auth.registration', ['user' => $user]);
    }

    public function loginpost(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('student'))->with("successs", "Welcome back " . Auth::user()->name);
        }

        return redirect(route('login'))->with("error", "Login details are not valid");
    }

    public function registrationpost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        $user = User::create($data);

        if (!$user) {
            return redirect(route('registration'))->with("error", "Registration failed");
        }

        return redirect(route('login'))->with("success", "Registration Success");
    }

    public function index()
    {
        if (Auth::check()) {
            return view('student.student_dtl');
        }

        return redirect()->route('login')->with('errorr', 'You are not allowed to access');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'You have been logged out.');
    }
}
