<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name', 'School of Hard Codes') }}</title>

    {{-- Bootstrap (CDN) --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous"
    >

    {{-- Bootstrap Icons (CDN) --}}
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
    >

    {{-- Prevent navbar shift when switching pages --}}
    <style>
        html { scrollbar-gutter: stable; }
        .navbar-collapse { z-index: 1040; }
    </style>

    @stack('styles')
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand fw-semibold" href="{{ url('/') }}">
            <i class="bi bi-mortarboard"></i>
            {{ config('app.name', 'School of Hard Codes') }}
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
                aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="mainNav" class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('students*') ? 'active' : '' }}"
                       href="{{ route('students.index') }}">
                        <i class="bi bi-people"></i> Students
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('courses*') ? 'active' : '' }}"
                       href="{{ route('courses.index') }}">
                        <i class="bi bi-journal-bookmark"></i> Courses
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('professors*') ? 'active' : '' }}"
                       href="{{ route('professors.index') }}">
                        <i class="bi bi-person-badge"></i> Professors
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="container">

    {{-- Success flash --}}
    @if(session('success'))
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <i class="bi bi-check-circle me-2"></i>
            <div>{{ session('success') }}</div>
        </div>
    @endif

    {{-- Global validation fallback --}}
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <strong>There were some problems with your submission:</strong>
            <ul class="mb-0">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')
</main>

<footer class="text-center mt-5 mb-4 text-muted small">
    &copy; {{ date('Y') }} {{ config('app.name', 'School of Hard Codes') }} —
    Where even our bugs get an A+
</footer>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"
></script>
@stack('scripts')
</body>
</html>