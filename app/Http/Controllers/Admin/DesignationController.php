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
            $model = Designation::create($request->all());

            if($model){
                DB::commit();
                return redirect()->route('designations.index')->with('message', 'Designation created successfully.!');
            }else{
                return redirect()->route('designations.index')->with('error', 'Something went wrong try again.!');
            }
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error. '.$e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Designation $designation)
    {
        $this->validate($request, [
            'title' => 'required|max:200',
            'description' => 'max:500',
        ]);

        $model = $designation->update($request->all());
        if($model){
            return redirect()->back()->with('message', 'Designation updated successfully.!');
        }else{
            return redirect()->back()->with('error', 'Something went wrong try again.!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Designation $designation)
    {
        $model = $designation->delete();
        if($model){
            return true;
        }else{
            return false;
        }
    }

    public function trashed()
    {
        $models = Designation::onlyTrashed()->get();
        $title = 'All Trashed Records';
        return view('admin.designations.trashed-index', compact('models', 'title'));
    }
    public function restore($id)
    {
        Designation::onlyTrashed()->where('id', $id)->restore();
        return redirect()->back()->with('message', 'Record Restored Successfully.');
    }
}
