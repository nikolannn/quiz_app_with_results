<!DOCTYPE html>
<html>
<head>
    <title>Quiz Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
    <div class="container">
        <h2>Your Score</h2>
        <div class="alert alert-info">
            You scored <strong>{{ $score }}</strong> out of <strong>{{ $total }}</strong>
        </div>
        <a href="{{ route('quiz.index') }}" class="btn btn-primary">Take Another Quiz</a>
    </div>
</body>
</html>
