<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\dosen;

class DosenController extends Controller
{
    //
    public function awal()
    {
    	return "hello dari dosen controller nih gaiss";
    }
    public function tambah()
    {
    	return $this->simpan();
    }
    public function simpan()
    {
    	$dosen = new Dosen();
    	$dosen->nama = 'Sutisna';
    	$dosen->nip = '112233';
    	$dosen->alamat = 'Jl.soekarno';
    	$dosen->pengguna_id = 1;
    	$dosen->save();
    	return "data {$dosen->nama} telah disimpan";
    }

}
