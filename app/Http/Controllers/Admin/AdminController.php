<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\UserLeave;
use App\Models\Attendance;
use App\Models\Department;
use App\Models\Discrepancy;
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

        $data['announcements'] = Announcement::orderby('id', 'desc')->where('status', 1)->get();
        $team_members = [];
        $team_members_ids = [];

        if($role == 'Admin' || $role=='Manager' || $role=='Department Manager'){
            $user_department = Department::where('manager_id', $user->id)->where('status', 1)->first();
        }else{
            if(isset($user->departmentBridge->department) && !empty($user->departmentBridge->department->id)) {
                $user_department = $user->departmentBridge->department;
            }
        }

        $team_member_ids = DepartmentUser::where('department_id', $user_department->id)->where('user_id', '!=', $user->id)->where('end_date', null)->get(['user_id']);
        if(!empty(!$team_member_ids)) {
            foreach($team_member_ids as $team_member_id) {
                $team_members_ids[] = $team_member_id->user_id;
            }
        }

        $team_members = User::whereIn('id', $team_members_ids)->get();
        $model = $user;

        $currentMonthStart = Carbon::now()->startOfMonth(); // Get the first day of the current month
        $currentMonthEnd = Carbon::now()->startOfMonth()->addDays(24); // Get the 25th day of the current month

        $current_month_discrepancies = Discrepancy::whereBetween('date', [$currentMonthStart, $currentMonthEnd])->whereIn('user_id', $team_members_ids)->get();
        $current_month_leave_requests = UserLeave::whereBetween('start_date', [$currentMonthStart, $currentMonthEnd])->whereIn('user_id', $team_members_ids)->get();

        $startShiftTime = '';
        $endShiftTime = '';
        if(isset($model->userWorkingShift->workShift) && !empty($model->userWorkingShift->workShift)){
            $startShiftTime = date('Y-m-d'). $model->userWorkingShift->workShift->start_time;
            $endShiftTime = date('Y-m-d'). $model->userWorkingShift->workShift->end_time;
        }else{
            if(isset($user_department->departmentWorkShift->workShift) && !empty($user_department->departmentWorkShift->workShift->name)){
                $startShiftTime = date('Y-m-d '). $user_department->departmentWorkShift->workShift->start_time;
                $endShiftTime = date('Y-m-d'). $user_department->departmentWorkShift->workShift->end_time;
            }
        }

        $currentDate = Carbon::now()->format('Y-m-d');

        $user_check = Attendance::where('user_id', Auth::user()->id)->where(function ($query) use ($startShiftTime, $endShiftTime, $currentDate) {
            $query->where('in_date', '>=', $startShiftTime)
                ->orWhere('in_date', '<', $endShiftTime)
                ->whereDate('in_date', $currentDate);
        })
        ->orderBy('in_date', 'asc')
        ->first();

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
            return view('admin.dashboards.manager-dashboard', compact('title', 'user_check', 'model', 'department_manager', 'data', 'team_members', 'current_month_discrepancies', 'current_month_leave_requests'));
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
