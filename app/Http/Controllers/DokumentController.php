<?php

namespace App\Http\Controllers;

use App\Models\Dokument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DokumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Dokument::query();

        // Filter berdasarkan kategori (default ke 'file' jika tidak ada kategori yang dipilih)
        if ($request->has('category')) {
            $category = $request->input('category');
            $query->where('category', $category);  // Pastikan field 'category' ada dalam tabel Anda
        }

        // Filter berdasarkan pencarian
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('nfile', 'like', "%{$search}%");
        }

        $files = $query->paginate(10);

        return view('dashboard.dokument.dokument', [
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
            'nfile' => 'required',
            'file' => 'required|mimes:pdf,doc,docx|max:10240',
            'category' => 'required',
        ]);

        if ($request->hasFile('file')) {
            // Mulai transaksi database
            DB::beginTransaction();
            try {
                $file = $request->file('file');
                $nama_file = $request->nfile . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/document'), $nama_file);

                // Menambahkan nama file ke array validatedData
                $validatedData['file'] = $nama_file;

                // Menyimpan data ke database
                Dokument::create($validatedData);

                // Commit transaksi jika semuanya berhasil
                DB::commit();

                return redirect('/dashboard/document')->with('success', 'File Baru Berhasil di Tambahkan');
            } catch (\Exception $e) {
                // Rollback transaksi jika terjadi kesalahan
                DB::rollBack();

                // Hapus file yang sudah diupload jika terjadi error
                if (file_exists(public_path('assets/document/' . $nama_file))) {
                    unlink(public_path('assets/document/' . $nama_file));
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
    public function show(Dokument $dokument)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dokument $dokument)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $file = Dokument::findOrFail($id);
        $validatedData = $request->validate([
            'nfile' => 'required',
            'category' => 'required',
        ]);

        try {
            // Ambil judul baru dari request
            $nfile = $validatedData['nfile'];

            if ($request->has('file')) {
                File::delete('assets/document/' . $file->file);
                $file = $request->file('file');
                $nama_file = $request->nfile . '.' . $file->getClientOriginalExtension();
                $file->move('assets/document', $nama_file);
                $validatedData['file'] = $nama_file;
            } else {
                // Jika tidak ada file baru, ganti nama file lama mengikuti title baru
                $oldImageName = $file->file;
                $extension = pathinfo($oldImageName, PATHINFO_EXTENSION); // Ambil ekstensi file lama
                $nama_file = $nfile . '.' . $extension; // Nama file baru sesuai title

                // Pindahkan file lama ke nama baru
                File::move('assets/document/' . $oldImageName, 'assets/document/' . $nama_file);

                // Simpan nama file baru di validatedData
                $validatedData['file'] = $nama_file;
            }
            Dokument::where('id', $id)->update($validatedData);
            return redirect('/dashboard/document')->with('success', 'File Berhasil di Update');
        } catch (\Exception $e) {
            return redirect('/dashboard/document')->with('error', 'Terjadi kesalahan, Silahkan coba lagi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $file = Dokument::findOrFail($id);
        try {
            Dokument::destroy($file->id);
            File::delete('assets/document/' . $file->file);
            return redirect('/dashboard/document')->with('success', 'File Berhasil di Hapus');
        } catch (\Exception $e) {
            return redirect('/dashboard/document')->with('error', 'Gagal Menghapus File. Silakan Coba Lagi.');
        }
    }
}
