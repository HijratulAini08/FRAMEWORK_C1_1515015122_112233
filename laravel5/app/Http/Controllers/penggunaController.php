<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\pengguna;

class penggunaController extends Controller
{
    //
    public function awal()
    {
    	return "Hello dari penggunaController";
    }

    public function tambah()
    {
    	return $this->simpan();
    }
    public function simpan()
    {
    	$pengguna = new pengguna();
    	$pengguna->username = 'jon_doe';
    	$pengguna->password = 'doe_joe';
    	$pengguna->save();
    	return "data dengan username {$pengguna->username} telah disimpan";
    }
}
