<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\LogInRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogInController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:web', ['except' => ['logout']]);
    }

    public function logIn()
    {
        return view('frontend.page.auth.login');
    }

    public function signIn(LogInRequest $request)
    {
        $credential = $request->only('email', 'password');

        if(Auth::guard('web')->attempt($credential)) {
            return redirect()->route('home');
        }

        return back()->withInput();
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect()->route('login');
    }
}
