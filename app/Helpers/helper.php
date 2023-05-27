<?php

use App\Models\Setting;
use App\Models\BankAccount;
use Illuminate\Support\Carbon;
use App\Models\UserEmploymentStatus;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

function SubPermissions($label){
    return Permission::where('label', $label)->get();
}
function bankDetail()
{
    return BankAccount::where('user_id', Auth::user()->id)->first();
}
function settings()
{
    return Setting::first();
}

function isOnProbation()
{
    if(isset(Auth::user()->employeeStatus) && !empty(Auth::user()->employeeStatus->end_date)) {
        $probation_end_date = Auth::user()->employeeStatus->end_date;
        return Carbon::today()->lte($probation_end_date);
    }
}

function hasExceededLeaveLimit($user)
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
        ->whereYear('start_date', $currentYear)
        ->where(function ($query) use ($probation, $currentYear, $currentMonth) {
            $query->where('start_date', '>', $probation->end_date)
                ->orWhere(function ($query) use ($currentYear, $currentMonth) {
                    $query->whereYear('start_date', '=', $currentYear)
                        ->whereMonth('start_date', '>', $currentMonth);
                })
                ->orWhere(function ($query) use ($currentYear, $currentMonth) {
                    $query->whereYear('start_date', '>', $currentYear);
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
        ->whereYear('start_date', $currentYear)
        ->where(function ($query) use ($user, $currentYear, $currentMonth) {
            $query->where('start_date', '>', $user->profile->joining_date)
                ->orWhere(function ($query) use ($currentYear, $currentMonth) {
                    $query->whereYear('start_date', '=', $currentYear)
                        ->whereMonth('start_date', '>', $currentMonth);
                })
                ->orWhere(function ($query) use ($currentYear, $currentMonth) {
                    $query->whereYear('start_date', '>', $currentYear);
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
