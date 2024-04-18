<?php
    include 'dbConnectionsEnOperaties.php';
    if (isset($_GET['deleteid'])) {
        $FilmID=$_GET['deleteid'];

        $sql = "DELETE FROM film where FilmID=$FilmID";
        $result = mysqli_query($conn, $sql);
        if ($result){
            header('location:showmovies.php');
        }else{
            die(mysqli_error($con));
        }
    }
?>
