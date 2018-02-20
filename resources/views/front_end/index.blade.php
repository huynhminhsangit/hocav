<!DOCTYPE html>
<html lang="en" ng-app="front">
@include('front_end.layout.head')
<body ng-controller="ShowController">
    <div class="pageWrapper animsition">
        <header class="top-head header-5" data-sticky="true">
            <div class="container">
                <!-- Logo start -->
                <div class="logo">
                    <a href="index.html"><img alt="" src="assets/images/logo.png" /></a>
                </div>
                <!-- Logo end -->

                <div class="f-right responsive-nav">
                    <!-- top navigation menu start -->
                    <nav class="top-nav nav-animate to-bottom">
                        <ul>
                            <li class="mega-menu"><a href="#">Trang chủ</a></li>
                            <li class="mega-menu"><a href="#">Giới thiệu</a></li>
                            <li>
                                <a href="#">Chương trình học</a>
                                <ul>
                                    <li><a href="#">Mất căn bản</a></li>
                                    <li><a href="#">Căn bản</a></li>
                                    <li><a href="#">Trung bình</a></li>
                                    <li><a href="#">Nâng cao</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Test</a>
                                <ul>
                                    <li><a href="#">Listenning</a></li>
                                    <li><a href="#">Reading</a></li>
                                    <li><a href="#">Writing</a></li>
                                    <li><a href="#">Free test</a></li>
                                    <li><a href="#">Test tổng hợp</a></li>

                                </ul>
                            </li>
                            <li>
                                <a href="#">Tài liệu</a>
                                <ul>
                                    <li><a href="blog-grid.html">Ngữ pháp</a></li>
                                    <li><a href="blog-grid-left-bar.html">Nghe</a></li>
                                    <li><a href="blog-grid-no-bar.html">Từ vựng theo chủ đề</a></li>
                                </ul>
                            </li>

                            <li class="mega-menu"><a href="#">Liên hệ</a></li>



                        </ul>
                    </nav>
                    <!-- top navigation menu end -->

                    <div class="f-right">
                        <!-- top search start -->
                        <div class="top-search">
                            <a href="#" class="main-bg shape sm"><span class="fa fa-search"></span></a>
                            <div class="search-box">
                                <input type="text" name="t" placeholder="Type And Hit Enter...">
                            </div>
                        </div>
                        <!-- top search end -->

                    </div>

                </div>
            </div>
        </header>

        <div id="contentWrapper">

            <div class="pageContent">

                <div class="page-title title-1">
                    <img ng-src="<%'img_banner/' + showbanner.image%>"/>
                </div>
                <!---Signin star-->
                <div id="block-right" data-status="0">
                    <ul id="right-side-bar" class="nav">
                        <li class="col-xs-12 text-center dark">
                            <a title="wse" href="#">
                                <span class="fa fa-users"></span><br>Đăng ký
                            </a>
                        </li>

                        <li class="col-xs-12 text-center dark">
                            <a title="wse" href="#">
                                <span class="fa fa-hand-o-right"></span><br>Đăng nhập
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="section parallax padding-vertical-60" style="background-image:url('upload/dark-space-desktop-background.jpg')" data-stellar-background-ratio="0.4">
                    <div class="section">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="shop-ads-top">
                                        <div>
                                            <img ng-src="<%'img_slider/' + showslider1.image%>"/>
                                        </div>
                                        <div>
                                            <img ng-src="<%'img_slider/' + showslider2.image%>"/>
                                        </div>
                                        <div>
                                            <img ng-src="<%'img_slider/' + showslider3.image%>"/>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="heading main-heading centered">
                        <h1 class=" white">Giới thiệu về chúng tôi</h1>

                    </div>
                    <div class="container">

                        <p class="heading-desc centered white">Bạn muốn sở hữu một bộ ảnh cưới lãng mạn? Nhẹ nhàng? Cá tính? Trẻ trung? Độc đáo hay đơn giản là những khoảnh khắc yêu thương của cả hai bạn từ những ngày đầu mới yêu? Lê Huy sẽ cùng bạn lưu giữ những giây phút hạnh phúc và thiêng liêng nhất trước khi bước vào cuộc sống hôn nhân sống động đầy màu sắc!</p>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="mu-service-area">
                                    <!-- Start single service -->
                                    <div class="mu-service-single bg-red">
                                        <span class="fa fa-book"></span>
                                        <h3>Tiếng anh cơ bản</h3>
                                        <p>Đảm bảo chất lượng theo chuẩn giám định Hoa kỳ, luôn cập nhật kiến thức và kỹ năng theo xu thế phát triển công nghệ</p>
                                    </div>
                                    <!-- Start single service -->
                                    <!-- Start single service -->
                                    <div class="mu-service-single bg-blue">
                                        <span class="fa fa-briefcase"></span>
                                        <h3>Từ vựng theo chủ đề</h3>
                                        <p><strong>100% Học viên</strong> sau khi tốt nghiệp từ <strong>ISC-QuangTrung</strong> được ít nhất <strong>03 Công ty thuộc VNITO Alliance</strong> phỏng vấn</p>
                                    </div>
                                    <!-- Start single service -->
                                    <!-- Start single service -->
                                    <div class="mu-service-single bg-green">
                                        <span class="fa fa-qrcode"></span>
                                        <h3>Ngữ pháp</h3>
                                        <p><strong>100% Học viên</strong> sau khi tốt nghiệp từ <strong>ISC-QuangTrung</strong> được ít nhất <strong>03 Công ty thuộc VNITO Alliance</strong> phỏng vấn</p>
                                    </div>
                                    <!-- Start single service -->
                                    <!-- Start single service -->
                                    <div class="mu-service-single bg-pink">
                                        <span class="fa fa-users"></span>
                                        <h3>Giao tiếp </h3>
                                        <p>Đảm bảo chất lượng theo chuẩn giám định Hoa kỳ, luôn cập nhật kiến thức và kỹ năng theo xu thế phát triển công nghệ</p>
                                    </div>
                                    <!-- Start single service -->
                                    <!-- Start single service -->
                                    <div class="mu-service-single bg-yelow">
                                        <span class="fa fa-file-excel-o"></span>
                                        <h3>Free test</h3>
                                        <p><strong>100% Học viên</strong> sau khi tốt nghiệp từ <strong>ISC-QuangTrung</strong> được ít nhất <strong>03 Công ty thuộc VNITO Alliance</strong> phỏng vấn</p>
                                    </div>
                                    <!-- Start single service -->
                                    <!-- Start single service -->
                                    <div class="mu-service-single bg-grow">
                                        <span class="fa fa-volume-up"></span>
                                        <h3>Luyện nghe</h3>
                                        <p><strong>100% Học viên</strong> sau khi tốt nghiệp từ <strong>ISC-QuangTrung</strong> được ít nhất <strong>03 Công ty thuộc VNITO Alliance</strong> phỏng vấn</p>
                                    </div>
                                    <!-- Start single service -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <footer id="footWrapper">

            <div class="footer-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 ">
                            <div class="first contact-widget padding-vertical-10">
                                <h3>Liên hệ</h3>
                                <ul class="details">

                                    <li><i class="fa fa-map-marker shape new-angle"></i><span><span class="heavy-font">119/1 Nguyên Hồng, p1, Gò vấp.</span></span></li>
                                    <li><i class="fa fa-phone shape new-angle"></i><span><span class="heavy-font">Tel: 0989 804 915</span></span></li>
                                    <li><i class="fa fa-envelope shape new-angle"></i><span><span class="heavy-font">Email: ninh.planet@gmail.com</span></span></li>

                                </ul>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="first padding-vertical-10">
                                <h3>Giới thiệu</h3>
                                <ul class="menu-widget">
                                    <li><a href="#">TẦM NHÌN – SỨ MỆNH – GIÁ TRỊ CỐT LÕI</a></li>
                                    <li><a href="#">LỊCH SỬ PHÁT TRIỂN</a></li>
                                    <li><a href="#">LÝ DO CHỌN ESUN</a></li>
                                    <li><a href="#">CÂU CHUYỆN THÀNH CÔNG</a></li>
                                    <li><a href="#">CÂU CHUYỆN THÀNH CÔNG</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="first padding-vertical-10">
                                <h3>Chương Trình học</h3>
                                <ul class="menu-widget">
                                    <li><a href="#"><i class="fa fa-angle-right"></i>Anh văn mẫu giáo</a></li>
                                    <li><a href="#"><i class="fa fa-angle-right"></i>Anh văn thiếu nhi</a></li>
                                    <li><a href="#"><i class="fa fa-angle-right"></i>Anh văn thiếu niên</a></li>
                                    <li><a href="#"><i class="fa fa-angle-right"></i>Anh văn giao tiếp</a></li>
                                    <li><a href="#"><i class="fa fa-angle-right"></i>Anh văn TOEIC</a></li>
                                    <li><a href="#"><i class="fa fa-angle-right"></i>Anh văn IELTS</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 last padding-vertical-10">
                            <div class="first">
                                <h3 class="f-primary-b">FACEBOOK</h3>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="copyrights col-md-12 first t-center">Bản quyền 2018 The dogs team. Bảo lưu mọi quyền.</div>                            
                    </div>
                </div>
            </div>
        </footer>

    </div>
</div>
<a id="to-top"><span class="fa fa-chevron-up shape main-bg"></span></a>
@include('front_end.layout.js')
</body>
</html>