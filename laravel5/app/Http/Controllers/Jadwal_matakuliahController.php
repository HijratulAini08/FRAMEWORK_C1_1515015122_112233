<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\jadwal_matakuliah;
use App\mahasiswa;
use App\ruangan;
use App\dosen_matakuliah;

class Jadwal_matakuliahController extends Controller
{
    protected $informasi='gagal melakukan aksi';
    public function awal()
    {
    	// return "hello dari jawdal_matakuliah controller nih gaiss";
        //return view('jadwal_matakuliah.awal', ['data'=>jadwal_matakuliah::all()]);
        //return view('jadwal_matakuliah.awal', ['semuajadwal_matakuliah'=>jadwal_matakuliah::all()]);
        $semuajadwal_matakuliah = jadwal_matakuliah::all();
        return view('jadwal_matakuliah.awal',['semuajadwal_matakuliah'=>jadwal_matakuliah::all()]);
    }
    public function tambah()
    {
        $mahasiswa = new mahasiswa;
        $ruangan = new ruangan;
        $dosen_matakuliah = new dosen_matakuliah;
        return view('jadwal_matakuliah.tambah',compact('mahasiswa','ruangan','dosen_matakuliah'));
    }
    public function simpan(Request $input)
    {
        $jadwal_matakuliah = new jadwal_matakuliah($input->only('ruangan_id','dosen_matakuliah_id','mahasiswa_id'));
        if($jadwal_matakuliah->save()) $this->informasi="jadwal mahasiswa berhasil disimpan";
        return redirect('jadwal_matakuliah')->with(['informasi'=>$this->informasi]);
    }
    public function edit($id)
    {
        $jadwal_matakuliah = jadwal_matakuliah::find($id);
        $mahasiswa = new mahasiswa;
        $ruangan = new ruangan;
        $dosen_matakuliah = new dosen_matakuliah;
        return view('jadwal_matakuliah.edit', compact('mahasiswa','ruangan','dosen_matakuliah','jadwal_matakuliah'));
        
    }
    public function lihat($id)
    {
        $jadwal_matakuliah = jadwal_matakuliah::find($id);
        return view('jadwal_matakuliah.lihat')->with(array('jadwal_matakuliah'=>$jadwal_matakuliah));
    }

    public function update($id, Request $input)
    {
        $jadwal_matakuliah = jadwal_matakuliah::find($id);
        $jadwal_matakuliah->fill($input->only('ruangan_id','dosen_matakuliah_id','mahasiswa_id'));
        if($jadwal_matakuliah->save()) $this->informasi="Jadwal Mahasiswa Berhasil di Perbaruai";
        return redirect('jadwal_matakuliah')->with(['informasi'=>$this->informasi]);

        // $jadwal_matakuliah->ruangan_id = $input->ruangan_id;
        // $jadwal_matakuliah->dosen_matakuliah = $input->dosen_matakuliah;
        // $informasi = $jadwal_matakuliah->save()? 'berhasil update data' : 'gagal update data';
        // return redirect('jadwal_matakuliah')->with(['informasi'=>$informasi]);
    }
    public function hapus($id)
    {
        $jadwal_matakuliah = jadwal_matakuliah::find($id);
        if($jadwal_matakuliah->delete())
            $this->informasi = "jadwal Matakuliah Berhasil  di Hapus";
        return redirect('jadwal_matakuliah')->with(['informasi'=>$this->informasi]);
    }
}
