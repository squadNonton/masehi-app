<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MstProgram;
use App\Models\DtlProgram;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = MstProgram::with('items')->ordered()->get();
        return view('admin.program.index', compact('programs'));
    }

    public function create()
    {
        return view('admin.program.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $data = $request->only(['badge', 'judul', 'deskripsi', 'link_detail', 'urutan']);
        $data['is_active'] = $request->has('is_active');
        $urutan = (int) ($data['urutan'] ?? 0);

        // Auto-reorder: shift items if urutan already exists
        $this->shiftOrder($urutan);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/program'), $filename);
            $data['gambar'] = $filename;
        }

        $program = MstProgram::create($data);

        // Handle detail items
        if ($request->has('items')) {
            foreach ($request->items as $index => $item) {
                if (!empty($item['judul'])) {
                    DtlProgram::create([
                        'program_id' => $program->id,
                        'judul' => $item['judul'],
                        'icon' => $item['icon'] ?? null,
                        'urutan' => $index + 1,
                        'is_active' => true,
                    ]);
                }
            }
        }

        return redirect()->route('admin.program.index')->with('success', 'Program berhasil ditambahkan');
    }

    public function edit(MstProgram $program)
    {
        $program->load('items');
        return view('admin.program.edit', compact('program'));
    }

    public function update(Request $request, MstProgram $program)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $data = $request->only(['badge', 'judul', 'deskripsi', 'link_detail', 'urutan']);
        $data['is_active'] = $request->has('is_active');
        $urutan = (int) ($data['urutan'] ?? 0);
        $oldUrutan = $program->urutan;

        // Only shift if urutan changed
        if ($urutan != $oldUrutan) {
            $this->shiftOrder($urutan, $program->id);
        }

        if ($request->hasFile('gambar')) {
            if ($program->gambar && file_exists(public_path('img/program/' . $program->gambar))) {
                unlink(public_path('img/program/' . $program->gambar));
            }
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/program'), $filename);
            $data['gambar'] = $filename;
        }

        $program->update($data);

        // Update detail items
        $program->items()->delete();
        if ($request->has('items')) {
            foreach ($request->items as $index => $item) {
                if (!empty($item['judul'])) {
                    DtlProgram::create([
                        'program_id' => $program->id,
                        'judul' => $item['judul'],
                        'icon' => $item['icon'] ?? null,
                        'urutan' => $index + 1,
                        'is_active' => true,
                    ]);
                }
            }
        }

        return redirect()->route('admin.program.index')->with('success', 'Program berhasil diupdate');
    }

    public function destroy(MstProgram $program)
    {
        if ($program->gambar && file_exists(public_path('img/program/' . $program->gambar))) {
            unlink(public_path('img/program/' . $program->gambar));
        }
        $program->delete();

        return redirect()->route('admin.program.index')->with('success', 'Program berhasil dihapus');
    }

    /**
     * Shift order of items when there's a conflict
     */
    private function shiftOrder(int $newOrder, ?int $excludeId = null)
    {
        $query = MstProgram::where('urutan', '>=', $newOrder);
        
        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }

        $query->increment('urutan');
    }
}
