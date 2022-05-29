<?php
    require 'untils/untils.php';
    require 'db/dbhelper.php';
    require 'lib/validation.php';
    ob_start();
    session_start();


    //Code tìm kiếm
    // if(isset($_POST['btn_search'])){
    //     $keyword = $_POST['keyword'];
    // }
    // $sql = "SELECT * FROM `goithau` WHERE `goithau` LIKE '%$keyword%' ORDER BY `title`";
    
    //Thêm gói thầu
    $url = "";
    if(is_login()){
        $url = "create-new.php";
    }
    else{
        $url = "login.php";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/grid-basic.css">
    <link rel="stylesheet" href="public/fonts/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="stylesheet" href="public/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/main.css"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div id="wrapper">
        <div id="header">
            <div id="header-top">
                <div class="navbar-brands">
                    <div class="navbar-brands-inner">
                        <a href="index.php" class="navbar-brand float-left logo-item"><span class="logo" style="width: 200px;">&nbsp;</span></a>
                    </div>
                </div>
                <div class="navbar-right">
                    <div class="navbar-contact">
                        <ul>
                            <li class="float-left"><a title="facebook" href=""><i
                                        class="fa-brands fa-facebook-square"></i></a></li>
                            <li class="float-left"><a title="youtube" href=""><i
                                        class="fa-brands fa-youtube-square"></i></a></li>
                            <li class="float-left"><a title="twitter" href=""><i
                                        class="fa-brands fa-twitter-square"></i></a></li>
                        </ul>
                        <ul>
                            <li><i class="fa-solid fa-phone" style="margin-right: 10px;"></i><a style="color: #28a745; text-decoration:none!important; font-weight:bold;" href="tel:0977805536">0977805536 (Hotline)</a></li>
                            <li><i class="fa-solid fa-envelope" style="margin-right: 10px;"></i><a style="color: #28a745; text-decoration:none; font-weight:bold;" href="mailto:quantao134@gmail.com">btluddlwG5@gmail.com</a></li>
                        </ul>
                    </div>
                    <div class="navbar-login">
                        <a href="login.php"><span class="btn_login">Đăng ký / Đăng nhập</span></a>
                        <a href="<?php echo $url;?>"><span class="btn_login">Thêm gói thầu</span></a>
                    </div>
                </div>
            </div>
            <div id="header-bot">
                <ul id="main-menu">
                    <li><a href="index.php" style="color: white;"><i class="fa-solid fa-house"></i></a></li>
                    <li class="dropdown">
                        <a href="#"><span>giới thiệu</span></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item list-group-item"><span> Tìm hiểu về Đấu thầu</span></li>
                            <li class="dropdown-item list-group-item"><span> Giới thiệu về DauThau.info</span></li>
                            <li class="dropdown-item list-group-item"><span> Tính năng các gói phần mềm</span></li>
                            <li class="dropdown-item list-group-item"><span> Các mốc lịch sử</span></li>
                            <li class="dropdown-item list-group-item"><span> Báo chí viết về DauThau.info</span></li>
                            <li class="dropdown-item list-group-item"><span> Khách hàng nói về DauThau.info</span></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#"><span>bảng giá</span></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item list-group-item"><span> Bảng giá gói SIEUVIP – Siêu công cụ dành
                                    cho nhà thầu Việt Nam</span> </li>
                            <li class="dropdown-item list-group-item"><span> Bảng giá gói VIP1, VIP2 - Phần mềm săn thầu
                                    trong nước</span> </li>
                            <li class="dropdown-item list-group-item"><span> Bảng giá gói VIP3 - Đọc vị đối thủ cạnh
                                    tranh và bên mời thầu</span> </li>
                            <li class="dropdown-item list-group-item"><span> Bảng giá gói X1: Xuất kết quả đấu thầu ra
                                    excel</span> </li>
                            <li class="dropdown-item list-group-item"><span> Bảng giá gói T0: Tải không giới hạn hồ sơ
                                    mời thầu trên mọi trình duyệt</span> </li>
                            <li class="dropdown-item list-group-item"><span> Bảng giá gói VIEWEB, PRO1 - Phần mềm tra
                                    cứu thông tin thầu cơ bản</span> </li>
                            <li class="dropdown-item list-group-item"><span> Bảng giá gói TDT - Công cụ xuất nhập dữ
                                    liệu thầu vào webform trên MSC</span> </li>
                            <li class="dropdown-item list-group-item"><span> Bảng giá gói VIP7 - "Săn" kết quả lựa chọn
                                    nhà thầu</span> </li>
                            <li class="dropdown-item list-group-item"><span> Bảng giá gói VIP5 - Cung cấp thông tin thầu
                                    vốn WB, ODA, ADB, UNICEF, UNDP...</span> </li>
                            <li class="dropdown-item list-group-item"><span> Bảng giá gói VIP4 - Trợ lý số cho nhà đầu
                                    tư thời đại 4.0</span> </li>
                            <li class="dropdown-item list-group-item"><span> Bảng giá gói VIP1QT, VIP2QT - Phần mềm săn
                                    thầu Quốc tế</span> </li>
                            <li class="dropdown-item list-group-item"><span> Bảng giá gói VIP6 - Phần mềm “Săn” tài sản
                                    đấu giá (DauGia.Net)</span> </li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><span>tin tức</span></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item list-group-item"><span>Thông tin tổng hợp</span></li>
                            <li class="dropdown-item list-group-item"><span>Đấu thầu</span></li>
                            <li class="dropdown-item list-group-item"><span>Đấu giá</span></li>
                            <li class="dropdown-item list-group-item"><span>Blog</span></li>
                            <li class="dropdown-item list-group-item"><span>Cộng tác viên</span></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><span>đấu thầu</span></a>
                        <ul class="dropdown-menu">

                            <li class="dropdown-item list-group-item">item 1</li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#"><span>đấu giá</span></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item list-group-item"><span>Thông báo đấu giá</span></li>
                            <li class="dropdown-item list-group-item"><span>Thông báo chọn tổ chức đấu giá</span></li>
                            <li class="dropdown-item list-group-item"><span>Danh sách tổ chức đấu giá</span></li>
                            <li class="dropdown-item list-group-item"><span>Danh sách sở tư pháp</span></li>

                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><span>thành viên</span></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item list-group-item"><span>Đăng ký</span></li>
                            <li class="dropdown-item list-group-item"><span>Đăng nhập</span></li>
                            <li class="dropdown-item list-group-item"><span>Thay đổi thông tin quan tâm</span></li>
                            <li class="dropdown-item list-group-item"><span>Đăng ký các gói phần mềm VIP</span></li>
                            <li class="dropdown-item list-group-item"><span>Đơn hàng của bạn</span></li>
                            <li class="dropdown-item list-group-item"><span>Quản lý bộ lọc tìm kiếm</span></li>
                            <li class="dropdown-item list-group-item"><span>Quản lý điểm</span></li>
                            <li class="dropdown-item list-group-item"><span>Quản lý tiền mặt</span></li>
                            <li class="dropdown-item list-group-item"><span>Theo dõi tin</span></li>
                            <li class="dropdown-item list-group-item"><span>Cộng Tác Viên</span></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><span>hướng dẫn</span></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item list-group-item"><span>Hướng dẫn sử dụng</span></li>
                            <li class="dropdown-item list-group-item"><span>Hướng dẫn đăng kí & mu hàng</span></li>
                            <li class="dropdown-item list-group-item"><span>Hướng dẫn tra cúu thông tin nhà thầu</span>
                            </li>
                            <li class="dropdown-item list-group-item"><span>Yêu cầu để sử dụng phần mềm
                                    Dauthau.info</span></li>
                            <li class="dropdown-item list-group-item"><span>Điều khoản & Quy định</span></li>
                            <li class="dropdown-item list-group-item"><span>Thông tin thanh toán</span></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><span>liên hệ</span></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item list-group-item"><span>Chăm sóc khách hàng</span></li>
                            <li class="dropdown-item list-group-item"><span>Hỗ trợ kỹ thuật</span></li>
                            <li class="dropdown-item list-group-item"><span>Hỗ trợ Cộng tác viên</span></li>
                            <li class="dropdown-item list-group-item"><span>Hợp tác phát triển</span></li>
                        </ul>
                    </li>
                    <li>&nbsp;</li>
                </ul>
            </div>
        </div>
        <!-- ====================end header ===============================-->
        