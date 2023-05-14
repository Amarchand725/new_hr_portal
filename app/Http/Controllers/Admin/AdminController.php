<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function departments()
    {
        // $this->authorize('department-list');
        return view('admin.departments');
    }
    public function calendar()
    {
        // $this->authorize('calendar-list');
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
        $user = Auth::user();
        $role = $user->getRoleNames()->first();
        if($role=='Admin'){
            return view('admin.dashboard', compact('title'));
        }elseif($role=='Manager'){
            return view('admin.dashboard', compact('title'));
        }else{
            return view('admin.emp-dashboard', compact('title'));
        }

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
