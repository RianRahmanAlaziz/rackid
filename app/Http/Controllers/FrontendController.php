<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        return view('frontend.home.index', [
            'title' => 'home',
        ]);
    }

    public function aboutus()
    {
        return view('frontend.aboutus.aboutus', [
            'title' => 'aboutus',
        ]);
    }

    public function produk()
    {
        return view('frontend.produk.produk', [
            'title' => 'produk',
        ]);
    }

    public function detail_produk()
    {
        return view('frontend.produk.detail_produk', [
            'title' => 'detail_produk',
        ]);
    }

    public function brosur()
    {
        return view('frontend.brosur.brosur', [
            'title' => 'brosur',
        ]);
    }

    public function datasheet()
    {
        return view('frontend.datasheet.datasheet', [
            'title' => 'datasheet',
        ]);
    }

    public function media_foto()
    {
        return view('frontend.media.media_foto', [
            'title' => 'media_foto',
        ]);
    }

    public function media_video()
    {
        return view('frontend.media.media_video', [
            'title' => 'media_video',
        ]);
    }

    public function contactus()
    {
        return view('frontend.contactus.contactus', [
            'title' => 'contactus',
        ]);
    }
}
