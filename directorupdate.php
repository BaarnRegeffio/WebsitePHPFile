<?php
session_start();

include 'dbConnectionsEnOperaties.php';

$RegisseurID = $_GET['updateid'];
$sql = "SELECT * FROM Regisseur WHERE RegisseurID=$RegisseurID";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Current data
$RegisseurNaam = $row['RegisseurNaam'];
$AantalFilms = $row['AantalFilms'];
$GeboorteDatum = $row['GeboorteDatum'];

if(isset($_POST['submit'])) {
    // Update variables with posted data
    $RegisseurNaam = $_POST['RegisseurNaam'];
    $AantalFilms = $_POST['AantalFilms'];
    $GeboorteDatum = $_POST['GeboorteDatum'];

    $sql = "UPDATE Regisseur SET RegisseurNaam='$RegisseurNaam', AantalFilms='$AantalFilms', GeboorteDatum='$GeboorteDatum' WHERE RegisseurID=$RegisseurID";
    $result = mysqli_query($conn, $sql);
    if($result) {
        header("Location: showdirectors.php");
        exit();
    } else {
        die(mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Directors</title>
</head>
<body>
    <table>
        <form method="post" action="start.php">
            <button type="submit" name="start">Home</button>
        </form>
        <form method="post" action="showdirectors.php">
            <button type="submit" name="start">Back</button>
        </form>
    </table>
    <br>
    <table>
        <form method="POST">
            <tr>
                <td><label for="RegisseurNaam">Regisseur Naam:</label></td>
                <td><input type="text" placeholder="Regisseur Naam" name="RegisseurNaam" value="<?php echo $RegisseurNaam; ?>"></td>
            </tr>
            <tr>
                <td><label for="AantalFilms">Aantal Films:</label></td>
                <td><input type="number" placeholder="Aantal Films" name="AantalFilms" value="<?php echo $AantalFilms; ?>"></td>
            </tr>
            <tr>
                <td><label for="GeboorteDatum">Geboorte Datum:</label></td>
                <td><input type="date" placeholder="Geboorte Datum" name="GeboorteDatum" value="<?php echo $GeboorteDatum; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="submit">Update</button></td>
            </tr>
        </form>
    </table>
</body>
</html>
