<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $category->name }} - Quiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #0f0f23;
            color: #fff;
            font-family: 'Segoe UI', sans-serif;
            padding: 2rem;
        }

        .quiz-container {
            max-width: 800px;
            margin: auto;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 0 20px rgba(0, 212, 255, 0.2);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 2rem;
            text-align: center;
            color: #00d4ff;
        }

        .question {
            margin-bottom: 2rem;
        }

        .question h5 {
            margin-bottom: 1rem;
        }

        .option {
            margin-bottom: 0.5rem;
        }

        .btn-submit {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 0.75rem 2rem;
            font-weight: bold;
            border-radius: 30px;
            color: white;
            display: block;
            margin: 2rem auto 0;
            transition: 0.3s ease;
        }

        .btn-submit:hover {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="quiz-container">
        <h1>{{ $category->name }} Quiz</h1>

        <form method="POST" action="{{ route('quiz.submit', $category->id) }}">
            @csrf

            @foreach ($questions as $question)
                <div class="question">
                    <h5>{{ $loop->iteration }}. {{ $question->text }}</h5>
                    @foreach ($question->options as $option)
                        <div class="form-check option">
                            <input class="form-check-input" type="radio" 
                                name="answers[{{ $question->id }}]" 
                                id="option{{ $option->id }}" 
                                value="{{ $option->id }}" required>
                            <label class="form-check-label" for="option{{ $option->id }}">
                                {{ $option->text }}
                            </label>
                        </div>
                    @endforeach
                </div>
            @endforeach

            <button type="submit" class="btn btn-submit">Submit Quiz</button>
        </form>
    </div>
</body>
</html>
