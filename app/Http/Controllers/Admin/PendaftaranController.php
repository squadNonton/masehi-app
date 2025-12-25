<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TrsPendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index()
    {
        $pendaftarans = TrsPendaftaran::active()->latest()->get();
        return view('admin.pendaftaran.index', compact('pendaftarans'));
    }

    public function updateStatus(Request $request, $id)
    {
        $pendaftaran = TrsPendaftaran::findOrFail($id);
        $pendaftaran->update(['status' => $request->status]);

        return redirect()->route('admin.pendaftaran.index')->with('success', 'Status pendaftaran berhasil diupdate');
    }
}
