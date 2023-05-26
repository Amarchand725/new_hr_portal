<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;

class AttendanceController extends Controller
{
    public function index()
    {
        return 'good';
    }
    public function discrepancies()
    {
        $this->authorize('discrepancy-list');
        $title = 'Discrepancies';
        $models = Announcement::paginate(10);
        return view('user.attendance.discrepancies', compact('title', 'models'));
    }
    public function show($id)
    {
        $model = Announcement::where('id', $id)->first();
        return (string) view('user.attendance.show_content', compact('model'));
    }
    public function dailyLog()
    {
        $this->authorize('dailylog-list');
        $title = 'Daily Log';
        $models = Announcement::paginate(10);
        return view('user.attendance.daily-log', compact('title', 'models'));
    }
}
