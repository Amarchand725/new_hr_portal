<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\Department;
use App\Models\WorkShift;
use App\Models\User;
use App\Models\Designation;
use App\Models\EmploymentStatus;
use DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('role-list');
        $per_page_records = 10;

        if($request->ajax()){
            $query = Permission::orderby('id', 'desc')->groupBy('label')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('name', 'like', '%'. $request['search'] .'%');
                $query->orWhere('label', 'like', '%'. $request['search'] .'%');
            }
            $models = $query->paginate($per_page_records);
            return (string) view('admin.roles.search', compact('models'));
        }
        $title = 'All Roles';

        $data['models'] = Permission::orderby('id','DESC')->groupBy('label')->paginate($per_page_records);
        $data['work_shifts'] = WorkShift::orderby('id', 'desc')->get();
        $data['designations'] = Designation::orderby('id', 'desc')->where('status', 1)->get();
        $data['roles'] = Role::orderby('id', 'desc')->get();
        $data['departments'] = Department::orderby('id', 'desc')->where('status', 1)->get();
        $data['employment_statues'] = EmploymentStatus::orderby('id', 'desc')->get();
        $data['employees'] = User::orderby('id', 'desc')->where('is_employee', 1)->paginate(10);
        return view('admin.roles.index', compact('title', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'unique:roles', 'max:100'],
        ]);

        DB::beginTransaction();

        try{
            $role = Role::create(['name' => $request->name]);
            $role->syncPermissions($request->input('permissions'));

            if($role){
                DB::commit();
            }

            \LogActivity::addToLog('New Role Added');

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('role-edit');
        $role = Role::where('id', $id)->first();
        $role_permissions = $role->getPermissionNames();
        $models = Permission::orderby('id','DESC')->groupBy('label')->get();
        $roles = Role::orderby('id', 'desc')->get();

        return (string) view('admin.roles.edit_content', compact('role', 'models', 'roles', 'role_permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required|max:150|unique:roles,id,'.$id,
        ]);

        DB::beginTransaction();

        try{
            $role = Role::where('id', $id)->first();
            $role->name = $request->name;
            $role->save();
            $role->syncPermissions($request->input('permissions'));

            DB::commit();

            \LogActivity::addToLog('Role Updated');

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
