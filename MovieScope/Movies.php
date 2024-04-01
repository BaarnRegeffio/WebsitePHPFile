<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <title>FilmScope</title>
    <link rel="stylesheet" href="Movies.css" />
    <!--Google Fonts Icons-->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,400;1,500&display=swap"
      rel="stylesheet"


    />
  </head>

  <body>
    <header class="Mega">
      <nav class="navbar">
        <a href="Index1.html" class="logo">FilmScope<span></span></a>
        <hr>
        <ul class="menu-links">
          
          <div class="dropdown"><li><a href="#">Genre</a></li>
            <div class="dropdown-content">
              <a href="#">Action</a>
              <a href="#">Horror</a>
              <a href="#">Fantasy</a>
              <a href="#">Comedy</a>
              <a href="#">Drama</a>
            </div>
          </div>

          <li><a class="men" href="AboutUs.html">About us</a></li>
          <li><a class="men"    href="Login.html">Login</a></li>
          
        </ul>
      </nav>


    



    </header>
  
    <div class="banner">
 
      <div class="Searchbar">
      <input type="text" placeholder="Search . ." name="Search">
      <div class="Search-container">
      <button type="submit">Search</i></button>
    </div>
    
   <div class="Icons">
        <i class="fa-solid fa-magnifying-glass"></i>
      </div>
    </div>
    </div>
   
    
    <div class="bootstrap-container">

      <!-- Carousel -->
    <div id="demo" class="carousel slide" data-bs-ride="carousel">
    
      <!-- Indicators/dots -->
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
      </div>
    
      <!-- The slideshow/carousel -->
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="pexel pic/Gangster.jpg" alt="Gangster" class="d-block w-100">
        </div>
        <div class="carousel-item">
          <img src="pexel pic/Joker.jpg" alt="Joker" class="d-block w-100">
        </div>
        <div class="carousel-item">
          <img src="pexel pic/The BATMAN (pc wallpaper).jpg" alt="BATMAN" class="d-block w-100">
        </div>
      </div>
    
      <!-- Left and right controls/icons -->
      <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>
    
    </div>
    
    
    


<!-- MovieList -->
<div class="Popular">
  <h3>Popular List</h3>
 <a href="#"><img class="popular-movie" src="MoviePosters/The Batman (1).jpg"  alt="The Batman"></a>
  <img class="popular-movie" src="MoviePosters/Avengers.jpg"  alt="Avengers">
  <img class="popular-movie" src="MoviePosters/Marvel's Black Panther Wakanda Forever Review.jpg"  alt="Black Panther">
  <img class="popular-movie" src="MoviePosters/No Time To Die Full Movie Free Online.jpg"  alt="No Time To Die Full Movie">
  <img class="popular-movie" src="MoviePosters/Interstellar.jpg"  alt="Interstellar">
  <img class="popular-movie" src="MoviePosters/Oppenheimer (2023).jpg" alt="Oppenheimer">
   

</div>





</body>
</html>
