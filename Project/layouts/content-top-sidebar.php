<div id="sliders">
            <div class="slideshow-container">
                <div class="mySlides fade">
                    <img src="public/images/banner1.png" style="width:100%;">
                </div>
                <div class="mySlides fade">
                    <img src="public/images/banner2.png" style="width:100%">
                </div>
                <div class="mySlides fade">
                    <img src="public/images/banner3.png" style="width:100%">
                </div>
                <a class="prev-slide" onclick="plusSlides(-1)">❮</a>
                <a class="next-slide" onclick="plusSlides(1)">❯</a>
            </div>
            <div class="dot-group">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
            </div>
        </div>
        <!-- ====================end slider ===============================-->
        <div id="content">
            <div class="container">
                <div id="center-search-bl">
                    <div class="block-bidding">
                        <div class="search-cont-row">
                            <h3>Tìm kiếm thông tin</h3>
                            <div class="tag__search">
                                <a href="#"><strong>#đấu thầu mua sắm công</strong></a>
                                <a href="#"><strong>#đấu thầu đầu tư công</strong></a>
                                <a href="#"><strong>#đấu giá tài sản</strong></a>
                            </div>
                            <p>Dữ liệu được cập nhật liên tục, hỗ trợ tìm kiếm nhanh chóng, chính xác và không hạn chế
                                thời gian.</p>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label"><strong>Từ khóa chính</strong></label>
                                    <div class="search-cont-row">
                                        <div class="col-xs-24">
                                            <form class="input-group" method="post" action="search.php">
                                                <input class="form-control" id="ls_key_bidding" type="text" name="q"
                                                    value="" data-default="" maxlength="200"
                                                    data-error="Vui lòng nhập ít nhất 3 ký tự hoặc để trống">
                                                <div class="input-group-btn">
                                                    <input class="btn btn-success" type="submit" value="Tìm kiếm">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- <div class="col">
                                    <div class="form-group">
                                        <label class="control-label"><strong>Thông tin dành cho</strong></label>
                                        <div class="d-flex">
                                            <label class="custom-radio-inline"> <input type="radio" name="type_search"
                                                    value="1" checked=""><span class="span-txt">Nhà thầu</span>
                                            </label> <label class="custom-radio-inline"> <input type="radio"
                                                    name="type_search" value="2"><span class="span-txt">Nhà đầu tư</span>
                                            </label>
                                        </div>
                                    </div>
                                </div> -->
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="control-label"><strong>Loại thông tin</strong></label>
                                            <select class="form-control" onchange="bl_changeTypeInfo()" name="type_info"
                                                data-default="1">
                                                <option value="1" selected="selected">Thông báo mời thầu</option>
                                                <option value="2">Kế hoạch lựa chọn nhà thầu</option>
                                                <option value="7">Dự án đầu tư phát triển</option>
                                                <option value="3">Kết quả lựa chọn nhà thầu</option>
                                                <option value="4">Thông báo mời sơ tuyển/quan tâm</option>
                                                <option value="5">Kết quả mở thầu</option>
                                                <option value="6">Kết quả sơ tuyển</option>
                                            </select>
                                            <!-- <select class="form-control" onchange="bl_changeTypeInfo2()"
                                                name="type_info2" data-default="1" style="display: none">
                                                <option value="1">Công bố danh mục dự án</option>
                                                <option value="2">Thông báo mời đầu tư</option>
                                                <option value="3">Thông báo mời sơ tuyển/quan tâm</option>
                                                <option value="4">Kế hoạch lựa chọn nhà đầu tư</option>
                                                <option value="5">Kết quả lựa chọn nhà đầu tư</option>
                                                <option value="6">Kết quả sơ tuyển nhà đầu tư</option>
                                            </select>
                                            <select class="form-control" onchange="bl_changeTypeInfo3()"
                                                name="type_info3" data-default="1" style="display: none">
                                                <option value="1">Thông báo công khai việc đấu giá</option>
                                                <option value="2">Thông báo lựa chọn tổ chức đấu giá</option>
                                            </select> -->
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label class="control-label"><strong>Khoảng thời gian công bố</strong></label>
                                        <div class="row">
                                            <div class="col">
                                                <input class="form-control" type="date" name="sfrom" value="07/05/2022"
                                                    data-default="07/05/2022">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>
            <div class="container pb-5">
                <div class="row">
                    <div class="col">
                        <div class="block-bidding px-0">
                            <div class="border-bidding data-pc pt-3">
                                <ul class="nav nav-pills">
                                    <li class="active">
                                        <h3 id="bidding_tab_heading" class="title__tab_heading" > 
                                            <a data-toggle="pill" href="#bidding">Thông báo mời thầu</a>
                                        </h3>
                                    </li>
                                    <li class="">
                                        <h3 id="plan_tab_heading" class="title__tab_heading">
                                            <a data-toggle="pill" href="#plan">Kế hoạch lựa chọn nhà thầu</a>
                                        </h3>
                                    </li>
                                </ul>
                            </div>