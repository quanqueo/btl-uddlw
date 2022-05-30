<?php 
    require 'layouts/header.php';
    // require 'layouts/content-top-sidebar.php';
    //require 'lib/validation.php';
    //require 'db/dbhelper.php';
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    //============================VALIDATION FORM==============================

    //Lấy mã doanh nghiệp của user hiện hành
    $user_name = $_SESSION['user'];
    $sql = executeResult("SELECT madoanhnghiep FROM `account` WHERE username = '".$user_name."'");
    $madoanhnghiep = $sql[0]['madoanhnghiep'];

    if(isset($_POST['btn_add'])){
        $error = array();

        //mã gói thầu
        if(empty($_POST['package-id'])){
            $error['package-id'] = "Vui lòng nhập mã gói thầu";
        }
        else{
            $package_id = $_POST['package-id'];
        }

        //tên gói thầu
        if(empty($_POST['package-name'])){
            $error['package-name'] = "Vui lòng nhập tên gói thầu";
        }
        else{
            $package_name = $_POST['package-name'];
        }  

        //ngày công bố
        if(empty($_POST['start-time'])){
            $error['start-time'] = "Vui lòng chọn ngày công bố";
        }
        else{
            $start_time = $_POST['start-time'];
        }  

        //ngày đóng thầu
        if(empty($_POST['end-time'])){
            $error['end-time'] = "Vui lòng chọn ngày đóng thầu";
        }
        else{
            $end_time = $_POST['end-time'];
        }  
        
        //Thêm bản ghi
        if(empty($error)){
            $sqlGT = "INSERT INTO `goithau` (`magoithau`, `tengoithau`, `madoanhnghiep`, `ngaycongbo`, `ngaydongthau`)
            VALUES ('$package_id','$package_name', '$madoanhnghiep', '$start_time', '$end_time')
            ";

            if(mysqli_query($conn,$sqlGT)){
                echo "Thêm gói thầu thành công";
            }
            else{
                echo "Lỗi :".mysqli_error($conn);
            }
        }
        mysqli_close($conn);
    }
    //==========================END VALIDATION================================
    if(isset($_POST['btn_reLog'])){
        header("Location: index.php");
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
                height: 50px;
                margin-top: 10px;
            }
            input[type=submit]{
                width: 49%;
                margin-bottom: 50px;
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
        <h1>Thêm gói thầu - User : <strong style="color: black; display: inline;"><?php echo $_SESSION['user'];?></st></h1>

        <form action="" method="POST">
            <label for="package-id">Mã gói thầu:</label><br>
            <input type="text" name="package-id" id="package-id" value=""><br>
            <?php echo form_error('package-id');?><br>
            <label for="package-name">Tên gói thầu:</label><br>
            <input type="text" name="package-name" id="package-name" value=""><br>
            <?php echo form_error('package-name');?><br>
            <label for="start-time">Ngày công bố:</label><br>
            <input type="date" name="start-time" id="start-time" value=""><br>
            <?php echo form_error('start-time');?><br>
            <label for="end-time">Ngày đóng thầu:</label><br>
            <input type="date" name="end-time" id="end-time" value=""><br>
            <?php echo form_error('end-time');?><br>

            <input type="submit" class="btn btn-success" value="Thêm gói thầu" name="btn_add">
            <input type="submit" class="btn btn-warning" style="color: white;" value="Trở về trang chủ" name="btn_reLog">
        </form>   
    </body>
</html>

<?php 
    //require 'layouts/sidebar-right.php';
    require 'layouts/footer.php';
?>