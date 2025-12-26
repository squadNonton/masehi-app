<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TrsKontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $kontaks = TrsKontak::active()->latest()->get();
        return view('admin.kontak.index', compact('kontaks'));
    }

    public function markAsRead($id)
    {
        $kontak = TrsKontak::findOrFail($id);
        $kontak->update(['is_dibaca' => true]);

        return redirect()->route('admin.kontak.index')->with('success', 'Pesan ditandai sudah dibaca');
    }
}
