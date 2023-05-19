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
    public function dashboard(Request $request)
    {
        $user = Auth::user();

        $role = $user->getRoleNames()->first();
        foreach($user->getRoleNames() as $user_role){
            if($user_role=='Admin'){
                $role = $user_role;
            }
        }

        if($role=='Admin'){
            $title = 'Admin Dashboard';
            $model = $request->user();
            return view('admin.dashboards.admin-dashboard', compact('title', 'model'));
        }elseif($role=='Manager'){
            $title = 'Manager Dashboard';
            return view('admin.dashboards.manager-dashboard', compact('title'));
        }else{
            $title = 'Employee Dashboard';
            return view('admin.dashboards.emp-dashboard', compact('title'));
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
