<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quiz Result</title>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #141e30, #243b55);
            color: #ffffff;
            margin: 0;
            padding: 0;
        }

        .main-container {
            max-width: 900px;
            margin: 3rem auto;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        h1 {
            text-align: center;
            margin-bottom: 2rem;
            font-size: 2.5rem;
            color: #00c9ff;
        }

        .score-container {
            text-align: center;
            margin-bottom: 2rem;
        }

        .score-display {
            font-size: 4rem;
            font-weight: bold;
            color: #38ef7d;
            animation: pop 0.8s ease;
        }

        .score-text {
            font-size: 1.2rem;
            margin-top: 0.5rem;
            color: #ccc;
        }

        @keyframes pop {
            0% {
                transform: scale(0);
                opacity: 0;
            }
            50% {
                transform: scale(1.2);
                opacity: 1;
            }
            100% {
                transform: scale(1);
            }
        }

        .review-title {
            color: #00c9ff;
            margin-top: 2rem;
            margin-bottom: 1rem;
            font-size: 1.8rem;
        }

        .question-block {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1rem;
        }

        .question-text {
            font-weight: bold;
        }

        .option {
            margin-left: 1rem;
            line-height: 1.6;
        }

        .correct {
            color: #38ef7d;
        }

        .wrong {
            color: #ff416c;
        }

        .neutral {
            color: #aaa;
        }

        .icon {
            margin-right: 0.5rem;
        }

        a.back-link {
            display: inline-block;
            margin-top: 1.5rem;
            color: #00c9ff;
            text-decoration: none;
        }

        a.back-link:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>
    <div class="main-container">
        <h1>Quiz Results</h1>

        <div class="score-container">
            <div class="score-display">{{ $score }}/{{ $total }}</div>
            <div class="score-text">You answered {{ $score }} out of {{ $total }} questions correctly.</div>
            
        </div>

        @if(isset($questions) && isset($userAnswers))
            <div>
                <h2 class="review-title">Review Your Answers</h2>

                @foreach($questions as $index => $question)
                    @php
                        $correctOption = $question->options->firstWhere('is_correct', true);
                        $selectedOptionId = $userAnswers[$question->id] ?? null;
                    @endphp

                    <div class="question-block">
                        <p class="question-text">Q{{ $index + 1 }}: {{ $question->question }}</p>
                        <ul class="list-unstyled">
                            <ul class="list-unstyled">
    @foreach($question->options as $option)
        <li class="option
            @if($option->is_correct)
                correct
            @elseif($option->id == ($userAnswers[$question->id] ?? null))
                wrong
            @else
                neutral
            @endif
        ">
            @if($option->is_correct)
                <i class="fas fa-check-circle icon"></i>
            @elseif($option->id == ($userAnswers[$question->id] ?? null))
                <i class="fas fa-times-circle icon"></i>
            @else
                <i class="far fa-circle icon"></i>
            @endif
            {{ $option->option_text }}
        </li>
    @endforeach
</ul>
                        </ul>
                    </div>
                @endforeach
            </div>
        @endif

        <div style="text-align: center;">
            <a class="back-link" href="{{ route('quiz.index') }}"><i class="fas fa-arrow-left"></i> Back to Quiz</a>
        </div>
    </div>
</body>
</html>