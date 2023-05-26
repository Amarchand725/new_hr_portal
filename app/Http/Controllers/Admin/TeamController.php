<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\UserLeave;
use App\Models\User;
use App\Models\DepartmentUser;

class TeamController extends Controller
{
    public function leaveRequests(Request $request, $manager_id)
    {
        // $this->authorize('position-list');
        $title = 'Leave Requests';
        $manager = User::findOrFail($manager_id);
        $models = '';

        if($request->ajax()) {
            $query = UserLeave::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != "") {
                $query->where('first_name', 'like', '%'. $request['search'] .'%');
                $query->orWhere('last_name', 'like', '%'. $request['search'] .'%');
                $query->orWhere('email', 'like', '%'. $request['search'] .'%');
            }

            $models = $query->where('is_employee', 1)->paginate(10);

            return (string) view('admin.teams.leave-search', compact('models'));
        }

        if(isset($manager->departmentBridge) && !empty($manager->departmentBridge->department_id)) {
            $models = UserLeave::where('id', $manager->departmentBridge->department_id)->paginate(10);
        }
        $onlySoftDeleted = UserLeave::onlyTrashed()->count();
        return view('admin.teams.leave-requests', compact('title', 'models', 'onlySoftDeleted'));
    }
    public function leaveReports($manager)
    {
        $title = 'Leave Reports';

        if(isset($manager->departmentBridge->department) && !empty($manager->departmentBridge->department->id)) {
            $manager_department_id = $manager->departmentBridge->department->id;
            $team_member_ids = DepartmentUser::where('department_id', $manager_department_id)->where('user_id', '!=', $manager->id)->get(['user_id']);

            $team_members_ids = [];
            foreach($team_member_ids as $team_member_id) {
                $team_members_ids[] = $team_member_id->user_id;
            }
        }

        $users = User::where('id', $team_members_ids)->get();

        return view('admin.user_leaves.leave-report', compact('title', 'leave_report'));
    }
}
