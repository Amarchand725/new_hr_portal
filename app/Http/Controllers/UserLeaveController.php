<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UserEmploymentStatus;
use App\Models\UserLeave;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;

class UserLeaveController extends Controller
{
    public function index(Request $request)
    {
        // $this->authorize('position-list');
        $title = 'User All Leaves';
        if($request->ajax()){
            $query = UserLeave::where('user_id', Auth::user()->id)->orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('title', 'like', '%'. $request['search'] .'%');
            }
            if($request['status'] != "All"){
                $query->where('status', $request['status']);
            }
            $models = $query->paginate(10);
            return (string) view('admin.user_leaves.search', compact('models'));
        }

        $models = UserLeave::orderby('id', 'desc')->paginate(10);
        $onlySoftDeleted = UserLeave::onlyTrashed()->count();
        return view('admin.user_leaves.index', compact('title', 'models', 'onlySoftDeleted'));
    }

    public function leaveReport()
    {
        $user = Auth::user();
        $title = 'Leave Report';

        $leave_report = [];
        if(!isOnProbation($user->employeeStatus->end_date)){
            $leave_report = $this->hasExceededLeaveLimit($user);
        }

        return view('admin.user_leaves.leave-report', compact('title', 'leave_report'));
    }

    public function hasExceededLeaveLimit($user)
    {
        // Assuming the leave limit is 2 leaves per month
        $currentMonth = Carbon::today()->month;
        $currentYear = Carbon::today()->year;

        $probation = UserEmploymentStatus::where('user_id', $user->id)
        ->where('employment_status_id', 3)
        ->first();

        if(!empty($probation)) {
            // Check if probation exists and is not completed
            if ($probation && Carbon::today()->lte($probation->end_date)) {
                return false;
            }

            // Calculate the total leaves taken after the end of probation, considering partial months
            $total_used_leaves = $user->leaves()
            ->whereYear('start_at', $currentYear)
            ->where(function ($query) use ($probation, $currentYear, $currentMonth) {
                $query->where('start_at', '>', $probation->end_date)
                    ->orWhere(function ($query) use ($currentYear, $currentMonth) {
                        $query->whereYear('start_at', '=', $currentYear)
                            ->whereMonth('start_at', '>', $currentMonth);
                    })
                    ->orWhere(function ($query) use ($currentYear, $currentMonth) {
                        $query->whereYear('start_at', '>', $currentYear);
                    });
            })
            ->count();

            $total_leaves_in_account = ($currentMonth - date('m', strtotime($probation->end_date)) + 1) * 2;
            $leaves_in_balance = ($currentMonth - date('m', strtotime($probation->end_date)) + 1) * 2-$total_used_leaves;

            // Calculate the number of months remaining in the current year after probation
            $remainingMonths = 12 - date('m', strtotime($probation->end_date)) + 1;
        }else{
            // Check if probation exists and is not completed
            if (Carbon::today()->lte($user->profile->joining_date)) {
                return false;
            }

            // Calculate the total leaves taken after the end of probation, considering partial months
            $total_used_leaves = $user->leaves()
            ->whereYear('start_at', $currentYear)
            ->where(function ($query) use ($user, $currentYear, $currentMonth) {
                $query->where('start_at', '>', $user->profile->joining_date)
                    ->orWhere(function ($query) use ($currentYear, $currentMonth) {
                        $query->whereYear('start_at', '=', $currentYear)
                            ->whereMonth('start_at', '>', $currentMonth);
                    })
                    ->orWhere(function ($query) use ($currentYear, $currentMonth) {
                        $query->whereYear('start_at', '>', $currentYear);
                    });
            })
            ->count();

            $total_leaves_in_account = ($currentMonth - date('m', strtotime($user->profile->joining_date)) + 1) * 2;
            $leaves_in_balance = ($currentMonth - date('m', strtotime($user->profile->joining_date)) + 1) * 2-$total_used_leaves;

            // Calculate the number of months remaining in the current year after probation
            $remainingMonths = 12 - date('m', strtotime($user->profile->joining_date)) + 1;
        }

        // Calculate the total number of leaves allowed after probation
        $totalLeaves = $remainingMonths * 2;

        $leave_report = [
            'total_leaves' => $totalLeaves,
            'total_leaves_in_account' => $total_leaves_in_account,
            'total_used_leaves' => $total_used_leaves,
            'leaves_in_balance' => $leaves_in_balance,
        ];

        return $leave_report;
    }

    public function show($leave_id)
    {
        $model = UserLeave::where('id', $leave_id)->first();
        return (string) view('admin.user_leaves.show_content', compact('model'));
    }

    public function status($leave_id)
    {
        // $this->authorize('department-status');
        $model = UserLeave::where('id', $leave_id)->first();
        $model->status = 1;
        $model->save();

        if($model){
            return true;
        }
    }
}
