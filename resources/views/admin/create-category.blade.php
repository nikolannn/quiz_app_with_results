<!DOCTYPE html>
<html>
<head>
    <title>Create Category</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 2rem;
        }

        .form-container {
            max-width: 500px;
            margin: auto;
        }

        label, input, button {
            display: block;
            width: 100%;
            margin-bottom: 1rem;
        }

        input {
            padding: 0.5rem;
        }

        button {
            background: #28a745;
            color: white;
            padding: 0.7rem;
            border: none;
            border-radius: 5px;
        }

        button:hover {
            background: #218838;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Add Category</h2>
        <form method="POST" action="{{ route('category.store') }}">
            @csrf
            <label>Category Name</label>
            <input type="text" name="name" required>
            <button type="submit">Save Category</button>
        </form>
    </div>
</body>
</html>
