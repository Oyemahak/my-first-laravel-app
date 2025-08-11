@extends('layouts.app')

@section('content')
<h1 class="mb-3">Edit Course</h1>

<form method="POST" action="{{ route('courses.update', $course->id) }}" class="row g-3">
    @csrf @method('PUT')

    <div class="col-md-6">
        <label class="form-label">Name</label>
        <input class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $course->name) }}">
        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-12">
        <label class="form-label">Description</label>
        <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="4">{{ old('description', $course->description) }}</textarea>
        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    {{-- Optional: assign a Professor (one-to-one) --}}
    <div class="col-md-6">
        <label class="form-label">Professor (optional)</label>
        <select name="professor_id" class="form-select @error('professor_id') is-invalid @enderror">
            <option value="">— None —</option>
            @foreach($professors as $prof)
                <option value="{{ $prof->id }}" @selected(old('professor_id', $course->professor_id) == $prof->id)>
                    {{ $prof->fname ?? '' }} {{ $prof->lname ?? '' }}{{ isset($prof->name) ? $prof->name : '' }}
                </option>
            @endforeach
        </select>
        @error('professor_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-12">
        <button class="btn btn-primary">Update</button>
        <a class="btn btn-link" href="{{ route('courses.index') }}">Back</a>
    </div>
</form>
@endsection