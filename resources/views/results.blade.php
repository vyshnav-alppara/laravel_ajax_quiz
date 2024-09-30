@extends('layout')
@include('partials.nav')
@section('content')
<div class="container mt-5">
    <h2 class="text-center">Quiz Results</h2>
    <div class="row mt-4">
        <div class="col-6 text-start">
            <h3 class="text-success" id="scoreDisplay"></h3>
        </div>
        <div class="col-6 text-end">
            <h4 class="text-success" id="resultCategoryDisplay"></h4>
        </div>
    </div>
    <div id="resultsContainer"></div>
    <div class="text-center mt-4 ">
        <a href="{{ url('/category') }}" class="btn btn-dark">Take Quiz Again</a>
    </div>
</div>

<script>
$(document).ready(function() {
    const results = JSON.parse(localStorage.getItem('quizResults'));
    console.log(results);
    const correctAnswers = results.correctAnswers;
    const userAnswers = results.answers;

    let score = 0;
    let resultsHtml = '';

    userAnswers.forEach((answer, index) => {
        const decodedAnswer = decodeURIComponent(answer);
        const decodedCorrectAnswer = decodeURIComponent(correctAnswers[index]);
        const isCorrect = decodedAnswer === decodedCorrectAnswer;

        if (isCorrect) score++;
        resultsHtml += `
        <div class="card mt-3">
            <div class="card-footer border-0">
                <h5>Question ${index + 1}</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <h6>${results.questions[index]}</h6>
                        <p class="text-danger">Your answer: ${decodedAnswer}</p>
                        <p class="text-success">Correct answer: ${decodedCorrectAnswer}</p>
                    </div>
                    <div class="col-4 text-end align-content-center mr-5">
                        <h3 class="${isCorrect ? 'text-success' : 'text-danger'}">${isCorrect ? 'Correct!' : 'Incorrect!'}</h3>
                    </div>
                </div>
            </div>
        </div>
        `;
    });

    const totalQuestions = userAnswers.length;
    const percentage = (score / totalQuestions) * 100;

    let resultCategory;
    if (percentage > 60) {
        resultCategory = 'Winner!';
    } else if (percentage >= 40) {
        resultCategory = 'Better!';
    } else {
        resultCategory = 'Failed!';
    }

    $('#resultsContainer').html(resultsHtml);
    $('#scoreDisplay').text(`Your score: ${score} / ${totalQuestions}`);
    $('#resultCategoryDisplay').text(`${resultCategory} (${percentage.toFixed(2)}%)`);

    localStorage.removeItem('quizResults');
});
</script>

@endsection