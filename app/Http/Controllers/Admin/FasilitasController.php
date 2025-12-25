<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MstFasilitas;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    public function index()
    {
        $fasilitas = MstFasilitas::ordered()->get();
        return view('admin.fasilitas.index', compact('fasilitas'));
    }

    public function create()
    {
        return view('admin.fasilitas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['nama', 'deskripsi', 'icon', 'urutan']);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/fasilitas'), $filename);
            $data['gambar'] = $filename;
        }

        MstFasilitas::create($data);

        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil ditambahkan');
    }

    public function edit(MstFasilitas $fasilita)
    {
        return view('admin.fasilitas.edit', ['fasilitas' => $fasilita]);
    }

    public function update(Request $request, MstFasilitas $fasilita)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['nama', 'deskripsi', 'icon', 'urutan']);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('gambar')) {
            if ($fasilita->gambar && file_exists(public_path('img/fasilitas/' . $fasilita->gambar))) {
                unlink(public_path('img/fasilitas/' . $fasilita->gambar));
            }
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/fasilitas'), $filename);
            $data['gambar'] = $filename;
        }

        $fasilita->update($data);

        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil diupdate');
    }

    public function destroy(MstFasilitas $fasilita)
    {
        if ($fasilita->gambar && file_exists(public_path('img/fasilitas/' . $fasilita->gambar))) {
            unlink(public_path('img/fasilitas/' . $fasilita->gambar));
        }
        $fasilita->delete();

        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil dihapus');
    }
}
