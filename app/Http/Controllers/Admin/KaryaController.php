<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MstKarya;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KaryaController extends Controller
{
    public function index()
    {
        $karya = MstKarya::latest()->get();
        return view('admin.karya.index', compact('karya'));
    }

    public function create()
    {
        return view('admin.karya.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'kategori' => 'required|string',
            'nama_siswa' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'tahun' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'file' => 'nullable|mimes:pdf,doc,docx|max:5120',
        ]);

        $data = $request->only(['judul', 'deskripsi', 'kategori', 'nama_siswa', 'kelas', 'tahun']);
        $data['slug'] = Str::slug($request->judul);
        $data['is_active'] = $request->has('is_active');

        $count = MstKarya::where('slug', $data['slug'])->count();
        if ($count > 0) {
            $data['slug'] = $data['slug'] . '-' . time();
        }

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/karya'), $filename);
            $data['gambar'] = $filename;
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('files/karya'), $filename);
            $data['file'] = $filename;
        }

        MstKarya::create($data);

        return redirect()->route('admin.karya.index')->with('success', 'Karya berhasil ditambahkan');
    }

    public function edit(MstKarya $karya)
    {
        return view('admin.karya.edit', compact('karya'));
    }

    public function update(Request $request, MstKarya $karya)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'kategori' => 'required|string',
            'nama_siswa' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'tahun' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'file' => 'nullable|mimes:pdf,doc,docx|max:5120',
        ]);

        $data = $request->only(['judul', 'deskripsi', 'kategori', 'nama_siswa', 'kelas', 'tahun']);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('gambar')) {
            if ($karya->gambar && file_exists(public_path('img/karya/' . $karya->gambar))) {
                unlink(public_path('img/karya/' . $karya->gambar));
            }
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/karya'), $filename);
            $data['gambar'] = $filename;
        }

        if ($request->hasFile('file')) {
            if ($karya->file && file_exists(public_path('files/karya/' . $karya->file))) {
                unlink(public_path('files/karya/' . $karya->file));
            }
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('files/karya'), $filename);
            $data['file'] = $filename;
        }

        $karya->update($data);

        return redirect()->route('admin.karya.index')->with('success', 'Karya berhasil diupdate');
    }

    public function destroy(MstKarya $karya)
    {
        if ($karya->gambar && file_exists(public_path('img/karya/' . $karya->gambar))) {
            unlink(public_path('img/karya/' . $karya->gambar));
        }
        if ($karya->file && file_exists(public_path('files/karya/' . $karya->file))) {
            unlink(public_path('files/karya/' . $karya->file));
        }
        $karya->delete();

        return redirect()->route('admin.karya.index')->with('success', 'Karya berhasil dihapus');
    }
}
