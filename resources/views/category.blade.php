@extends('layout')
@include('partials.nav')
@section('content')
<style>
    .card {
        height: 150px;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f8f9fa;
        border: 1px solid #ddd;
        border-radius: 0.5rem;
        margin: 5px;
    }
</style>
<div class="container mt-5">
    <div class="text-center mb-5">
        <h2>QUIZ CATEGORY</h2>
    </div>
    <div class="owl-carousel owl-theme" id="carousel">
    </div>
</div>
<script>
    $(document).ready(function() {
        const apiUrl = 'https://the-trivia-api.com/api/questions?limit=50';
        let apiData = [];
        
        $.getJSON(apiUrl, function(data) {
            if (Array.isArray(data) && data.length > 0) {
                localStorage.setItem('apiData', JSON.stringify(data));
                createCarousel(data);
            } else {
                console.error("Invalid data format received from the API.");
            }
        }).fail(function() {
            console.error("Failed to fetch data from the API");
        });

        function createCarousel(data) {
            const uniqueCategories = [...new Set(data.map(q => q.category))];
            const cardsPerSlide = 6;
            const slides = [];

            for (let i = 0; i < uniqueCategories.length; i += cardsPerSlide) {
                const categoriesToDisplay = uniqueCategories.slice(i, i + cardsPerSlide);
                const slide = $('<div class="item"><div class="row"></div></div>');
                const row = slide.find('.row');

                categoriesToDisplay.forEach(category => {
                    const encodedCategory = encodeURIComponent(category);
                    const cardDiv = `
                        <div class="col-4">
                            <div class="card" onclick="handleCardClick('${encodedCategory}')">
                                <h5>${category}</h5> <!-- Show only the category -->
                            </div>
                        </div>
                    `;
                    row.append(cardDiv);
                });

                slides.push(slide);
            }

            slides.forEach(slide => {
                $('#carousel').append(slide);
            });

            $("#carousel").owlCarousel({
                items: 1, 
                loop: false,
                nav: false,
                dots: true,
            });
        }
    });

    function handleCardClick(category) {

        window.location.href = `/quiz?category=${category}`;
    }
</script>

@include('partials.footer')

@endsection