<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MstGuru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = MstGuru::ordered()->get();
        return view('admin.guru.index', compact('gurus'));
    }

    public function create()
    {
        return view('admin.guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
        ]);

        $data = $request->only(['nama', 'jabatan', 'facebook', 'twitter', 'instagram', 'urutan']);
        $data['is_active'] = $request->has('is_active');
        $urutan = (int) ($data['urutan'] ?? 0);

        // Auto-reorder: shift items if urutan already exists
        $this->shiftOrder($urutan);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/guru'), $filename);
            $data['foto'] = $filename;
        }

        MstGuru::create($data);

        return redirect()->route('admin.guru.index')->with('success', 'Guru berhasil ditambahkan');
    }

    public function edit(MstGuru $guru)
    {
        return view('admin.guru.edit', compact('guru'));
    }

    public function update(Request $request, MstGuru $guru)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
        ]);

        $data = $request->only(['nama', 'jabatan', 'facebook', 'twitter', 'instagram', 'urutan']);
        $data['is_active'] = $request->has('is_active');
        $urutan = (int) ($data['urutan'] ?? 0);
        $oldUrutan = $guru->urutan;

        // Only shift if urutan changed
        if ($urutan != $oldUrutan) {
            $this->shiftOrder($urutan, $guru->id);
        }

        if ($request->hasFile('foto')) {
            if ($guru->foto && file_exists(public_path('img/guru/' . $guru->foto))) {
                unlink(public_path('img/guru/' . $guru->foto));
            }
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/guru'), $filename);
            $data['foto'] = $filename;
        }

        $guru->update($data);

        return redirect()->route('admin.guru.index')->with('success', 'Guru berhasil diupdate');
    }

    public function destroy(MstGuru $guru)
    {
        if ($guru->foto && file_exists(public_path('img/guru/' . $guru->foto))) {
            unlink(public_path('img/guru/' . $guru->foto));
        }
        $guru->delete();

        return redirect()->route('admin.guru.index')->with('success', 'Guru berhasil dihapus');
    }

    /**
     * Shift order of items when there's a conflict
     */
    private function shiftOrder(int $newOrder, ?int $excludeId = null)
    {
        $query = MstGuru::where('urutan', '>=', $newOrder);
        
        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }

        $query->increment('urutan');
    }
}
