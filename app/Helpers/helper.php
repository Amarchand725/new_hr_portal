<?php

use App\Models\BankDetail;
use Spatie\Permission\Models\Permission;

function SubPermissions($label){
    return Permission::where('label', $label)->get();
}
function bankDetail($user_id)
{
    return BankDetail::where('user_id', $user_id)->first();
}
