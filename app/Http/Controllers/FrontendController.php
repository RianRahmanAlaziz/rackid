<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Dokument;
use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        return view('frontend.home.index', [
            'title' => 'Home',
            'categories' => Category::all()
        ]);
    }

    public function aboutus()
    {
        return view('frontend.aboutus.aboutus', [
            'title' => 'About Us',
            'categories' => Category::all()
        ]);
    }

    public function produk(Request $request)
    {
        $query = Product::with('category');

        if ($request->has('category') && !empty($request->input('category'))) {
            $categorySlug = $request->input('category');
            $ctr = Category::where('slug', $categorySlug)->first();

            if ($ctr) {
                $categoryIds = collect([$ctr->id]);
                $childCategoryIds = $ctr->children->pluck('id');
                $categoryIds = $categoryIds->merge($childCategoryIds);

                $query->whereHas('category', function ($q) use ($categoryIds) {
                    $q->whereIn('id', $categoryIds);
                });
            }
        }

        if ($request->has('search') && !empty($request->input('search'))) {
            $search = $request->input('search');
            $query->where('productname', 'like', "%{$search}%");
        }

        // ⬇️ Tambahkan ini agar produk muncul berdasarkan update terbaru
        $query->orderBy('updated_at', 'desc');

        $products = $query->paginate(6);

        $categories = Category::with('children')
            ->whereNull('parent_id')
            ->get();

        return view('frontend.produk.produk', [
            'title' => 'Produk',
            'products' => $products->appends([
                'search' => $request->input('search'),
                'category' => $request->input('category'),
            ]),
            'categories' => $categories,
        ]);
    }


    public function detail_produk($slug)
    {
        $products = Product::where('slug', $slug)->firstOrFail();

        $relatedProducts = Product::where('category_id', $products->category_id)
            ->where('id', '!=', $products->id)
            ->orderBy('updated_at', 'desc')
            ->paginate(3);

        // === SEO Dinamis Berdasarkan Produk ===
        $brand = 'PT. Inti Kreasi Network (Rack.ID)';
        $productName = $products->productname;

        $metaTitle = "{$productName} - {$brand} | Solusi Rak Server Profesional";
        $metaDescription = "{$productName} dari {$brand} – solusi rak server berkualitas tinggi untuk kebutuhan jaringan dan infrastruktur digital Anda. Tersedia berbagai ukuran dan fitur sesuai kebutuhan.";
        $metaKeywords = strtolower("{$productName}, rack.id, PT Inti Kreasi Network, rack server, standing rack, wallmount rack, open wallmount, wallmount folding, aksesoris rak, rack server indonesia");

        // === Custom SEO Berdasarkan Jenis Produk (urutan penting!) ===
        if (stripos($productName, 'wallmount folding') !== false) {
            $metaTitle = "Wallmount Folding Rack - {$brand} | Rak Lipat Efisien";
            $metaDescription = "Wallmount Folding Rack dari {$brand} dirancang fleksibel dan hemat ruang, ideal untuk instalasi jaringan dan perangkat ringan.";
        } elseif (stripos($productName, 'open wallmount') !== false || stripos($productName, 'open') !== false) {
            $metaTitle = "Open Wallmount Rack - {$brand} | Akses Mudah & Sirkulasi Optimal";
            $metaDescription = "Open Wallmount Rack dari {$brand} memiliki sirkulasi udara baik dan kemudahan akses perawatan perangkat.";
        } elseif (stripos($productName, 'wallmount') !== false) {
            $metaTitle = "Wallmount Rack - {$brand} | Solusi Rak Dinding Praktis";
            $metaDescription = "Wallmount Rack dari {$brand} memberikan solusi pemasangan perangkat jaringan dengan desain kokoh dan mudah diakses.";
        } elseif (stripos($productName, 'standing') !== false || stripos($productName, 'close rack') !== false) {
            $metaTitle = "Standing Close Rack - {$brand} | Rak Server Aman & Tertutup";
            $metaDescription = "Standing Close Rack dari {$brand} memberikan perlindungan maksimal untuk server dengan desain elegan dan ventilasi optimal.";
        } elseif (stripos($productName, 'aksesori') !== false || stripos($productName, 'accessories') !== false) {
            $metaTitle = "Aksesoris Rak - {$brand} | Pelengkap Instalasi IT";
            $metaDescription = "Aksesoris rak server dari {$brand} mendukung efisiensi instalasi – mulai dari tray, fan, hingga manajemen kabel.";
        }

        // === Return ke View ===
        return view('frontend.produk.detail_produk', [
            'title' => $productName,
            'products' => $products,
            'product' => $relatedProducts,
            'categories' => Category::all(),
            'metaTitle' => $metaTitle,
            'metaDescription' => $metaDescription,
            'metaKeywords' => $metaKeywords,
        ]);
    }



    // public function detail_produk($slug)
    // {
    //     $products = Product::where('slug', $slug)->firstOrFail();

    //     $relatedProducts = Product::where('category_id', $products->category_id)
    //         ->where('id', '!=', $products->id)
    //         ->orderBy('updated_at', 'desc')
    //         ->paginate(3);

    //     return view('frontend.produk.detail_produk', [
    //         'title' => 'Detail Produk',
    //         'products' => $products,
    //         'product' => $relatedProducts,
    //         'categories' => Category::all()
    //     ]);
    // }

    public function brosur(Request $request)
    {
        $query = Dokument::where('category', 'brosur');

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('nfile', 'like', "%{$search}%");
        }
        $file = $query->paginate(3);
        return view('frontend.brosur.brosur', [
            'title' => 'Brosur',
            'categories' => Category::all(),
            'files' =>  $file
        ]);
    }

    public function datasheet(Request $request)
    {
        $query = Dokument::where('category', 'datasheet');

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('nfile', 'like', "%{$search}%");
        }
        $file = $query->paginate(6);
        return view('frontend.datasheet.datasheet', [
            'title' => 'Datasheet',
            'categories' => Category::all(),
            'files' =>  $file
        ]);
    }

    public function media_foto(Request $request)
    {
        $query = Gallery::where('category', 'image');

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('ngambar', 'like', "%{$search}%");
        }

        $image = $query->paginate(1);
        return view('frontend.media.media_foto', [
            'title' => 'Media Foto',
            'image' => $image,
            'categories' => Category::all()
        ]);
    }

    public function media_video(Request $request)
    {
        $query = Gallery::where('category', 'video');

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('ngambar', 'like', "%{$search}%");
        }

        $image = $query->paginate(1);
        return view('frontend.media.media_video', [
            'title' => 'Media Video',
            'image' => $image,
            'categories' => Category::all()
        ]);
    }

    public function contactus()
    {
        return view('frontend.contactus.contactus', [
            'title' => 'Contact Us',
            'categories' => Category::all()
        ]);
    }
}
