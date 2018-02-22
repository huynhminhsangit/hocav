<!DOCTYPE html>
<html lang="en" ng-app="front">
@include('front_end.layout.head')
<body>
    <div class="pageWrapper animsition">
        <header class="top-head header-5" data-sticky="true">
            <div class="container">
                <!-- Logo start -->
                <div class="logo">
                    <a href="index.html"><img alt="" ng-src="<%'logo/28380983_665169946986847_2022095945_n.jpg'%>" /></a>
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
        <div ng-controller="ShowController">
            @yield('content')
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
        <a id="to-top"><span class="fa fa-chevron-up shape main-bg"></span></a>
        @include('front_end.layout.js')
    </body>
    </html>