<?php

use App\Models\BankDetail;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;

function SubPermissions($label){
    return Permission::where('label', $label)->get();
}
function bankDetail()
{
    return BankDetail::where('user_id', Auth::user()->id)->first();
}
