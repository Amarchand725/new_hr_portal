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
        $this->authorize('employmentstatus-list');
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
            'name' => ['required', 'unique:employment_statuses', 'max:255'],
            'class' => 'required',
            'description' => 'max:255',
        ]);

        DB::beginTransaction();

        try{
            $model = EmploymentStatus::create($request->all());

            if($model){
                DB::commit();
            }

            \LogActivity::addToLog('New Employment Status Added');
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $this->authorize('employment_status-edit');
        $model = EmploymentStatus::where('id', $id)->first();
        return (string) view('admin.employment_status.edit_content', compact('model'));
    }

    public function update(Request $request, EmploymentStatus $employment_status)
    {
        $this->validate($request, [
            'name' => 'required|max:255|unique:employment_statuses,id,'.$employment_status->id,
            'class' => 'required',
            'description' => 'max:255',
        ]);

        DB::beginTransaction();

        try{
            $model = $employment_status->update($request->all());
            if($model){
                DB::commit();
            }

            \LogActivity::addToLog('Employment Status Updated');

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function destroy(EmploymentStatus $employment_status)
    {
        $this->authorize('employmentstatus-delete');
        $model = $employment_status->delete();
        if($model){
            $onlySoftDeleted = EmploymentStatus::onlyTrashed()->count();
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
        $this->authorize('employmentstatus-trashed');
        $models = EmploymentStatus::onlyTrashed()->get();
        $title = 'All Trashed Records';
        return view('admin.employment_status.trashed-index', compact('models', 'title'));
    }
    public function restore($id)
    {
        $this->authorize('employmentstatus-restore');
        EmploymentStatus::onlyTrashed()->where('id', $id)->restore();
        return redirect()->back()->with('message', 'Record Restored Successfully.');
    }
}
