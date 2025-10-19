<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Student;
use App\Models\SchoolClass;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $classes = SchoolClass::all();
        return view('admin.reports.index', compact('classes'));
    }

    public function generate(Request $request)
    {
        $request->validate([
            'class_id' => 'required|exists:school_classes,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $class = SchoolClass::with(['students', 'attendances'])->find($request->class_id);
        $attendances = Attendance::where('class_id', $request->class_id)
            ->whereBetween('date', [$request->start_date, $request->end_date])
            ->get();

        return view('admin.reports.generate', compact('class', 'attendances'));
    }
}