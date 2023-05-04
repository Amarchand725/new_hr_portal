<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmploymentStatus;
use DB;

class EmploymentStatusController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Employment Status';
        if($request->ajax()){
            $query = EmploymentStatus::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('name', 'like', '%'. $request['search'] .'%');
                $query->orWhere('class', 'like', '%'. $request['search'] .'%');
                $query->orWhere('alias', 'like', '%'. $request['search'] .'%');
            }
            if($request['status'] != "All"){
                $query->where('status', $request['status']);
            }
            $models = $query->paginate(10);
            return (string) view('admin.employment_status.search', compact('models'));
        }

        $models = EmploymentStatus::orderby('id', 'desc')->paginate(10);
        $onlySoftDeleted = EmploymentStatus::onlyTrashed()->count();

        return view('admin.employment_status.index', compact('title', 'models', 'onlySoftDeleted'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:200',
            'class' => 'required',
            'description' => 'max:255',
        ]);

        DB::beginTransaction();

        try{
            $model = EmploymentStatus::create($request->all());

            if($model){
                DB::commit();
                return redirect()->route('employment_status.index')->with('message', 'Employment status created successfully.!');
            }else{
                return redirect()->route('employment_status.index')->with('error', 'Something went wrong try again.!');
            }
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error. '.$e->getMessage());
        }
    }

    public function update(Request $request, EmploymentStatus $employment_status)
    {
        $this->validate($request, [
            'name' => 'required|max:200',
            'class' => 'required',
            'description' => 'max:255',
        ]);

        $model = $employment_status->update($request->all());
        if($model){
            return redirect()->back()->with('message', 'employment_status updated successfully.!');
        }else{
            return redirect()->back()->with('error', 'Something went wrong try again.!');
        }
    }

    public function destroy(EmploymentStatus $employment_status)
    {
        $model = $employment_status->delete();
        if($model){
            return true;
        }else{
            return false;
        }
    }

    public function trashed()
    {
        $models = EmploymentStatus::onlyTrashed()->get();
        $title = 'All Trashed Records';
        return view('admin.employment_status.trashed-index', compact('models', 'title'));
    }
    public function restore($id)
    {
        EmploymentStatus::onlyTrashed()->where('id', $id)->restore();
        return redirect()->back()->with('message', 'Record Restored Successfully.');
    }
}
