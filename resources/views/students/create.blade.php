@extends('layouts.app', ['title' => 'Add Student'])

@section('content')
<div class="card shadow-sm">
    <div class="card-header">Add Student</div>

    <div class="card-body">
        <form method="POST" action="{{ route('students.store') }}">
            @csrf

            <div class="row g-3">
                {{-- First / Last Name --}}
                <div class="col-md-6">
                    <label class="form-label">First Name</label>
                    <input
                        name="fname"
                        value="{{ old('fname') }}"
                        class="form-control @error('fname') is-invalid @enderror"
                        placeholder="e.g., Ada"
                    >
                    @error('fname') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Last Name</label>
                    <input
                        name="lname"
                        value="{{ old('lname') }}"
                        class="form-control @error('lname') is-invalid @enderror"
                        placeholder="e.g., Lovelace"
                    >
                    @error('lname') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- Email --}}
                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="form-control @error('email') is-invalid @enderror"
                        placeholder="student@example.com"
                    >
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- Many-to-many Courses --}}
                <div class="col-md-6">
                    <label class="form-label">Enroll in Courses</label>
                    <select
                        name="course_ids[]"
                        class="form-select @error('course_ids') is-invalid @enderror"
                        multiple
                        size="6"
                        aria-describedby="coursesHelp"
                    >
                        @foreach($courses as $course)
                            <option value="{{ $course->id }}"
                                @selected(collect(old('course_ids', []))->contains($course->id))>
                                {{ $course->name }}
                            </option>
                        @endforeach
                    </select>
                    <div id="coursesHelp" class="form-text">Hold Cmd/Ctrl to select multiple.</div>
                    @error('course_ids') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                    @error('course_ids.*') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mt-3 d-flex gap-2">
                <button class="btn btn-primary">Save</button>
                <a href="{{ route('students.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection