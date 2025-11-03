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
        $query = Product::with('category'); // Eager loading kategori

        // Filter berdasarkan kategori (termasuk parent dan child categories)
        if ($request->has('category') && !empty($request->input('category'))) {
            $categorySlug = $request->input('category');

            // Ambil kategori parent berdasarkan slug
            $ctr = Category::where('slug', $categorySlug)->first();

            if ($ctr) {
                // Ambil semua ID kategori parent dan child-nya
                $categoryIds = collect([$ctr->id]); // Tambahkan ID kategori parent
                $childCategoryIds = $ctr->children->pluck('id'); // Ambil ID kategori anak-anaknya
                $categoryIds = $categoryIds->merge($childCategoryIds); // Gabungkan ID parent dan child categories

                // Filter produk berdasarkan ID kategori parent dan child-nya
                $query->whereHas('category', function ($q) use ($categoryIds) {
                    $q->whereIn('id', $categoryIds);
                });
            }
        }

        // Filter berdasarkan pencarian
        if ($request->has('search') && !empty($request->input('search'))) {
            $search = $request->input('search');
            $query->where('productname', 'like', "%{$search}%");
        }

        $products = $query->paginate(6);


        $categories = Category::with('children')
            ->whereNull('parent_id') // hanya parent categories
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

        return view('frontend.produk.detail_produk', [
            'title' => 'Detail Produk',
            'products' => $products,
            'product' => $relatedProducts,
            'categories' => Category::all()
        ]);
    }

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
        $file = $query->paginate(3);
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
