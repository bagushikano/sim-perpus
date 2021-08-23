<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Admin;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function showChangeAdminPass() {
        return view('admin-passchange');
    }

    public function updateAdminPass(Request $request) {
        $user = Auth::user();


        if(Auth::guard()->attempt(['email' => $user->email, 'password' => $request->password_old])) {
            $updateUser = Admin::where('id', $user->id)->update([
                'password' => bcrypt($request->password_new)
            ]);

            if ($updateUser>0) {
                return redirect()->back()->with('done', 'Satuan buku berhasil di edit');
            }
            else {
                return redirect()->back()->with('failed', 'Satuan buku gagal di edit');
            }
        }

        else {
            return redirect()->back()->with('wrong-old-password', 'Periksa kembali password lama');
        }
    }
}
