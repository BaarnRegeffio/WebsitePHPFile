<?php
session_start();

include 'dbConnectionsEnOperaties.php';

$GebruikersID = $_GET['updateid'];
$sql = "SELECT * FROM Gebruikers WHERE GebruikersID=$GebruikersID";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$GebruikersNaam = $row['GebruikersNaam'];
$EmailAdres = $row['EmailAdres'];
$Rol_ID = $row['Rol_ID'];

if(isset($_POST['submit'])) {
    $GebruikersNaam = $_POST['GebruikersNaam'];
    $EmailAdres = $_POST['EmailAdres'];
    $Rol_ID = $_POST['Rol_ID'];

    $sql = "UPDATE Gebruikers SET GebruikersNaam='$GebruikersNaam', EmailAdres='$EmailAdres', Rol_ID='$Rol_ID' WHERE GebruikersID=$GebruikersID";
    $result = mysqli_query($conn, $sql);
    if($result) {
        header("Location: showusers.php");
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
    <title>Update Users</title>
</head>
<body>
    <table>
        <form method="post" action="start.php">
            <button type="submit" name="start">Home</button>
        </form>
        <form method="post" action="showusers.php">
            <button type="submit" name="start">Back</button>
        </form>
    </table>
    <br>
    <form method="POST">
        <table>
            <tr>
                <td><label for="GebruikersNaam">GebruikersNaam:</label></td>
                <td><input type="text" placeholder="GebruikersNaam" name="GebruikersNaam" value="<?php echo $GebruikersNaam; ?>"></td>
            </tr>
            <tr>
                <td><label for="EmailAdres">Email Adres:</label></td>
                <td><input type="text" placeholder="Email Adres" name="EmailAdres" value="<?php echo $EmailAdres; ?>"></td>
            </tr>
            <tr>
                <td><label for="Rol_ID">Rol ID:</label></td>
                <td><input type="text" placeholder="Rol_ID" name="Rol_ID" value="<?php echo $Rol_ID; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="submit">Update</button></td>
            </tr>
        </table>
    </form>
</body>
</html>
