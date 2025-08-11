@extends('layouts.app')

@section('content')
<h1 class="mb-3">{{ $student->fname }} {{ $student->lname }}</h1>

<ul class="list-group mb-4">
    <li class="list-group-item"><strong>Email:</strong> {{ $student->email }}</li>
</ul>

<h5 class="mb-2">Enrolled Courses</h5>
@if ($student->courses->isNotEmpty())
    <ul class="list-group mb-4">
        @foreach($student->courses as $course)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $course->name }}
                <a class="btn btn-sm btn-outline-primary" href="{{ route('courses.show', $course->id) }}">View</a>
            </li>
        @endforeach
    </ul>
@else
    <div class="alert alert-light border">Not enrolled in any courses.</div>
@endif

<a class="btn btn-secondary" href="{{ route('students.index') }}">Back</a>
@endsection