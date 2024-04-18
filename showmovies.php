<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies</title>
    
</head>
<body>
    <table>
        <form method="post" action="start.php">
            <button type="submit" name="start">Home</button>
        </form>
        <form method="post" action="start.php">
            <button type="submit" name="start">Back</button>
        </form>
    </table>
    <br>
        <form method="get" action="">
            <input type="text" name="search" placeholder="Search by title">
            <input type="text" name="genre" placeholder="Search by genre">
            <input type="text" name="director" placeholder="Search by director">
            <input type="text" name="releasedate" placeholder="Search by release date">
        <button type="submit">Search</button>
        </form>

    <table class="movieform" border="1">
    <tr>
        <th>FilmID</th>
        <th>Title</th>
        <th>Poster</th>
        <th>Rating</th>
        <th>Director</th>
        <th>Genre</th>
        <th>Release Date</th>
        <th>Description</th>
        <th>Video URL</th>
        <th>Action</th>
    </tr>

<?php
session_start();

include 'dbConnectionsEnOperaties.php';

$sql = "SELECT 
            Film.FilmID, 
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
            Regisseur ON Film.RegisseurID = Regisseur.RegisseurID";

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
        $VideoURL = $row['VideoURL'];
        $Poster = $row['Poster'];
        $Rating = $row['Beoordeling'];

        echo '<tr>'.
        '<td>' . $FilmID . '</td>'.
        '<td>' . $Title . '</td>'.
        '<td><img src="' . $Poster . '" alt="Movie Poster" style="width: 100px;"></td>'.
        '<td>' . $Rating . ' / 10</td>'.
        '<td>' . $Director . '</td>'.
        '<td>' . $Genre. '</td>'.
        '<td>' . $ReleaseDate . '</td>'.
        '<td>' . $Description . '</td>'.
        '<td>' . $VideoURL . '</td>'.
        '<td>'.
            '<a href="filmupdate.php?updateid='.$FilmID.'"><button class="upd">Update</button></a>'.
            '<a href="filmdelete.php?deleteid='.$FilmID.'"><button class="del">Delete</button></a>'.
        '</td>'.
        '</tr>';
    }
    $result->free();
}
else{
    echo "Error:".$conn->error;
}
?>
</table>
</body>
</html>
