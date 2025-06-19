<!DOCTYPE html>
<html>
<head>
    <title>Create Question</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 2rem;
        }

        .form-container {
            max-width: 700px;
            margin: auto;
        }

        label, input, select, button {
            display: block;
            width: 100%;
            margin-bottom: 1rem;
        }

        input, select {
            padding: 0.5rem;
        }

        .options {
            margin-bottom: 1rem;
        }

        button {
            background: #17a2b8;
            color: white;
            padding: 0.7rem;
            border: none;
            border-radius: 5px;
        }

        button:hover {
            background: #138496;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Add Question</h2>
        <form method="POST" action="{{ route('question.store') }}">
            @csrf

            <label>Question</label>
            <input type="text" name="question" required>

            <label>Category</label>
            <select name="category_id" required>
                <option value="">-- Select Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <div class="options">
                @for($i = 0; $i < 4; $i++)
                    <label>Option {{ $i + 1 }}</label>
                    <input type="text" name="options[]" required>
                    <input type="radio" name="correct_option" value="{{ $i }}" required> Mark as Correct
                    <br><br>
                @endfor
            </div>

            <button type="submit">Save Question</button>
        </form>
    </div>
</body>
</html>
