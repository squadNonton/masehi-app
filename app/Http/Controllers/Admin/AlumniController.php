<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MstAlumni;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function index()
    {
        $alumni = MstAlumni::ordered()->get();
        return view('admin.alumni.index', compact('alumni'));
    }

    public function create()
    {
        return view('admin.alumni.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tahun_lulus' => 'required|integer|min:1964|max:' . date('Y'),
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['nama', 'tahun_lulus', 'pekerjaan', 'perusahaan', 'universitas', 'testimoni', 'urutan']);
        $data['is_active'] = $request->has('is_active');
        $data['is_featured'] = $request->has('is_featured');

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/alumni'), $filename);
            $data['foto'] = $filename;
        }

        MstAlumni::create($data);

        return redirect()->route('admin.alumni.index')->with('success', 'Alumni berhasil ditambahkan');
    }

    public function edit(MstAlumni $alumni)
    {
        return view('admin.alumni.edit', compact('alumni'));
    }

    public function update(Request $request, MstAlumni $alumni)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tahun_lulus' => 'required|integer|min:1964|max:' . date('Y'),
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['nama', 'tahun_lulus', 'pekerjaan', 'perusahaan', 'universitas', 'testimoni', 'urutan']);
        $data['is_active'] = $request->has('is_active');
        $data['is_featured'] = $request->has('is_featured');

        if ($request->hasFile('foto')) {
            if ($alumni->foto && file_exists(public_path('img/alumni/' . $alumni->foto))) {
                unlink(public_path('img/alumni/' . $alumni->foto));
            }
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/alumni'), $filename);
            $data['foto'] = $filename;
        }

        $alumni->update($data);

        return redirect()->route('admin.alumni.index')->with('success', 'Alumni berhasil diupdate');
    }

    public function destroy(MstAlumni $alumni)
    {
        if ($alumni->foto && file_exists(public_path('img/alumni/' . $alumni->foto))) {
            unlink(public_path('img/alumni/' . $alumni->foto));
        }
        $alumni->delete();

        return redirect()->route('admin.alumni.index')->with('success', 'Alumni berhasil dihapus');
    }
}
