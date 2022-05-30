<?php 
  require '../layouts/header.php';

  $qldn = executeResult("SELECT doanhnghiep.*, account.username, account.password FROM `doanhnghiep` INNER JOIN `account` ON doanhnghiep.madoanhnghiep = account.madoanhnghiep");

?>
  <main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item active"><a href="#"><b>Danh sách doanh nghiệp</b></a></li>
      </ul>
      <div id="clock"></div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">

            <div class="row element-button">
              <div class="col-sm-2">

                <a class="btn btn-add btn-sm" href="create-acc.php" title="Thêm"><i class="fas fa-plus"></i>
                  Tạo mới tài khoản doanh nghiệp</a>
              </div>

              <div class="col-sm-2">
                <a class="btn btn-delete btn-sm print-file" type="button" title="In" onclick="myApp.printTable()"><i
                    class="fas fa-print"></i> In dữ liệu</a>
              </div>
            </div>
            <table class="table table-hover table-bordered js-copytextarea" cellpadding="0" cellspacing="0" border="0"
              id="sampleTable">
              <thead>
                <tr>
                  <th width="10"><input type="checkbox" id="all"></th>
                  <th>Mã doanh nghiệp</th>
                  <th width="150">Tên doanh nghiệp</th>
                  <th width="300">Địa chỉ</th>
                  <th>Email</th>
                  <th>SĐT</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th width="100">Tính năng</th>
                </tr>
              </thead>
              <?php
                  foreach($qldn as $item){
                      ?>
                <tbody>
                  <tr>
                    <td width="10"><input type="checkbox" name="check1" value="1"></td>
                    <td><?php echo $item['madoanhnghiep'];?></td>
                    <td><?php echo $item['tendoanhnghiep'];?></td>
                    <td><?php echo $item['diachi'];?></td>
                    <td><?php echo $item['email'];?></td>
                    <td><?php echo $item['sdt'];?></td>
                    <td><?php echo $item['username'];?></td>
                    <td><?php echo $item['password'];?></td>
                    <td class="table-td-center">
                      <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $item['madoanhnghiep'];?>">
                        <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp"
                          data-toggle="modal" data-target="#ModalUP"><i class="fas fa-edit"></i>
                        </button>
                        
                      </form>
                      <form action="delete_dn.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $item['madoanhnghiep'];?>">
                        <!-- <button class="btn btn-primary btn-sm trash" type="button" title="Xóa"
                          onclick="myFunction(this)"><i class="fas fa-trash-alt"></i>
                        </button>  -->
                        <button onclick="return confirm('Bạn có chắc chắn muốn xóa không?');" class="btn btn-primary btn-sm trash" title="Xóa"></button>
                      </form>
                    </td>
                  </tr>
                </tbody>
              <?php }?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </main>




  <?php 
    $madoanhnghiep_now = $_POST['id'];
  ?>
  <!--
  MODAL
-->
  <div class="modal fade" id="ModalUP" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static"
    data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <div class="modal-body">
          <div class="row">
            <div class="form-group  col-md-12">
              <span class="thong-tin-thanh-toan">
                <h5>Chỉnh sửa thông tin doanh nghiệp</h5>
              </span>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <label class="control-label">Mã doanh nghiệp</label>
              <input class="form-control" type="text" name="company-id-update" required value="<?php echo $madoanhnghiep_now;?>" disabled>
            </div>
            <div class="form-group col-md-6">
              <label class="control-label">Tên doanh nghiệp</label>
              <input class="form-control" type="text" name="company-name-update" required value="<?php?>">
            </div>
            <div class="form-group  col-md-6">
              <label class="control-label">Số điện thoại</label>
              <input class="form-control" type="text" name="phone-update" required value="09267312388">
            </div>
            <div class="form-group col-md-6">
              <label class="control-label">Địa chỉ email</label>
              <input class="form-control" type="text" name="email-update" required value="truong.vd2000@gmail.com">
            </div>
            <div class="form-group col-md-6">
              <label class="control-label">Địa chỉ</label>
              <input class="form-control" type="text" name="address-update" value="">
            </div>
            <div class="form-group col-md-6">
              <label class="control-label">Mật khẩu</label>
              <input class="form-control" type="password" name="password-update" value="">
            </div>
          </div>
          <BR>
          <BR>
          <form style="display: inline-block;" action="" method="post" >
            <input class="btn btn-save" type="submit" name="btn-save" value="Lưu lại">
          </form>
          <a class="btn btn-cancel" col-md-3 data-dismiss="modal" href="#">Hủy bỏ</a>
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

  <!-- Essential javascripts for application to work-->
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="src/jquery.table2excel.js"></script>
  <script src="js/main.js"></script>
  <!-- The javascript plugin to display page loading on top-->
  <script src="js/plugins/pace.min.js"></script>
  <!-- Page specific javascripts-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
  <!-- Data table plugin-->
  <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript">$('#sampleTable').DataTable();</script>
  <script>
    function deleteRow(r) {
      var i = r.parentNode.parentNode.rowIndex;
      document.getElementById("myTable").deleteRow(i);
    }
    jQuery(function () {
      jQuery(".trash").click(function () {
        swal({
          title: "Cảnh báo",
         
          text: "Bạn có chắc chắn là muốn xóa nhân viên này?",
          buttons: ["Hủy bỏ", "Đồng ý"],
        })
          .then((willDelete) => {
            if (willDelete) {
              swal("Đã xóa thành công.!", {
                
              });
            }
          });
      });
    });
    oTable = $('#sampleTable').dataTable();
    $('#all').click(function (e) {
      $('#sampleTable tbody :checkbox').prop('checked', $(this).is(':checked'));
      e.stopImmediatePropagation();
    });


    //Thời Gian
    function time() {
      var today = new Date();
      var weekday = new Array(7);
      weekday[0] = "Chủ Nhật";
      weekday[1] = "Thứ Hai";
      weekday[2] = "Thứ Ba";
      weekday[3] = "Thứ Tư";
      weekday[4] = "Thứ Năm";
      weekday[5] = "Thứ Sáu";
      weekday[6] = "Thứ Bảy";
      var day = weekday[today.getDay()];
      var dd = today.getDate();
      var mm = today.getMonth() + 1;
      var yyyy = today.getFullYear();
      var h = today.getHours();
      var m = today.getMinutes();
      var s = today.getSeconds();
      m = checkTime(m);
      s = checkTime(s);
      nowTime = h + " giờ " + m + " phút " + s + " giây";
      if (dd < 10) {
        dd = '0' + dd
      }
      if (mm < 10) {
        mm = '0' + mm
      }
      today = day + ', ' + dd + '/' + mm + '/' + yyyy;
      tmp = '<span class="date"> ' + today + ' - ' + nowTime +
        '</span>';
      document.getElementById("clock").innerHTML = tmp;
      clocktime = setTimeout("time()", "1000", "Javascript");

      function checkTime(i) {
        if (i < 10) {
          i = "0" + i;
        }
        return i;
      }
    }
    //In dữ liệu
    var myApp = new function () {
      this.printTable = function () {
        var tab = document.getElementById('sampleTable');
        var win = window.open('', '', 'height=700,width=700');
        win.document.write(tab.outerHTML);
        win.document.close();
        win.print();
      }
    }
    //Modal
    $("#show-emp").on("click", function () {
      $("#ModalUP").modal({ backdrop: false, keyboard: false })
    });
  </script>
</body>

</html>