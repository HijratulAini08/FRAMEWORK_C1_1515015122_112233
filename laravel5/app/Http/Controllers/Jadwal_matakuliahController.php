<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\jadwal_matakuliah;

class Jadwal_matakuliahController extends Controller
{
    //
    public function awal()
    {
    	return "hello dari jawdal_matakuliah controller nih gaiss";
    }
    public function tambah()
    {
    	return $this->simpan();
    }
    public function simpan()
    {
    	$jadwal_matakuliah = new Jadwal_matakuliah();
    	$jadwal_matakuliah->mahasiswa_id = '1';
    	$jadwal_matakuliah->ruangan_id = '1';
    	$jadwal_matakuliah->dosen_matakuliah = '1';
    	$jadwal_matakuliah->save();
    	return "data dengan jadwal_matakuliah {$jadwal_matakuliah->dosen_id} telah disimpan";
    }
}
