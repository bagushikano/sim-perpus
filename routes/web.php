<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', "LoginController@showLogin")->name('login_page')->middleware('guest');
Route::get('/login', "LoginController@showLogin")->name('login_page')->middleware('guest');
Route::post('/logout', 'LoginController@logout')->name('logout');
Route::post('/submit_login', "LoginController@login")->name('submit_login');


Route::get('/dashboard', "DashboardController@showDashboard")->name('dashboard');

Route::get('/penerbit', "PenerbitController@showPenerbit")->name('penerbit');
Route::get('/penerbit-add', "PenerbitController@showAddPenerbit")->name('penerbit-add');
Route::post('/penerbit-store', "PenerbitController@createPenerbit")->name('penerbit-store');
Route::post('/penerbit-delete/{penerbit}', "PenerbitController@deletePenerbit")->name('penerbit-delete');
Route::get('/penerbit-show-update/{penerbit}', "PenerbitController@showEditPenerbit")->name('penerbit-show-update');
Route::post('/penerbit-update/{penerbit}', "PenerbitController@updatePenerbit")->name('penerbit-update');


Route::get('/buku', "BukuController@showBuku")->name('buku');
Route::get('/buku-add', "BukuController@showAddBuku")->name('buku-add');
Route::post('/buku-store', "BukuController@createBuku")->name('buku-store');
Route::post('/buku-delete/{buku}', "BukuController@deleteBuku")->name('buku-delete');
Route::get('/buku-show-update/{buku}', "BukuController@showEditBuku")->name('buku-show-update');
Route::post('/buku-update/{buku}', "BukuController@updateBuku")->name('buku-update');


Route::post('/satuan-buku-add/{buku}', "BukuController@addSatuanBuku")->name('satuan-buku-add');
Route::post('/satuan-buku-delete', "BukuController@deleteSatuanBuku")->name('satuan-buku-delete');
Route::post('/satuan-buku-update', "BukuController@updateSatuanBuku")->name('satuan-buku-update');

Route::get('/peminjam', "PeminjamController@showPeminjam")->name('peminjam');
Route::get('/peminjam-add', "PeminjamController@showAddpeminjam")->name('peminjam-add');
Route::post('/peminjam-store', "PeminjamController@createPeminjam")->name('peminjam-store');
Route::post('/peminjam-delete/{peminjam}', "PeminjamController@deletePeminjam")->name('peminjam-delete');
Route::get('/peminjam-show-update/{peminjam}', "PeminjamController@showEditPeminjam")->name('peminjam-show-update');
Route::post('/peminjam-update/{peminjam}', "PeminjamController@updatePeminjam")->name('peminjam-update');


Route::get('/pinjam', "PinjamController@showPinjam")->name('pinjam');
Route::get('/pinjam-add', "PinjamController@showAddPinjam")->name('pinjam-add');
Route::post('/pinjam-store', "PinjamController@createPinjam")->name('pinjam-store');
Route::post('/pinjam-delete/{pinjam}', "PinjamController@deletePinjam")->name('pinjam-delete');
Route::get('/pinjam-show-update/{pinjam}', "PinjamController@showEditPinjam")->name('pinjam-show-update');
Route::post('/pinjam-update/{pinjam}', "PinjamController@updatePinjam")->name('pinjam-update');
Route::post('/pinjam-done/{pinjam}', "PinjamController@pinjamDone")->name('pinjam-done');

