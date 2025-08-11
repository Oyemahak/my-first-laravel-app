@extends('layouts.app', ['title' => 'Add Course'])

@section('content')
<div class="card shadow-sm">
    <div class="card-header">Add Course</div>

    <div class="card-body">
        <form method="POST" action="{{ route('courses.store') }}">
            @csrf

            <div class="row g-3">
                {{-- Course name --}}
                <div class="col-md-6">
                    <label class="form-label">Name</label>
                    <input
                        name="name"
                        value="{{ old('name') }}"
                        class="form-control @error('name') is-invalid @enderror"
                        placeholder="e.g., Intro to Web Development"
                    >
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- Optional Professor --}}
                <div class="col-md-6">
                    <label class="form-label">Professor <span class="text-muted">(optional)</span></label>
                    <select
                        name="professor_id"
                        class="form-select @error('professor_id') is-invalid @enderror"
                    >
                        <option value="">— None —</option>
                        @foreach ($professors as $prof)
                            <option value="{{ $prof->id }}" @selected(old('professor_id') == $prof->id)>
                                {{ $prof->fname }} {{ $prof->lname }} — {{ $prof->department }}
                            </option>
                        @endforeach
                    </select>
                    @error('professor_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- Description --}}
                <div class="col-12">
                    <label class="form-label">Description</label>
                    <textarea
                        name="description"
                        rows="4"
                        class="form-control @error('description') is-invalid @enderror"
                        placeholder="Short summary students will see on the course page"
                    >{{ old('description') }}</textarea>
                    @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mt-3 d-flex gap-2">
                <button class="btn btn-primary">
                    Save
                </button>
                <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection