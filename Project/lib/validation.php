<?php
    function is_email($email){
        $partten = "/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/";

        if(!preg_match($partten, $email, $matchs))
            return false;
        return true;
    }
    function is_password($password){
        $partten = "/^([0-9]{6,10})$/";

        if(!preg_match($partten, $password, $matchs))
            return false;
        return true;
    }
    function is_phone($phone){
        $partten = "/^(09|08|01[2|6|8|9])+([0-9]{8})$/";

        if(!preg_match($partten, $phone, $matchs))
            return false;
        return true;
    }
    function form_error($label_field){
        global $error;
        if(!empty($error[$label_field])) 
            return "<p style='color: red;'>{$error[$label_field]}</p>";
    }
    function set_value($label_field){
        global $$label_field;
        if(!empty($$label_field)) 
            return $$label_field;
    }
?>