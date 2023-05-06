<?php

namespace App\Http\Controllers\Admin;

use App\Models\WorkShift;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorkShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.work_shifts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        \LogActivity::addToLog('New Work Shift Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(WorkShift $workShift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WorkShift $workShift)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WorkShift $workShift)
    {
        //
        \LogActivity::addToLog('New Work Shift Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WorkShift $workShift)
    {
        //
    }
}
