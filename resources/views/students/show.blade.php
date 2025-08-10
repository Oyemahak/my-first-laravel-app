@extends('layouts.app')

@section('content')
<h1 class="mb-3">{{ $student->fname }} {{ $student->lname }}</h1>

<ul class="list-group mb-3">
    <li class="list-group-item"><strong>Email:</strong> {{ $student->email }}</li>
</ul>

<a class="btn btn-secondary" href="{{ route('students.index') }}">Back</a>
@endsection