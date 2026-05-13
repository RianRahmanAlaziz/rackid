<?php

namespace App\Http\Controllers;

use App\Models\Dokument;
use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $product = Product::count();
        $gallery = Gallery::count();
        $document = Dokument::count();
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'product' => $product,
            'gallery' => $gallery,
            'document' => $document,
        ]);
    }
}
