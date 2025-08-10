<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public function index()
    {
        $professors = Professor::latest()->get();
        return view('professors.index', compact('professors'));
    }

    public function create()
    {
        return view('professors.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'fname'       => ['required','string','max:100'],
            'lname'       => ['required','string','max:100'],
            'email'       => ['required','email','max:150','unique:professors,email'],
            'department'  => ['required','string','max:150'],
        ]);

        Professor::create($data);

        return redirect()->route('professors.index')->with('success', 'Professor added.');
    }

    public function show(Professor $professor)
    {
        return view('professors.show', compact('professor'));
    }

    public function edit(Professor $professor)
    {
        return view('professors.edit', compact('professor'));
    }

    public function update(Request $request, Professor $professor)
    {
        $data = $request->validate([
            'fname'       => ['required','string','max:100'],
            'lname'       => ['required','string','max:100'],
            'email'       => ['required','email','max:150','unique:professors,email,'.$professor->id],
            'department'  => ['required','string','max:150'],
        ]);

        $professor->update($data);

        return redirect()->route('professors.index')->with('success', 'Professor updated.');
    }

    public function destroy(Professor $professor)
    {
        $professor->delete();

        return redirect()->route('professors.index')->with('success', 'Professor deleted.');
    }
}