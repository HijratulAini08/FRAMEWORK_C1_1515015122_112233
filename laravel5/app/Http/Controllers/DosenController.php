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
    	//return "hello dari dosen controller nih gaiss";
         return view('dosen.awal', ['data'=>dosen::all()]);
    }
    public function tambah()
    {
    	//return $this->simpan();
        return view('dosen.tambah');
    }
    public function simpan(Request $input)
    {
    	// $dosen = new Dosen();
    	// $dosen->nama = 'Sutisna';
    	// $dosen->nip = '112233';
    	// $dosen->alamat = 'Jl.soekarno';
    	// $dosen->pengguna_id = 1;
    	// $dosen->save();
    	// return "data {$dosen->nama} telah disimpan";
        $dosen = new dosen();
        $dosen->nama = $input->nama;
        $dosen->nip = $input->nip;
        $dosen->alamat = $input->alamat;
        $informasi = $dosen->save() ? 'berhasil simpan data' : 'gagal simoan data';
        return redirect('dosen')->with(['infromasi'=>$informasi]);
    }
    public function edit($id)
    {
        $dosen = dosen::find($id);
        return view('dosen.edit')->with(array('dosen'=>$dosen));
    }
    public function lihat($id)
    {
        $dosen = dosen::find($id);
        return view('dosen.lihat')->with(array('dosen'=>$dosen));
    }

    public function update($id, Request $input)
    {
        $dosen = dosen::find($id);
        $dosen->nama = $input->nama;
        $dosen->nip = $input->nip;
        $dosen->alamat = $input->alamat;
        $informasi = $dosen->save()? 'berhasil update data' : 'gagal update data';
        return redirect('dosen')->with(['informasi'=>$informasi]);
    }
    public function hapus($id)
    {
        $dosen = dosen::find($id);
        $informasi = $dosen->delete() ? 'berhasil hapus data' : 'gagal hapus data';
        return redirect('dosen')->with(['informasi'=>$informasi]);
    }

}
