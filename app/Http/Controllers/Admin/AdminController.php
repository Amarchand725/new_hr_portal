<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function departments()
    {
        return view('admin.departments');
    }
    public function calendar()
    {
        return view('admin.calendar.index');
    }
    public function logOut()
    {
        auth()->logout();
        return redirect()->route('admin.login');
    }
    public function dashboard()
    {
        $title = 'Dashboard';
        return view('admin.dashboard', compact('title'));
    }
    public function loginForm()
    {
        return view('admin.auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->remember)) {
            return redirect()->intended('/dashboard');
        } else {
            return redirect()->back()->withErrors(['Invalid login credentials']);
        }
    }
}