<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\mahasiswa;
use App\pengguna;

class MahasiswaController extends Controller
{
    protected $informasi = 'Gagal melakukan aksi';
    public function awal()
    {
    	// return "hello dari mahasiswa controller nih gaiss";
        $semuaMahasiswa = mahasiswa::all();
        return view('mahasiswa.awal', compact(semuaMahasiswa));
    }
    public function tambah()
    {
    	// return $this->simpan();
        return view('mahasiswa.tambah');
    }
    public function simpan(Request $input)
    {
    	// $mahasiswa = new Mahasiswa();
    	// $mahasiswa->nama = 'Hijratul Aini';
    	// $mahasiswa->nim = '1515015122';
    	// $mahasiswa->alamat = 'Jl.suwandi';
    	// $mahasiswa->pengguna_id = 1;
    	// $mahasiswa->save();
    	// return "data {$mahasiswa->nama} telah disimpan";
        $pengguna = new pengguna($input->only('username','password'));
        if ($pengguna->save()) 
        {
            $mahasiswa = new mahasiswa();
            $mahasiswa->nama = $input->nama;
            $mahasiswa->nim = $input->nim;
            $mahasiswa->alamat = $input->alamat;

            if($pengguna->mahasiswa()->save($mahasiswa)) $this->informasi = 'Berhasil simpan data';
        }
        return redirect('mahasiswa')->with(['infromasi'=>$informasi]);

    }
    public function edit($id)
    {
        $mahasiswa = mahasiswa::find($id);
        return view('mahasiswa.edit')->with(array('mahasiswa'=>$mahasiswa));
    }
    public function lihat($id)
    {
        $mahasiswa = mahasiswa::find($id);
        return view('mahasiswa.lihat')->with(array('mahasiswa'=>$mahasiswa));
    }

    public function update($id, Request $input)
    {
        $mahasiswa = mahasiswa::find($id);
        $mahasiswa->nama = $input->nama;
        $mahasiswa->nim = $input->nim;
        $mahasiswa->alamat = $input->alamat;
        $informasi = $mahasiswa->save()? 'berhasil update data' : 'gagal update data';
        return redirect('mahasiswa')->with(['informasi'=>$informasi]);
    }
    public function hapus($id)
    {
        $mahasiswa = mahasiswa::find($id);
        $informasi = $mahasiswa->delete() ? 'berhasil hapus data' : 'gagal hapus data';
        return redirect('mahasiswa')->with(['informasi'=>$informasi]);
    }
}
