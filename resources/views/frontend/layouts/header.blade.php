<header class="header-one">
    <div class="header-top-area-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header-top-one-wrapper">
                        <div class="left" style="padding: 10px 0; border: none;">
                            <div class="mail" style="border: none; padding: 5px 0;">
                                <a href="mailto:customercare@rack.id" style="text-decoration: none; color: #333;">
                                    customercare@rack.id
                                </a>
                            </div>
                            <div class="working-time" style="border: none; padding: 5px 0;">
                                <p style="margin: 0; color: #333;">Working: 8.00am - 5.00pm</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="header-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header-main-one-wrapper">
                        <div class="thumbnail">
                            <a href="/">
                                <img src="{{ asset('/assets/images/logo/rack.id.png') }}" alt="finbiz-logo">
                            </a>
                        </div>
                        <div class="main-header">
                            <div class="nav-area">
                                <ul class="">
                                    <li class="main-nav">
                                        <a href="/">Home</a>
                                    </li>
                                    <li class="main-nav">
                                        <a href="/aboutus" style="white-space: nowrap;">About Us</a>
                                    </li>

                                    @php
                                        use App\Models\Category;
                                        // Ambil semua parent categories beserta child-nya
                                        $categories = Category::with('children')->whereNull('parent_id')->get();
                                    @endphp

                                    <li class="main-nav has-dropdown mega-menu">
                                        <a href="{{ route('produk') }}">Products</a>
                                        <div class="rts-mega-menu">
                                            <div class="wrapper">
                                                <div class="container">
                                                    <div class="row g-0">
                                                        @foreach ($categories as $parent)
                                                            <div class="col-lg-3">
                                                                <ul class="mega-menu-item with-list parent-nav">
                                                                    <li>
                                                                        <a
                                                                            href="{{ route('produk', ['category' => $parent->slug]) }}">
                                                                            <i
                                                                                class="fa-sharp fa-regular fa-chevron-right"></i>
                                                                            {{ $parent->name }}
                                                                        </a>
                                                                    </li>

                                                                    @if ($parent->children->count() > 0)
                                                                        @foreach ($parent->children as $child)
                                                                            <li class="ms-3">
                                                                                <a
                                                                                    href="{{ route('produk', ['category' => $child->slug]) }}">
                                                                                    {{ $child->name }}
                                                                                </a>
                                                                            </li>
                                                                        @endforeach
                                                                    @endif
                                                                </ul>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="main-nav has-dropdown project-a-after">
                                        <a href="#">Docs</a>
                                        <ul class="submenu parent-nav">
                                            <li><a href="/brosur">Brosur</a></li>
                                            <li><a href="/datasheet">Datasheet</a></li>
                                        </ul>
                                    </li>
                                    <li class="main-nav has-dropdown project-a-after">
                                        <a href="#">Media</a>
                                        <ul class="submenu parent-nav">
                                            <li><a href="/media-foto">Media Foto</a></li>
                                            <li><a href="/media-video">Media Video</a></li>
                                        </ul>
                                    </li>
                                    <li class="main-nav">
                                        <a href="/contactus" style="white-space: nowrap;">Contact us</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="loader-wrapper">
                                <div class="loader">
                                </div>
                                <div class="loader-section section-left"></div>
                                <div class="loader-section section-right"></div>
                            </div>
                            <div class="button-area">
                                <button class="search" id="search" aria-label="Search">
                                    <i class="far fa-search"></i>
                                </button>

                                <button id="menu-btn" aria-label="Menu" class="menu-btn menu ml--20 ml_sm--5">
                                    <img src="{{ asset('/assets/images/icons/01.svg') }}" alt="Menu icon"
                                        class="menu-icon">
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
