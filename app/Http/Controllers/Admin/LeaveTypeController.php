<?php

namespace App\Http\Controllers\Admin;

use App\Models\LeaveType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class LeaveTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $this->authorize('position-list');
        $title = 'All Leave Types';
        if($request->ajax()){
            $query = LeaveType::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('title', 'like', '%'. $request['search'] .'%');
            }
            if($request['status'] != "All"){
                $query->where('status', $request['status']);
            }
            $models = $query->paginate(10);
            return (string) view('admin.leave_types.search', compact('models'));
        }

        $models = LeaveType::orderby('id', 'desc')->paginate(10);
        $onlySoftDeleted = LeaveType::onlyTrashed()->count();
        return view('admin.leave_types.index', compact('title', 'models', 'onlySoftDeleted'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'unique:leave_types', 'max:255'],
            'type' => ['required'],
        ]);

        DB::beginTransaction();

        try{
            $model = LeaveType::create($request->all());
            if($model){
                DB::commit();
            }

            \LogActivity::addToLog('New Leave Type Added');

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LeaveType $leaveType)
    {
        $model = $leaveType;
        return (string) view('admin.leave_types.edit_content', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LeaveType $leaveType)
    {
        $this->validate($request, [
            'name' => 'required|max:255|unique:leave_types,id,'.$leaveType->id,
            'type' => ['required'],
        ]);

        DB::beginTransaction();

        try{
            $model = $leaveType->update($request->all());
            if($model){
                DB::commit();
            }

            \LogActivity::addToLog('Leave Type Updated');

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LeaveType $leaveType)
    {
        $model = $leaveType->delete();
        if($model){
            $onlySoftDeleted = LeaveType::onlyTrashed()->count();
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
        // $this->authorize('position-trashed');
        $models = LeaveType::onlyTrashed()->get();
        $title = 'All Trashed Records';
        return view('admin.leave_types.trashed-index', compact('models', 'title'));
    }
    public function restore($id)
    {
        // $this->authorize('position-restore');
        LeaveType::onlyTrashed()->where('id', $id)->restore();
        return redirect()->back()->with('message', 'Record Restored Successfully.');
    }
}
