<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penerbit;

class PenerbitController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function showPenerbit() {
        $penerbit = Penerbit::get();
        return view('penerbit', compact('penerbit'));
    }

    public function showAddPenerbit() {
        return view('penerbit-tambah');
    }

    public function showEditPenerbit(Penerbit $penerbit) {
        $penerbit = Penerbit::where('id', $penerbit->id)->get()->first();
        return view('penerbit-edit', compact('penerbit'));
    }

    public function createPenerbit(Request $request) {
        $this->validate($request,[
            'nama_penerbit' => "required|min:3|max:100",
        ],
        [
            'nama_penerbit.required' => "Nama penerbit wajib diisi",
            'nama_penerbit.min' => "Nama penerbit minimal berjumlah 3 karakter",
            'nama_penerbit.max' => "Nama penerbit maksimal berjumlah 50 karakter",
        ]);

        $penerbit = Penerbit::create([
            'nama_penerbit' => $request->nama_penerbit,
        ]);

        if ($penerbit) {
            return redirect()->back()->with('done', 'Desa berhasil di tambahkan');
        }
        else {
            return redirect()->back()->with('failed', 'Desa gagal di tambahkan');
        }
    }

    public function deletePenerbit($penerbit) {
        $penerbit = Penerbit::where('id', $penerbit)->delete();
        if ($penerbit>0) {
            return redirect()->back()->with('done-delete', 'Penerbit berhasil di hapus');
        }
        else {
            return redirect()->back()->with('failed-delete', 'Penerbit gagal di hapus');
        }
    }

    public function updatePenerbit(Penerbit $penerbit, Request $request) {
        $penerbit = Penerbit::where('id', $penerbit->id)->update([
            'nama_penerbit' => $request->nama_penerbit,
        ]);;

        if ($penerbit>0) {
            return redirect()->back()->with('done', 'Penerbit berhasil di update');
        }
        else {
            return redirect()->back()->with('failed', 'Penerbit gagal di update');
        }
    }
}
