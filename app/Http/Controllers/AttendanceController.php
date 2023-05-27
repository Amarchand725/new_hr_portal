<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Attendance;
use App\Models\Department;
use App\Models\Discrepancy;
use Illuminate\Http\Request;
use App\Models\DepartmentUser;
use App\Http\Controllers\Controller;

class AttendanceController extends Controller
{
    public function summary(Request $request)
    {
        $title = 'Attendance Summary';
        $department = Department::where('manager_id', Auth::user()->id)->where('status', 1)->first();
        if(!empty($department)) {
            $department_users = DepartmentUser::where('department_id', $department->id)->where('end_date', null)->get(['user_id']);
            $dep_users_ids = [];
            foreach($department_users as $department_user) {
                if($department_user->user_id != Auth::user()->id) {
                    $dep_users_ids[] = $department_user->user_id;
                }
            }

            $team_members = User::whereIn('id', $dep_users_ids)->get();
        }
        $models = Attendance::orderby('id', 'desc')->where('user_id', $request->user_id)->get();
        return view('user.attendance.summary', compact('title', 'models', 'team_members'));
    }
    //Login Users
    public function discrepancies()
    {
        // $this->authorize('discrepancy-list');
        $title = 'Discrepancies';
        $models = Discrepancy::orderby('id','desc')->where('user_id', Auth::user()->id)->paginate(10);
        return view('user.attendance.discrepancies', compact('title', 'models'));
    }
    public function show($id)
    {
        $model = Discrepancy::where('id', $id)->first();
        return (string) view('user.attendance.show_content', compact('model'));
    }
    public function dailyLog()
    {
        // $this->authorize('dailylog-list');
        $title = 'Daily Log';
        $models = Attendance::orderby('id', 'desc')->where('user_id', Auth::user()->id)->paginate(10);
        return view('user.attendance.daily-log', compact('title', 'models'));
    }
    //Login Users

    //Team
    public function teamDailyLog(Request $request)
    {
        $title = 'Team Daily Log';

        $department = Department::where('manager_id', Auth::user()->id)->where('status', 1)->first();
        if(!empty($department)) {
            $department_users = DepartmentUser::where('department_id', $department->id)->where('end_date', null)->get(['user_id']);
            $dep_users_ids = [];
            foreach($department_users as $department_user) {
                if($department_user->user_id != Auth::user()->id) {
                    $dep_users_ids[] = $department_user->user_id;
                }
            }

            $team_members = User::whereIn('id', $dep_users_ids)->get();
        }

        $models = Attendance::orderby('id', 'desc')->where('user_id', $request->user_id)->paginate(10);
        return view('user.attendance.team-daily-log', compact('title', 'models', 'team_members'));
    }

    public function teamDiscrepancies(Request $request)
    {
        $title = 'Team Discrepancies';

        $department = Department::where('manager_id', Auth::user()->id)->where('status', 1)->first();
        if(!empty($department)) {
            $department_users = DepartmentUser::where('department_id', $department->id)->where('end_date', null)->get(['user_id']);
            $dep_users_ids = [];
            foreach($department_users as $department_user) {
                if($department_user->user_id != Auth::user()->id) {
                    $dep_users_ids[] = $department_user->user_id;
                }
            }

            $team_members = User::whereIn('id', $dep_users_ids)->get();
        }

        $models = Discrepancy::orderby('id', 'desc')->where('user_id', $request->user_id)->paginate(10);
        return view('user.attendance.team-discrepancies', compact('title', 'models', 'team_members'));
    }

    public function getDiscrepancies()
    {
        $department = Department::where('manager_id', Auth::user()->id)->where('status', 1)->first();
        if(!empty($department)) {
            $department_users = DepartmentUser::where('department_id', $department->id)->where('end_date', null)->get(['user_id']);
            $team_members_ids = [];

            foreach($department_users as $department_user) {
                if($department_user->user_id != Auth::user()->id) {
                    $team_members_ids[] = $department_user->user_id;
                }
            }
        }

        $currentMonthStart = Carbon::now()->startOfMonth(); // Get the first day of the current month
        $currentMonthEnd = Carbon::now()->startOfMonth()->addDays(24); // Get the 25th day of the current month

        $current_month_discrepancies = Discrepancy::whereBetween('date', [$currentMonthStart, $currentMonthEnd])->whereIn('user_id', $team_members_ids)->get();

        return (string) view('user.attendance.get-discrepancies', compact('current_month_discrepancies'));
    }
}
