<?php
    
?>
<div class="d-flex">
                                        <a class="btn btn-success act-bidding data-pc" href="#"
                                            data-href="bidding">Thông báo mời thầu</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="block-bidding px-0">
                            <div class="border-bidding data-pc pt-3">
                                <h3 class="title__tab_heading" style="color: #28a745">Lời chào</h3>
                            </div>
                            <div class="tab-content">
                                <p style="font-size: 25px;">Chào <strong><?php if(is_login()){echo $_SESSION['user']; ?></strong><?php echo "<p style='font-size:25px;'>, chúc bạn một ngày tốt lành và tìm được gói thầu mong muốn nhé ^^!</p>";  echo "<br><br><a href='logout.php'><span class='btn btn-success btn_logout' style='width: 100%; height: 40px;'>Đăng xuất</span></a>";} else{?></p>
                                <p>Bạn chưa đăng nhập, vui lòng <a href="login.php"><strong style="color: #28a745">đăng nhập</strong></a> để sử dụng
                                    hết các chức năng dành cho thành viên.</p>
                                <p>
                                    Nếu Bạn chưa có tài khoản thành viên, hãy <a href="register.php"><strong style="color: #28a745">đăng ký</strong></a>.
                                </p>
                                <?php }?>
                            </div>
                        </div>
                        <div class="nv-block-banners">
                            <a rel="nofollow" href="#" data-target="_blank" title="QC sàn đấu thầu tư nhân"
                                target="_blank">
                                <img style="width: 100%;" alt="QC sàn đấu thầu tư nhân"
                                    src="public/images/logo.png" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ====================end content ===============================-->
