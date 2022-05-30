<?php
  require '../layouts/header.php';

  $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    //============================VALIDATION FORM==============================
    if(isset($_POST['btn_add'])){
        $error = array();

        //username
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


        //email
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

        //password
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

        //xác nhận mật khẩu
        if(empty($_POST['cfpassword'])){
            $error['cfpassword'] = "Vui lòng nhập lại password";
        }
        else{
            if($_POST['cfpassword'] != $password_user){
                $error['cfpassword'] = "Mật khẩu chưa khớp";
            }
        }

        //address
        if(empty($_POST['address'])){
            $error['address'] = "Vui lòng nhập địa chỉ";
        }
        else{
            $address = $_POST['address'];
        }

        //phone
        if(empty($_POST['phone'])){
            $error['phone'] = "Vui lòng nhập số điện thoại";
        }
        else{
            $phone = $_POST['phone'];
        }  

        //company-id
        if(empty($_POST['company-id'])){
            $error['company-id'] = "Vui lòng nhập mã doanh nghiệp";
        }
        else{
            $company_id = $_POST['company-id'];
        }  

        //company-name
        if(empty($_POST['company-name'])){
            $error['company-name'] = "Vui lòng nhập tên doanh nghiệp";
        }
        else{
            $company_name = $_POST['company-name'];
        }  
        
        //Thêm bản ghi
        if(empty($error)){
            $sqlDN = "INSERT INTO `doanhnghiep` (`madoanhnghiep`, `tendoanhnghiep`, `diachi`, `email`, `sdt`)
            VALUES ('$company_id','$company_name', '$address', '$email', '$phone')
            ";
            $sqlACC = "INSERT INTO `account` (`username`, `password`, `madoanhnghiep`)
            VALUES ('$username_user','$password_user', '$company_id')
            ";
            if(mysqli_query($conn,$sqlDN)){
                //echo "Thêm doanh nghiệp thành công";
            }
            else{
                echo "Lỗi :".mysqli_error($conn);
            }
            if(mysqli_query($conn,$sqlACC)){
                //echo "Thêm account thành công";
            }
            else{
                echo "Lỗi :".mysqli_error($conn);
            }
        }
        mysqli_close($conn);
    }
?>

  <style>
    .Choicefile {
      display: block;
      background: #14142B;
      border: 1px solid #fff;
      color: #fff;
      width: 150px;
      text-align: center;
      text-decoration: none;
      cursor: pointer;
      padding: 5px 0px;
      border-radius: 5px;
      font-weight: 500;
      align-items: center;
      justify-content: center;
    }

    .Choicefile:hover {
      text-decoration: none;
      color: white;
    }

    #uploadfile,
    .removeimg {
      display: none;
    }

    #thumbbox {
      position: relative;
      width: 100%;
      margin-bottom: 20px;
    }

    .removeimg {
      height: 25px;
      position: absolute;
      background-repeat: no-repeat;
      top: 5px;
      left: 5px;
      background-size: 25px;
      width: 25px;
      /* border: 3px solid red; */
      border-radius: 50%;

    }

    .removeimg::before {
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
      content: '';
      border: 1px solid red;
      background: red;
      text-align: center;
      display: block;
      margin-top: 11px;
      transform: rotate(45deg);
    }

    .removeimg::after {
      content: '';
      background: red;
      border: 1px solid red;
      text-align: center;
      display: block;
      transform: rotate(-45deg);
      margin-top: -2px;
    }
  </style>

  <main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="qldn.php">Danh sách doanh nghiệp</a></li>
        <li class="breadcrumb-item"><a href="#">Thêm doanh nghiệp</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Tạo mới tài khoản doanh nghiệp</h3>
          <div class="tile-body">
            <form class="row" method="post">
              <div class="form-group col-md-6">
                <label class="control-label">Tên đăng nhập</label>
                <input class="form-control" type="text" name="username">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Mật khẩu</label>
                <input class="form-control" type="password" name="password">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Xác nhận mật khẩu</label>
                <input class="form-control" type="password" name="cfpassword">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Mã doanh nghiệp</label>
                <input class="form-control" type="text" name="company-id">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Tên doanh nghiệp</label>
                <input class="form-control" type="text" name="company-name" required>
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Địa chỉ email</label>
                <input class="form-control" type="text" name="email" required>
              </div>
              
              <div class="form-group col-md-6">
                <label class="control-label">Số điện thoại</label>
                <input class="form-control" type="text" name="phone" required>
              </div>
              <div class="form-group col-md-12">
                <label class="control-label">Địa chỉ</label>
                <input class="form-control" type="text" name="address" required>
              </div>

              <input type="submit" class="btn btn-save p-3 ml-3 form-group col-md-2" name="btn_add" value="Thêm">
              <a class="btn btn-cancel ml-3 p-3 form-group col-md-2" href="qldn.php">Hủy bỏ</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>


  <!-- Essential javascripts for application to work-->
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <!-- The javascript plugin to display page loading on top-->
  <script src="js/plugins/pace.min.js"></script>
</body>
</html>