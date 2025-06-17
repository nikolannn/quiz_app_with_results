<h1 style="text-align: center;">Quiz</h1>

<form id="quiz-form" method="POST" action="/quiz" style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px;">
    @csrf
    @foreach($questions as $question)
        <div>
            <p><strong>{{ $question->text }}</strong></p>
            @foreach($question->choices as $choice)
                <label>
                    <input type="radio" name="answers[{{ $question->id }}]" value="{{ $choice->id }}" required>
                    {{ $choice->text }}
                </label><br>
            @endforeach
        </div>
        <hr>
    @endforeach
    <div style="text-align: center;">
        <button type="submit" style="background-color: green; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
            Submit
        </button>
    </div>
</form>

<div id="results" style="text-align: center; margin-top: 20px;"></div>
