<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class StudentController extends Controller
{
    public function index(): View
    {
        $students = Student::with('courses')->latest()->get();
        return view('students.index', compact('students'));
    }

    public function create(): View
    {
        $courses = Course::orderBy('name')->get();
        return view('students.create', compact('courses'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'fname'        => ['required','string','max:100'],
            'lname'        => ['required','string','max:100'],
            'email'        => ['required','email','max:150','unique:students,email'],
            'course_ids'   => ['nullable','array'],
            'course_ids.*' => ['integer','exists:courses,id'],
        ]);

        $student = Student::create($data);
        $student->courses()->sync($request->input('course_ids', []));

        return redirect()->route('students.index')->with('success', 'Student added.');
    }

    public function show(Student $student): View
    {
        $student->load('courses');
        return view('students.show', compact('student'));
    }

    public function edit(Student $student): View
    {
        $courses = Course::orderBy('name')->get();
        return view('students.edit', compact('student', 'courses'));
    }

    public function update(Request $request, Student $student): RedirectResponse
    {
        $data = $request->validate([
            'fname'        => ['required','string','max:100'],
            'lname'        => ['required','string','max:100'],
            'email'        => ['required','email','max:150','unique:students,email,'.$student->id],
            'course_ids'   => ['nullable','array'],
            'course_ids.*' => ['integer','exists:courses,id'],
        ]);

        $student->update($data);
        $student->courses()->sync($request->input('course_ids', []));

        return redirect()->route('students.index')->with('success', 'Student updated.');
    }

    public function destroy(Student $student): RedirectResponse
    {
        $student->courses()->detach();
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted.');
    }
}