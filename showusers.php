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
        <th>GebruikersID</th>
        <th>GebruikersNaam</th>
        <th>Email Adres</th>
        <th>Rol_ID</th>
    </tr>
</body>
</html>

<?php
session_start();

include 'dbConnectionsEnOperaties.php';

$sql = "SELECT GebruikersID, GebruikersNaam, EmailAdres, Rol_ID FROM Gebruikers";
$result = mysqli_query($conn, $sql);


if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $GebruikersID = $row['GebruikersID'];
        $GebruikersNaam = $row['GebruikersNaam'];
        $EmailAdres= $row['EmailAdres'];
        $Rol_ID = $row['Rol_ID'];
        echo '<tr class="tblrcolor">
                <th scope="row">' . $GebruikersID . '</th>
                <td>' . $GebruikersNaam . '</td>
                <td>' . $EmailAdres . '</td>
                <td>' . $Rol_ID . '</td>
                <td>
                <a href="usersupdate.php?updateid='.$GebruikersID.'"><button class="upd">Update</button></a>
                <a href="usersdelete.php?deleteid='.$GebruikersID.'"><button class="del">Delete</button></a>
                </td>
              </tr>';
    }
} else {
    echo "Error executing the query: " . mysqli_error($conn);
}
?>
