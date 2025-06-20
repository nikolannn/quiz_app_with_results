@extends('layouts.app')



@section('content')
<div class="container py-5" style="max-width: 900px;">
    <div class="text-center mb-5">
        <h1 class="page-title">Welcome to the Quiz Application</h1>
        <p class="lead" style="color: var(--text-secondary); font-size: 1.25rem;">
            Test your knowledge across various categories!
        </p>
    </div>

    <div class="d-flex justify-content-center gap-3 mb-5 flex-wrap">
    <a href="{{ route('quiz.index') }}" class="btn btn-gradient btn-lg px-4 py-2 fw-semibold">
        Take a Quiz
    </a>

    @if(Auth::check() && Auth::user()->role === 'admin')
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-gradient btn-lg px-4 py-2 fw-semibold">
            Welcome, {{ Auth::user()->name }}
        </a>
    @else
        <a href="{{ route('admin.login') }}" class="btn btn-outline-gradient btn-lg px-4 py-2 fw-semibold">
            Admin Login
        </a>
    @endif
</div>

    {{-- <div class="d-flex justify-content-center gap-3 mb-5 flex-wrap">
    <a href="{{ route('quiz.index') }}" class="btn btn-gradient btn-lg px-4 py-2 fw-semibold">
        Take a Quiz
    </a>

    @if(Auth::check() && Auth::user()->role === 'admin')
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-gradient btn-lg px-4 py-2 fw-semibold">
            Welcome, {{ Auth::user()->name }}
        </a>
    @else
        <a href="{{ route('admin.login') }}" class="btn btn-outline-gradient btn-lg px-4 py-2 fw-semibold">
            Admin Dashboard
        </a>
    @endif
</div> --}}

    <div class="card bg-card-bg border border-card-border shadow-sm">
        <div class="card-header" style="background: var(--primary-gradient); color: white;">
            <h4 class="mb-0">What you can do</h4>
        <div class="card-body custom-card-body">
    <ul class="list-unstyled mb-0">
        <li class="mb-2">
            <span style="color: var(--accent-color); font-weight: 700; margin-right: 8px;">-></span>
            Choose quiz categories and start answering questions.
        </li>
        <li class="mb-2">
            <span style="color: var(--accent-color); font-weight: 700; margin-right: 8px;">-></span>
            View your score after completing the quiz.
        </li>
        <li class="mb-2">
            <span style="color: var(--accent-color); font-weight: 700; margin-right: 8px;">-></span>
            Admin can add categories, questions, and choices.
        </li>
    </ul>
</div>
</div>
@push('styles')
<style>
    :root {
    --card-bg: rgba(5, 4, 4, 0.05);
    --text-primary: #ffffff;
    --accent-color: #00d4ff;
}
    .btn-gradient {
        background: var(--primary-gradient);
        color: white;
        border: none;
        transition: background 0.3s ease;
    }
    .btn-gradient:hover,
    .btn-gradient:focus {
        background: var(--secondary-gradient);
        color: white;
        box-shadow: 0 0 12px var(--accent-color);
        outline: none;
    }

    .btn-outline-gradient {
        background: transparent;
        color: var(--accent-color);
        border: 2px solid var(--accent-color);
        transition: all 0.3s ease;
    }
    .btn-outline-gradient:hover,
    .btn-outline-gradient:focus {
        background: var(--accent-color);
        color: var(--dark-bg);
        border-color: var(--accent-color);
        box-shadow: 0 0 12px var(--accent-color);
        outline: none;

    }
</style>
@endpush
@endsection
