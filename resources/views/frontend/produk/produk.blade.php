@extends('frontend.layouts.app')
@section('container')
    <!-- partners area breadcrumb area wrapper -->
    <div class="partner-breadcrumb bg_image"
        style="background-image: url('assets/images/banner/heading_produk.png'); 
            background-size: cover; 
            background-position: center; 
            background-repeat: no-repeat;
            height: 200px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-area-left center">
                        <h2 class="title">
                            Daftar Produk Kami
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- partners area breadcrumb area end -->



    <div class="shop-area-start rts-section-gapTop">
        <div class="container pb-5">
            <div class="row g-5">

                <!-- Sidebar Filter Modern -->
                <div class="col-lg-3 col-md-4">
                    <div class="product-filter-modern shadow-sm rounded-4 p-3">

                        <!-- Search Box -->
                        <div class="search-box-modern mb-3">
                            <input type="text" class="form-control" id="searchInput"
                                placeholder="Cari produk atau kategori...">
                        </div>

                        <!-- Accordion -->
                        <div class="accordion-modern" id="productAccordion">

                            <!-- Item -->
                            <div class="accordion-item">
                                <button class="accordion-header">
                                    Smart Integrated Rack
                                    <span class="accordion-icon">+</span>
                                </button>
                                <div class="accordion-body">
                                    <a href="#">Smart Rack 18U</a>
                                    <a href="#">Smart Rack 27U</a>
                                    <a href="#">Smart Rack 42U</a>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <button class="accordion-header">
                                    Device Charging Rack
                                    <span class="accordion-icon">+</span>
                                </button>
                                <div class="accordion-body">
                                    <a href="#">Charging 10 Port</a>
                                    <a href="#">Charging 20 Port</a>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <button class="accordion-header">
                                    Standing Close Rack 19”
                                    <span class="accordion-icon">+</span>
                                </button>
                                <div class="accordion-body">
                                    <a href="#">SC Rack 18U</a>
                                    <a href="#">SC Rack 22U</a>
                                    <a href="#">SC Rack 27U</a>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <button class="accordion-header">
                                    Wallmount Rack 19”
                                    <span class="accordion-icon">+</span>
                                </button>
                                <div class="accordion-body">
                                    <a href="#">Wallmount 9U</a>
                                    <a href="#">Wallmount 12U</a>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <button class="accordion-header">
                                    Accessories
                                    <span class="accordion-icon">+</span>
                                </button>
                                <div class="accordion-body">
                                    <a href="#">Fan Tray</a>
                                    <a href="#">Power Rail</a>
                                    <a href="#">Cable Organizer</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Product List -->
                <div class="col-lg-9 col-md-8">
                    <div class="row g-5">
                        <div class="col-lg-4 col-md-6 col-sm-12" data-animation="fadeInUp" data-delay="0.2">
                            <div class="rts-single-shop-area">
                                <a href="/detail_produk" class="thumbnail">
                                    <img src="assets/images/shop/PRODUCT WEB - 699 X 614 - Wallmount rack 6015_01.png"
                                        alt="shop">
                                </a>
                                <div class="inner-content">
                                    <a href="/detail_produk">
                                        <h4 class="title">Music Headphones</h4>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12" data-animation="fadeInUp" data-delay="0.3">
                            <div class="rts-single-shop-area">
                                <a href="/detail_produk" class="thumbnail">
                                    <img src="assets/images/shop/PRODUCT WEB - 699 X 614 - Wallmount rack 6015_01.png"
                                        alt="shop">
                                </a>
                                <div class="inner-content">
                                    <a href="/detail_produk">
                                        <h4 class="title">White joystick gamepad</h4>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12" data-animation="fadeInUp" data-delay="0.4">
                            <div class="rts-single-shop-area">
                                <a href="detail_products.html" class="thumbnail">
                                    <img src="assets/images/shop/PRODUCT WEB - 699 X 614 - Wallmount rack 6015_01.png"
                                        alt="shop">
                                </a>
                                <div class="inner-content">
                                    <a href="detail_products.html">
                                        <h4 class="title">Smartwatch screen digital</h4>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12" data-animation="fadeInUp" data-delay="0.2">
                            <div class="rts-single-shop-area">
                                <a href="detail_products.html" class="thumbnail">
                                    <img src="assets/images/shop/PRODUCT WEB - 699 X 614 - Wallmount rack 6015_01.png"
                                        alt="shop">
                                </a>
                                <div class="inner-content">
                                    <a href="detail_products.html">
                                        <h4 class="title">Hiking Boots With Pink</h4>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12" data-animation="fadeInUp" data-delay="0.3">
                            <div class="rts-single-shop-area">
                                <a href="detail_products.html" class="thumbnail">
                                    <img src="assets/images/shop/PRODUCT WEB - 699 X 614 - Wallmount rack 6015_01.png"
                                        alt="shop">
                                </a>
                                <div class="inner-content">
                                    <a href="detail_products.html">
                                        <h4 class="title">Glasses with rounded frames</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end product row -->
                </div>
            </div>
            <!-- pagination area -->
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <div class="pagination">
                            <button class="active">01</button>
                            <button>02</button>
                            <button>03</button>
                            <button>04</button>
                            <button><i class="fal fa-angle-double-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
