<?php
    require '../../db/config.php';
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    if (isset($_POST['id'])) {
        // code...
        $sqlGT = "DELETE from `goithau` where `magoithau` = ".$_POST['id'];
        if (mysqli_query($conn, $sqlGT)) {
            // code...
            header("location: qlgt.php");
        } else {
            echo "LỖI: ".mysqli_error($conn);         
        }
    }
    $conn->close();
?>