<?php require '../layouts/header.php';
  $sqlCOUNT = executeResult("SELECT COUNT(*) FROM `doanhnghiep`");
  $count_DN = $sqlCOUNT[0]['COUNT(*)'];

  $sqlCOUNTGT = executeResult("SELECT COUNT(*) FROM `goithau`");
  $count_GT = $sqlCOUNTGT[0]['COUNT(*)'];
?>
  <main class="app-content">
    <div class="row">
      <div class="col-md-12">
        <div class="app-title">
          <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="#"><b>Bảng điều khiển</b></a></li>
          </ul>
          <div id="clock"></div>
        </div>
      </div>
    </div>
    <div class="row">
      <!--Left-->
      <div class="col-md-12 col-lg-6">
        <div class="row">
       <!-- col-6 -->
       <div class="col-md-6">
        <div class="widget-small primary coloured-icon"><i class='icon bx bxs-user-account fa-3x'></i>
          <div class="info">
            <h4>Tổng doanh nghiệp</h4>
            <p><b><?php print_r($count_DN); ?> Doanh nghiệp</b></p>
            <p class="info-tong">Tổng số doanh nghiệp được quản lý.</p>
          </div>
        </div>
      </div>
       <!-- col-6 -->
          <div class="col-md-6">
            <div class="widget-small info coloured-icon"><i class='icon bx bxs-data fa-3x'></i>
              <div class="info">
                <h4>Tổng gói thầu</h4>
                <p><b><?php print_r($count_DN); ?> Gói thầu</b></p>
                <p class="info-tong">Tổng số gói thầu.</p>
              </div>
            </div>
          </div>
           <!-- col-6 -->
           <div class="col-md-6">
            <div class="widget-small warning coloured-icon"><i class='icon bx bxs-shopping-bags fa-3x'></i>
              <div class="info">
                <h4>Số gói thầu được quan tâm</h4>
                <p><b>3</b></p>
                <p class="info-tong">Các gói thầu được nhà đầu tư quan tâm</p>
              </div>
            </div>
          </div>
           <!-- col-6 -->
          <div class="col-md-6">
            <div class="widget-small danger coloured-icon"><i class='icon bx bxs-error-alt fa-3x'></i>
              <div class="info">
                <h4>Số gói thầu sắp đến ngày đóng thầu</h4>
                <p><b>3</b></p>
                <p class="info-tong">Các gói thầu sắp hết hạn tính đến hiện tại</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--END left-->
      <!--Right-->
      <div class="col-md-12 col-lg-6">
        <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <h3 class="tile-title">Dữ liệu 6 tháng đầu vào</h3>
              <div class="embed-responsive embed-responsive-16by9">
                <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="tile">
              <h3 class="tile-title">Thống kê 6 tháng doanh thu</h3>
              <div class="embed-responsive embed-responsive-16by9">
                <canvas class="embed-responsive-item" id="barChartDemo"></canvas>
              </div>
            </div>
          </div>
        </div>

      </div>
      <!--END right-->
    </div>


   <?php require '../layouts/footer.php';?>