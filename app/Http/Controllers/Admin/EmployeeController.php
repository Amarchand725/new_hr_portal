<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\Position;
use App\Models\Designation;
use App\Models\EmploymentStatus;
use Spatie\Permission\Models\Role;


class EmployeeController extends Controller
{
    public function index()
    {
        $data = [];
        $data['positions'] = Position::orderby('id', 'desc')->where('status', 1)->get();
        $data['designations'] = Designation::orderby('id', 'desc')->where('status', 1)->get();
        $data['roles'] = Role::orderby('id', 'desc')->get();
        $data['departments'] = Department::orderby('id', 'desc')->get();
        $data['employment_statues'] = EmploymentStatus::orderby('id', 'desc')->get();
        return view('admin.employees.index', compact('data'));
    }
}
