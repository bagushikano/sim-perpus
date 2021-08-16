<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;
use App\Pinjam;
use App\Penerbit;
use App\Peminjam;

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
        return view('dashboard', compact('totalBuku', 'totalPenerbit', 'totalPeminjam', 'totalPinjam'));
    }
}
