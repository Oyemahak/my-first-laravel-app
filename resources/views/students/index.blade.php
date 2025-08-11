@extends('layouts.app')

@section('content')
<h1 class="mb-3">All Students</h1>

<a class="btn btn-primary btn-sm mb-3" href="{{ route('students.create') }}">Add Student</a>

@if($students->count())
    <table class="table table-bordered align-middle">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Courses</th>
                <th style="width: 220px;">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($students as $s)
            <tr>
                <td>
                    <a href="{{ route('students.show', $s->id) }}">
                        {{ $s->fname }} {{ $s->lname }}
                    </a>
                </td>
                <td>{{ $s->email }}</td>
                <td>
                    {{ $s->courses->pluck('name')->join(', ') ?: '—' }}
                </td>
                <td>
                    <a class="btn btn-outline-secondary btn-sm" href="{{ route('students.edit', $s->id) }}">Edit</a>
                    <form class="d-inline" method="POST" action="{{ route('students.destroy', $s->id) }}">
                        @csrf @method('DELETE')
                        <button class="btn btn-outline-danger btn-sm" type="submit"
                                onclick="return confirm('Delete this student?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <div class="alert alert-info">No students yet.</div>
@endif
@endsection