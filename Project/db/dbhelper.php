<?php
    require_once 'config.php';
    //Insert, update, delete
    function execute($sql){
        // code...
        $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
        mysqli_set_charset($conn, 'utf8');
        mysqli_query($conn, $sql);
        mysqli_close($conn);
    }

    //Select data
    function executeResult($sql, $onlyOne = false){
        // code...
        $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
        mysqli_set_charset($conn, 'utf8');
        $resultset = mysqli_query($conn, $sql);

        if($onlyOne){
            $data = mysqli_fetch_array($resultset, 1); 
        } else{
            $data = [];
            while (($row = mysqli_fetch_array($resultset, 1)) != null) {
            // code...
                $data[] = $row;
            }
        }
        mysqli_close($conn);

        return $data;
    }
?>