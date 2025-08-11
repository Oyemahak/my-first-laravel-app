@extends('layouts.app')

@section('content')
<h1 class="mb-3">All Courses</h1>

<a class="btn btn-primary btn-sm mb-3" href="{{ route('courses.create') }}">Add Course</a>

@if($courses->count())
    <table class="table table-bordered align-middle">
        <thead>
            <tr>
                <th>Name</th>
                <th>Professor</th>
                <th>Description</th>
                <th style="width: 200px;">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($courses as $c)
            <tr>
                <td><a href="{{ route('courses.show', $c->id) }}">{{ $c->name }}</a></td>
                <td>
                    @if($c->professor)
                        {{ $c->professor->name ?? ($c->professor->fname.' '.$c->professor->lname) }}
                    @else
                        —
                    @endif
                </td>
                <td>{{ $c->description }}</td>
                <td>
                    <a class="btn btn-outline-secondary btn-sm" href="{{ route('courses.edit', $c->id) }}">Edit</a>
                    <form class="d-inline" method="POST" action="{{ route('courses.destroy', $c->id) }}">
                        @csrf @method('DELETE')
                        <button class="btn btn-outline-danger btn-sm" type="submit"
                                onclick="return confirm('Delete this course?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <div class="alert alert-info">No courses yet.</div>
@endif

<a class="btn btn-link" href="{{ route('students.index') }}">Go to Students</a>
@endsection