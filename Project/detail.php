<?php 
    require 'layouts/header.php';
    require 'layouts/content-top-sidebar.php';

    $magoithau = "";
    if (isset ($_GET['magoithau'])) {
    // code...
        $magoithau = $_GET['magoithau'];
    }
    $ttgoithau = executeResult("SELECT goithau.*, doanhnghiep.* FROM `goithau` INNER JOIN `doanhnghiep` ON goithau.madoanhnghiep = doanhnghiep.madoanhnghiep WHERE goithau.magoithau =".$magoithau);
    if($ttgoithau == NULL){
        header("Location: index.php");
    }
    
?>
                            <div class="tab-content">
                                <div id="bidding" class="tab-pane fade show">
                                    <table class="bidding-table">
                                        <thead>
                                            <tr>
                                                <th>Gói thầu</th>
                                                <th>Bên mời thầu</th>
                                                <th>Địa chỉ</th>
                                                <th>Email</th>
                                                <th>Số điện thoại</th>
                                                <th>Công bố</th>
                                                <th>Đóng thầu</th>
                                            </tr>
                                        </thead>
                                        <?php
                                            foreach($ttgoithau as $item) {
                                                ?>
                                        <tbody>
                                            <tr>
                                                <td class="order-header" data-column="Gói thầu">
                                                    <div>
                                                        <a title="" href="">
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
                                                <td data-column="Địa chỉ">
                                                    <div>
                                                        <span title="">
                                                            
                                                            <span class="solicitor-code"><?php echo $item['diachi'];?></span>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td data-column="Email">
                                                    <div>
                                                        <span title="">
                                                            <span class="solicitor-code"><?php echo $item['email'];?></span> 
                                                        </span>
                                                    </div>
                                                </td>
                                                <td data-column="Số điện thoại">
                                                    <div>
                                                        <span title=""
                                                            href="">
                                                            <span class="solicitor-code"><?php echo $item['sdt'];?></span>
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
                                    <button class="btn btn-success" onclick="addToCart(<?php echo $magoithau; ?>)">Lựa chọn gói thầu</button>
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
                                    

<script type="text/javascript">
    function addToCart(magoithau){     
        $.post('api/cookie.php',{
        'action': 'add',
        'id' : magoithau,
        'num': 1
        }, function(data){
            location.reload();
        });
    }
</script>
<?php 
    require 'layouts/sidebar-right.php';
    require 'layouts/footer.php';
?>