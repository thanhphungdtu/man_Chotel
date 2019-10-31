<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function getLogin()
    {
        return view('auth.index');
    }

    public function postLogin(Request $request)
    {
        $credential = $request->only('username', 'password');
        //dd(bcrypt($credential['password']));
        if (Auth::attempt($credential)) {
            return redirect()->route('admin.admin.index');
        } else {
            $msg = $request->session()->flash('msgg', 'Sai tai khoan');
            return redirect()->route('Auth.login.getLogin', compact('msg'));
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('Auth.login.getLogin');
    }
}
