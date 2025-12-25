<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MstPrestasi;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    public function index()
    {
        $prestasi = MstPrestasi::latest()->get();
        return view('admin.prestasi.index', compact('prestasi'));
    }

    public function create()
    {
        return view('admin.prestasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tingkat' => 'required|string',
            'kategori' => 'required|string',
            'peringkat' => 'required|string',
            'tahun' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['judul', 'deskripsi', 'tingkat', 'kategori', 'peringkat', 'nama_peserta', 'tahun', 'tanggal']);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/prestasi'), $filename);
            $data['gambar'] = $filename;
        }

        MstPrestasi::create($data);

        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil ditambahkan');
    }

    public function edit(MstPrestasi $prestasi)
    {
        return view('admin.prestasi.edit', compact('prestasi'));
    }

    public function update(Request $request, MstPrestasi $prestasi)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tingkat' => 'required|string',
            'kategori' => 'required|string',
            'peringkat' => 'required|string',
            'tahun' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['judul', 'deskripsi', 'tingkat', 'kategori', 'peringkat', 'nama_peserta', 'tahun', 'tanggal']);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('gambar')) {
            if ($prestasi->gambar && file_exists(public_path('img/prestasi/' . $prestasi->gambar))) {
                unlink(public_path('img/prestasi/' . $prestasi->gambar));
            }
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/prestasi'), $filename);
            $data['gambar'] = $filename;
        }

        $prestasi->update($data);

        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil diupdate');
    }

    public function destroy(MstPrestasi $prestasi)
    {
        if ($prestasi->gambar && file_exists(public_path('img/prestasi/' . $prestasi->gambar))) {
            unlink(public_path('img/prestasi/' . $prestasi->gambar));
        }
        $prestasi->delete();

        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil dihapus');
    }
}
