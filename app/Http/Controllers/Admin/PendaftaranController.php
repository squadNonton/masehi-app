<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MstPendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index()
    {
        $pendaftarans = MstPendaftaran::latest()->get();
        return view('admin.pendaftaran.index', compact('pendaftarans'));
    }

    public function show($id)
    {
        $pendaftaran = MstPendaftaran::findOrFail($id);
        // Reuse the step 2 view but maybe read-only? 
        // Or just redirect to step 2 for now since admin might want to edit it too.
        // For simplicity, let's just use the same view or create a detail view?
        // User said "CRUD biasa saja".
        // Let's just return the same view for edit/detail if needed, or just redirect.
        // But for "CRUD", we usually mean Delete.
        return view('pages.pendaftaran.step2', compact('pendaftaran')); 
    }

    public function destroy($id)
    {
        $pendaftaran = MstPendaftaran::findOrFail($id);
        
        // Optional: delete associated files
        if($pendaftaran->file_foto_siswa && file_exists(public_path('uploads/pendaftaran/' . $pendaftaran->file_foto_siswa))){
            unlink(public_path('uploads/pendaftaran/' . $pendaftaran->file_foto_siswa));
        }
        if($pendaftaran->other_file && file_exists(public_path('uploads/pendaftaran/' . $pendaftaran->other_file))){
            unlink(public_path('uploads/pendaftaran/' . $pendaftaran->other_file));
        }

        $pendaftaran->delete();

        return redirect()->route('admin.pendaftaran.index')->with('success', 'Data pendaftaran berhasil dihapus');
    }
}
