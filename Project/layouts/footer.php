<div class="d-flex">
                                        <a class="btn btn-primary act-bidding data-pc" href="#"
                                            data-href="bidding">Thông báo mời thầu</a>
                                        <a class="btn btn-danger" href="/detail/" style="margin-left: auto">Xem thêm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="block-bidding px-0">
                            <div class="border-bidding data-pc pt-3">
                                <h3 class="title__tab_heading">Lời chào</h3>
                            </div>
                            <div class="tab-content">
                                <p>Chào <strong>Bạn</strong>,</p>
                                <p>Bạn chưa đăng nhập, vui lòng <a href="#"><strong>đăng nhập</strong></a> để sử dụng
                                    hết các chức năng dành cho thành viên.</p>
                                <p>
                                    Nếu Bạn chưa có tài khoản thành viên, hãy <a href="#"><strong>đăng ký</strong></a>.
                                </p>
                            </div>
                        </div>
                        <div class="nv-block-banners">
                            <a rel="nofollow" href="#" data-target="_blank" title="QC sàn đấu thầu tư nhân"
                                target="_blank">
                                <img alt="QC sàn đấu thầu tư nhân"
                                    src="https://cdn.dauthau.asia/uploads/banners/dauthau.net-mang-dau-thau-tu-nhan-tai-viet-nam.jpg">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ====================end content ===============================-->

    <div id="footer">
        <footer class="bg-dark text-center">
            <div class="container p-3">
                <!-- Section: Social media -->
                <section class="mb-4">
                    <!-- Facebook -->
                    <a class="btn btn-outline-light btn-floating m-1 rounded-circle p-1" href="#!" role="button"><i
                            class="fab fa-facebook-f"></i></a>

                    <!-- Twitter -->
                    <a class="btn btn-outline-light btn-floating m-1 rounded-circle p-1" href="#!" role="button"><i
                            class="fab fa-twitter"></i></a>

                    <!-- Google -->
                    <a class="btn btn-outline-light btn-floating m-1 rounded-circle p-1" href="#!" role="button"><i
                            class="fab fa-google"></i></a>

                    <!-- Instagram -->
                    <a class="btn btn-outline-light btn-floating m-1 rounded-circle p-1" href="#!" role="button"><i
                            class="fab fa-instagram"></i></a>

                    <!-- Linkedin -->
                    <a class="btn btn-outline-light btn-floating m-1 rounded-circle p-1" href="#!" role="button"><i
                            class="fab fa-linkedin-in"></i></a>

                    <!-- Github -->
                    <a class="btn btn-outline-light btn-floating m-1 rounded-circle p-1" href="#!" role="button"><i
                            class="fab fa-github"></i></a>
                </section>
                <!-- Section: Social media -->
                <!-- Section: Text -->
                <section class="mb-4">
                    <h4>
                        DauThau.info - Siêu công cụ săn tin thầu mua sắm công và mua sắm tư nhân
                    </h4>
                    <p>
                        DauThau.info là hệ thống phần mềm phân tích thông tin mời thầu thế hệ mới dành cho doanh nghiệp,
                        giúp doanh nghiệp tìm kiếm, phân tích thông tin về các dự án đấu thầu mua sắm công và mua sắm tư
                        nhân trên cả nước.
                    </p>
                </section>
                <!-- Section: Text -->
            </div>
        </footer>
    </div>
    <!-- ====================end footer ===============================-->
    </div>

    <!-- JS -->
    <script>
        // show slide banner
        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");
            if (n > slides.length) { slideIndex = 1 }
            if (n < 1) { slideIndex = slides.length }
            for (i = 0; i < slides.length; i++) {
                slides[i].classList.remove('show');
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].classList.add('show');
            dots[slideIndex - 1].className += " active";
        }

        // set default time of input date
        var PlanContent = document.getElementById('plan')
        var BiddingContent = document.getElementById('bidding')
        const BiddingHeading = document.getElementById('bidding_tab_heading')
        const PlanHeading = document.getElementById('plan_tab_heading')

        function ShowContent(Element, ContentShow, ContentHide){
            let HeadingElements = document.querySelectorAll('.title__tab_heading')
            HeadingElements.forEach(element => {
                element.parentElement.classList.remove('active')
            });
            Element.parentElement.classList.add("active")
            ContentHide.classList.remove("show")
            ContentShow.classList.add("show")
        }
        BiddingHeading.childNodes.forEach(element => {
            element.addEventListener("click", function(event){
                ShowContent(this.parentElement, BiddingContent, PlanContent)
                event.preventDefault()
            });
        });
        PlanHeading.childNodes.forEach(element => {
            element.addEventListener("click", function(event){
                ShowContent(this.parentElement, PlanContent, BiddingContent)
                event.preventDefault()
            });
        });
        document.querySelector('.act-plan').addEventListener('click', function(event){
            PlanHeading.firstElementChild.click();
            event.preventDefault()
        })
        document.querySelector('.act-bidding').addEventListener('click', function (event) {
            BiddingHeading.firstElementChild.click();
            event.preventDefault()
        })
    </script>
    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/main.js"></script>
    <script src="js/popper.min.js"></script>
</body>

</html>