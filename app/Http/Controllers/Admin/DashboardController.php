<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MstCarousel;
use App\Models\MstProgram;
use App\Models\MstGuru;
use App\Models\TrsPendaftaran;
use App\Models\TrsKontak;
use App\Models\TrsNewsletter;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'carousel' => MstCarousel::count(),
            'program' => MstProgram::count(),
            'guru' => MstGuru::count(),
            'pendaftaran' => TrsPendaftaran::count(),
            'pendaftaran_pending' => TrsPendaftaran::where('status', 'pending')->count(),
            'kontak' => TrsKontak::count(),
            'kontak_unread' => TrsKontak::where('is_dibaca', false)->count(),
            'newsletter' => TrsNewsletter::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
