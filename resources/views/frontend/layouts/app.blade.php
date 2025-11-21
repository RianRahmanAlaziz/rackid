<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/assets/images/icon.png') }}">

    <!-- Title -->
    <title>@yield('title', 'Rack.ID | PT. Inti Kreasi Network - Ahli Rack Server Indonesia')</title>
    <meta name="description" content="@yield('meta_description', 'Rack.ID oleh PT. Inti Kreasi Network menyediakan Close Rack, Wallmount Rack,Wallmount Folding, Open Wallmount, dan Aksesoris Rak profesional di Indonesia.')">
    <!-- ✅ Tambahan SEO -->
    <meta name="keywords" content="@yield('meta_keywords', 'rack server, rack.id, rack network, close rack, wallmount rack, wallmount folding, open wallmount, aksesoris rak, PT Inti Kreasi Network, server rack Indonesia')">
    <meta name="robots" content="index, follow, noodp, noydir">
    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- ✅ Google Search Console Verification -->
    <meta name="google-site-verification" content="75XhdhDzPkta-hZJvWieSaqF5mCmLnImh1qi_0j9KrA" />

    <!-- Styles -->
    <link rel="stylesheet preload" href="{{ asset('/assets/css/plugins/fontawesome.css') }}" as="style">
    <link rel="stylesheet preload" href="{{ asset('/assets/css/plugins/swiper.css') }}" as="style">
    <link rel="stylesheet preload" href="{{ asset('/assets/css/plugins/metismenu.css') }}" as="style">
    <link rel="stylesheet preload" href="{{ asset('/assets/css/plugins/magnifying-popup.css') }}" as="style">
    <link rel="stylesheet preload" href="{{ asset('/assets/css/plugins/odometer.css') }}" as="style">
    <link rel="stylesheet preload" href="{{ asset('/assets/css/vendor/bootstrap.min.css') }}" as="style">

    <link rel="stylesheet" href="{{ asset('/assets/css/plugins/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/plugins/header-one.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/plugins/banner.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/plugins/service.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/scss/elements/_search.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/scss/elements/_about.css') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Red+Hat+Display:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet preload" as="style">

    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <link rel="preload" as="image" href="{{ asset('/assets/images/banner/21.webp') }}" as="image">

    <!-- ✅ Google Analytics (GA4) -->
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-1JJESJM8Z5"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-1JJESJM8Z5');
    </script>
    <script>
        // 🚫 Nonaktifkan Klik Kanan
        document.addEventListener('contextmenu', event => event.preventDefault());

        // 🚫 Nonaktifkan Shortcut Developer Tools
        document.addEventListener('keydown', event => {
            if (
                event.key === "F12" ||
                (event.ctrlKey && event.shiftKey && event.key.toLowerCase() === "i") ||
                (event.ctrlKey && event.shiftKey && event.key.toLowerCase() === "j") ||
                (event.ctrlKey && event.key.toLowerCase() === "u") ||
                (event.ctrlKey && event.key.toLowerCase() === "s")
            ) {
                event.preventDefault();
                event.stopPropagation();
                return false;
            }
        });

        // 🚫 (Opsional) Deteksi Open DevTools
        setInterval(() => {
            const before = new Date().getTime();
            debugger;
            const after = new Date().getTime();
            if (after - before > 100) {
                document.body.innerHTML =
                    "<h3 style='text-align:center;margin-top:20%;font-family:sans-serif;'>🚫 Developer Tools tidak diperbolehkan.</h3>";
            }
        }, 1000);
    </script>
</head>


