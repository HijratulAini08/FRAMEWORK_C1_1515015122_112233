<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\matakuliah;

class MatakuliahController extends Controller
{
    //
	public function awal()
    {
    	return "hello dari matakuliahcontroller nih gaiss";
    }
    public function tambah()
    {
    	return $this->simpan();
    }
    public function simpan()
    {
    	$matakuliah = new Matakuliah();
    	$matakuliah->title = 'Mulitmedia';
    	$matakuliah->keterangan = 'tidak wajib';
    	$matakuliah->save();
    	return "data {$matakuliah->title} telah disimpan";
    }
}
