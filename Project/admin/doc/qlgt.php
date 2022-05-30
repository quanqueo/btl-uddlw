<?php 
  require '../layouts/header.php';

  $qlgt = executeResult("SELECT goithau.*, doanhnghiep.madoanhnghiep FROM `goithau` INNER JOIN `doanhnghiep` ON goithau.madoanhnghiep = doanhnghiep.madoanhnghiep");
?>
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item active"><a href="#"><b>Danh sách gói thầu</b></a></li>
            </ul>
            <div id="clock"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">
                            <div class="col-sm-2">
              
                              <a class="btn btn-add btn-sm" href="themgoithau.php" title="Thêm"><i class="fas fa-plus"></i>
                                Tạo mới gói thầu</a>
                            </div>
              
                            <div class="col-sm-2">
                              <a class="btn btn-delete btn-sm print-file" type="button" title="In" onclick="myApp.printTable()"><i
                                  class="fas fa-print"></i> In dữ liệu</a>
                            </div>
                          </div>
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th width="10"><input type="checkbox" id="all"></th>
                                    <th>Mã gói thầu</th>
                                    <th>Tên gói thầu</th>
                                    <th>Mã doanh nghiệp</th>
                                    <th>Ngày công bố</th>
                                    <th>Ngày đóng thầu</th>
                                    <th>Tính năng</th>
                                </tr>
                            </thead>
                            <?php
                              foreach($qlgt as $item){
                                  ?>
                            <tbody>
                                <tr>
                                    <td width="10"><input type="checkbox" name="check1" value="1"></td>
                                    <td><?php echo $item['magoithau'];?></td>
                                    <td width="500"><?php echo $item['tengoithau'];?></td>
                                    <td><?php echo $item['madoanhnghiep'];?></td>
                                    <td><?php echo $item['ngaycongbo'];?></td>
                                    <td><?php echo $item['ngaydongthau'];?></td>
                                    <td>
                                    <form action="update_gt.php?magoithau=<?php echo $item['magoithau']?>" method="post" style="display: inline-block;">
                                      <input type="hidden" name="id" value="<?php echo $item['magoithau'];?>">
                                      <button class="btn btn-primary btn-sm edit" title="Sửa" ><i class="fas fa-edit"></i></button>
                                    </form>
                                    <form action="delete_gt.php" method="post" style="display: inline-block;"> 
                                        <input type="hidden" name="id" value="<?php echo $item['magoithau'];?>">  
                                        <button onclick="return confirm('Bạn có chắc chắn muốn xóa không?');" class="btn btn-primary btn-sm trash" title="Xóa"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                    </td>
                                </tr>
                            </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
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
    <script type="text/javascript">
        $('#sampleTable').DataTable();
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
    document.querySelectorAll(".app-menu__item").forEach(element => {
              element.classList.remove("active")
              if(element.getAttribute("href") == "qlgt.php"){
                  element.classList.add("active")
              }
        });
    </script>
</body>

</html>