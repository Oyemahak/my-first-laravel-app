@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header">Edit Student</div>
  <div class="card-body">
    <form method="POST" action="{{ route('students.update', $student->id) }}">
      @csrf @method('PUT')

      <div class="mb-3">
        <label class="form-label">First Name</label>
        <input name="fname" value="{{ old('fname', $student->fname) }}" class="form-control">
        @error('fname') <div class="text-danger small">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label class="form-label">Last Name</label>
        <input name="lname" value="{{ old('lname', $student->lname) }}" class="form-control">
        @error('lname') <div class="text-danger small">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label class="form-label">Email</label>
        <input name="email" type="email" value="{{ old('email', $student->email) }}" class="form-control">
        @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label class="form-label">Enroll in Courses</label>
        @php $selected = old('course_ids', $student->courses->pluck('id')->all()); @endphp
        <select name="course_ids[]" class="form-select" multiple size="6">
          @foreach($courses as $course)
            <option value="{{ $course->id }}" @selected(in_array($course->id, $selected))>
              {{ $course->name }}
            </option>
          @endforeach
        </select>
        @error('course_ids') <div class="text-danger small">{{ $message }}</div> @enderror
        @error('course_ids.*') <div class="text-danger small">{{ $message }}</div> @enderror
      </div>

      <button class="btn btn-primary">Update</button>
      <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
  </div>
</div>
@endsection