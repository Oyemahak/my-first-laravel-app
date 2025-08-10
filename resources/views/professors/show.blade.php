@extends('layouts.app', ['title' => 'Professor Details'])

@section('content')
<h1 class="h2 mb-3">{{ $professor->fname }} {{ $professor->lname }}</h1>

<div class="card p-3 shadow-sm">
    <p class="mb-1"><strong>Email:</strong> {{ $professor->email }}</p>
    <p class="mb-0"><strong>Department:</strong> {{ $professor->department }}</p>
</div>

<div class="mt-3 d-flex gap-2">
    <a href="{{ route('professors.edit', $professor) }}" class="btn btn-outline-secondary">Edit</a>
    <form method="POST" action="{{ route('professors.destroy', $professor) }}">
        @csrf @method('DELETE')
        <button class="btn btn-outline-danger" onclick="return confirm('Delete this professor?')">Delete</button>
    </form>
    <a href="{{ route('professors.index') }}" class="btn btn-link">Back</a>
</div>
@endsection