<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Directors</title>
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
    <table class="dirform" border="1">
    <tr>
        <th>DirectorID</th>
        <th>Director Name</th>
        <th>Total Movies</th>
        <th>Birth Date</th>
    </tr>
</body>
</html>
    
<?php
session_start();

include 'dbConnectionsEnOperaties.php';

$sql = "SELECT * FROM Regisseur";
$result = mysqli_query($conn, $sql);


if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $RegisseurID = $row['RegisseurID'];
        $RegisseurNaam = $row['RegisseurNaam'];
        $AantalFilms = $row['AantalFilms'];
        $GeboorteDatum = $row ['GeboorteDatum'];
        echo '<tr class="tblrcolor">
                <th scope="row">' . $RegisseurID . '</th>
                <td>' . $RegisseurNaam . '</td>
                <td>' . $AantalFilms . '</td>
                <td>' . $GeboorteDatum . '</td>
                <td>
                <a href="directorupdate.php?updateid='.$RegisseurID.'"><button class="upd">Update</button></a>
                <a href="directordelete.php?deleteid='.$RegisseurID.'"><button class="del">Delete</button></a>
                </td>
              </tr>';
    }
} else {
    echo "Error executing the query: " . mysqli_error($conn);
}
?>
