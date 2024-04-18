<?php
session_start();

include 'dbConnectionsEnOperaties.php';

if(isset($_POST['submit'])) {

    $RegisseurNaam = $_POST['RegisseurNaam'];
    $AantalFilms = $_POST['AantalFilms'];
    $GeboorteDatum = $_POST['GeboorteDatum'];
    $sql = "INSERT INTO Regisseur (RegisseurNaam, AantalFilms, GeboorteDatum) VALUES ('$RegisseurNaam', '$AantalFilms', '$GeboorteDatum')";
    $result = mysqli_query($conn,$sql);
    if($result){
        header("Location: showdirectors.php");
    }else{
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
    <title>Add Directors</title>
</head>
<body>
    <h1>Add Directors</h1>
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
                <td><input type="text" placeholder="Regisseur Naam" name="RegisseurNaam"></td>
            </tr>
            <tr>
                <td><label for="AantalFilms">Aantal Films:</label></td>
                <td><input type="number" placeholder="Aantal Films" name="AantalFilms"></td>
            </tr>
            <tr>
                <td><label for="GeboorteDatum">Geboorte Datum:</label></td>
                <td><input type="date" placeholder="Geboorte Datum" name="GeboorteDatum"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="submit">Add</button></td>
            </tr>
        </form>
    </table>
</body>
</html>
