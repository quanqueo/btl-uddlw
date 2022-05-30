<?php 
    require 'layouts/header.php';
    require 'layouts/content-top-sidebar.php';
    
    //Code tìm kiếm
    $keyword = "";
    if(isset($_REQUEST['btn_search'])){
        $keyword = $_GET['keyword'];
    }
    $search = executeResult("SELECT goithau.*, doanhnghiep.tendoanhnghiep FROM `goithau` INNER JOIN `doanhnghiep` ON goithau.madoanhnghiep = doanhnghiep.madoanhnghiep WHERE `tengoithau` LIKE '%$keyword%'");
?>
<h2>Kết quả tìm kiếm cho #<?php echo $keyword;?></h2>
<div class="tab-content">
                                <div id="bidding" class="tab-pane fade show">
                                    <table class="bidding-table">
                                        <thead>
                                            <tr>
                                                <th>Gói thầu</th>
                                                <th>Bên mời thầu</th>
                                                <th>Công bố</th>
                                                <th>Đóng thầu</th>
                                            </tr>
                                        </thead>
                                        <?php
                                            foreach($search as $item) {
                                                ?>
                                        <tbody>
                                            <tr>
                                                <td class="order-header" data-column="Gói thầu">
                                                    <div>
                                                        <a title="Dịch vụ đại tu giàn Tam Đảo-02 - Mua thiết bị và phụ tùng phục vụ sửa chữa lớn (ĐH VT-223/22-KB)"
                                                            href="detail.php?magoithau=<?php echo $item['magoithau'];?>">
                                                            <span class="bidding-code"><?php echo $item['magoithau'];?></span><?php echo $item['tengoithau'];?>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td data-column="Bên mời thầu">
                                                    <div>
                                                        <span title="Liên doanh Việt Nga Vietsovpetro"
                                                            href="">
                                                            <span class="solicitor-code"><?php echo $item['madoanhnghiep'];?></span> <?php echo $item['tendoanhnghiep'];?>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="text-center" data-column="Công bố">
                                                    <div><?php echo $item['ngaycongbo'];?></div>
                                                </td>
                                                <td class="text-center" data-column="Đóng thầu">
                                                    <div><?php echo $item['ngaydongthau'];?></div>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <?php
                                            }
                                                ?>
                                    </table>
                                    <div class="d-flex">
                                        <a class="btn btn-success act-plan data-pc" href="#" data-href="plan">Kế hoạch
                                            lựa chọn
                                            nhà thầu</a>
                                    </div>
                                </div>
                                <div id="plan" class="tab-pane fade">
                                    <table class="bidding-table">
                                        <thead>
                                            <tr>
                                                <th>Tên KHLCNT</th>
                                                <th>Bên mời thầu</th>
                                                <th>Công bố</th>
                                                <th>Gói thầu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="order-header" data-column="Tên KHLCNT">
                                                    <div>
                                                        <a title="Mua 13 mặt hàng vật tư y tế tiêu hao sử dụng tại Bệnh viện Sản Nhi tỉnh Ninh Bình trong 3 tháng"
                                                            href="#"><span class="plan-code">20220551167-00</span> Mua
                                                            13 mặt hàng vật tư y tế tiêu hao sử dụng tại Bệnh viện Sản
                                                            Nhi tỉnh Ninh Bình trong 3 tháng</a>
                                                    </div>
                                                </td>
                                                <td data-column="Bên mời thầu">
                                                    <div>
                                                        <a title="Bệnh viện Sản Nhi Ninh Bình" href="#"> <span
                                                                class="solicitor-code">Z033766</span> Bệnh viện Sản Nhi
                                                            Ninh Bình
                                                        </a>
                                                    </div>
                                                </td>
                                                <td class="text-center" data-column="Công bố">
                                                    <div>10:03 20/05/2022</div>
                                                </td>
                                                <td class="text-center" data-column="Gói thầu">
                                                    <div>1</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="order-header" data-column="Tên KHLCNT">
                                                    <div>
                                                        <a title="Mua 13 mặt hàng vật tư y tế tiêu hao sử dụng tại Bệnh viện Sản Nhi tỉnh Ninh Bình trong 3 tháng"
                                                            href="#"><span class="plan-code">20220551167-00</span> Mua
                                                            13 mặt hàng vật tư y tế tiêu hao sử dụng tại Bệnh viện Sản
                                                            Nhi tỉnh Ninh Bình trong 3 tháng</a>
                                                    </div>
                                                </td>
                                                <td data-column="Bên mời thầu">
                                                    <div>
                                                        <a title="Bệnh viện Sản Nhi Ninh Bình" href="#"> <span
                                                                class="solicitor-code">Z033766</span> Bệnh viện Sản Nhi
                                                            Ninh Bình
                                                        </a>
                                                    </div>
                                                </td>
                                                <td class="text-center" data-column="Công bố">
                                                    <div>10:03 20/05/2022</div>
                                                </td>
                                                <td class="text-center" data-column="Gói thầu">
                                                    <div>1</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="order-header" data-column="Tên KHLCNT">
                                                    <div>
                                                        <a title="Mua 13 mặt hàng vật tư y tế tiêu hao sử dụng tại Bệnh viện Sản Nhi tỉnh Ninh Bình trong 3 tháng"
                                                            href="#"><span class="plan-code">20220551167-00</span> Mua
                                                            13 mặt hàng vật tư y tế tiêu hao sử dụng tại Bệnh viện Sản
                                                            Nhi tỉnh Ninh Bình trong 3 tháng</a>
                                                    </div>
                                                </td>
                                                <td data-column="Bên mời thầu">
                                                    <div>
                                                        <a title="Bệnh viện Sản Nhi Ninh Bình" href="#"> <span
                                                                class="solicitor-code">Z033766</span> Bệnh viện Sản Nhi
                                                            Ninh Bình
                                                        </a>
                                                    </div>
                                                </td>
                                                <td class="text-center" data-column="Công bố">
                                                    <div>10:03 20/05/2022</div>
                                                </td>
                                                <td class="text-center" data-column="Gói thầu">
                                                    <div>1</div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
<?php 
    require 'layouts/sidebar-right.php';
    require 'layouts/footer.php';
?>