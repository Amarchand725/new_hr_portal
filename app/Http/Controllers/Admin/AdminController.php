<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\User;
use App\Models\Department;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\DepartmentUser;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function departments()
    {
        $this->authorize('department-list');
        return view('admin.departments');
    }
    public function logOut()
    {
        auth()->logout();
        return redirect()->route('admin.login');
    }
    public function dashboard(Request $request)
    {
        $user = Auth::user();
        $data = [];

        $role = $user->getRoleNames()->first();
        foreach($user->getRoleNames() as $user_role){
            if($user_role=='Admin'){
                $role = $user_role;
            }elseif($user_role=='Department Manager' || $user_role=='Manager'){
                $role = $user_role;
            }
        }

        $data['announcements'] = Announcement::where('status', 1)->get();
        $team_members = [];

        if($role == 'Admin' || $role=='Manager'){
            $department = Department::where('manager_id', $user->id)->where('status', 1)->first();
            if(!empty($department)) {
                $department_users = DepartmentUser::where('department_id', $department->id)->where('end_date', null)->get(['user_id']);
                $dep_users_ids = [];
                foreach($department_users as $department_user) {
                    // if($department_user->user_id != $user->id) {
                    $dep_users_ids[] = $department_user->user_id;
                    // }
                }

                $team_members = User::whereIn('id', $dep_users_ids)->get();
            }
        }else{
            if(isset($user->departmentBridge->department) && !empty($user->departmentBridge->department->id)) {
                $user_department_id = $user->departmentBridge->department->id;
                $team_member_ids = DepartmentUser::where('department_id', $user_department_id)->where('user_id', '!=', $user->id)->get(['user_id']);

                $team_members = [];
                foreach($team_member_ids as $team_member_id){
                    $team_members[] = User::where('id', $team_member_id->user_id)->first();
                }
            }
        }
        $model = $user;


        if($role=='Admin'){
            $title = 'Admin Dashboard';
            return view('admin.dashboards.admin-dashboard', compact('title', 'model', 'data', 'team_members'));
        }elseif($role=='Manager' || $role=='Department Manager'){
            $title = 'Manager Dashboard';
            $department_user = DepartmentUser::orderby('id', 'desc')->where('user_id', $model->id)->first();
            $department_manager = '';
            if(!empty($department_user)){
                $department = Department::where('id', $department_user->department_id)->first();
                $department = $department->parentDepartment;
                if(!empty($department->manager->profile) && !empty($department->manager->profile)){
                    $department_manager = $department->manager;
                }
            }
            return view('admin.dashboards.manager-dashboard', compact('title', 'model', 'department_manager', 'data', 'team_members'));
        }else{
            $title = 'Employee Dashboard';
            $department_user = DepartmentUser::orderby('id', 'desc')->where('user_id', $model->id)->first();
            $department_manager = '';
            if(!empty($department_user)){
                $department = Department::where('id', $department_user->department_id)->first();
                if(!empty($department->manager->profile) && !empty($department->manager->profile)){
                    $department_manager = $department->manager;
                }
            }
            return view('admin.dashboards.emp-dashboard', compact('title', 'model', 'data', 'team_members', 'department_manager'));
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
