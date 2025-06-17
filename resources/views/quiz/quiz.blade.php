<!DOCTYPE html>
<html>
<head>
    <title>{{ $category->name }} Quiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-flip {
            perspective: 1000px;
        }
        .flip-inner {
            position: relative;
            width: 100%;
            transition: transform 0.6s;
            transform-style: preserve-3d;
        }
        .card-flip:hover .flip-inner {
            transform: rotateY(180deg);
        }
        .card-front, .card-back {
            backface-visibility: hidden;
            position: absolute;
            top: 0; left: 0;
            width: 100%;
            height: 100%;
            padding: 1rem;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
        .card-back {
            transform: rotateY(180deg);
            background: #e3f2fd;
        }
    </style>
</head>
<body class="bg-light p-4">
    <div class="container">
        <h2 class="mb-4">{{ $category->name }} Quiz</h2>
        <form action="{{ route('quiz.submit') }}" method="POST">
            @csrf

            @foreach($questions as $question)
                <div class="mb-4">
                    <div class="card-flip mb-2">
                        <div class="flip-inner">
                            <div class="card-front bg-white p-3">
                                <strong>{{ $loop->iteration }}. {{ $question->text }}</strong>
                                @foreach($question->options as $option)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" value="{{ $option->id }}" required>
                                        <label class="form-check-label">{{ $option->text }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="card-back d-flex align-items-center justify-content-center">
                                <strong>
                                    Correct Answer: 
                                    {{ $question->options->where('is_correct', true)->first()->text }}
                                </strong>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <button type="submit" class="btn btn-success">Submit Quiz</button>
        </form>
    </div>
</body>
</html>
