<h1>Quiz</h1>
<form id="quiz-form" method="POST" action="/quiz">
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

<div id="results"></div>
