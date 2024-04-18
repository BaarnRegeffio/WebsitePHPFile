<?php
session_start();

include 'dbConnectionsEnOperaties.php';

if(isset($_POST['submit'])) {

    $GenreNaam = $_POST['GenreNaam'];

    $sql = "INSERT INTO Genre (GenreNaam) VALUES ('$GenreNaam')";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Location: showgenres.php");
    } else {
        die(mysqli_error($conn));
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Genre</title>
</head>
<body>
    <h1>Add Genre</h1>
    <table>
        <form method="post" action="start.php">
            <button type="submit" name="start">Home</button>
        </form>
        <form method="post" action="showgenres.php">
            <button type="submit" name="start">Back</button>
        </form>
    </table>
    <br>
    <form method="POST">
        <input type="text" placeholder="Genre Naam" name="GenreNaam">
        <button type="submit" name="submit">Add</button>
    </form>
</body>
</html>
