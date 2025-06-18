@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Question</h2>

    @if (session('success'))
    <div class="alert alert-success d-flex justify-content-between align-items-center">
        <span>{{ session('success') }}</span>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary mt-3">Go to Admin Dashboard</a>
    </div>
@endif

    <form method="POST" action="{{ route('questions.store') }}">
        @csrf

        <div class="mb-3">
            <label for="category_id" class="form-label">Select Category</label>
            <<select name="category_id" class="form-control">
    @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
</select>

            </select>
        </div>

        <div class="mb-3">
            <label for="question" class="form-label">Question</label>
            <input type="text" name="question" id="question" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Options</label>
            @for ($i = 0; $i < 4; $i++)
                <div class="input-group mb-2">
                    <span class="input-group-text">Option {{ $i + 1 }}</span>
                    <input type="text" name="options[]" class="form-control" required>
                    <div class="input-group-text">
                        <input type="radio" name="correct_answer" value="{{ $i }}" required>
                        <label class="ms-1">Correct</label>
                    </div>
                </div>
            @endfor
        </div>

        <button type="submit" class="btn btn-primary">Add Question</button>
    </form>
    
</div>
@endsection
