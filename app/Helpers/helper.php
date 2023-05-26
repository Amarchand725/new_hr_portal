<?php

use App\Models\BankAccount;
use App\Models\Setting;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

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
