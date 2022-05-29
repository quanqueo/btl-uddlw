<?php
    require 'layouts/header.php';
    require 'lib/validation.php';
    require 'db/dbhelper.php';
    //============================VALIDATION FORM==============================
    if(isset($_POST['btn_reg'])){
        $error = array();

        if(empty($_POST['username'])){
            $error['username'] = "Vui lòng nhập username";
        }
        else{
            $sql = "SELECT * from `account`";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)>0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    if($_POST['username'] == $rows['username'])
                    {
                        $error['username'] = "Username đã tồn tại. Vui lòng nhập lại !";
                    }
                    else{
                        $username_user = $_POST['username'];
                    }
                }
            }  
        }



        if(empty($_POST['email'])){
            $error['email'] = "Vui lòng nhập email";
        }
        else{
            if(!(strlen($_POST['email']) >= 6 && strlen($_POST['email']) <= 32)){
                $error['email'] = "Email có từ 6 đến 32 kí tự";
            }
            else{
                if(!is_email($_POST['email'])){
                    $error['email'] = "Email chưa đúng định dạng";
                }
                else{
                    $email = $_POST['email'];
                }
            }
        }

        if(empty($_POST['password'])){
            $error['password'] = "Vui lòng nhập password";
        }
        else{
            if(!(strlen($_POST['password']) >= 6 && strlen($_POST['password']) <= 32)){
                $error['password'] = "Mật khẩu có từ 6 đến 32 kí tự";
            }
            else{
                if(!is_password($_POST['password'])){
                    $error['password'] = "Mật khẩu chưa đúng định dạng";
                }
                else{
                    $password_user = $_POST['password'];
                }
            }
        }

        if(empty($_POST['cfpassword'])){
            $error['cfpassword'] = "Vui lòng nhập lại password";
        }
        else{
            if($_POST['cfpassword'] != $password_user){
                $error['cfpassword'] = "Mật khẩu chưa khớp";
            }
        }


        if(empty($_POST['address'])){
            $error['address'] = "Vui lòng nhập địa chỉ";
        }
        else{
            $address = $_POST['address'];
        }


        if(empty($_POST['phone'])){
            $error['phone'] = "Vui lòng nhập số điện thoại";
        }
        else{
            $phone = $_POST['phone'];
        }  
        
        //Thêm bản ghi
        if(empty($error)){
            $sql = "INSERT INTO `username` (`username`, `password`, `email`, `phone`, `address`)
            VALUES ('$username_user','$password_user', '$email', '$phone', '$address')
            ";
            if(mysqli_query($conn,$sql)){
                echo "Thêm bản ghi thành công";
            }
            else{
                echo "Lỗi :".mysqli_error($conn);
            }
        }
        mysqli_close($conn);
    }
    //==========================END VALIDATION================================
    if(isset($_POST['btn_reLog'])){
        header("Location: login.php");
    }
?>

<html>
    <head>
        <title>Đăng Ký</title>
    </head>
    <body>
        <style>
            body{
                text-align: center;
                margin: 0px auto;
            }
            form{
                width: 1000px;
                height: auto;
                position: relative;
                text-align: left;
                left: 15%;
            }
            input{
                width: 100%;
                height: 30px;
                margin-top: 10px;
            }
            label{
                text-align: left;
                font-weight: bold;
                font-size: 20px
            }
            h1{
                background: #28a745;
                margin-top: 50px;
                color: white;
            }
        </style>
        <h1>ĐĂNG KÝ THÀNH VIÊN</h1>

        <form action="" method="POST">
            <label for="username">Username:</label><br>
            <input type="text" name="username" id="username" value=""><br>
            <?php echo form_error('username');?><br>
            <label for="password">Password:</label><br>
            <input type="password" name="password" id="password" value="<?php echo set_value('password');?>"><br>
            <?php echo form_error('password');?><br>
            <label for="cfpassword">Confirmation Password:</label><br>
            <input type="password" name="cfpassword" id="cfpassword" value="<?php echo set_value('cfpassword');?>"><br>
            <?php echo form_error('cfpassword');?><br>
            <label for="company-id">Mã doanh nghiệp:</label><br>
            <input type="text" name="company-id" id="company-id" value=""><br>
            <?php echo form_error('username');?><br>
            <label for="company-name">Tên doanh nghiệp:</label><br>
            <input type="text" name="company-name" id="company-name" value=""><br>
            <?php echo form_error('company-name');?><br>
            <label for="website">Website:</label><br>
            <input type="text" name="website" id="website" value=""><br>
            <?php echo form_error('username');?><br>
            <label for="phone">Phone:</label><br>
            <input type="text" name="phone" id="phone" value="<?php echo set_value('phone');?>"><br>
            <?php echo form_error('phone');?><br>
            <label for="email">Email:</label><br>
            <input type="text" name="email" id="email" value="<?php echo set_value('email');?>"><br>
            <?php echo form_error('email');?><br>
            <label for="address">Address:</label><br>
            <input type="text" name="address" id="address" value="<?php echo set_value('address');?>"><br><br>
            <?php echo form_error('address');?><br>

            <input type="submit" class="btn btn-success" value="Đăng ký" name="btn_reg">
            <input type="submit" class="btn btn-success" value="Trở về đăng nhập" name="btn_reLog">
        </form>   
    </body>
</html>

<?php require 'layouts/footer.php';?>