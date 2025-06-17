<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Quiz</h1>
        <form method="POST" action="/quiz">
            @csrf
            @foreach($questions as $question)
                <div>
                    <p>{{ $question->text }}</p>
                    @foreach($question->choices as $choice)
                        <label>
                            <input type="radio" name="answers[{{ $question->id }}]" value="{{ $choice->id }}" required>
                            {{ $choice->text }}
                        </label><br>
                    @endforeach
                </div>
                <hr>
            @endforeach
            <button type="submit">Submit</button>
        </form>

        <script>
                            document.getElementById('quiz-form').addEventListener('submit', async function(e) {
                                e.preventDefault();

                                const formData = new FormData(this);

                                const response = await fetch('/quiz', {
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    body: formData
                                });

                                if (response.ok) {
                                    const resultHtml = await response.text();
                                    document.getElementById('result').innerHTML = resultHtml;
                                } else {
                                    alert('Something went wrong!');
                                }
                            });
                            </script>

</body>
</html>