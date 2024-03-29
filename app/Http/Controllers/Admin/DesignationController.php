<?php

namespace App\Http\Controllers\Admin;

use App\Models\Designation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use DB;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $this->authorize('designation-list');
        $title = 'All Designations';
        if($request->ajax()){
            $query = Designation::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('title', 'like', '%'. $request['search'] .'%');
            }
            if($request['status'] != "All"){
                $query->where('status', $request['status']);
            }
            $models = $query->paginate(10);
            return (string) view('admin.designations.search', compact('models'));
        }

        $models = Designation::orderby('id', 'desc')->paginate(10);
        $onlySoftDeleted = Designation::onlyTrashed()->count();
        return view('admin.designations.index', compact('title', 'models', 'onlySoftDeleted'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:designations,title',
            'description' => 'max:500',
        ]);

        DB::beginTransaction();

        try{
            Designation::create($request->all());

            DB::commit();

            \LogActivity::addToLog('New Designation Added');
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $this->authorize('department-edit');
        $model = Designation::where('id', $id)->first();
        return (string) view('admin.designations.edit_content', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Designation $designation)
    {
        $this->validate($request, [
            'title' => 'required|max:200|unique:designations,id,'.$designation->id,
            'description' => 'max:500',
        ]);

        DB::beginTransaction();

        try{
            $designation->update($request->all());

            DB::commit();

            \LogActivity::addToLog('Designation Updated');
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Designation $designation)
    {
        $this->authorize('department-delete');
        $model = $designation->delete();
        if($model){
            $onlySoftDeleted = Designation::onlyTrashed()->count();
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
        $this->authorize('designation-trashed');
        $models = Designation::onlyTrashed()->get();
        $title = 'All Trashed Records';
        return view('admin.designations.trashed-index', compact('models', 'title'));
    }
    public function restore($id)
    {
        $this->authorize('designation-restore');
        Designation::onlyTrashed()->where('id', $id)->restore();
        return redirect()->back()->with('message', 'Record Restored Successfully.');
    }
}
