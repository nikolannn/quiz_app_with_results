@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Quiz: {{ $category->name }}</h2>

    <form action="{{ route('quiz.submit') }}" method="POST">
        @csrf

        @foreach ($questions as $index => $question)
            <div class="card mb-4">
                <div class="card-header">
                    <strong>Question {{ $index + 1 }}:</strong> {{ $question->question }}
                </div>
                <div class="card-body">
                    @foreach ($question->options as $option)
                        <div class="form-check">
                            <input 
                                class="form-check-input" 
                                type="radio" 
                                name="answers[{{ $question->id }}]" 
                                value="{{ $option->id }}" 
                                id="q{{ $question->id }}o{{ $option->id }}"
                                required
                            >
                            <label class="form-check-label" for="q{{ $question->id }}o{{ $option->id }}">
                                {{ $option->option_text }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit Quiz</button>
        </div>
    </form>
</div>
@endsection
