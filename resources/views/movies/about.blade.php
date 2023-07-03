<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title> An About Us Page</title>

  <link rel="stylesheet" href="{{ asset('front/Aboutus.css') }}">
</head>
<body>
	<header>
		<h1>Movie Recommendation System</h1>
	</header>
  <section class="about-us">
	
    <div class="about">
      <img src="{{asset('front/image/img.jpeg')}}" class="pic">
      <div class="text">
        
          <p>Welcome to our movie recommendation system! We are a team of movie enthusiasts who want to help people find great movies to watch. Our system uses machine learning algorithms to analyze your movie preferences and recommend movies that we think you will love. We take into account factors such as genre, actors, directors, and ratings to provide personalized recommendations. Our goal is to make it easy for you to discover new movies and find ones that you will enjoy. We hope that our system will help you save time and find your next favorite movie!. If you have any questions or feedback, please don't hesitate to contact us. We are always looking for ways to improve our system and make it even better.
		</p>
		<br/>
		<button onclick="goBack()">Go Back</button>
		<script>
			function goBack() {
			  window.history.back();
			}
		</script>
      </div>
	  
    </div>
  </section>
</body>
</html>