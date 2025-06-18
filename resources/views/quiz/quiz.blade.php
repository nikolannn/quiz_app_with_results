<!DOCTYPE html>
<html>
<head>
    <title>{{ $category->name }} Quiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --success-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            --dark-bg: #0f0f23;
            --card-bg: rgba(255, 255, 255, 0.05);
            --card-border: rgba(255, 255, 255, 0.1);
            --text-primary: #ffffff;
            --text-secondary: #a0a0a0;
            --accent-color: #00d4ff;
            --correct-color: #38ef7d;
            --hover-glow: rgba(0, 212, 255, 0.2);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: var(--dark-bg);
            background-image: 
                radial-gradient(circle at 20% 50%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 40% 80%, rgba(120, 219, 255, 0.3) 0%, transparent 50%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-primary);
            padding: 2rem 0;
        }

        .main-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 0 1rem 5rem 1rem;
            position: relative;
            z-index: 2;
        }

        .quiz-header {
            text-align: center;
            margin-bottom: 3rem;
            padding: 2rem;
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--card-border);
            border-radius: 20px;
            position: relative;
            overflow: hidden;
        }

        .quiz-title {
            font-size: 2.5rem;
            font-weight: 700;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
            position: relative;
            z-index: 1;
        }

        .quiz-subtitle {
            color: var(--text-secondary);
            font-size: 1.1rem;
            position: relative;
            z-index: 1;
        }

        .question-container {
            margin-bottom: 3rem;
        }
        .card-flip {
            perspective: 1000px;
            height: auto;
            min-height: 300px;
        }

        .flip-inner {
            position: relative;
            width: 100%;
             height: 100%;
            transform-style: preserve-3d;
            transition: transform 0.8s ease-in-out;
        }
        .card-front, .card-back {
            backface-visibility: hidden;
            position: absolute;
             top: 0;
            left: 0;
             width: 100%;
              min-height: 300px;
            padding: 2rem;
            border-radius: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
         .card-front {
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--card-border);
            transition: all 0.3s ease;
            z-index: 2;
        }

        .card-back {
            background: linear-gradient(135deg, rgba(56, 239, 125, 0.1) 0%, rgba(17, 153, 142, 0.1) 100%);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(56, 239, 125, 0.3);
            transform: rotateY(180deg);
             z-index: 1;
        }

        .correct-answer {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--correct-color);
            display: none; /* hide by default */
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .submit-container {
            text-align: center;
            margin-top: 3rem;
            padding: 2rem 0;
        }

        .submit-btn {
            background: var(--success-gradient);
            border: none;
            padding: 1rem 3rem;
            border-radius: 50px;
            color: white;
            font-weight: 700;
            font-size: 1.2rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 1rem;
            cursor: pointer;
            box-shadow: 0 10px 30px rgba(17, 153, 142, 0.3);
        }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="quiz-header">
            <h2 class="quiz-title">{{ $category->name }} Quiz</h2>
            <p class="quiz-subtitle">
                <i class="fas fa-info-circle"></i>
                Choose your best answer • Submit to reveal correct answers
            </p>
        </div>

        <form action="{{ route('quiz.submit') }}" method="POST">
            @csrf
             @foreach($questions as $question)
              <div class="question-container">
                    <div class="card-flip">
                        <div class="flip-inner">
                 <div class="card-front">
                                <div class="question-text">
                                    <span class="question-number">{{ $loop->iteration }}</span>
                                    {{ $question->text }}
                                </div>
                                <div class="options-container">
                                    @foreach($question->options as $option)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" value="{{ $option->id }}" required>
                                            <label class="form-check-label">{{ $option->text }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="card-back">
                                <div class="correct-answer">
                                    <i class="fas fa-check-circle"></i>
                                    <div>
                                        <div style="margin-bottom: 0.5rem;">Correct Answer:</div>
                                        <div style="font-size: 1.2rem;">
                                            {{ $question->options->where('is_correct', true)->first()->text }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
<div class="submit-container mt-5 mb-5">
                <button type="submit" class="submit-btn">
                    <i class="fas fa-paper-plane"></i>
                    Submit Quiz
                </button>
            </div>
        </form>
    </div>
</body>