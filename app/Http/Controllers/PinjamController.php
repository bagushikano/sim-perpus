<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peminjam;
use App\SatuanBuku;
use App\Buku;
use App\Pinjam;

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
        $penerbit = Penerbit::get();
        return view('buku-tambah', compact('penerbit'));
    }

    public function showEditPinjam(Buku $buku) {
        $buku = Buku::where('id', $buku->id)->get()->first();
        $penerbit = Penerbit::get();
        $satuanBuku = SatuanBuku::where('id_buku', $buku->id)->get();
        return view('buku-edit', compact('buku', 'penerbit', 'satuanBuku'));
    }

    public function createPinjam(Request $request) {
        // $this->validate($request,[
        //     'nama_penerbit' => "required|min:3|max:100",
        // ],
        // [
        //     'nama_penerbit.required' => "Nama penerbit wajib diisi",
        //     'nama_penerbit.min' => "Nama penerbit minimal berjumlah 3 karakter",
        //     'nama_penerbit.max' => "Nama penerbit maksimal berjumlah 50 karakter",
        // ]);

        $buku = Buku::create([
            'nama_buku' => $request->nama_buku,
            'id_penerbit' => $request->penerbit,
            'isbn' => $request->isbn,
        ]);

        if ($buku) {
            return redirect()->back()->with('done', 'Buku berhasil di tambahkan');
        }
        else {
            return redirect()->back()->with('failed', 'Buku gagal di tambahkan');
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

    public function updatePinjam(Buku $buku, Request $request) {
        $buku = Buku::where('id', $buku->id)->update([
            'nama_buku' => $request->nama_buku,
            'id_penerbit' => $request->penerbit,
            'isbn' => $request->isbn,
        ]);;

        if ($buku>0) {
            return redirect()->back()->with('done', 'Buku berhasil di update');
        }
        else {
            return redirect()->back()->with('failed', 'Buku gagal di update');
        }
    }

    public function pinjamDone(Buku $buku, Request $request) {
        $buku = Buku::where('id', $buku->id)->update([
            'nama_buku' => $request->nama_buku,
            'id_penerbit' => $request->penerbit,
            'isbn' => $request->isbn,
        ]);;

        if ($buku>0) {
            return redirect()->back()->with('done', 'Buku berhasil di update');
        }
        else {
            return redirect()->back()->with('failed', 'Buku gagal di update');
        }
    }
}
