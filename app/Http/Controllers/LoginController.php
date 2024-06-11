<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request){

        $credentials = $request->validate([
            'email' => 'required|max:255|min:4|email',
            'password' => 'required|max:255|min:4|'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            if(auth()->user()->role == 'admin'){
                return redirect('/dashboard')->with('loginsuccess', 'Anda telah berhasil login.');
            }elseif(auth()->user()->role == 'staff'){
                return redirect('/dashboard/transaction/create')->with('loginsuccess', 'Anda telah berhasil login.');
            }
        }

        return back()->with('loginError' ,'username/password salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();
     
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/')->with('logoutAlert', 'Anda telah berhasil logout.');
    }
}
