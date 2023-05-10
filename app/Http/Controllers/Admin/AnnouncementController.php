<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AnnouncementDepartment;
use App\Models\Department;
use Auth;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'All Announcements';
        if($request->ajax()){
            $query = Announcement::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('title', 'like', '%'. $request['search'] .'%');
                $query->orWhere('start_date', 'like', '%'. $request['search'] .'%');
                $query->orWhere('end_date', 'like', '%'. $request['search'] .'%');
            }
            if($request['status'] != "All"){
                $query->where('status', $request['status']);
            }
            $models = $query->paginate(10);
            return (string) view('admin.work_shifts.search', compact('models'));
        }

        $models = Announcement::orderby('id', 'desc')->paginate(10);
        $departments = Department::where('status', 1)->get();
        $onlySoftDeleted = Announcement::onlyTrashed()->count();
        return view('admin.announcements.index', compact('title', 'models', 'onlySoftDeleted', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'max:255'],
            'start_date' => ['required'],
            'description' => ['max:500'],
        ]);

        $announcement = $request->except(['department_ids']);
        $announcement['created_by'] = Auth::user()->id;

        DB::beginTransaction();

        try{
            $model = Announcement::create($announcement);
            if($model){
                if(isset($request->department_ids[0]) && $request->department_ids[0] != ''){
                    foreach($request->department_ids as $department_id){
                        AnnouncementDepartment::create([
                            'announcement_id' => $model->id,
                            'department_id ' => $department_id
                        ]);
                    }
                }

                DB::commit();
            }

            \LogActivity::addToLog('New Announcement Added');

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            // return redirect()->back()->with('error', 'Error. '.$e->getMessage());
            return $e->getMessage();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $model = Announcement::where('id', $id)->first();
        return (string) view('admin.announcements.edit_content', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Announcement $announcement)
    {
        //
        \LogActivity::addToLog('New Announcement Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement)
    {
        //
    }
}
