<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Student;
use App\Models\SchoolClass;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with(['student', 'class'])->get();
        return view('admin.attendance.index', compact('attendances'));
    }

    public function create()
    {
        $students = Student::all();
        $classes = SchoolClass::all();
        return view('admin.attendance.create', compact('students', 'classes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'class_id' => 'required|exists:school_classes,id',
            'date' => 'required|date',
            'status' => 'required|in:present,absent,late',
        ]);

        Attendance::create($validated);

        return redirect()->route('admin.attendance.index')
            ->with('success', 'Attendance record created successfully.');
    }

    public function show(Attendance $attendance)
    {
        return view('admin.attendance.show', compact('attendance'));
    }

    public function edit(Attendance $attendance)
    {
        $students = Student::all();
        $classes = SchoolClass::all();
        return view('admin.attendance.edit', compact('attendance', 'students', 'classes'));
    }

    public function update(Request $request, Attendance $attendance)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'class_id' => 'required|exists:school_classes,id',
            'date' => 'required|date',
            'status' => 'required|in:present,absent,late',
        ]);

        $attendance->update($validated);

        return redirect()->route('admin.attendance.index')
            ->with('success', 'Attendance record updated successfully.');
    }

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();

        return redirect()->route('admin.attendance.index')
            ->with('success', 'Attendance record deleted successfully.');
    }
}