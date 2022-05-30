<?php 
    require '../layouts/header.php';
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    $id = $_GET['madoanhnghiep'];
    

    if(isset($_POST['btn_save'])){
        $error = array();

        //email
        if(empty($_POST['email-update'])){
            $error['email-update'] = "Vui lòng nhập email";
        }
        else{
            if(!(strlen($_POST['email-update']) >= 6 && strlen($_POST['email-update']) <= 32)){
                $error['email-update'] = "Email có từ 6 đến 32 kí tự";
            }
            else{
                $email_update = $_POST['email-update'];
            }
        }

        //password
        if(empty($_POST['password-update'])){
            $error['password-update'] = "Vui lòng nhập password";
        }
        else{
            if(!(strlen($_POST['password-update']) >= 6 && strlen($_POST['password-update']) <= 32)){
                $error['password-update'] = "Mật khẩu có từ 6 đến 32 kí tự";
            }
            else{ 
                    $password_user_update = $_POST['password-update'];
                    //ĐỔi mật khẩu
                    $sqlUPDATEACC = "UPDATE `account` SET `password`= '{$password_user_update}' WHERE `madoanhnghiep` = '".$_GET['madoanhnghiep']."'";
                    if(mysqli_query($conn,$sqlUPDATEACC)){
                        header("Location: qldn.php");
                    }
                    else{
                        echo "Lỗi :".mysqli_error($conn);
                    }
            }
        }

        //address
        if(empty($_POST['address-update'])){
            $error['address-update'] = "Vui lòng nhập địa chỉ";
        }
        else{
            $address_update = $_POST['address-update'];
        }

        //phone
        if(empty($_POST['phone-update'])){
            $error['phone-update'] = "Vui lòng nhập số điện thoại";
        }
        else{
            $phone_update = $_POST['phone-update'];
        }  

        //company-name
        if(empty($_POST['company-name-update'])){
            $error['company-name-update'] = "Vui lòng nhập tên doanh nghiệp";
        }
        else{
            $company_name_update = $_POST['company-name-update'];
        }  


        //Sửa bản ghi
        if(empty($error)){
            $sqlUPDATEDN = "UPDATE `doanhnghiep` SET `tendoanhnghiep`= '{$company_name_update}', `diachi` = '{$address_update}', `email` = '{$email_update}', `sdt` = '{$phone_update}' WHERE `madoanhnghiep` =".$_GET['madoanhnghiep'];


            if(mysqli_query($conn,$sqlUPDATEDN)){
                header("Location: qldn.php");
            }
            else{
                echo "Lỗi :".mysqli_error($conn);
            }
        }
    }
    
    $conn->close();
    $sqlDN = executeResult("SELECT doanhnghiep.*, account.password FROM doanhnghiep INNER JOIN account ON doanhnghiep.madoanhnghiep = account.madoanhnghiep WHERE doanhnghiep.madoanhnghiep =".$_GET['madoanhnghiep']);
?>    

        <div class="update-dn col-md-10 mt-4 float-right">
            <div class="row">
                <div class="form-group  col-md-12">
                <span class="thong-tin-thanh-toan">
                    <h5>Chỉnh sửa thông tin doanh nghiệp</h5>
                </span>
                </div>
            </div>
            <form action="" method="POST">
                <div class="row">
                    <?php
                        foreach($sqlDN as $item){
                        ?>
                    <div class="form-group col-md-6">
                        <label class="control-label">Mã doanh nghiệp</label>
                        <input class="form-control" type="text" name="company-id-update" required value="<?php echo $item['madoanhnghiep'];?>" disabled>
                    </div>
                        <div class="form-group col-md-6">
                        <label class="control-label">Tên doanh nghiệp</label>
                        <input class="form-control" type="text" name="company-name-update" required value="<?php echo $item['tendoanhnghiep'];?>">
                    </div>
                    <div class="form-group  col-md-6">
                        <label class="control-label">Số điện thoại</label>
                        <input class="form-control" type="text" name="phone-update" required value="<?php echo $item['sdt'];?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label">Địa chỉ email</label>
                        <input class="form-control" type="text" name="email-update" required value="<?php echo $item['email'];?>">
                    </div>
                        <div class="form-group col-md-6">
                        <label class="control-label">Địa chỉ</label>
                        <input class="form-control" type="text" name="address-update" value="<?php echo $item['diachi'];?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label">Mật khẩu</label>
                        <input class="form-control" type="password" name="password-update" value="<?php echo $item['password'];?>">
                    </div>
                </div>
                <BR>
                <BR>
                <?php } ?>

                <input class="btn btn-save" type="submit" name="btn_save" value="Lưu lại">
                <a class="btn btn-cancel" href="qlgt.php">Hủy bỏ</a>
            </form>
            <BR>
        </div>
          