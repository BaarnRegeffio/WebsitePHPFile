<?php
    include 'dbConnectionsEnOperaties.php';
    if (isset($_GET['deleteid'])) {
        $RegisseurID=$_GET['deleteid'];

        $sql = "DELETE FROM regisseur where RegisseurID=$RegisseurID";
        $result = mysqli_query($conn, $sql);
        if ($result){
            header('location:showdirectors.php');
        }else{
            die(mysqli_error($con));
        }
    }
?>
