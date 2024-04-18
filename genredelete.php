<?php
    include 'dbConnectionsEnOperaties.php';
    if (isset($_GET['deleteid'])) {
        $GenreID=$_GET['deleteid'];

        $sql = "DELETE FROM Genre where GenreID=$GenreID";
        $result = mysqli_query($conn, $sql);
        if ($result){
            header('location:showgenres.php');
        }else{
            die(mysqli_error($con));
        }
    }
?>
