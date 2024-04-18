<?php
session_start();

include 'dbConnectionsEnOperaties.php';

$FilmID = $_GET['updateid'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Titel = $_POST['titel'];
    $RegisseurID = $_POST['RegisseurID'];
    $GenreID = $_POST['GenreID'];
    $ReleaseDatum = $_POST['ReleaseDatum'];
    $Beschrijving = $_POST['Beschrijving'];
    $Beoordeling = $_POST['Beoordeling'];
    $VideoURL = $_POST['VideoURL'];

    if ($Beoordeling > 10) {
        $Beoordeling = 10;
    }

    // Check if a file is selected
    if(isset($_FILES['Poster']) && $_FILES['Poster']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['Poster']['tmp_name'];
        $fileName = $_FILES['Poster']['name'];
        $fileSize = $_FILES['Poster']['size'];
        $fileType = $_FILES['Poster']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $allowedExtensions = array("jpg", "jpeg", "png");
        if(in_array($fileExtension, $allowedExtensions)) {
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
            $uploadFileDir = './Poster/';
            $destPath = $uploadFileDir . $newFileName;
            if(move_uploaded_file($fileTmpPath, $destPath)) {
                $PosterPath = $destPath;
            } else {
                echo "Error uploading the file.";
            }
        } else {
            echo "Invalid file type. Allowed file types are JPG, JPEG, and PNG.";
        }
    }
        // Same JS function copied from addmovies.php
        function extractYouTubeID($VideoURL) {
            $queryString = parse_url($VideoURL, PHP_URL_QUERY);
            parse_str($queryString, $params);
            if(isset($params['v'])) {
                return $params['v'];
            } else {
                return false;
            }
        }
        if(strpos($VideoURL, 'youtube.com') !== false || strpos($VideoURL, 'youtu.be') !== false) {
            $VideoID = extractYouTubeID($VideoURL);
            if($VideoID) {
                $VideoURL = "https://www.youtube.com/embed/$VideoID";
            }
        }
        
    // Used the ? here because error with VideoURL
    $sql = "UPDATE film SET 
                Titel=?, 
                RegisseurID=?, 
                GenreID=?, 
                ReleaseDatum=?, 
                Beschrijving=?, 
                Beoordeling=?, 
                VideoURL=? ";

    // Poster update if a new poster is uploaded
    if(isset($PosterPath)) {
        $sql .= ", Poster=? ";
    }

    $sql .= "WHERE FilmID=?";

    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("siissssi", $Titel, $RegisseurID, $GenreID, $ReleaseDatum, $Beschrijving, $Beoordeling, $VideoURL, $FilmID); // Adjust binding for VideoURL

    // Bind the Poster parameter
    if(isset($PosterPath)) {
        $stmt->bind_param("ssiissi", $PosterPath, $Titel, $RegisseurID, $GenreID, $ReleaseDatum, $Beschrijving, $Beoordeling, $FilmID);
    }
    $result = $stmt->execute();

    // Update Check
    if ($result) {
        header("Location: showmovies.php");
    } else {
        die($stmt->error);
    }
}

$sql = "SELECT * FROM film WHERE FilmID=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $FilmID);
$stmt->execute();
$result = $stmt->get_result();

$row = $result->fetch_assoc();
$Titel = $row['Titel'];
$RegisseurID = $row['RegisseurID'];
$GenreID = $row['GenreID'];
$ReleaseDatum = $row['ReleaseDatum'];
$Beschrijving = $row['Beschrijving'];
$Poster = $row['Poster'];
$Beoordeling = $row['Beoordeling'];
$VideoURL = $row['VideoURL'];

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Films</title>
</head>
<body>
    <table>
        <form method="post" action="start.php">
            <button type="submit" name="start">Home</button>
        </form>
        <form method="post" action="showmovies.php">
            <button type="submit" name="start">Back</button>
        </form>
    </table>
    <br>
    <h1>Update Movie</h1>
    <table>
        <form method="POST" enctype="multipart/form-data">
            <tr>
                <td><label for="titel">Titel:</label></td>
                <td><input type="text" placeholder="Titel" name="titel" value="<?php echo $Titel; ?>"></td>
            </tr>
            <tr>
                <td><label for="RegisseurID">RegisseurID:</label></td>
                <td><input type="number" placeholder="RegisseurID" name="RegisseurID" value="<?php echo $RegisseurID; ?>"></td>
            </tr>
            <tr>
                <td><label for="GenreID">GenreID:</label></td>
                <td><input type="number" placeholder="GenreID" name="GenreID" value="<?php echo $GenreID; ?>"></td>
            </tr>
            <tr>
                <td><label for="ReleaseDatum">Release Datum:</label></td>
                <td><input type="date" placeholder="Release Datum" name="ReleaseDatum" value="<?php echo $ReleaseDatum; ?>"></td>
            </tr>
            <tr>
                <td><label for="Beschrijving">Beschrijving:</label></td>
                <td><input type="text" placeholder="Beschrijving" name="Beschrijving" value="<?php echo $Beschrijving; ?>"></td>
            </tr>
            <tr>
                <td><label for="Poster">Poster:</label></td>
                <td><input type="file" placeholder="Poster" name="Poster"></td>
            </tr>
            <tr>
                <td><label for="Beoordeling">Beoordeling:</label></td>
                <td><input type="number" placeholder="Beoordeling" name="Beoordeling" value="<?php echo $Beoordeling; ?>" step="any" max="10"></td>
            </tr>
            <tr>
                <td><label for="VideoURL">VideoURL:</label></td>
                <td><input type="text" placeholder="VideoURL" name="VideoURL" value="<?php echo $VideoURL; ?>"></td> <!-- Add VideoURL field -->
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="submit">Update</button></td>
            </tr>
        </form>
    </table>
</body>
</html>
