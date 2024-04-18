<?php
session_start();

include 'dbConnectionsEnOperaties.php';

$GenreID = $_GET['updateid'];
$sql = "SELECT * FROM Genre WHERE GenreID=$GenreID";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$GenreNaam = $row['GenreNaam'];

if(isset($_POST['submit'])) {
    $GenreNaam = $_POST['GenreNaam'];

    $sql = "UPDATE Genre SET GenreNaam='$GenreNaam' WHERE GenreID=$GenreID";
    $result = mysqli_query($conn, $sql);
    if($result) {
        header("Location: showgenres.php");
        exit();
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
    <title>Update Genre</title>
</head>
<body>
    <table>
        <form method="post" action="start.php">
            <button type="submit" name="start">Home</button>
        </form>
        <form method="post" action="showgenres.php">
            <button type="submit" name="start">Back</button>
        </form>
    </table>
    <br>
    <table>
        <form method="POST">
            <tr>
                <td><label for="GenreNaam">Genre Naam:</label></td>
                <td><input type="text" placeholder="Genre Naam" name="GenreNaam" value="<?php echo $GenreNaam; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="submit">Update</button></td>
            </tr>
        </form>
    </table>
</body>
</html>
