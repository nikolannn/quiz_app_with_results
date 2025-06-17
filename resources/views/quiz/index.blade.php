<!-- resources/views/quiz/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Choose a Quiz Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
    <div class="container">
        <h1 class="mb-4">Select a Quiz Category</h1>

        @if($categories->count())
            <ul class="list-group">
                @foreach($categories as $category)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $category->name }}
                        <a href="{{ route('quiz.start', $category->id) }}" class="btn btn-primary">Start Quiz</a>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No categories found.</p>
        @endif
    </div>
</body>
</html>
