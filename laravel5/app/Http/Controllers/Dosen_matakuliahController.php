<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\dosen_matakuliah;
use App\matakuliah;
use App\dosen;

class Dosen_matakuliahController extends Controller
{
    protected $guarded = ['id'];
    protected $informasi = 'Gagal Melakukan Aksi';
    public function awal()
    {
    	//return "hello dari dosen_matakuliah controller nih gaiss";
        //return view('dosen_matakuliah.awal', ['data'=>dosen_matakuliah::all()]);
        $semuadosenmatakuliah = dosen_matakuliah::all();
        return view('dosen_matakuliah.awal',['semuadosenmatakuliah'=>dosen_matakuliah::all()]);
    }
    public function tambah()
    {
    	//return $this->simpan();
        //return view('dosen_matakuliah.tambah');
        $dosen = new dosen;
        $matakuliah = new matakuliah;
        return view('dosen_matakuliah.tambah', compact('dosen','matakuliah'));
    }
    public function simpan(Request $input)
    {
        $dosen_matakuliah = new dosen_matakuliah($input->only('dosen_id','matakuliah_id'));
        if($dosen_matakuliah->save()) $this->informasi = 'Dosen Matakuliah Berhasil Disimpan';
        return redirect('dosen_matakuliah')->with(['informasi' => $this->informasi]);
    }
    public function edit($id)
    {
        $dosen_matakuliah = dosen_matakuliah::find($id);
        $dosen = new dosen;
        $matakuliah = new matakuliah;
        return view('dosen_matakuliah.edit', compact('dosen','matakuliah','dosen_matakuliah'));
    }
    public function lihat($id)
    {
        $dosen_matakuliah = dosen_matakuliah::find($id);
        return view('dosen_matakuliah.lihat')->with(array('dosen_matakuliah'=>$dosen_matakuliah));
    }

    public function update($id, Request $input)
    {
        $dosen_matakuliah = dosen_matakuliah::find($id);
        $dosen_matakuliah->fill($input->only('dosen_id','matakuliah_id'));
        if($dosen_matakuliah->save()) $this->informasi = "Dosen Matakuliah Berhasil Di Perbaharui";
        return redirect('dosen_matakuliah')->with(['informasi' =>$this->informasi]);
    }
    public function hapus($id)
    {
        $dosen_matakuliah = dosen_matakuliah::find($id);
        $informasi = $dosen_matakuliah->delete()? 'Berhasil hapus data' : 'gagal hapus data';
        return redirect('dosen_matakuliah')->with(['informasi' =>$this->informasi]);
    }

}