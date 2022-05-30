<?php
    require '../../db/config.php';
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    if (isset($_POST['id'])) {
        // code...
        $sqlAcc = "DELETE from `account` where `madoanhnghiep` = ".$_POST['id'];
        $sqlDN = "DELETE from `doanhnghiep` where `madoanhnghiep` = ".$_POST['id'];
        if (mysqli_query($conn, $sqlAcc)) {
            // code...
            header("location: qldn.php");
        } else {
            echo "LỖI: ".mysqli_error($conn);         
        }
        if (mysqli_query($conn, $sqlDN)) {
            // code...
            header("location: qldn.php");
        } else {
            echo "LỖI: ".mysqli_error($conn);         
        }
    }
    $conn->close();
?>