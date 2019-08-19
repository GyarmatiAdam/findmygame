<?php require_once 'navbar.php';?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body id="bdy">

	<!-- Main Body -->
<header>
  <div class="overlay"></div>
  <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
    <source src="video/5 second.mp4" type="video/mp4">
  </video>
  <div class="container h-100">
    <div class="d-flex h-100 text-center align-items-center">
      <div class="w-100 text-white">
        <h1 class="display-3"><marquee>Welcome to our final Project</marquee></h1>
        <p class="lead mb-0">Team D: Denis, Tanja, Adam, David</p>
      </div>
    </div>
  </div>
</header>

<div class="container">
  <div class="card-deck">
    <div class="card mt-4 shadow-lg">
      <img class="card-img-top" src="https://www.muenchen.de/media/va-2017/tollwood-2017/teaser/tollwood-2017-hp-01.jpg" alt="Bologna">
      <div class="card-body">
        <h4 class="card-title">Upcoming Events</h4>
        <h6 class="card-subtitle mb-2">Look at the upcoming Events! Meet up with your Friends and go to some Events!</h6>
        <a href="events.php" class="card-link btn btn-danger">See Events</a>
      </div>
    </div>
    <div class="card mt-4 shadow-lg">
      <img class="card-img-top" src="https://quanticfoundry.com/wp-content/uploads/2016/07/photodune-7236629-friends-playing-video-games-1600.jpg" alt="Oslo">
      <div class="card-body">
        <h4 class="card-title">Newly Created Groups</h4>
        <h6 class="card-subtitle mb-2">People have created some Groups! Look at them and if you want to you can join them.</h6>
        <a href="groups.php" class="card-link btn btn-danger">See Group</a>
      </div>
    </div>
    <div class="card mt-4 shadow-lg">
      <img class="card-img-top" src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/madrid.jpg" alt="Madrid">
      <div class="card-body">
        <h4 class="card-title">Categories</h4>
        <h6 class="card-subtitle mb-2">These are some Categories that we offer for your Group.</h6>
        <a href="categories.php" class="card-link btn btn-danger">See Categories</a>
      </div>
    </div>
  </div>
</div>

<footer>
  
</footer>

</body>
</html>