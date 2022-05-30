<?php 
    require '../layouts/header.php';
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    $id = $_GET['magoithau'];
    

    if(isset($_POST['btn_save'])){
        $error = array();

        //ngày công bố
        if(empty($_POST['start-time-update'])){
            $error['start-time-update'] = "Vui lòng nhập ngày công bố";
        }
        else{
            $start_time_update = $_POST['start-time-update'];
        }

        //ngày đóng thầu
        if(empty($_POST['end-time-update'])){
            $error['end-time-update'] = "Vui lòng nhập ngày đóng thầu";
        }
        else{
            $end_time_update = $_POST['end-time-update'];
        }

        //tên gói thầu
        if(empty($_POST['package-name-update'])){
            $error['package-name-update'] = "Vui lòng nhập tên gói thầu";
        }
        else{
            $package_name_update = $_POST['package-name-update'];
        }  

        //Sửa bản ghi
        if(empty($error)){
            $sqlUPDATEGT = "UPDATE `goithau` SET `tengoithau`= '{$package_name_update}',
            `ngaycongbo` =  '{$start_time_update}',
            `ngaydongthau` =  '{$end_time_update}'
            WHERE `magoithau` = ".$_GET['magoithau'];

            if(mysqli_query($conn,$sqlUPDATEGT)){
                header("Location: qlgt.php");
            }
            else{
                echo "Lỗi :".mysqli_error($conn);
            }
        }
    }
    
    $conn->close();
    $sqlGT = executeResult("SELECT * FROM goithau WHERE magoithau =".$_GET['magoithau']);
?>    
        <div class="update-dn col-md-10 mt-4 float-right">
            <div class="row">
                <div class="form-group  col-md-12">
                <span class="thong-tin-thanh-toan">
                    <h5>Chỉnh sửa thông tin gói thầu</h5>
                </span>
                </div>
            </div>
            <form action="" method="POST">
                <div class="row">
                    <?php
                        foreach($sqlGT as $item){
                        ?>
                    <div class="form-group col-md-6">
                        <label class="control-label">Mã gói thầu</label>
                        <input class="form-control" type="text" name="package-id-update" required value="<?php echo $item['magoithau'];?>" disabled>
                    </div>
                        <div class="form-group col-md-6">
                        <label class="control-label">Tên gói thầu</label>
                        <input class="form-control" type="text" name="package-name-update" required value="<?php echo $item['tengoithau'];?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label">Ngày công bố</label>
                        <input class="form-control" type="date" name="start-time-update" value="<?php echo $item['ngaycongbo'];?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label">Ngày đóng thầu</label>
                        <input class="form-control" type="date" name="end-time-update" value="<?php echo $item['ngaydongthau'];?>">
                    </div>
                </div>
                <BR>
                <BR>
                <?php } ?>

                <input class="btn btn-save" type="submit" name="btn_save" value="Lưu lại">
                <a class="btn btn-cancel" href="qldn.php">Hủy bỏ</a>
            </form>
            <BR>
        </div>
          