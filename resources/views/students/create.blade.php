@extends('layouts.app')

@section('content')
<h1 class="mb-3">Add Student</h1>

<form method="POST" action="{{ route('students.store') }}" class="row g-3">
    @csrf

    <div class="col-md-4">
        <label class="form-label">First Name</label>
        <input class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}">
        @error('fname') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Last Name</label>
        <input class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}">
        @error('lname') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-12">
        <button class="btn btn-primary">Save</button>
        <a class="btn btn-link" href="{{ route('students.index') }}">Cancel</a>
    </div>
</form>
@endsection