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
    	// return "hello dari jawdal_matakuliah controller nih gaiss";
        return view('jadwal_matakuliah.awal', ['data'=>jadwal_matakuliah::all()]);
    }
    public function tambah()
    {
    	//return $this->simpan();
        return view('jadwal_matakuliah.tambah');
    }
    public function simpan()
    {
    	// $jadwal_matakuliah = new Jadwal_matakuliah();
    	// $jadwal_matakuliah->mahasiswa_id = '1';
    	// $jadwal_matakuliah->ruangan_id = '1';
    	// $jadwal_matakuliah->dosen_matakuliah = '1';
    	// $jadwal_matakuliah->save();
    	// return "data dengan jadwal_matakuliah {$jadwal_matakuliah->dosen_id} telah disimpan";
        $jadwal_matakuliah = new jadwal_matakuliah();
        $jadwal_matakuliah->mahasiswa_id = $input->dosen_id;
        $jadwal_matakuliah->ruangan_id = $input->ruangan_id;
        $jadwal_matakuliah->dosen_matakuliah = $input->dosen_matakuliah;
        $informasi = $jadwal_matakuliah->save() ? 'berhasil simpan data' : 'gagal simpan data';
        return redirect('jadwal_matakuliah')->with(['infromasi'=>$informasi]);
    }
    public function edit($id)
    {
        $jadwal_matakuliah = jadwal_matakuliah::find($id);
        return view('jadwal_matakuliah.edit')->with(array('jadwal_matakuliah'=>$jadwal_matakuliah));
    }
    public function lihat($id)
    {
        $jadwal_matakuliah = jadwal_matakuliah::find($id);
        return view('jadwal_matakuliah.lihat')->with(array('jadwal_matakuliah'=>$jadwal_matakuliah));
    }

    public function update($id, Request $input)
    {
        $jadwal_matakuliah = jadwal_matakuliah::find($id);
        $jadwal_matakuliah->mahasiswa_id = $input->mahasiswa_id;
        $jadwal_matakuliah->ruangan_id = $input->ruangan_id;
        $jadwal_matakuliah->dosen_matakuliah = $input->dosen_matakuliah;
        $informasi = $jadwal_matakuliah->save()? 'berhasil update data' : 'gagal update data';
        return redirect('jadwal_matakuliah')->with(['informasi'=>$informasi]);
    }
    public function hapus($id)
    {
        $jadwal_matakuliah = jadwal_matakuliah::find($id);
        $informasi = $jadwal_matakuliah->delete() ? 'berhasil hapus data' : 'gagal hapus data';
        return redirect('jadwal_matakuliah')->with(['informasi'=>$informasi]);
    }
}
