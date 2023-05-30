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
        $this->authorize('announcements-list');
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
            return (string) view('admin.announcements.search', compact('models'));
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
            'title' => 'required|max:255',
            'start_date' => 'required',
            'description' => 'max:1000',
        ]);

        $announcement = $request->except(['department_ids']);
        $announcement['created_by'] = Auth::user()->id;

        DB::beginTransaction();

        try{
            $model = Announcement::create($announcement);
            if($model){
                $announcement_department = new AnnouncementDepartment();

                if(isset($request->department_ids[0]) && $request->department_ids[0] != ''){
                    foreach($request->department_ids as $department_id){
                        $announcement_department->announcement_id = $model->id;
                        $announcement_department->department_id = $department_id;
                        $announcement_department->save();
                    }
                }else{
                    $all_departments = Department::where('status', 1)->get();
                    foreach($all_departments as $department){
                        $announcement_department->announcement_id = $model->id;
                        $announcement_department->department_id = $department->id;
                        $announcement_department->save();
                    }
                }

                DB::commit();
            }

            \LogActivity::addToLog('New Announcement Added');

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function show($announcement_id)
    {
        $model = Announcement::findOrFail($announcement_id);
        return (string) view('admin.announcements.show_content', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $this->authorize('announcements-edit');
        $model = Announcement::where('id', $id)->first();
        $departments = Department::where('status', 1)->get();
        return (string) view('admin.announcements.edit_content', compact('model', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Announcement $announcement)
    {
        $this->validate($request, [
            'title' => ['required', 'max:255'],
            'start_date' => ['required'],
            'description' => ['max:1000'],
        ]);

        $announcement_inputs = $request->except(['department_ids']);

        DB::beginTransaction();

        try{
            $model = $announcement->update($announcement_inputs);

            if($model && isset($request->department_ids[0]) && $request->department_ids[0] != ''){
                // return $request->department_ids[0];
                $announcement_department = AnnouncementDepartment::where('announcement_id', $announcement->id)->delete();

                $announcement_department = new AnnouncementDepartment();

                if($request->department_ids[0]=='All') {
                    $all_departments = Department::where('status', 1)->get();
                    foreach($all_departments as $department) {
                        $announcement_department->announcement_id = $announcement->id;
                        $announcement_department->department_id = $department->id;
                        $announcement_department->save();
                    }
                }else{
                    foreach($request->department_ids as $department_id) {
                        $announcement_department->announcement_id = $announcement->id;
                        $announcement_department->department_id = $department_id;
                        $announcement_department->save();
                    }
                }

                DB::commit();
            }

            \LogActivity::addToLog('Announcement Updated');

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement)
    {
        $this->authorize('announcements-delete');
        $model = $announcement->delete();
        if($model){
            $onlySoftDeleted = Announcement::onlyTrashed()->count();
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
        $this->authorize('announcements-trashed');
        $data = [];
        $data['models'] = Announcement::onlyTrashed()->get();
        $title = 'All Trashed Records';
        return view('admin.announcements.trashed-index', compact('title', 'data'));
    }
    public function restore($id)
    {
        $this->authorize('announcements-restore');
        Announcement::onlyTrashed()->where('id', $id)->restore();
        return redirect()->back()->with('message', 'Record Restored Successfully.');
    }
}
