@extends('layouts.app')

@section('content')
<h1 class="mb-3">{{ $course->name }}</h1>

@if($course->professor)
    <p class="mb-2"><strong>Professor:</strong>
        {{ $course->professor->name ?? ($course->professor->fname.' '.$course->professor->lname) }}
    </p>
@endif

<p class="lead">{{ $course->description }}</p>

<h5 class="mt-4">Enrolled Students</h5>
@if ($course->students->isNotEmpty())
    <ul class="list-group mb-4">
        @foreach($course->students as $s)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $s->fname }} {{ $s->lname }}
                <a class="btn btn-sm btn-outline-primary" href="{{ route('students.show', $s->id) }}">View</a>
            </li>
        @endforeach
    </ul>
@else
    <div class="alert alert-light border">No students enrolled.</div>
@endif

<a class="btn btn-secondary" href="{{ route('courses.index') }}">Back</a>
@endsection