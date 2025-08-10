@extends('layouts.app')

@section('content')
<h1 class="mb-3">{{ $course->name }}</h1>
<p class="lead">{{ $course->description }}</p>
<a class="btn btn-secondary" href="{{ route('courses.index') }}">Back</a>
@endsection