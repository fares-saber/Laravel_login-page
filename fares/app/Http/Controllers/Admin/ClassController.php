<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolClass;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $classes = SchoolClass::with('teacher')->get();
        return view('admin.classes.index', compact('classes'));
    }

    public function create()
    {
        $teachers = Teacher::all();
        return view('admin.classes.create', compact('teachers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'class_name' => 'required|string|max:255',
            'teacher_id' => 'required|exists:teachers,id',
        ]);

        SchoolClass::create($validated);

        return redirect()->route('admin.classes.index')
            ->with('success', 'Class created successfully.');
    }

    public function show(SchoolClass $class)
    {
        return view('admin.classes.show', compact('class'));
    }

    public function edit(SchoolClass $class)
    {
        $teachers = Teacher::all();
        return view('admin.classes.edit', compact('class', 'teachers'));
    }

    public function update(Request $request, SchoolClass $class)
    {
        $validated = $request->validate([
            'class_name' => 'required|string|max:255',
            'teacher_id' => 'required|exists:teachers,id',
        ]);

        $class->update($validated);

        return redirect()->route('admin.classes.index')
            ->with('success', 'Class updated successfully.');
    }

    public function destroy(SchoolClass $class)
    {
        $class->delete();

        return redirect()->route('admin.classes.index')
            ->with('success', 'Class deleted successfully.');
    }
}