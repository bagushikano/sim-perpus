<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peminjam;
use App\SatuanBuku;
use App\Buku;
use App\Pinjam;
use App\DetailPinjam;
use App\Penerbit;

class PinjamController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function showPinjam() {
        $pinjam = Pinjam::with('detailPinjam')->get()->map(function($item){
            $item->peminjam = $item->getPeminjam();
            return $item;
        });
        return view('pinjam', compact('pinjam'));
    }

    public function showAddPinjam() {
        $peminjam = Peminjam::get();

        $satuanBuku = SatuanBuku::where('status_pinjam', 1)->get();
        $buku = Buku::get()->map(function($item){
            $item->penerbit = $item->getPenerbit();
            return $item;
        });
        return view('pinjam-tambah', compact('peminjam', 'buku', 'satuanBuku'));
    }

    public function showEditPinjam(Pinjam $pinjam) {
        $buku = Buku::get()->map(function($item){
            $item->penerbit = $item->getPenerbit();
            return $item;
        });

        $pinjam = Pinjam::where('id', $pinjam->id)->get()->first();
        $detailPinjam = DetailPinjam::where("id_pinjam", $pinjam->id)->get();
        $peminjam = Peminjam::where('id', $pinjam->id_peminjam)->first();
        $satuanBuku = SatuanBuku::get();

        return view('pinjam-edit', compact('buku', 'pinjam', 'peminjam', 'detailPinjam', 'satuanBuku'));
    }

    public function showPinjamDone(Pinjam $pinjam) {
        $buku = Buku::get()->map(function($item){
            $item->penerbit = $item->getPenerbit();
            return $item;
        });

        $pinjam = Pinjam::where('id', $pinjam->id)->get()->first();
        $detailPinjam = DetailPinjam::where("id_pinjam", $pinjam->id)->get();
        $peminjam = Peminjam::where('id', $pinjam->id_peminjam)->first();
        $satuanBuku = SatuanBuku::get();

        return view('pinjam-done', compact('buku', 'pinjam', 'peminjam', 'detailPinjam', 'satuanBuku'));
    }

    public function createPinjam(Request $request) {

        $pinjam = Pinjam::create([
            'is_returned' => 0,
            'id_peminjam' => $request->peminjam,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
        ]);

        if ($request->satuan_buku_1 != null) {
            $detailPinjam1 = DetailPinjam::create([
                'id_pinjam' => $pinjam->id,
                'id_satuan_buku'=> $request->satuan_buku_1,
                'is_broken' => 0
            ]);

            $buku1 = SatuanBuku::where('id', $request->satuan_buku_1)->update([
                'status_pinjam' => 0
            ]);
        }

        if ($request->satuan_buku_2 != null) {
            $detailPinjam2 = DetailPinjam::create([
                'id_pinjam' => $pinjam->id,
                'id_satuan_buku'=> $request->satuan_buku_2,
                'is_broken' => 0
            ]);

            $buku2 = SatuanBuku::where('id', $request->satuan_buku_2)->update([
                'status_pinjam' => 0
            ]);
        }


        if ($request->satuan_buku_3 != null) {
            $detailPinjam3 = DetailPinjam::create([
                'id_pinjam' => $pinjam->id,
                'id_satuan_buku'=> $request->satuan_buku_3,
                'is_broken' => 0
            ]);

            $buku3 = SatuanBuku::where('id', $request->satuan_buku_3)->update([
                'status_pinjam' => 0
            ]);
        }


        if ($pinjam) {
            return redirect()->back()->with('done', 'Pinjaman baru berhasil di tambahkan');
        }
        else {
            return redirect()->back()->with('failed', 'Pinjaman baru gagal di tambahkan');
        }
    }

    public function deletePinjam($buku) {
        $buku = Buku::where('id', $buku)->delete();
        if ($buku>0) {
            return redirect()->back()->with('done-delete', 'Buku berhasil di hapus');
        }
        else {
            return redirect()->back()->with('failed-delete', 'Buku gagal di hapus');
        }
    }

    public function pinjamDone(Pinjam $pinjam, Request $request) {

        $pinjamUpdate = Pinjam::where('id', $pinjam->id)->update([
            'returned_date' => $request->date_returned,
            'denda' => $request->denda,
            'is_returned' => 1
        ]);

        $detailPinjam = DetailPinjam::where('id_pinjam', $pinjam->id)->get();

        foreach($detailPinjam as $detailPinjams) {
            $satuanBuku = SatuanBuku::where('id', $detailPinjams->id_satuan_buku)->update([
                'status_pinjam' => 1
            ]);
        }

        if ($pinjamUpdate>0) {
            return redirect()->back()->with('done-pinjam', 'Buku berhasil di update');
        }
        else {
            return redirect()->back()->with('failed-pinjam', 'Buku gagal di update');
        }
    }
}
