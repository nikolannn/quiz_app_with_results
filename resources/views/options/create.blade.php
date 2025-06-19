@extends('layouts.app')

@section('title', 'Create Option')

@section('content')
    <div class="card">
        <div class="card-header">Add New Option</div>
        <div class="card-body">
            <form method="POST" action="{{ route('options.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="question_id" class="form-label">Select Question</label>
                    <select class="form-select @error('question_id') is-invalid @enderror" name="question_id" required>
                        <option disabled selected>-- Choose Question --</option>
                        @foreach($questions as $question)
                            <option value="{{ $question->id }}">{{ $question->question }}</option>
                        @endforeach
                    </select>
                    @error('question_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="option_text" class="form-label">Option Text</label>
                    <input type="text" class="form-control @error('option_text') is-invalid @enderror" name="option_text" required>
                    @error('option_text')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" name="is_correct" value="1" id="is_correct">
                    <label class="form-check-label" for="is_correct">Correct Answer</label>
                </div>

                <button type="submit" class="btn btn-success">Add Option</button>
            </form>
        </div>
    </div>
@endsection
