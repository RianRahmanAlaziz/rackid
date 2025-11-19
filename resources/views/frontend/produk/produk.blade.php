@extends('frontend.layouts.app')
@section('title', 'Daftar Produk - PT. Inti Kreasi Network | Rack.ID Ahli Rack Server Indonesia')
@section('meta_description',
    'Jelajahi daftar produk Rack.ID yang mencakup Standing Close Rack, Wallmount Rack,
    Wallmount Folding, Open Wallmount, dan Aksesoris Rak untuk solusi jaringan dan server Anda.')
@section('meta_keywords',
    'produk rack.id, daftar produk rack server, PT Inti Kreasi Network, standing close rack,
    wallmount rack, open wallmount, wallmount folding, aksesoris rak, solusi jaringan, rack server Indonesia')
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
                            @foreach ($categories as $parent)
                                <div class="accordion-item">
                                    <button class="accordion-header">
                                        {{ $parent->name }}
                                        <span class="accordion-icon">+</span>
                                    </button>

                                    @if ($parent->children->count() > 0)
                                        <div class="accordion-body">
                                            @foreach ($parent->children as $child)
                                                <a href="{{ route('produk', ['category' => $child->slug]) }}">
                                                    {{ $child->name }}
                                                </a>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            @endforeach
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
                                        <img src="{{ asset('/assets/images/product/' . $gambarArray[0]) }}"
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

                                {{-- Previous --}}
                                @if ($products->onFirstPage())
                                    <button disabled><i class="fal fa-angle-double-left"></i></button>
                                @else
                                    <button onclick="window.location.href='{{ $products->previousPageUrl() }}'">
                                        <i class="fal fa-angle-double-left"></i>
                                    </button>
                                @endif

                                @php
                                    $current = $products->currentPage();
                                    $last = $products->lastPage();
                                    $start = max(1, $current - 1);
                                    $end = min($last, $current + 1);
                                @endphp

                                {{-- Page 1 --}}
                                @if ($start > 1)
                                    <button onclick="window.location.href='{{ $products->url(1) }}'">01</button>
                                    @if ($start > 2)
                                        <button disabled>...</button>
                                    @endif
                                @endif

                                {{-- Middle Pages --}}
                                @for ($i = $start; $i <= $end; $i++)
                                    @if ($i == $current)
                                        <button class="active">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</button>
                                    @else
                                        <button onclick="window.location.href='{{ $products->url($i) }}'">
                                            {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}
                                        </button>
                                    @endif
                                @endfor

                                {{-- Last page --}}
                                @if ($end < $last)
                                    @if ($end < $last - 1)
                                        <button disabled>...</button>
                                    @endif
                                    <button onclick="window.location.href='{{ $products->url($last) }}'">
                                        {{ str_pad($last, 2, '0', STR_PAD_LEFT) }}
                                    </button>
                                @endif

                                {{-- Next --}}
                                @if ($products->hasMorePages())
                                    <button onclick="window.location.href='{{ $products->nextPageUrl() }}'">
                                        <i class="fal fa-angle-double-right"></i>
                                    </button>
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
    <script>
        document.querySelectorAll('.accordion-header').forEach(header => {
            header.addEventListener('click', () => {
                const item = header.parentElement;
                item.classList.toggle('active');
            });
        });
    </script>
@endsection
