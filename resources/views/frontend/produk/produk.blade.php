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
                            <form action="{{ url()->current() }}" method="get">
                                <input type="text" class="form-control" id="searchInput" name="search"
                                    placeholder="Cari produk atau kategori..."
                                    value="{{ old('search', request('search')) }}">
                            </form>

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
                        @forelse ($products as $product)
                            <div class="col-lg-4 col-md-6 col-sm-12" data-animation="fadeInUp" data-delay="0.2">
                                <div class="rts-single-shop-area">
                                    @php
                                        $gambarArray = json_decode($product->gambar, true);
                                    @endphp
                                    <a href="/produk/{{ $product->slug }}" class="thumbnail">
                                        <img src="{{ asset('assets/images/product/' . $gambarArray[0]) }}"
                                            alt="{{ $product->productname }}">
                                    </a>
                                    <div class="inner-content">
                                        <a href="/produk/{{ $product->slug }}">
                                            <h4 class="title">{{ $product->productname }}</h4>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center my-5">
                                <p class="text-muted">Belum ada Product yang tersedia.</p>
                            </div>
                        @endforelse
                    </div> <!-- end product row -->
                </div>
            </div>
            <!-- pagination area -->
            @if ($products->hasPages())
                <div class="row">
                    <div class="col-12">
                        <div class="text-center">
                            <div class="pagination">
                                {{-- Tombol halaman --}}
                                @for ($i = 1; $i <= $products->lastPage(); $i++)
                                    @if ($i == $products->currentPage())
                                        <button class="active">
                                            {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}
                                        </button>
                                    @else
                                        <button onclick="window.location.href='{{ $products->url($i) }}'">
                                            {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}
                                        </button>
                                    @endif
                                @endfor

                                {{-- Tombol next --}}
                                @if ($products->hasMorePages())
                                    <a href="{{ $products->nextPageUrl() }}">
                                        <button><i class="fal fa-angle-double-right"></i></button>
                                    </a>
                                @else
                                    <button disabled><i class="fal fa-angle-double-right"></i></button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

    </div>
@endsection
