<?php
session_start();
include '../dbConnectionsEnOperaties.php';
$sql = "SELECT 
            Film.FilmID, 
            Film.Titel, 
            Film.ReleaseDatum,
            Film.Beschrijving,
            Film.Poster,
            Film.Beoordeling,
            Genre.GenreNaam,
            Regisseur.RegisseurNaam
        FROM 
            Film
        JOIN
            Genre ON Film.GenreID = Genre.GenreID
        JOIN 
            Regisseur ON Film.RegisseurID = Regisseur.RegisseurID";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FilmScope</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="Movies.css">
    <!-- Google Fonts Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,400;1,500&display=swap">
</head>
<body>
    <header class="Mega">
        <nav class="navbar">
            <a href="Index1.html" class="logo">MovieScope<span></span></a>
            <hr>
            <ul class="menu-links">
                </div>
                <li><a class="men" href="AboutUs.html">About us</a></li>
                <li><a class="men" href="../Index1.html">Logout</a></li>
                

            </ul>
        </nav>
    </header>

    <div class="banner">
        <div class="Searchbar">
        <form method="get" action="">
            <input type="text" name="search" placeholder="Search by title">
            <input type="text" name="genre" placeholder="Search by genre">
            <input type="text" name="director" placeholder="Search by director">
            <input type="text" name="releasedate" placeholder="Search by release date">
            <div class="Search-container">
                <button type="submit">Search</button>
            </div>
            <div class="Icons">
                <i class="fas fa-search"></i>
            </div>
            </form>
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
                    <img src="../pexel pic/Gangster.jpg" alt="Gangster" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="../pexel pic/Joker.jpg" alt="Joker" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="../pexel pic/The BATMAN (pc wallpaper).jpg" alt="BATMAN" class="d-block w-100">
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

            <?php

if(isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql .= " WHERE Film.Titel LIKE '%$search%'";
}

if(isset($_GET['genre'])) {
    $genreFilter = $_GET['genre'];
    if(isset($_GET['search'])) {
        $sql .= " AND";
    } else {
        $sql .= " WHERE";
    }
    $sql .= " Genre.GenreNaam LIKE '%$genreFilter%'";
}

if(isset($_GET['director'])) {
    $directorFilter = $_GET['director'];
    if(isset($_GET['search']) || isset($_GET['genre'])) {
        $sql .= " AND";
    } else {
        $sql .= " WHERE";
    }
    $sql .= " Regisseur.RegisseurNaam LIKE '%$directorFilter%'";
}

if(isset($_GET['releasedate'])) {
    $releasedateFilter = $_GET['releasedate'];
    if(isset($_GET['search']) || isset($_GET['genre']) || isset($_GET['director'])) {
        $sql .= " AND";
    } else {
        $sql .= " WHERE";
    }
    $sql .= " Film.ReleaseDatum LIKE '%$releasedateFilter%'";
}

$result = $conn->query($sql);

if($result){
    while ($row = $result->fetch_assoc()){
        $FilmID = $row['FilmID'];
        $Title = $row['Titel'];
        $Director = $row['RegisseurNaam'];
        $Genre = $row['GenreNaam'];
        $ReleaseDate = $row['ReleaseDatum'];
        $Description = $row['Beschrijving'];
        $Poster = $row['Poster'];
        $Rating = $row['Beoordeling'];

        echo '<tr>'.
        '<td><a href="movie_details.php?id=' . $FilmID . '"><img src="../' . $Poster . '" alt="Movie Poster" img class="popular-movie"></a></td>'.
        '</tr>';
    }
    $result->free();
}
else{
    echo "Error:".$conn->error;
}
?>
        </table>


    </div>

    <div class="ShowBanner"></div>

    <!-- MovieList 2.0 -->
    <div class="Upcoming">
        <h3>UpcomingList</h3>
        <img class="Upcoming-List" src="../MoviePosters/Madea Boo .jpg" alt="Madea Boo">
        <img class="Upcoming-List" src="../MoviePosters/Harry Potter.jpg"  alt="Harry potter">
        <img class="Upcoming-List" src="../MoviePosters/Megan.jpg"  alt="Megan Leetings Nexus">
        <img class="Upcoming-List" src="../MoviePosters/Now You See Me 2.jpg" alt="Now you see me 2">
    </div>

    <div class="Bootstrap-footer">
        <footer class="bg-body-tertiary text-center">
            <!-- Grid container -->
            <div class="container p-4 pb-0">
                <!-- Section: Social media -->
                <section class="mb-4">
                    <!-- Social media icons -->
                    <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #3b5998;" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>
                    <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #55acee;" href="#!" role="button"><i class="fab fa-twitter"></i></a>
                    <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #dd4b39;" href="#!" role="button"><i class="fab fa-google"></i></a>
                    <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #ac2bac;" href="#!" role="button"><i class="fab fa-instagram"></i></a>
                    <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #0082ca;" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>
                    <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #333333;" href="https://github.com/BaarnRegeffio/WebsitePHPFile" role="button"><i class="fab fa-github"></i></a>
                </section>
                <!-- Section: Social media -->
            </div>
            <!-- Grid container -->
            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.09);">
                © 2024 Copyright:
                <a class="text-body">Regeffio Baarn & Neal Soempeno</a>
            </div>
            <!-- Copyright -->
        </footer>
    </div>
</body>
</html>

