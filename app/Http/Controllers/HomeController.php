<?php

namespace App\Http\Controllers;

use App\Models\MstCarousel;
use App\Models\MstProgram;
use App\Models\MstGuru;
use App\Models\MstAlumni;
use App\Models\MstBerita;
use App\Models\MstKarya;
use App\Models\MstGaleri;
use App\Models\MstPrestasi;
use App\Models\MstKarir;
use App\Models\MstFasilitas;
use App\Models\TrsKontak;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $carousels = MstCarousel::active()->ordered()->get();
        $programs = MstProgram::with('items')->active()->ordered()->get();
        $gurus = MstGuru::active()->ordered()->get();

        return view('pages.home', compact('carousels', 'programs', 'gurus'));
    }

    public function about()
    {
        $fasilitas = MstFasilitas::active()->ordered()->get();
        $gurus = MstGuru::active()->ordered()->get();
        
        return view('pages.about', compact('fasilitas', 'gurus'));
    }

    public function alumni()
    {
        $alumni = MstAlumni::active()->ordered()->get();
        $featuredAlumni = MstAlumni::active()->featured()->get();
        
        return view('pages.alumni', compact('alumni', 'featuredAlumni'));
    }

    public function kegiatan(Request $request)
    {
        $query = MstBerita::active()->latest();
        
        if ($request->kategori) {
            $query->byKategori($request->kategori);
        }
        
        $featured = MstBerita::active()->featured()->latest()->first();
        $berita = $query->paginate(9);
        $categories = MstBerita::active()->distinct()->pluck('kategori');
        
        return view('pages.kegiatan', compact('berita', 'featured', 'categories'));
    }

    public function kegiatanDetail($slug)
    {
        $berita = MstBerita::where('slug', $slug)->active()->firstOrFail();
        $berita->incrementViewCount();
        
        $related = MstBerita::active()
            ->where('id', '!=', $berita->id)
            ->where('kategori', $berita->kategori)
            ->latest()
            ->take(3)
            ->get();
        
        return view('pages.kegiatan-detail', compact('berita', 'related'));
    }

    public function karya(Request $request)
    {
        $query = MstKarya::active()->latest();
        
        if ($request->kategori) {
            $query->byKategori($request->kategori);
        }
        
        $karya = $query->paginate(12);
        $categories = MstKarya::active()->distinct()->pluck('kategori');
        
        return view('pages.karya', compact('karya', 'categories'));
    }

    public function karyaDetail($slug)
    {
        $karya = MstKarya::where('slug', $slug)->active()->firstOrFail();
        
        return view('pages.karya-detail', compact('karya'));
    }

    public function galeri(Request $request)
    {
        $query = MstGaleri::active()->ordered();
        
        if ($request->tipe) {
            $query->where('tipe', $request->tipe);
        }
        
        if ($request->kategori) {
            $query->byKategori($request->kategori);
        }
        
        $galeri = $query->paginate(12);
        $categories = MstGaleri::active()->distinct()->pluck('kategori');
        $albums = MstGaleri::active()->whereNotNull('album')->distinct()->pluck('album');
        
        return view('pages.galeri', compact('galeri', 'categories', 'albums'));
    }

    public function prestasi(Request $request)
    {
        $query = MstPrestasi::active()->latest();
        
        if ($request->tingkat) {
            $query->byTingkat($request->tingkat);
        }
        
        if ($request->kategori) {
            $query->byKategori($request->kategori);
        }
        
        if ($request->tahun) {
            $query->byTahun($request->tahun);
        }
        
        $prestasi = $query->paginate(12);
        $tingkatList = ['kota', 'provinsi', 'nasional', 'internasional'];
        $kategoriList = MstPrestasi::active()->distinct()->pluck('kategori');
        $tahunList = MstPrestasi::active()->distinct()->orderBy('tahun', 'desc')->pluck('tahun');
        
        // Stats
        $totalPrestasi = MstPrestasi::active()->count();
        $juara1 = MstPrestasi::active()->where('peringkat', 'like', '%1%')->count();
        $nasional = MstPrestasi::active()->where('tingkat', 'nasional')->count();
        $internasional = MstPrestasi::active()->where('tingkat', 'internasional')->count();
        
        return view('pages.prestasi', compact(
            'prestasi', 'tingkatList', 'kategoriList', 'tahunList',
            'totalPrestasi', 'juara1', 'nasional', 'internasional'
        ));
    }

    public function karir()
    {
        $lowongan = MstKarir::active()->latest()->get();
        
        return view('pages.karir', compact('lowongan'));
    }

    public function karirDetail($slug)
    {
        $lowongan = MstKarir::where('slug', $slug)->firstOrFail();
        
        return view('pages.karir-detail', compact('lowongan'));
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function sendContact(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subjek' => 'required|string|max:255',
            'pesan' => 'required|string',
        ]);

        TrsKontak::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'subjek' => $request->subjek,
            'pesan' => $request->pesan,
            'is_read' => false,
        ]);

        return redirect()->route('contact')->with('success', 'Pesan Anda telah terkirim. Terima kasih!');
    }
}
