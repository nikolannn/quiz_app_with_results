@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold" style="color: var(--text-primary);">Admin Dashboard</h1>
        <p class="lead" style="color: var(--text-secondary);">Manage categories, questions, and quiz content</p>
        <a href="{{ route('home') }}" class="btn btn-outline-light btn-lg mt-3 back-btn">← Back to Homepage</a>
    </div>

    <div class="row g-4 justify-content-center">
        <!-- Category Management -->
        <div class="col-md-5">
            <div class="card glass-card">
                <div class="card-header border-bottom border-info text-info fw-bold fs-5">
                    Manage Categories
                </div>
                <div class="card-body">
                    <a href="{{ route('categories.create') }}" class="btn btn-info w-100 mb-3 action-btn">
                        ➕ Add New Category
                    </a>
                    <ul class="list-group">
                        @foreach($categories as $category)
                            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent text-light">
                                {{ $category->name }}
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Delete this category?');" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger action-btn">Delete</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Question Management -->
        <div class="col-md-6 mb-4">
    <div class="card h-100 shadow-sm" style="background: var(--card-bg); color: var(--text-primary); border: 1px solid var(--card-border); border-radius: 15px;">
        <div class="card-header d-flex justify-content-between align-items-center" style="background: var(--primary-gradient); color: white; border-top-left-radius: 15px; border-top-right-radius: 15px;">
            <span><i class="fas fa-question-circle me-2"></i> Manage Questions</span>
            <a href="{{ route('questions.create') }}" class="btn btn-light btn-sm">Add Question</a>
        </div>
        <div class="card-body" style="max-height: 400px; overflow-y: auto;">
            @if($questions->count())
                <ul class="list-group list-group-flush">
                    @foreach($questions as $question)
                        <li class="list-group-item d-flex justify-content-between align-items-center" style="background: transparent; color: var(--text-primary); border: none;">
                            <div style="max-width: 80%;">
                                <strong>{{ $question->question }}</strong><br>
                                <small class="text-muted">Category: {{ $question->category->name ?? 'N/A' }}</small>
                            </div>
                            <form action="{{ route('questions.destroy', $question->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this question?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger ms-2">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted">No questions available yet.</p>
            @endif
        </div>
    </div>
</div>


<style>
    .glass-card {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(20px);
        border-radius: 15px;
        color: var(--text-primary);
        transition: 0.3s ease-in-out;
    }

    .glass-card:hover {
        box-shadow: 0 0 20px rgba(0, 212, 255, 0.2);
        border-color: var(--accent-color);
    }

    .action-btn {
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .action-btn:hover {
        opacity: 0.9;
        transform: scale(1.03);
        box-shadow: 0 6px 12px rgba(255, 255, 255, 0.15);
    }

    .back-btn {
        border-radius: 30px;
        padding: 10px 25px;
        border: 1px solid var(--text-secondary);
        transition: 0.3s;
    }

    .back-btn:hover {
        background: var(--accent-color);
        color: black !important;
        box-shadow: 0 8px 16px rgba(0, 212, 255, 0.3);
        border-color: var(--accent-color);
    }

    .list-group-item {
        background-color: transparent;
        border-color: rgba(255, 255, 255, 0.1);
    }
</style>
@endsection
