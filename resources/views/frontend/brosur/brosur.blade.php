    @extends('frontend.layouts.app')
    @section('container')
        <!-- about us area wrapper main -->
        <div class="rts-breadcrumb-area pb--200">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="title-area-left">
                            <span class="bg-title">Brosur</span>
                            <h1 class="title rts-text-anime-style-1">
                                Unduh Dokumen
                            </h1>
                            <p class="disc" style="max-width: 45%;">
                                Temukan berbagai brosur produk Rackid untuk mengetahui informasi lengkap tentang solusi
                                kami.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shape-area">
                <img src="assets/images/about/shape/bg_about1.png" alt="shape" class="one">
                <img src="assets/images/about/shape/bg_about02.png " alt="shape" class="two">
                <img src="assets/images/about/shape/bg_05.png" alt="shape" class="three">
            </div>
        </div>
        <!-- rts document download area start -->
        <div class="rts-document-area rts-section-gapBottom mt-dec-section-inner with-pricing">
            <div class="container">
                <div class="row g-4">
                    <!-- single document card -->
                    <div class="col-lg-4 col-md-6">
                        <div class="document-card text-center p-4 border rounded shadow-sm">
                            <div class="icon mb-3">
                                <i class="fa-regular fa-file-pdf fa-3x text-primary"></i>
                            </div>
                            <h4 class="doc-title">Brosur Produk</h4>
                            <p class="doc-desc">Informasi lengkap tentang produk dan solusi RackID.</p>
                            <a href="assets/docs/brosur.pdf" class="rts-btn btn-primary mt-3" download>Unduh PDF</a>
                        </div>
                    </div>

                    <!-- single document card -->
                    <div class="col-lg-4 col-md-6">
                        <div class="document-card text-center p-4 border rounded shadow-sm">
                            <div class="icon mb-3">
                                <i class="fa-regular fa-file-pdf fa-3x text-primary"></i>
                            </div>
                            <h4 class="doc-title">Brosur Produk</h4>
                            <p class="doc-desc">Informasi lengkap tentang produk dan solusi RackID.</p>
                            <a href="assets/docs/brosur.pdf" class="rts-btn btn-primary mt-3" download>Unduh PDF</a>
                        </div>
                    </div>

                    <!-- single document card -->
                    <div class="col-lg-4 col-md-6">
                        <div class="document-card text-center p-4 border rounded shadow-sm">
                            <div class="icon mb-3">
                                <i class="fa-regular fa-file-pdf fa-3x text-primary"></i>
                            </div>
                            <h4 class="doc-title">Brosur Produk</h4>
                            <p class="doc-desc">Informasi lengkap tentang produk dan solusi RackID.</p>
                            <a href="assets/docs/brosur.pdf" class="rts-btn btn-primary mt-3" download>Unduh PDF</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- rts document download area end -->
    @endsection
