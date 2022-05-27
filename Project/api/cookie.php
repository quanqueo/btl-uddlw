<?php
    require_once '../untils/untils.php';
   if (!empty($_POST)) {
        // code...
        $action = getPost('action'); 
        $id = getPost('id');
        $num = getPost('num');
        $cart = [];
        if (isset($_COOKIE['cart'])) {
            // code...
             $json = $_COOKIE['cart'];
             $cart = json_decode($json, true);
        }
        switch ($action){
            case 'add':
            // code...
                $isFind = false;
                for ($i = 0; $i < count($cart); $i++) {
                    // code...
                    if ($cart[$i]['id'] == $id) {
                        // code...
                        $cart[$i]['num'] += $num;
                        $isFind = true;
                        break;
                    }
                }
                if(!$isFind) {
                    // code...
                    $cart[] = [
                        'id'=> $id,
                        'num'=> $num
                    ];
                }
                setcookie('cart', json_encode($cart), time()+30*24*60*60, "/");
                break;
            
            case 'delete':
                    // code...
                for ($i=0; $i < count($cart); $i++) {
                    // code...
                    if ($cart[$i]['id'] == $id) {
                        array_splice($cart, $i, 1);
                        break;                        
                    }
                }
                setcookie('cart', json_encode($cart), time()+30*24*60*60, "/");
                break;  

            default:
                break;
        }
    }
 ?>