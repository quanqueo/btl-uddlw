<?php
    if(!empty($_POST)){
        // code...
       $cart = [];
       if (isset($_COOKIE['cart'])) {
       // code...
           $json = $_COOKIE['cart'];
           $cart = json_decode($json, true);
       }
       $fullname = getPost('fullname');
       $email = getPost('email');
       $phone_number = getPost('phone_number');
       $address = getPost('address');
       $note = getPost('note');
       $orderDate = date('Y-m-d H:i:s');
       $sql = "INSERT INTO `order`(`fullname`, `phone`, `email`, `address`, `note` ,`order_date`) VALUES ('$fullname', '$phone_number', '$email', '$address', '$note','$orderDate')";
       execute($sql);
   }
?>