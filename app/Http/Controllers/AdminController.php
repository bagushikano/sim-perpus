<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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


    }
}