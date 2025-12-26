<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MstGaleri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = MstGaleri::ordered()->get();
        return view('admin.galeri.index', compact('galeri'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tipe' => 'required|in:foto,video',
            'kategori' => 'required|string',
            'file_path' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'video_url' => 'nullable|url',
        ]);

        $data = $request->only(['judul', 'deskripsi', 'tipe', 'kategori', 'album', 'video_url', 'urutan']);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/galeri'), $filename);
            $data['file_path'] = $filename;
        }

        MstGaleri::create($data);

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil ditambahkan');
    }

    public function edit(MstGaleri $galeri)
    {
        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, MstGaleri $galeri)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tipe' => 'required|in:foto,video',
            'kategori' => 'required|string',
            'file_path' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'video_url' => 'nullable|url',
        ]);

        $data = $request->only(['judul', 'deskripsi', 'tipe', 'kategori', 'album', 'video_url', 'urutan']);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('file_path')) {
            if ($galeri->file_path && file_exists(public_path('img/galeri/' . $galeri->file_path))) {
                unlink(public_path('img/galeri/' . $galeri->file_path));
            }
            $file = $request->file('file_path');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/galeri'), $filename);
            $data['file_path'] = $filename;
        }

        $galeri->update($data);

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil diupdate');
    }

    public function destroy(MstGaleri $galeri)
    {
        if ($galeri->file_path && file_exists(public_path('img/galeri/' . $galeri->file_path))) {
            unlink(public_path('img/galeri/' . $galeri->file_path));
        }
        $galeri->delete();

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil dihapus');
    }
}
