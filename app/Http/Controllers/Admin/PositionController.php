<?php

namespace App\Http\Controllers\Admin;

use App\Models\Position;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Validation\Rule;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'All Positions';
        if($request->ajax()){
            $query = Position::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('title', 'like', '%'. $request['search'] .'%');
            }
            if($request['status'] != "All"){
                $query->where('status', $request['status']);
            }
            $models = $query->paginate(10);
            return (string) view('admin.positions.search', compact('models'));
        }

        $models = Position::orderby('id', 'desc')->paginate(10);
        $onlySoftDeleted = Position::onlyTrashed()->count();
        return view('admin.positions.index', compact('title', 'models', 'onlySoftDeleted'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'unique:positions', 'max:255'],
            'description' => ['max:500'],
        ]);

        DB::beginTransaction();

        try{
            $model = Position::create($request->all());
            if($model){
                DB::commit();
            }

            \LogActivity::addToLog('New Position Inserted');

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error. '.$e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Position $position)
    {
        $request->validate([
            'title' => 'required|max:255|unique:positions,id,'.$position->id,
            'description' => ['max:500'],
        ]);

        DB::beginTransaction();

        try{
            $model = $position->update($request->all());
            if($model){
                DB::commit();
            }

            \LogActivity::addToLog('Position Updated');

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error. '.$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Position $position)
    {
        $model = $position->delete();
        if($model){
            $onlySoftDeleted = Position::onlyTrashed()->count();
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
        $models = Position::onlyTrashed()->get();
        $title = 'All Trashed Records';
        return view('admin.positions.trashed-index', compact('models', 'title'));
    }
    public function restore($id)
    {
        Position::onlyTrashed()->where('id', $id)->restore();
        return redirect()->back()->with('message', 'Record Restored Successfully.');
    }
}
