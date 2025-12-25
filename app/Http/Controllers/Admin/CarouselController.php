<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MstCarousel;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    public function index()
    {
        $carousels = MstCarousel::ordered()->get();
        return view('admin.carousel.index', compact('carousels'));
    }

    public function create()
    {
        return view('admin.carousel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        $data = $request->only(['judul', 'subjudul', 'teks_tombol_1', 'link_tombol_1', 'teks_tombol_2', 'link_tombol_2', 'urutan']);
        $data['is_active'] = $request->has('is_active');
        $urutan = (int) ($data['urutan'] ?? 0);

        // Auto-reorder: shift items if urutan already exists
        $this->shiftOrder($urutan);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/carousel'), $filename);
            $data['gambar'] = $filename;
        }

        MstCarousel::create($data);

        return redirect()->route('admin.carousel.index')->with('success', 'Carousel berhasil ditambahkan');
    }

    public function edit(MstCarousel $carousel)
    {
        return view('admin.carousel.edit', compact('carousel'));
    }

    public function update(Request $request, MstCarousel $carousel)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        $data = $request->only(['judul', 'subjudul', 'teks_tombol_1', 'link_tombol_1', 'teks_tombol_2', 'link_tombol_2', 'urutan']);
        $data['is_active'] = $request->has('is_active');
        $urutan = (int) ($data['urutan'] ?? 0);
        $oldUrutan = $carousel->urutan;

        // Only shift if urutan changed and conflicts with existing
        if ($urutan != $oldUrutan) {
            $this->shiftOrder($urutan, $carousel->id);
        }

        if ($request->hasFile('gambar')) {
            // Delete old image
            if ($carousel->gambar && file_exists(public_path('img/carousel/' . $carousel->gambar))) {
                unlink(public_path('img/carousel/' . $carousel->gambar));
            }
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/carousel'), $filename);
            $data['gambar'] = $filename;
        }

        $carousel->update($data);

        return redirect()->route('admin.carousel.index')->with('success', 'Carousel berhasil diupdate');
    }

    public function destroy(MstCarousel $carousel)
    {
        if ($carousel->gambar && file_exists(public_path('img/carousel/' . $carousel->gambar))) {
            unlink(public_path('img/carousel/' . $carousel->gambar));
        }
        $carousel->delete();

        return redirect()->route('admin.carousel.index')->with('success', 'Carousel berhasil dihapus');
    }

    /**
     * Shift order of items when there's a conflict
     * All items with urutan >= newOrder will be incremented by 1
     */
    private function shiftOrder(int $newOrder, ?int $excludeId = null)
    {
        $query = MstCarousel::where('urutan', '>=', $newOrder);
        
        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }

        $query->increment('urutan');
    }
}
