<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;
use App\Pinjam;
use App\Penerbit;
use App\Peminjam;
use App\SatuanBuku;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function showDashboard() {
        $totalBuku = Buku::get();
        $totalPenerbit = Penerbit::get();
        $totalPeminjam = Peminjam::get();
        $totalPinjam = Pinjam::where('is_returned',0)->get();
        $totalBukuDiPinjam = SatuanBuku::where("status_pinjam", 0)->get()->count();
        $totalSatuanBuku = SatuanBuku::get()->count();
        $totalBukuRusak = SatuanBuku::where("kondisi", 0)->get()->count();
        return view('dashboard', compact('totalBuku', 'totalPenerbit', 'totalPeminjam', 'totalPinjam', 'totalBukuDiPinjam', 'totalSatuanBuku', 'totalBukuRusak'));
    }
}
