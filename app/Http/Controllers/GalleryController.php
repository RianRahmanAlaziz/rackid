<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Gallery::query();

        // Filter berdasarkan kategori (default ke 'gambar' jika tidak ada kategori yang dipilih)
        if ($request->has('category')) {
            $category = $request->input('category');
            $query->where('category', $category);  // Pastikan field 'category' ada dalam tabel Anda
        }

        // Filter berdasarkan pencarian
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('ngambar', 'like', "%{$search}%");
        }

        $files = $query->paginate(10);

        return view('dashboard.gallery.gallery', [
            'title' => 'Gallery',
            'files' => $files->appends([
                'search' => $request->input('search'),
                'category' => $request->input('category'),
            ]),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ngambar' => 'required',
            'gambar' => 'required|image|mimes:jpg,png,jpeg,webp',
            'category' => 'required',
            'url' => 'nullable',
        ]);

        if ($request->hasFile('gambar')) {
            // Mulai transaksi database
            DB::beginTransaction();
            try {
                $gambar = $request->file('gambar');
                $nama_gambar = $request->ngambar . '.' . $gambar->getClientOriginalExtension();
                $gambar->move(public_path('assets/images/gallery'), $nama_gambar);


                // Menambahkan nama file ke array validatedData
                $validatedData['gambar'] = $nama_gambar;

                // Menyimpan data ke database
                Gallery::create($validatedData);

                // Commit transaksi jika semuanya berhasil
                DB::commit();

                return redirect('/dashboard/gallery')->with('success', 'File Baru Berhasil di Tambahkan');
            } catch (\Exception $e) {
                // Rollback transaksi jika terjadi kesalahan
                DB::rollBack();

                // Hapus file yang sudah diupload jika terjadi error
                if (file_exists(public_path('assets/images/gallery/' . $nama_gambar))) {
                    unlink(public_path('assets/images/gallery/' . $nama_gambar));
                }

                // Kembali ke halaman sebelumnya dengan pesan error
                return redirect()
                    ->back()
                    ->with(['error' => 'Terjadi kesalahan, Silahkan coba lagi.']);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $file = Gallery::findOrFail($id);
        $validatedData = $request->validate([
            'ngambar' => 'required',
            'category' => 'required',
            'url' => 'nullable',
        ]);

        try {
            // Ambil judul baru dari request
            $ngambar = $validatedData['ngambar'];

            if ($request->has('gambar')) {
                File::delete('assets/images/gallery/' . $file->gambar);
                $gambar = $request->file('gambar');
                $nama_gambar = $request->ngambar . '.' . $gambar->getClientOriginalExtension();
                $gambar->move('assets/images/gallery', $nama_gambar);
                $validatedData['gambar'] = $nama_gambar;
            } else {
                // Jika tidak ada gambar baru, ganti nama gambar lama mengikuti title baru
                $oldImageName = $file->gambar;
                $extension = pathinfo($oldImageName, PATHINFO_EXTENSION); // Ambil ekstensi gambar lama
                $nama_gambar = $ngambar . '.' . $extension; // Nama gambar baru sesuai title

                // Pindahkan gambar lama ke nama baru
                File::move('assets/images/gallery/' . $oldImageName, 'assets/images/gallery/' . $nama_gambar);

                // Simpan nama gambar baru di validatedData
                $validatedData['gambar'] = $nama_gambar;
            }
            Gallery::where('id', $id)->update($validatedData);
            return redirect('/dashboard/gallery')->with('success', 'File Berhasil di Update');
        } catch (\Exception $e) {
            return redirect('/dashboard/gallery')->with('error', 'Terjadi kesalahan, Silahkan coba lagi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $file = Gallery::findOrFail($id);
        try {
            Gallery::destroy($file->id);
            File::delete('assets/images/gallery/' . $file->gambar);
            return redirect('/dashboard/gallery')->with('success', 'File Berhasil di Hapus');
        } catch (\Exception $e) {
            return redirect('/dashboard/gallery')->with('error', 'Gagal Menghapus File. Silakan Coba Lagi.');
        }
    }
}
