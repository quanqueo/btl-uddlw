<?php
  require '../layouts/header.php';

  $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    //============================VALIDATION FORM==============================
    if(isset($_POST['btn_addGT'])){
        $error = array();

        //Mã gói thầu
        if(empty($_POST['package-id'])){
            $error['package-id'] = "Vui lòng nhập mã gói thầu";
        }
        else{
            $package_id = $_POST['package-id'];
        }

        //Tên gói thầu
        if(empty($_POST['package-name'])){
            $error['package-name'] = "Vui lòng nhập tên gói thầu";
        }
        else{
            $package_name = $_POST['package-name'];
        }  

        //company-id
        if(empty($_POST['company-id'])){
            $error['company-id'] = "Vui lòng nhập mã doanh nghiệp";
        }
        else{
            $company_id = $_POST['company-id'];
        }  

        //Ngày công bố
        if(empty($_POST['start-time'])){
            $error['start-time'] = "Vui lòng nhập ngày công bố";
        }
        else{
            $start_time = $_POST['start-time'];
        }  

        //Ngày đóng thầu
        if(empty($_POST['end-time'])){
          $error['end-time'] = "Vui lòng nhập ngày đóng thầu";
        }
        else{
            $end_time = $_POST['end-time'];
        }  
        
        //Thêm bản ghi
        if(empty($error)){
            $sqlGT = "INSERT INTO `goithau` (`magoithau`, `tengoithau`, `madoanhnghiep`, `ngaycongbo`, `ngaydongthau`)
            VALUES ('$package_id','$package_name', '$company_id', '$start_time', '$end_time')
            ";
            if(mysqli_query($conn,$sqlGT)){
                //echo "Thêm doanh nghiệp thành công";
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
      /* color: #FFF; */
      /* background-color: #DC403B; */
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
        <li class="breadcrumb-item"><a href="qlgt.php">Danh sách gói thầu</a></li>
        <li class="breadcrumb-item"><a href="#">Thêm gói thầu</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Tạo mới gói thầu</h3>
          <div class="tile-body">
            <form class="row" method="post">
              <div class="form-group col-md-6">
                <label class="control-label">Mã gói thầu</label>
                <input class="form-control" type="text" name="package-id" placeholder="">
              </div>
              <div class="form-group  col-md-6">
                <label class="control-label">Mã doanh nghiệp</label>
                <input class="form-control" type="text" name="company-id">
              </div>
              <div class="form-group col-md-12">
                <label class="control-label">Tên gói thầu</label>
                <input class="form-control" type="text" name="package-name">
              </div>
              <div class="form-group  col-md-6">
                <label class="control-label">Ngày công bố</label>
                <input class="form-control" type="date" name="start-time">
              </div>

              <div class="form-group  col-md-6">
                <label class="control-label">Ngày đóng thầu</label>
                <input class="form-control" type="date" name="end-time">
              </div>
              <input type="submit" class="btn btn-save p-3 ml-3 form-group col-md-2" name="btn_addGT" value="Thêm">
              <a class="btn btn-cancel ml-3 p-3 form-group col-md-2" href="qlgt.php">Hủy bỏ</a>
            </form>
          </div>
        </div>
  </main>


  <!--
  MODAL CHỨC VỤ 
-->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <div class="modal-body">
          <div class="row">
            <div class="form-group  col-md-12">
              <span class="thong-tin-thanh-toan">
                <h5>Thêm mới nhà cung cấp</h5>
              </span>
            </div>
            <div class="form-group col-md-12">
              <label class="control-label">Nhập tên chức vụ mới</label>
              <input class="form-control" type="text" required>
            </div>
          </div>
          <BR>
          <button class="btn btn-save" type="button">Lưu lại</button>
          <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
          <BR>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
  <!--
MODAL
-->



  <!--
  MODAL DANH MỤC
-->
  <div class="modal fade" id="adddanhmuc" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <div class="modal-body">
          <div class="row">
            <div class="form-group  col-md-12">
              <span class="thong-tin-thanh-toan">
                <h5>Thêm mới danh mục </h5>
              </span>
            </div>
            <div class="form-group col-md-12">
              <label class="control-label">Nhập tên danh mục mới</label>
              <input class="form-control" type="text" required>
            </div>
            <div class="form-group col-md-12">
              <label class="control-label">Danh mục sản phẩm hiện đang có</label>
              <ul style="padding-left: 20px;">
                <li>Bàn ăn</li>
              <li>Bàn thông minh</li>
              <li>Tủ</li>
              <li>Ghế gỗ</li>
              <li>Ghế sắt</li>
              <li>Giường người lớn</li>
              <li>Giường trẻ em</li>
              <li>Bàn trang điểm</li>
              <li>Giá đỡ</li>
              </ul>
            </div>
          </div>
          <BR>
          <button class="btn btn-save" type="button">Lưu lại</button>
          <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
          <BR>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
  <!--
MODAL
-->




  <!--
  MODAL TÌNH TRẠNG
-->
  <div class="modal fade" id="addtinhtrang" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <div class="modal-body">
          <div class="row">
            <div class="form-group  col-md-12">
              <span class="thong-tin-thanh-toan">
                <h5>Thêm mới tình trạng</h5>
              </span>
            </div>
            <div class="form-group col-md-12">
              <label class="control-label">Nhập tình trạng mới</label>
              <input class="form-control" type="text" required>
            </div>
          </div>
          <BR>
          <button class="btn btn-save" type="button">Lưu lại</button>
          <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
          <BR>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
  <!--
MODAL
-->



  <script src="js/jquery-3.2.1.min.js"></s>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <script src="js/plugins/pace.min.js"></script>
  <script>
    const inpFile = document.getElementById("inpFile");
    const loadFile = document.getElementById("loadFile");
    const previewContainer = document.getElementById("imagePreview");
    const previewContainer = document.getElementById("imagePreview");
    const previewImage = previewContainer.querySelector(".image-preview__image");
    const previewDefaultText = previewContainer.querySelector(".image-preview__default-text");
    inpFile.addEventListener("change", function () {
      const file = this.files[0];
      if (file) {
        const reader = new FileReader();
        previewDefaultText.style.display = "none";
        previewImage.style.display = "block";
        reader.addEventListener("load", function () {
          previewImage.setAttribute("src", this.result);
        });
        reader.readAsDataURL(file);
      }
    });

  </script>
</body>

</html>