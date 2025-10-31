<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('productname', 'like', "%{$search}%");
        }

        $product = $query->paginate(10);
        return view('dashboard.product.product', [
            'title' => 'Product',
            'product' => $product->appends([
                'search' => $request->input('search'),
            ]),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.product.add', [
            'title' => 'Add Product',
            'category' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'productname'   => 'required',
            'slug'          => 'nullable|unique:products',
            'category_id'   => 'nullable',
            'gambar'        => 'nullable|array',
            'gambar.*'      => 'image|mimes:jpg,jpeg,png,gif|max:2048',
            'thumbnail'     => 'nullable|array',
            'thumbnail.*'   => 'image|mimes:jpg,jpeg,png,gif|max:2048',
            'url.*'         => 'sometimes|nullable|url',
            'productid'     => 'nullable|unique:products,productid',
            'description'   => 'nullable|string',
        ]);
        $status = $request->has('status') ? 'Active' : 'Inactive';
        $validatedData['status'] = $status;


        $folderPath = public_path('assets/images/product');
        if (!File::exists($folderPath)) File::makeDirectory($folderPath, 0777, true);

        DB::beginTransaction();
        try {
            $imagePaths = [];
            if ($request->hasFile('gambar')) {
                foreach ($request->file('gambar') as $file) {
                    $nama_gambar = $request->productname . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move($folderPath, $nama_gambar);
                    $imagePaths[] = $nama_gambar;
                }
            }
            $validatedData['gambar'] = json_encode($imagePaths);

            $thumbnailPaths = [];
            if ($request->hasFile('thumbnail')) {
                foreach ($request->file('thumbnail') as $file) {
                    $thumbnailName = $request->productname . '-Thumbnail-' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move($folderPath, $thumbnailName);
                    $thumbnailPaths[] = $thumbnailName;
                }
            }
            $validatedData['thumbnail'] = json_encode($thumbnailPaths);

            $filteredUrl = array_filter($request->input('url', []), fn($value) => !is_null($value) && $value !== '');
            $flatUrls = array_map(fn($item) => is_array($item) ? implode(',', $item) : $item, $filteredUrl);
            $validatedData['url'] = json_encode(array_values($flatUrls));

            Product::create($validatedData);
            DB::commit();

            return $request->input('action') === 'save_add'
                ? redirect('/dashboard/product/create')->with('success', 'Product berhasil disimpan! Tambahkan produk baru.')
                : redirect('/dashboard/product')->with('success', 'Product berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $product->thumbnail = json_decode($product->thumbnail, true) ?? [];
        $product->url = json_decode($product->url, true) ?? [];
        $product->url = array_map(fn($item) => is_array($item) ? implode(',', $item) : $item, $product->url);

        return view('dashboard.product.edit', [
            'title' => 'Edit Product',
            'product' => $product,
            'category' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $validatedData = $request->validate([
            'productname'   => 'required',
            'slug'          => 'required|unique:products,slug,' . $id,
            'category_id'   => 'nullable',
            'gambar.*'  => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'thumbnail.*'   => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'url.*'         => 'nullable|url',
            'productid'     => 'required|unique:products,productid,' . $id,
            'description'   => 'nullable|string',
        ]);
        $validatedData['status'] = $request->has('status') ? 'Active' : 'Inactive';
        DB::beginTransaction();
        try {
            $product   = Product::findOrFail($id);

            // Folder untuk gambar & dokumen
            $imgFolder = public_path('assets/images/product');

            if (!File::exists($imgFolder)) {
                File::makeDirectory($imgFolder, 0777, true);
            }

            // ----------------------
            // 🔹 Update gambar (thumbnail)
            // ----------------------
            $thumbnails = json_decode($product->thumbnail ?? '[]', true);

            if ($request->hasFile('thumbnail')) {
                foreach ($request->file('thumbnail') as $file) {
                    $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move($imgFolder, $fileName);
                    $thumbnails[] = $fileName;
                }
            }

            // Hapus thumbnail kalau ada checkbox remove
            if ($request->has('remove_thumbnail')) {
                foreach ($request->remove_thumbnail as $rm) {
                    if (in_array($rm, $thumbnails)) {
                        File::delete($imgFolder . '/' . $rm);
                        $thumbnails = array_diff($thumbnails, [$rm]);
                    }
                }
            }

            $validatedData['thumbnail'] = json_encode(array_values($thumbnails));

            // ----------------------
            // 🔹 Update gambar (galeri)
            // ----------------------
            $gambarNew = json_decode($product->gambar ?? '[]', true);

            if ($request->hasFile('gambar')) {
                foreach ($request->file('gambar') as $file) {
                    $fileName = $request->productname . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move($imgFolder, $fileName);
                    $gambarNew[] = $fileName;
                }
            }

            if ($request->filled('deleted_images')) {
                $deletedImages = explode(',', $request->deleted_images);

                foreach ($deletedImages as $rm) {
                    if (in_array($rm, $gambarNew)) {
                        File::delete($imgFolder . '/' . $rm);
                        $gambarNew = array_diff($gambarNew, [$rm]);
                    }
                }
            }

            $validatedData['gambar'] = json_encode(array_values($gambarNew));
            // ----------------------
            // 🔹 Update data lain
            // ----------------------
            $validatedData['description'] = $request->input('description');
            $validatedData['url'] = json_encode($request->input('url', []));

            $product->update($validatedData);

            DB::commit();
            return redirect('/dashboard/product')->with('success', 'Product berhasil diupdate.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal update: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $gambarPaths = json_decode($product->gambar);
        $thumbnailPaths = json_decode($product->thumbnail);
        try {
            foreach ($gambarPaths as $gambar) {
                $imagePath = public_path('assets/images/product/' . $gambar);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            foreach ($thumbnailPaths as $thumbnail) {
                $thumbnailPath = public_path('assets/images/product/' . $thumbnail);
                if (file_exists($thumbnailPath)) {
                    unlink($thumbnailPath);
                }
            }
            $product->delete();
            return redirect('/dashboard/product')->with('success', 'Data Berhasil di Hapus');
        } catch (\Exception $e) {
            return redirect('/dashboard/product')->with('error', 'Gagal Menghapus Data. Silakan Coba Lagi.');
        }
    }
    public function checkslug(Request $request)
    {
        $slug = SlugService::createSlug(Product::class, 'slug', $request->productname);

        return response()->json(['slug' => $slug]);
    }
}
