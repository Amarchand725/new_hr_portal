<?php
use Spatie\Permission\Models\Permission;

function SubPermissions($label){
    return Permission::where('label', $label)->get();
}
