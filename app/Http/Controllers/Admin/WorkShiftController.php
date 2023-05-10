<?php

namespace App\Http\Controllers\Admin;

use App\Models\WorkShift;
use App\Models\WorkShiftDetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Str;
use DB;

class WorkShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'All Work Shifts';
        if($request->ajax()){
            $query = WorkShift::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('title', 'like', '%'. $request['search'] .'%');
            }
            if($request['status'] != "All"){
                $query->where('status', $request['status']);
            }
            $models = $query->paginate(10);
            return (string) view('admin.work_shifts.search', compact('models'));
        }

        $models = WorkShift::with('haveWorkShiftDetails')->orderby('id', 'desc')->paginate(10);
        $onlySoftDeleted = WorkShift::onlyTrashed()->count();
        return view('admin.work_shifts.index', compact('title', 'models', 'onlySoftDeleted'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'unique:work_shifts', 'max:255'],
            'start_date' => ['required'],
            'type' => ['required'],
            'start_time' => ['required'],
            'end_time' => ['required'],
            'description' => ['max:500'],
        ]);

        $work_shift = $request->except(['start_time', 'end_time', 'weekend_days']);

        DB::beginTransaction();

        try{
            $model = WorkShift::create($work_shift);
            if($model){
                $daysOfWeek = [];

                for ($day = 0; $day < 7; $day++) {
                    // Create a Carbon instance for the current day of the week
                    $date = Carbon::now()->startOfWeek()->addDays($day);

                    //Day key
                    $short_day = Str::lower($date->format('D'));
                    // Add the day name to the array
                    $daysOfWeek[$short_day] = $date->format('l');
                }

                foreach($daysOfWeek as $short_day_key=>$dayOfWeek){
                    $bool = false;
                    foreach($request->weekend_days as $weekend_day){
                        if($short_day_key==$weekend_day){
                            $bool = true;
                        }
                    }
                    $work_shift_detail = new WorkShiftDetail();
                    $work_shift_detail->working_shift_id = $model->id;
                    $work_shift_detail->weekday_key = $short_day_key;
                    $work_shift_detail->weekday = $dayOfWeek;
                    $work_shift_detail->is_weekend = $bool;
                    if(!$bool){
                        $work_shift_detail->start_time = $request->start_time;
                        $work_shift_detail->end_time = $request->end_time;
                    }

                    $work_shift_detail->save();
                }

                DB::commit();
            }

            \LogActivity::addToLog('New Work shift Added');

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error. '.$e->getMessage());
        }
    }

    public function edit($id)
    {
        $model = WorkShift::with('haveWorkShiftDetails')->where('id', $id)->first();

        return (string) view('admin.work_shifts.edit_content', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WorkShift $workShift)
    {
        $this->validate($request, [
            'name' => 'required|max:255|unique:work_shifts,id,'.$workShift->id,
            'start_date' => ['required'],
            'type' => ['required'],
            'start_time' => ['required'],
            'end_time' => ['required'],
            'description' => ['max:500'],
        ]);

        $work_shift = $request->except(['start_time', 'end_time', 'weekend_days']);

        DB::beginTransaction();

        try{
            $model = $workShift->update($work_shift);
            if($model){
                $daysOfWeek = [];
                if(isset($request->weekend_days) && !empty($request->weekend_days)) {
                    WorkShiftDetail::where('working_shift_id', $workShift->id)->delete();

                    for ($day = 0; $day < 7; $day++) {
                        // Create a Carbon instance for the current day of the week
                        $date = Carbon::now()->startOfWeek()->addDays($day);

                        //Day key
                        $short_day = Str::lower($date->format('D'));
                        // Add the day name to the array
                        $daysOfWeek[$short_day] = $date->format('l');
                    }

                    foreach($daysOfWeek as $short_day_key=>$dayOfWeek) {
                        $bool = false;
                        foreach($request->weekend_days as $weekend_day) {
                            if($short_day_key==$weekend_day) {
                                $bool = true;
                            }
                        }
                        $work_shift_detail = new WorkShiftDetail();
                        $work_shift_detail->working_shift_id = $workShift->id;
                        $work_shift_detail->weekday_key = $short_day_key;
                        $work_shift_detail->weekday = $dayOfWeek;
                        $work_shift_detail->is_weekend = $bool;
                        if(!$bool) {
                            $work_shift_detail->start_time = $request->start_time;
                            $work_shift_detail->end_time = $request->end_time;
                        }

                        $work_shift_detail->save();
                    }
                }

                DB::commit();
            }

            \LogActivity::addToLog('Work shift Updated');

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error. '.$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WorkShift $workShift)
    {
        $model = $workShift->delete();
        if($model){
            $onlySoftDeleted = WorkShift::onlyTrashed()->count();
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
        $models = WorkShift::onlyTrashed()->get();
        $title = 'All Trashed Records';
        return view('admin.work_shifts.trashed-index', compact('models', 'title'));
    }
    public function restore($id)
    {
        WorkShift::onlyTrashed()->where('id', $id)->restore();
        return redirect()->back()->with('message', 'Record Restored Successfully.');
    }
}
