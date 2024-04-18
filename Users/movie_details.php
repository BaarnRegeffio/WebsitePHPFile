<?php
include '../dbConnectionsEnOperaties.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieScope</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="Movie_details.css">
    <!-- Google Fonts Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,400;1,500&display=swap">
</head>
<body>
    <header class="Mega">
        <nav class="navbar">
            <a href="../Index1.html" class="logo">MovieScope<span></span></a>
            <hr>
            <ul class="menu-links">
                </div>
                <li><a class="men" href="../AboutUs.html">About us</a></li>
                <li><a class="men" href="../Login.php">Login</a></li>
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
    
    
    <!-- MovieList -->
    <div class="Popular">
        <?php
        $movieDetails = '';
        if(isset($_GET['id'])) {
            $FilmID = $_GET['id'];

            $sql = "SELECT 
                        Film.Titel, 
                        Film.ReleaseDatum,
                        Film.Beschrijving,
                        Film.Poster,
                        Film.Beoordeling,
                        Film.VideoURL,
                        Genre.GenreNaam,
                        Regisseur.RegisseurNaam
                    FROM 
                        Film
                    JOIN
                        Genre ON Film.GenreID = Genre.GenreID
                    JOIN 
                        Regisseur ON Film.RegisseurID = Regisseur.RegisseurID
                    WHERE 
                        Film.FilmID = $FilmID";

            $result = $conn->query($sql);

            if($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                // Store movie details in PHP variables
                $movieTitle = $row['Titel'];
                $releaseDate = $row['ReleaseDatum'];
                $description = $row['Beschrijving'];
                $posterPath = $row['Poster'];
                $rating = $row['Beoordeling'];
                $videoURL = $row['VideoURL'];
                $genre = $row['GenreNaam'];
                $director = $row['RegisseurNaam'];

                // Prepare the HTML structure
                $movieDetails .= "<h2 class='MovieTitle'>{$movieTitle}</h2>";
                $movieDetails .= "<div style='display: flex; align-items: center;'>"; // Start of flex container
                $movieDetails .= "<img class='MoviePic' src='../{$posterPath}' alt='Movie Poster' style='max-width: 200px; margin-right: 20px;'>"; // Movie poster

                // Trailer
               
                $movieDetails .= "</div>"; // End of flex container
                $movieDetails .= "<p><strong>Rating:</strong> {$rating} / 10</p>";
                $movieDetails .= "<p><strong>Director:</strong> {$director}</p>";
                $movieDetails .= "<p><strong>Genre:</strong> {$genre}</p>";
                $movieDetails .= "<p><strong>Release Date:</strong> {$releaseDate}</p>";
                $movieDetails .= "<p><strong>Description:</strong> {$description}</p>";


                if (!empty($videoURL)) {
                    $movieDetails .= "<iframe width='560' height='315' class='TheMovies' src='{$videoURL}' frameborder='0' allowfullscreen></iframe>"; // Embedded video trailer
                } else {
                    $movieDetails .= "<p>No trailer available for this movie.</p>";
                }



                $result->free();
            } else {
                $movieDetails = "No movie found with ID: $FilmID";
            }
        } else {
            $movieDetails = "FilmID not provided";
        }

        $conn->close();
        ?>
    <div>
        <?php echo $movieDetails; ?>
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

