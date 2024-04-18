<?php
session_start();

include 'dbConnectionsEnOperaties.php';

if(isset($_POST['submit'])) {
    $Titel = $_POST['titel'];
    $RegisseurID = $_POST['RegisseurID'];
    $GenreID = $_POST['GenreID'];
    $ReleaseDatum = $_POST['ReleaseDatum'];
    $Beschrijving = $_POST['Beschrijving'];
    $Beoordeling = $_POST['Beoordeling'];
    $VideoURL = $_POST['VideoURL'];

    // Function to extract YouTube video ID from URL (...damn js)
    function extractYouTubeID($VideoURL) {
        $queryString = parse_url($VideoURL, PHP_URL_QUERY);
        parse_str($queryString, $params);
        if(isset($params['v'])) {
            return $params['v'];
        } else {
            return false;
        }
    }

    // Convert YouTube URL to embedded URL (pain...)
    if(strpos($VideoURL, 'youtube.com') !== false || strpos($VideoURL, 'youtu.be') !== false) {
        $VideoID = extractYouTubeID($VideoURL);
        if($VideoID) {
            $VideoURL = "https://www.youtube.com/embed/$VideoID";
        }
    }

    // Rating, max 10
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
            // Generate a unique name for the file
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
            $uploadFileDir = './Poster/';
            $destPath = $uploadFileDir . $newFileName;

            // Move the uploaded file to the Poster directory
            if(move_uploaded_file($fileTmpPath, $destPath)) {
                // Insert data into the database
                $PosterPath = $destPath;
            } else {
                echo "Error uploading the file.";
            }
        } else {
            echo "Invalid file type. Allowed file types are JPG, JPEG, and PNG.";
        }
    }

    $sql = "INSERT INTO film (Titel, RegisseurID, GenreID, ReleaseDatum, Beschrijving, Beoordeling";

    // Add the Poster column if a new poster is uploaded
    if(isset($PosterPath)) {
        $sql .= ", Poster";
    }

    // Add the VideoURL column
    if(!empty($VideoURL)) {
        $sql .= ", VideoURL";
    }

    $sql .= ") VALUES ('$Titel', '$RegisseurID', '$GenreID', '$ReleaseDatum', '$Beschrijving', '$Beoordeling'";

    // Add the PosterPath value if a new poster is uploaded
    if(isset($PosterPath)) {
        $sql .= ", '$PosterPath'";
    }

    // Add the VideoURL value
    if(!empty($VideoURL)) {
        $sql .= ", '$VideoURL'";
    }

    $sql .= ")";


    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: showmovies.php");
    } else {
        die(mysqli_error($conn));
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Films</title>
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
    <h1>Add Movies</h1>
    <p>*Note: If a director or genre doesn't exist, please add them in their respective tables first before attempting to add a new movie!</p>
    <table>
        <form method="POST" enctype="multipart/form-data">
            <tr>
                <td><label for="titel">Titel:</label></td>
                <td><input type="text" placeholder="Titel" name="titel"></td>
            </tr>
            <tr>
                <td><label for="RegisseurID">RegisseurID:</label></td>
                <td><input type="number" placeholder="RegisseurID" name="RegisseurID"></td>
            </tr>
            <tr>
                <td><label for="GenreID">GenreID:</label></td>
                <td><input type="number" placeholder="GenreID" name="GenreID"></td>
            </tr>
            <tr>
                <td><label for="ReleaseDatum">Release Datum:</label></td>
                <td><input type="date" placeholder="Release Datum" name="ReleaseDatum"></td>
            </tr>
            <tr>
                <td><label for="Beschrijving">Beschrijving:</label></td>
                <td><input type="text" placeholder="Beschrijving" name="Beschrijving"></td>
            </tr>
            <tr>
                <td><label for="Poster">Poster:</label></td>
                <td><input type="file" placeholder="Poster" name="Poster"></td>
            </tr>
            <tr>
                <td><label for="Beoordeling">Beoordeling:</label></td>
                <td><input type="number" placeholder="Beoordeling" name="Beoordeling" step="any" max="10"></td>
            </tr>
            <tr>
                <td><label for="VideoURL">Video URL:</label></td>
                <td><input type="text" placeholder="Video URL" name="VideoURL"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="submit">Insert</button></td>
            </tr>
        </form>
    </table>
</body>
</html>
