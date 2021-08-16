<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;
use App\SatuanBuku;
use App\Penerbit;

class BukuController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function showBuku() {
        $buku = Buku::with('satuanBuku')->get()->map(function($item){
            $item->penerbit = $item->getPenerbit();
            return $item;
        });
        return view('buku', compact('buku'));
    }

    public function showAddBuku() {
        $penerbit = Penerbit::get();
        return view('buku-tambah', compact('penerbit'));
    }

    public function showEditBuku(Buku $buku) {
        $buku = Buku::where('id', $buku->id)->get()->first();
        $penerbit = Penerbit::get();
        $satuanBuku = SatuanBuku::where('id_buku', $buku->id)->get();
        return view('buku-edit', compact('buku', 'penerbit', 'satuanBuku'));
    }

    public function createBuku(Request $request) {
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

    public function deleteBuku($buku) {
        $buku = Buku::where('id', $buku)->delete();
        if ($buku>0) {
            return redirect()->back()->with('done-delete', 'Buku berhasil di hapus');
        }
        else {
            return redirect()->back()->with('failed-delete', 'Buku gagal di hapus');
        }
    }

    public function updateBuku(Buku $buku, Request $request) {
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

    public function deleteSatuanBuku(Request $request) {
        $satuanBuku = SatuanBuku::where('id', $request->satuan_delete)->delete();

        if ($satuanBuku>0) {
            return redirect()->back()->with('done-delete-satuan', 'Satuan buku berhasil di hapus');
        }
        else {
            return redirect()->back()->with('failed-delete-satuan', 'Satuan buku gagal di hapus');
        }

    }


    public function updateSatuanBuku(Request $request) {
          $satuanBuku = SatuanBuku::where('id', $request->satuan_update)->update([
            'kondisi' => $request->kondisi,
        ]);;

        if ($satuanBuku>0) {
            return redirect()->back()->with('done-update-satuan', 'Satuan buku berhasil di edit');
        }
        else {
            return redirect()->back()->with('failed-update-satuan', 'Satuan buku gagal di edit');
        }
    }

    public function addSatuanBuku(Request $request, $buku) {
        for ($i = 0; $i<$request->tambah_satuan; $i++) {
            $satuanBuku = SatuanBuku::create([
                'id_buku' => $buku
            ]);
        }
        if ($satuanBuku) {
            return redirect()->back()->with('done-add-satuan', 'Satuan buku berhasil di tambah');
        }
        else {
            return redirect()->back()->with('failed-add-satuan', 'Satuan buku gagal di tambah');
        }
    }
}
