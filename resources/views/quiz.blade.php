@extends('layout')
@include('partials.nav')

@section('content')
<style>
.step {
    display: none;
}

.active-step {
    display: block;
}

.card {
    margin: 10px;
}

.option-button {
    width: 100%;
    height: 60px;
}

.option-button.active {
    background-color: #212529;
    color: white;
}
</style>
<div class="container mt-5">
    <div class="text-end text-danger mt-4" id="timer"></div>
    <h2 class="text-center mb-4">Quiz - {{ $category }}</h2>
    <div id="quizContainer"></div>
    <div class="text-end mt-4">
        <button id="resetButton" class="btn btn-dark">Reset</button>
        <button id="nextButton" class="btn btn-dark">Next</button>
        <button id="submitQuiz" class="btn btn-success" style="display:none;">Submit Quiz</button>
    </div>
</div>

<script>
let timer;
let timeLeft = 30;
let currentStep = 0;
let answers = [];

$(document).ready(function() {
    const category = "{{ $category }}";
    const apiUrl = `https://the-trivia-api.com/api/questions?limit=5&categories=${encodeURIComponent(category)}`;

    $.getJSON(apiUrl, function(data) {
        if (!Array.isArray(data) || data.length === 0) {
            $('#quizContainer').html('<p>No questions available for this category.</p>');
            return;
        }

        createQuiz(data);
        startTimer();
    }).fail(function() {
        $('#quizContainer').html('<p>Failed to fetch questions.</p>');
    });

    function createQuiz(questions) {
        questions.forEach((question, index) => {
            const options = [question.correctAnswer, ...question.incorrectAnswers];
            options.sort(() => Math.random() - 0.5); 

            const questionDiv = `
            <div class="step ${index === 0 ? 'active-step' : ''}" data-correct="${encodeURIComponent(question.correctAnswer)}">
                <div class="card">
                    <div class="card-body">
                        <div class="mt-2 mb-5">
                            <h5>${index + 1}. ${question.question}</h5>
                        </div>
                        <div class="row w-50">
                            ${options.map((option) => `
                                <div class="col-6 mb-3">
                                    <button class="btn btn-outline-dark option-button" 
                                            data-value="${encodeURIComponent(option)}" 
                                            onclick="selectOption(this, '${encodeURIComponent(option)}', ${index})">
                                        ${option}
                                    </button>
                                </div>
                            `).join('')}
                        </div>
                    </div>
                </div>
            </div>`;
            $('#quizContainer').append(questionDiv);
        });
    }

    window.selectOption = function(button, selectedOption, questionIndex) {

        $(`.step`).eq(questionIndex).find('.option-button').removeClass('active');

        $(button).addClass('active');
        answers[questionIndex] = selectedOption;
    };

    function startTimer() {
        timer = setInterval(function() {
            if (timeLeft <= 0) {
                clearInterval(timer);
                const questions = $('#quizContainer .step');
                questions.each(function(index) {
                    const selectedButton = $(this).find('.option-button.active');
                    if (selectedButton.length) {
                        answers[index] = selectedButton.data('value');
                    } else {
                        answers[index] = 'Not answered';
                    }
                });
                $('#quizContainer').html('<p>Time is up! Submitting your answers...</p>');
                submitQuiz(questions);
            } else {
                $('#timer').text(`Time left: ${timeLeft} seconds`);
            }
            timeLeft--;
        }, 1000);
    }

    $('#nextButton').click(function() {
        if (answers[currentStep]) {
            currentStep++;
            if (currentStep < $('.step').length) {
                $('.step').removeClass('active-step').eq(currentStep).addClass('active-step');
            }
            if (currentStep === $('.step').length - 1) {
                $(this).hide();
                $('#submitQuiz').show();
            }
        } else {
            alert("Please select an answer!");
        }
    });

    $('#submitQuiz').click(function() {
        const questions = $('#quizContainer .step');
        submitQuiz(questions);
    });

    $('#resetButton').click(function() {
        window.location.href = 'category';
    });

    function submitQuiz(questions) {
        clearInterval(timer);
        const correctAnswers = [];
        const questionsArray = [];
        
        questions.each(function(index) {
            const selectedOption = answers[index] || 'Not answered'; 
            correctAnswers[index] = decodeURIComponent($(this).data('correct'));
            questionsArray[index] = $(this).find('h5').text(); 
        });
        
        localStorage.setItem('quizResults', JSON.stringify({ answers, correctAnswers, questions: questionsArray }));
        window.location.href = 'results'; 
    }
});
</script>
@include('partials.footer')
@endsection