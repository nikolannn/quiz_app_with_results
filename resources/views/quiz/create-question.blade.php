<!DOCTYPE html>
<html>
<head>
    <title>Add New Question</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light py-5">
    <div class="container">
        <h2 class="mb-4">Add a New Question</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('quiz.store') }}">
            @csrf

            <div class="mb-3">
                <label for="category" class="form-label">Select Category</label>
                <select name="category_id" id="category" class="form-select" required>
                    <option value="" disabled selected>-- Choose a category --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="question_text" class="form-label">Question</label>
                <input type="text" name="question_text" id="question_text" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Options</label>
                @for($i = 0; $i < 4; $i++)
                    <div class="input-group mb-2">
                        <span class="input-group-text">Option {{ $i + 1 }}</span>
                        <input type="text" name="options[]" class="form-control" required>
                        <div class="input-group-text">
                            <input type="radio" name="correct_option" value="{{ $i }}" required>
                            <span class="ms-2">Correct</span>
                        </div>
                    </div>
                @endfor
            </div>

            <button type="submit" class="btn btn-primary">Save Question</button>
        </form>
    </div>
</body>
</html>
