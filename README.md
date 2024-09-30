
##### Hi, I'm Vyshnav! 👋


# Laravel Ajax Quiz
Laravel 9 and php 8.0 : Ajax Laravel Quiz app with user authentication - Trivia Api 


## Features

- #### Login And Registration:
  - User Can Register with Username, Password & Email.
  - User Can Login with Password & Email.
- #### Quiz:
  - Using Trivia Api For Getting Questions
  - Loding random Categories From Api.
  - Each category loads questions.
  - have time limit for answering.
  - if time limit ends or completed, result page shows result page
  - result page have score, percentage.. 


## Installation

Install product_crud 

```bash
  git clone 
  cd quiz
  cp .env.eample .env //change connection credentials on .env
  composer Install
  php artisan migrate
  php artisan serve
```
API Sample
```bash
  {
"category": "music",
"id": "5f9f1b9b0e1b9c0017a5f1a5",
"tags": [
"france",
"geography",
"capital_cities",
"cities"
],
"difficulty": "easy",
"regions": [
"string"
],
"isNiche": true,
"question": {
"text": "What is the capital of France?"
},
"correctAnswer": "Paris",
"incorrectAnswers": [
"London",
"Berlin",
"Brussels"
],
"type": "text_choice"
}
```
Api Refference Link:
https://the-trivia-api.com/docs/    
## Technologies  Used
  - laravel 9
  - Boostrap 5.0
  - PHP 8
  - Ajax
  - Trivia Api 
## License

[MIT](https://choosealicense.com/licenses/mit/)


## 🔗 Links
[![portfolio](https://img.shields.io/badge/my_portfolio-000?style=for-the-badge&logo=ko-fi&logoColor=white)](https://vyshnav.web.app/)
[![linkedin](https://img.shields.io/badge/linkedin-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/vyshnav-alppara/)


