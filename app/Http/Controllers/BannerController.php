<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Banner::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
        $query->orderBy('order', 'asc');

        // Urutkan berdasarkan order ASC, lalu created_at DESC
        $banners = $query->orderBy('order', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('dashboard.banner.banner', [
            'title'   => 'Banner',
            'banners' => $banners->appends([
                'search' => $request->input('search'),
            ]),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.banner.add', [
            'title'  => 'Add Banner',
            'banner' => Banner::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'         => 'required|string|max:255',
            'gambar_desktop' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'gambar_mobile'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'order'         => 'nullable|integer|min:0',
        ]);

        $validatedData['status'] = $request->has('status') ? 'Active' : 'Inactive';
        $validatedData['order']  = $request->input('order', 0);

        $videoFolder = public_path('assets/images/banner');
        if (!File::exists($videoFolder)) {
            File::makeDirectory($videoFolder, 0777, true);
        }

        DB::beginTransaction();
        try {
            if ($request->hasFile('gambar_desktop')) {
                $file = $request->file('gambar_desktop');
                $fileName = 'desktop-' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move($videoFolder, $fileName);
                $validatedData['gambar_desktop'] = $fileName;
            }

            if ($request->hasFile('gambar_mobile')) {
                $file = $request->file('gambar_mobile');
                $fileName = 'mobile-' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move($videoFolder, $fileName);
                $validatedData['gambar_mobile'] = $fileName;
            }

            Banner::create($validatedData);
            DB::commit();

            return $request->input('action') === 'save_add'
                ? redirect('/dashboard/banner/create')->with('success', 'Banner berhasil disimpan! Tambahkan banner baru.')
                : redirect('/dashboard/banner')->with('success', 'Banner berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menambahkan banner: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        return view('dashboard.banner.edit', [
            'title'         => 'Edit Banner',
            'banner'        => $banner,
            'statusOptions' => ['Active', 'Inactive'],
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $banner = Banner::findOrFail($id);

        $validatedData = $request->validate([
            'title'         => 'required|string|max:255',
            'gambar_desktop' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'gambar_mobile'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'order'         => 'nullable|integer|min:0',
        ]);
        try {
            if ($request->hasFile('gambar_desktop')) {
                // Hapus gambar_desktop lama jika ada
                if ($banner->gambar_desktop && file_exists(public_path('assets/images/banner/' . $banner->gambar_desktop))) {
                    File::delete(public_path('assets/images/banner/' . $banner->gambar_desktop));
                }
                $gambar_desktop = $request->file('gambar_desktop');
                $nama_gambar_desktop = 'desktop-' . uniqid() . '.' . $gambar_desktop->getClientOriginalExtension();
                $gambar_desktop->move(public_path('assets/images/banner'), $nama_gambar_desktop);
                $validatedData['gambar_desktop'] = $nama_gambar_desktop;
            }
            if ($request->hasFile('gambar_mobile')) {
                // Hapus gambar_mobile lama jika ada
                if ($banner->gambar_mobile && file_exists(public_path('assets/images/banner/' . $banner->gambar_mobile))) {
                    File::delete(public_path('assets/images/banner/' . $banner->gambar_mobile));
                }
                $gambar_mobile = $request->file('gambar_mobile');
                $nama_gambar_mobile = 'mobile-' . uniqid() . '.' . $gambar_mobile->getClientOriginalExtension();
                $gambar_mobile->move(public_path('assets/images/banner'), $nama_gambar_mobile);
                $validatedData['gambar_mobile'] = $nama_gambar_mobile;
            }
            $banner->update($validatedData);
            return redirect('/dashboard/banner')->with('success', 'Berhasil di Update');
        } catch (\Exception $e) {
            return redirect('/dashboard/banner')->with('error', 'Terjadi kesalahan, Silahkan coba lagi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        try {
            Banner::destroy($banner->id);
            File::delete('assets/images/banner/' . $banner->gambar);
            return redirect('/dashboard/banner')->with('success', 'Berhasil di Hapus');
        } catch (\Exception $e) {
            return redirect('/dashboard/banner')->with('error', 'Gagal Menghapus. Silakan Coba Lagi.');
        }
    }
}
