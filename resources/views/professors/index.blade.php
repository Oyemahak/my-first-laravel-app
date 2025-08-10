@extends('layouts.app', ['title' => 'Professors'])

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h2">All Professors</h1>
    <a href="{{ route('professors.create') }}" class="btn btn-primary">Add Professor</a>
</div>

@if($professors->count())
    <div class="table-responsive bg-white shadow-sm rounded">
        <table class="table table-striped mb-0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th style="width:160px">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($professors as $prof)
                <tr>
                    <td>
                        <a href="{{ route('professors.show', $prof) }}">
                            {{ $prof->fname }} {{ $prof->lname }}
                        </a>
                    </td>
                    <td>{{ $prof->email }}</td>
                    <td>{{ $prof->department }}</td>
                    <td class="d-flex gap-2">
                        <a href="{{ route('professors.edit', $prof) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                        <form method="POST" action="{{ route('professors.destroy', $prof) }}">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this professor?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="alert alert-info">No professors yet.</div>
@endif

<div class="mt-3">
    <a href="{{ route('students.index') }}">Go to Students</a> ·
    <a href="{{ route('courses.index') }}">Go to Courses</a>
</div>
@endsection