<body>

    @include('frontend.layouts.header')
    @yield('container')



    @include('frontend.layouts.footer')
    @include('frontend.layouts.sidbar')
    <!-- offcanvase search -->
    {{-- <div class="search-input-area">
        <div class="container">
            <div class="search-input-inner">
                <div class="input-div">
                    <input class="search-input autocomplete" type="text" placeholder="Search by keyword or #">
                    <button><i class="far fa-search"></i></button>
                </div>
            </div>
        </div>
        <div id="close" class="search-close-icon"><i class="far fa-times"></i></div>
    </div>
    <div id="anywhere-home" class="">
    </div> --}}

    <div class="search-input-area" id="search-box">
        <div class="container">
            <div class="search-input-inner">
                <div class="input-div">
                    <input id="search-input" class="search-input autocomplete" type="text"
                        placeholder="Search by keyword or #">
                    <button id="search-button"><i class="far fa-search"></i></button>
                </div>
            </div>
        </div>
        <div id="close" class="search-close-icon">
            <i class="far fa-times"></i>
        </div>
    </div>

    <div id="anywhere-home"></div>


    <!-- progress area start -->
    <div class="whatsapp-cta">
        <a href="https://wa.me/+6282112248872" target="_blank" aria-label="Chat via WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>
    <!-- progress area end -->

    <script defer src="{{ asset('/assets/js/plugins/jquery.js') }}"></script>
    <script defer src="{{ asset('/assets/js/plugins/odometer.js') }}"></script>
    <script defer src="{{ asset('/assets/js/plugins/jquery-appear.js') }}"></script>
    <script defer src="{{ asset('/assets/js/plugins/gsap.js') }}"></script>
    <script defer src="{{ asset('/assets/js/plugins/split-text.js') }}"></script>
    <script defer src="{{ asset('/assets/js/plugins/scroll-trigger.js') }}"></script>
    <script defer src="{{ asset('/assets/js/plugins/smooth-scroll.js') }}"></script>
    <script defer src="{{ asset('/assets/js/plugins/metismenu.js') }}"></script>
    <script defer src="{{ asset('/assets/js/plugins/popup.js') }}"></script>
    <script defer src="{{ asset('/assets/js/vendor/bootstrap.min.js') }}"></script>
    <script defer src="{{ asset('/assets/js/plugins/swiper.js') }}"></script>
    <script defer src="{{ asset('/assets/js/plugins/contact.form.js') }}"></script>
    <script defer src="{{ asset('/assets/js/main.js') }}"></script>


    {{-- <script>
        const searchBox = document.getElementById("search-box");
        const searchInput = document.getElementById("search-input");
        const searchButton = document.getElementById("search-button");
        const closeSearch = document.getElementById("close");
        const overlay = document.getElementById("anywhere-home");

        // buka search (bisa di-trigger dari tombol di navbar)
        document.querySelectorAll(".open-search").forEach(btn => {
            btn.addEventListener("click", () => {
                searchBox.classList.add("active");
                searchInput.focus();
            });
        });

        // tutup search
        closeSearch.addEventListener("click", () => searchBox.classList.remove("active"));
        overlay.addEventListener("click", () => searchBox.classList.remove("active"));

        // klik tombol search → redirect ke /produk?search=...
        searchButton.addEventListener("click", () => {
            const keyword = searchInput.value.trim();
            if (keyword) {
                window.location.href = `/produk?search=${encodeURIComponent(keyword)}`;
            }
        });

        // tekan enter di input → sama efeknya
        searchInput.addEventListener("keypress", (e) => {
            if (e.key === "Enter") {
                e.preventDefault();
                const keyword = searchInput.value.trim();
                if (keyword) {
                    window.location.href = `/produk?search=${encodeURIComponent(keyword)}`;
                }
            }
        });
    </script> --}}

    <script>
        document.addEventListener("DOMContentLoaded", () => {

            const searchBox = document.getElementById("search-box");
            const searchInput = document.getElementById("search-input");
            const searchButton = document.getElementById("search-button");
            const closeSearch = document.getElementById("close");
            const overlay = document.getElementById("anywhere-home");

            // fungsi redirect berdasar tag
            function goSearch() {
                const keyword = searchInput.value.trim();
                if (!keyword) return;

                let baseURL = '/produk?search='; // default

                // cek tag #brosur
                if (keyword.toLowerCase().startsWith('brosur')) {
                    baseURL = '/brosur?search=';
                }

                // cek tag #datasheet
                else if (keyword.toLowerCase().startsWith('datasheet')) {
                    baseURL = '/datasheet?search=';
                }

                window.location.href = `${baseURL}${encodeURIComponent(keyword)}`;
            }

            // buka search
            document.querySelectorAll(".open-search").forEach(btn => {
                btn.addEventListener("click", () => {
                    searchBox.classList.add("active");
                    searchInput.focus();
                });
            });

            // tutup
            if (closeSearch) {
                closeSearch.addEventListener("click", () => searchBox.classList.remove("active"));
            }

            if (overlay) {
                overlay.addEventListener("click", () => searchBox.classList.remove("active"));
            }

            // klik tombol search
            if (searchButton) {
                searchButton.addEventListener("click", goSearch);
            }

            // enter untuk search
            if (searchInput) {
                searchInput.addEventListener("keydown", (e) => {
                    if (e.key === "Enter") {
                        e.preventDefault();
                        goSearch();
                    }
                });
            }

        });
    </script>


</body>

</html>
