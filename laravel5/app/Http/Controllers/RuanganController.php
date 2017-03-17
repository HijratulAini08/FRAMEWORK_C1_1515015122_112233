<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ruangan;

class RuanganController extends Controller
{
    //
    public function awal()
    {
    	return "hello dari ruangancontroller nih gaiss";
    }
    public function tambah()
    {
    	return $this->simpan();
    }
    public function simpan()
    {
    	$ruangan = new Ruangan();
    	$ruangan->title = 'bulan';
    	$ruangan->save();
    	return "inputan  {$ruangan->title} telah disimpan";
    }
}
