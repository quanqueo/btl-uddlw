<?php 
    require 'layouts/header.php';
    require_once 'db/dbhelper.php';
    require_once 'untils/untils.php';

    $error = "";
    if(isset($_SESSION['user'])){
        header("Location: index.php");
    }else{
        if(isset($_POST)){
            $user = getPost('uname');
            $pass = getPost('psw');
            $sql = "SELECT * FROM `account` WHERE `username` = '$user' and `password` = '$pass'";
            $result = executeResult($sql);
            if(count($result) > 0){
                $_SESSION['user'] = $user;
                header("Location: index.php");
            }else{
                $error = "Username hoặc password không đúng";
            }
        }
    }
?>
<style type="text/css">
    form {
        border: 3px solid #f1f1f1;
    }

    /* Full-width inputs */
    input[type=text], input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    /* Set a style for all buttons */
    button:not(#search-button) {
        background-color: #04AA6D;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }

    /* Add a hover effect for buttons */
    button:hover {
        opacity: 0.8;
    }

    /* Extra style for the cancel button (red) */
    .cancelbtn {
        width: auto;
        padding: 10px 18px;
        background-color: #f44336;
    }

    /* Center the avatar image inside this container */
    .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
    }

    /* Avatar image */
    img.avatar {
        width: 40%;
        border-radius: 50%;
    }

    /* Add padding to containers */
    .container {
        padding: 16px;
    }

    /* The "Forgot password" text */
    span.psw {
        float: right;
        padding-top: 16px;
    }

    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }
        .cancelbtn {
            width: 100%;
        }
    }
</style>
    <!-- BODY -->
    <div class="container">
        <div class="row">
            <form method="post" style="width: 100%;">
                <div class="imgcontainer">
                    <img src="https://www.w3schools.com/howto/img_avatar2.png" alt="Avatar" style="max-width: 200px;" class="avatar">
                </div>

                <div class="container">
                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="uname" required>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>
                    <label>
                        <input type="checkbox" checked="checked" name="remember"> Remember me
                    </label><br>
                    <label for="" class="alert-danger"><?=$error;?></label><br>
                    <button type="submit">Login</button>
                    
                </div>

                <div class="container" style="background-color:#f1f1f1">
                    <a href="register.php" class="btn btn-success">Register</a>
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                    <span class="psw">Forgot <a href="#">password?</a></span>
                </div>
            </form>
        </div>
    </div>
    
<?php require 'layouts/footer.php'?>
