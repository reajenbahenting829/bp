<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;

class AuthController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function loginForm()
    {
        return view('auth.login');
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|string|min:6',
        ]);

        $token = Str::random(24);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => $token,
        ]);

        Mail::send('auth.verification-mail', ['user' => $user], function ($mail) use ($user) {
            $mail->to($user->email);
            $mail->subject('Account Verification');
        });

        return redirect('/')->with('message', 'Your account is created');
    }

    public function verification(User $user, $token)
    {
        if ($user->remember_token !== $token) {
            return redirect('/')->with('error', 'Invalid token.');
        }

        $user->markEmailAsVerified();

        $user->email_verified_at = now();
        $user->save();

        return redirect('/')->with('message', 'Your account is verified');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/')->with('message', 'You are logged out');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->hasVerifiedEmail()) {
                return redirect()->route('dashboard');
            } else {
                Auth::logout();
                return back()->withErrors(['email' => 'Your email is not verified.'])->withInput($request->only('email'));
            }
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->withInput($request->only('email'));
    }
}
