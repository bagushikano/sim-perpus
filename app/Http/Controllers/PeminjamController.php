<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peminjam;

class PeminjamController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function showPeminjam() {
        $peminjam = Peminjam::get();
        return view('peminjam', compact('peminjam'));
    }

    public function showAddPeminjam() {
        return view('peminjam-tambah');
    }

    public function showEditPeminjam(Peminjam $peminjam) {
        $peminjam = Peminjam::where('id', $peminjam->id)->get()->first();
        return view('peminjam-edit', compact('peminjam'));
    }

    public function createPeminjam(Request $request) {
        // $this->validate($request,[
        //     'nama_penerbit' => "required|min:3|max:100",
        // ],
        // [
        //     'nama_penerbit.required' => "Nama penerbit wajib diisi",
        //     'nama_penerbit.min' => "Nama penerbit minimal berjumlah 3 karakter",
        //     'nama_penerbit.max' => "Nama penerbit maksimal berjumlah 50 karakter",
        // ]);

        $peminjam = Peminjam::create([
            'nama' => $request->nama_peminjam,
            'noinduk' => $request->noinduk_peminjam
        ]);

        if ($peminjam) {
            return redirect()->back()->with('done', 'Peminjam berhasil di tambahkan');
        }
        else {
            return redirect()->back()->with('failed', 'Peminjam gagal di tambahkan');
        }
    }

    public function deletePenerbit($penerbit) {
        $peminjam = Peminjam::where('id', $peminjam)->delete();
        if ($peminjam>0) {
            return redirect()->back()->with('done-delete', 'Peminjam berhasil di hapus');
        }
        else {
            return redirect()->back()->with('failed-delete', 'Peminjam gagal di hapus');
        }
    }

    public function updatePeminjam(Peminjam $peminjam, Request $request) {
        $peminjam = Peminjam::where('id', $peminjam->id)->update([
            'nama' => $request->nama_peminjam,
            'noinduk' => $request->noinduk_peminjam
        ]);;

        if ($peminjam>0) {
            return redirect()->back()->with('done', 'Peminjam berhasil di update');
        }
        else {
            return redirect()->back()->with('failed', 'Peminjam gagal di update');
        }
    }
}
