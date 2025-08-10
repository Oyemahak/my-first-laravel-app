@extends('layouts.app')

@section('content')
<h1 class="mb-3">Edit Student</h1>

<form method="POST" action="{{ route('students.update', $student->id) }}" class="row g-3">
    @csrf @method('PUT')

    <div class="col-md-4">
        <label class="form-label">First Name</label>
        <input class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname', $student->fname) }}">
        @error('fname') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Last Name</label>
        <input class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname', $student->lname) }}">
        @error('lname') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $student->email) }}">
        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-12">
        <button class="btn btn-primary">Update</button>
        <a class="btn btn-link" href="{{ route('students.index') }}">Back</a>
    </div>
</form>
@endsection