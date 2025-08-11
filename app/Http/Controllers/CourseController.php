<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CourseController extends Controller
{
    public function index(): View
    {
        $courses = Course::with('professor')->latest()->get();
        return view('courses.index', compact('courses'));
    }

    public function create(): View
    {
        // Only professors not already assigned to a course
        $professors = Professor::whereDoesntHave('course')
            ->orderBy('lname')->orderBy('fname')
            ->get();

        return view('courses.create', compact('professors'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name'         => ['required', 'string', 'max:150', 'unique:courses,name'],
            'description'  => ['nullable', 'string'],
            'professor_id' => [
                'nullable',
                'integer',
                'exists:professors,id',
                Rule::unique('courses', 'professor_id')->whereNotNull('professor_id'),
            ],
        ]);

        Course::create($data);

        return redirect()->route('courses.index')->with('success', 'Course created.');
    }

    public function show(Course $course): View
    {
        $course->load('professor', 'students');
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course): View
    {
        // Allow current professor + any unassigned professor
        $professors = Professor::whereDoesntHave('course')
            ->orWhere('id', $course->professor_id)
            ->orderBy('lname')->orderBy('fname')
            ->get();

        return view('courses.edit', compact('course', 'professors'));
    }

    public function update(Request $request, Course $course): RedirectResponse
    {
        $data = $request->validate([
            'name'         => ['required', 'string', 'max:150', 'unique:courses,name,' . $course->id],
            'description'  => ['nullable', 'string'],
            'professor_id' => [
                'nullable',
                'integer',
                'exists:professors,id',
                Rule::unique('courses', 'professor_id')
                    ->ignore($course->id)
                    ->whereNotNull('professor_id'),
            ],
        ]);

        $course->update($data);

        return redirect()->route('courses.index')->with('success', 'Course updated.');
    }

    public function destroy(Course $course): RedirectResponse
    {
        $course->students()->detach();
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course deleted.');
    }
}