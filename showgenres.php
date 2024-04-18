<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genres</title>
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
    <table class="genreform" border="1">
    <tr>
        <th>GenreID</th>
        <th>Genre</th>
    </tr>
</body>
</html>

<?php
session_start();

include 'dbConnectionsEnOperaties.php';

$sql = "SELECT * FROM Genre";
$result = mysqli_query($conn, $sql);


if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $GenreID = $row['GenreID'];
        $GenreNaam = $row['GenreNaam'];
        echo '<tr class="tblrcolor">
                <th scope="row">' . $GenreID . '</th>
                <td>' . $GenreNaam . '</td>
                <td>
                <a href="genreupdate.php?updateid='.$GenreID.'"><button class="upd">Update</button></a>
                <a href="genredelete.php?deleteid='.$GenreID.'"><button class="del">Delete</button></a>
                </td>
              </tr>';
    }
} else {
    echo "Error executing the query: " . mysqli_error($conn);
}
?>
