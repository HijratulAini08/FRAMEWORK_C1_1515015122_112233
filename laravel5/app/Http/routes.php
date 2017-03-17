<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('pengguna/{pengguna}', function ($pengguna) {
// 	return "Hello $pengguna"; //route parameter

 // Route::get('pengguna/{pengguna?}', function ($pengguna="semuaaaa") {
 // 	return "Hello $pengguna"; //optional route parameter});

Route::get('pengguna','penggunaController@awal');
Route::get('pengguna/tambah','penggunaController@tambah');
Route::get('pengguna/atul',function() // tugas yang enda dapat point
    {
    	$pengguna = new App\pengguna();
    	$pengguna->username = 'atul';
    	$pengguna->password = 'hijratul';
    	$pengguna->save();
    	return "data dengan username {$pengguna->username} telah disimpan";
    });

Route::get('ruangan','RuanganController@awal');
Route::get('ruangan/tambah','RuanganController@tambah');

Route::get('matakuliah','MatakuliahController@awal');
Route::get('matakuliah/tambah','MatakuliahController@tambah');

Route::get('mahasiswa','MahasiswaController@awal');
Route::get('mahasiswa/tambah','MahasiswaController@tambah');

Route::get('dosen','DosenController@awal');
Route::get('dosen/tambah','DosenController@tambah');

Route::get('jadwal_matakuliah','Jadwal_matakuliahController@awal');
Route::get('jadwal_matakuliah/tambah','Jadwal_matakuliahController@tambah');

Route::get('dosen_matakuliah','Dosen_matakuliahController@awal');
Route::get('dosen_matakuliah/tambah','Dosen_matakuliahController@tambah');


