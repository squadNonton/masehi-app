<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MstKarir;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KarirController extends Controller
{
    public function index()
    {
        $karir = MstKarir::latest()->get();
        return view('admin.karir.index', compact('karir'));
    }

    public function create()
    {
        return view('admin.karir.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_posisi' => 'required|string|max:255',
            'deskripsi' => 'required',
            'persyaratan' => 'required',
            'tipe' => 'required|string',
            'batas_lamaran' => 'required|date',
        ]);

        $data = $request->only(['judul_posisi', 'deskripsi', 'persyaratan', 'benefit', 'tipe', 'batas_lamaran']);
        $data['slug'] = Str::slug($request->judul_posisi);
        $data['is_active'] = $request->has('is_active');

        $count = MstKarir::where('slug', $data['slug'])->count();
        if ($count > 0) {
            $data['slug'] = $data['slug'] . '-' . time();
        }

        MstKarir::create($data);

        return redirect()->route('admin.karir.index')->with('success', 'Lowongan berhasil ditambahkan');
    }

    public function edit(MstKarir $karir)
    {
        return view('admin.karir.edit', compact('karir'));
    }

    public function update(Request $request, MstKarir $karir)
    {
        $request->validate([
            'judul_posisi' => 'required|string|max:255',
            'deskripsi' => 'required',
            'persyaratan' => 'required',
            'tipe' => 'required|string',
            'batas_lamaran' => 'required|date',
        ]);

        $data = $request->only(['judul_posisi', 'deskripsi', 'persyaratan', 'benefit', 'tipe', 'batas_lamaran']);
        $data['is_active'] = $request->has('is_active');

        $karir->update($data);

        return redirect()->route('admin.karir.index')->with('success', 'Lowongan berhasil diupdate');
    }

    public function destroy(MstKarir $karir)
    {
        $karir->delete();

        return redirect()->route('admin.karir.index')->with('success', 'Lowongan berhasil dihapus');
    }
}
