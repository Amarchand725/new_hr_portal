<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Models\User;
use App\Models\WorkShift;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\DepartmentWorkShift;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $this->authorize('department-list');
        $data = [];

        $title = 'All Departments';
        if($request->ajax()){
            $query = Department::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('name', 'like', '%'. $request['search'] .'%');
                $query->orWhere('location', 'like', '%'. $request['search'] .'%');
            }
            if($request['status'] != "All"){
                $query->where('status', $request['status']);
            }
            if($request['parent_department_id'] != "All"){
                $query->where('parent_department_id', $request['parent_department_id']);
            }
            $data['models'] = $query->paginate(10);
            return (string) view('admin.departments.search', compact('data'));
        }

        $data['models'] = Department::orderby('id', 'desc')->paginate(10);
        $data['parent_departments'] = Department::where('status', 1)->where('parent_department_id', NULL)->get();
        $data['work_shifts'] = WorkShift::where('status', 1)->get();
        $data['users'] = User::get();
        $onlySoftDeleted = Department::onlyTrashed()->count();
        return view('admin.departments.index', compact('title', 'onlySoftDeleted', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'unique:departments', 'max:255'],
            'parent_department_id' => ['required'],
            // 'manager_id' => ['required'],
            // 'work_shift_id' => ['required'],
            'description' => ['max:500'],
            'location' => ['max:250'],
        ]);

        $department = $request->except(['work_shift_id']);

        DB::beginTransaction();

        try{
            $model = Department::create($department);
            if($model && isset( $request->work_shift_id) && !empty( $request->work_shift_id)){
                DepartmentWorkShift::create([
                    'department_id' => $model->id,
                    'work_shift_id' => $request->work_shift_id,
                ]);
            }

            DB::commit();

            \LogActivity::addToLog('New Department Added');

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function edit(Department $department)
    {
        $data = [];
        $data['model'] = $department;
        $data['departments'] = Department::where('status', 1)->get();
        $data['work_shifts'] = WorkShift::where('status', 1)->get();
        $data['users'] = User::get();
        return (string) view('admin.departments.edit_content', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        $this->validate($request, [
            'name' => 'required|max:255|unique:departments,id,'.$department->id,
            'description' => ['max:500'],
            'location' => ['max:250'],
        ]);

        $department_inputs = $request->except(['work_shift_id']);

        DB::beginTransaction();

        try{
            $model = $department->update($department_inputs);
            if($model){
                DepartmentWorkShift::where('department_id', $department->id)->delete();
                DepartmentWorkShift::create([
                    'department_id' => $department->id,
                    'work_shift_id' => $request->work_shift_id,
                ]);

                DB::commit();
            }

            \LogActivity::addToLog('Department Updated');

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $model = $department->delete();
        if($model){
            $onlySoftDeleted = Department::onlyTrashed()->count();
            return response()->json([
                'status' => true,
                'trash_records' => $onlySoftDeleted
            ]);
        }else{
            return false;
        }
    }

    public function trashed()
    {
        // $this->authorize('department-trashed');
        $data = [];
        $data['models'] = Department::onlyTrashed()->get();
        $title = 'All Trashed Records';
        return view('admin.departments.trashed-index', compact('title', 'data'));
    }
    public function restore($id)
    {
        // $this->authorize('department-restore');
        Department::onlyTrashed()->where('id', $id)->restore();
        return redirect()->back()->with('message', 'Record Restored Successfully.');
    }

    public function status($department_id)
    {
        $model = Department::where('id', $department_id)->first();
        if($model->status==1){
            $model->status = 0;
        }else{
            $model->status = 1;
        }

        $model->save();

        if($model){
            return true;
        }
    }

    public function addManager($id)
    {
        return 'good';
    }
}
