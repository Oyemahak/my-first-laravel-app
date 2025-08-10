@extends('layouts.app', ['title' => 'Add Professor'])

@section('content')
<h1 class="h2 mb-3">Add Professor</h1>

<form method="POST" action="{{ route('professors.store') }}" class="card p-3 shadow-sm">
    @csrf

    <div class="row g-3">
        <div class="col-md-6">
            <label class="form-label">First Name</label>
            <input name="fname" class="form-control" value="{{ old('fname') }}">
            @error('fname') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-6">
            <label class="form-label">Last Name</label>
            <input name="lname" class="form-control" value="{{ old('lname') }}">
            @error('lname') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-6">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
            @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-6">
            <label class="form-label">Department</label>
            <input name="department" class="form-control" value="{{ old('department') }}">
            @error('department') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>
    </div>

    <div class="mt-3 d-flex gap-2">
        <button class="btn btn-primary">Save</button>
        <a href="{{ route('professors.index') }}" class="btn btn-outline-secondary">Cancel</a>
    </div>
</form>
@endsection