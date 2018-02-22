@extends('front_end.layout.master')
@section('content')
<div class="page-title title-1">
    <img ng-src="<%'img_banner/' + showbanner.image%>" ng-if="showbanner.image"/>
</div>
<!---Signin star-->
<div id="block-right" data-status="0">
    <ul id="right-side-bar" class="nav">
        <li class="col-xs-12 text-center dark">
            Đăng Nhập
        </li>

        <li class="col-xs-12 text-center dark">

            <a title="wse" href="{{ url('auth/google') }}">
                @if(Auth::guard('client')->user())
                <img src="{{Auth::guard('client')->user()->avatar}}"/>
                {{Auth::guard('client')->user()->name}}
                <form action="{{ route('logout_client') }}" method="POST">
                    {{ csrf_field() }}
                    <button type="submit">Đăng Xuất</button>
                </form>
                @else
                <span class="fa fa-hand-o-right"></span><br>Google
                @endif
            </a>

        </li>
    </ul>
</div>
<div class="section parallax padding-vertical-60" style="background-image:url('mis/dark-space-desktop-background.jpg')" data-stellar-background-ratio="0.4">
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="shop-ads-top">
                        <div>
                            <img ng-src="<%'img_slider/' + showslider1.image%>" ng-if="showslider1.image"/>
                        </div>
                        <div>
                            <img ng-src="<%'img_slider/' + showslider2.image%>" ng-if="showslider2.image"/>
                        </div>
                        <div>
                            <img ng-src="<%'img_slider/' + showslider3.image%>" ng-if="showslider3.image"/>
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
@endsection