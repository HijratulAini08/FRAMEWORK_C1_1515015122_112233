<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\dosen_matakuliah;
use App\matakuliah;

class Dosen_matakuliahController extends Controller
{
    //
    public function awal()
    {
    	//return "hello dari dosen_matakuliah controller nih gaiss";
        return view('dosen_matakuliah.awal', ['data'=>dosen_matakuliah::all()]);
    }
    public function tambah()
    {
    	//return $this->simpan();
        return view('dosen_matakuliah.tambah');
    }
    public function simpan()
    {
    // 	$dosen_matakuliah = new dosen_matakuliah();
    // 	$dosen_matakuliah->dosen_id = '1';
    // 	$dosen_matakuliah->matakuliah_id = '1';
    // 	$dosen_matakuliah->save();
    // 	return "data dengan dosen_matakuliah {$dosen_matakuliah->dosen_id} telah disimpan";
        $dosen_matakuliah = new dosen_matakuliah();
        $dosen_matakuliah->dosen_id = $input->dosen_id;
        $dosen_matakuliah->matakuliah_id = $input->matakuliah_id;
        $informasi = $dosen_matakuliah->save() ? 'berhasil simpan data' : 'gagal simpan data';
        return redirect('dosen_matakuliah')->with(['infromasi'=>$informasi]);
    }
    public function edit($id)
    {
        $dosen_matakuliah = dosen_matakuliah::find($id);
        return view('dosen_matakuliah.edit')->with(array('dosen_matakuliah'=>$dosen_matakuliah));
    }
    public function lihat($id)
    {
        $dosen_matakuliah = dosen_matakuliah::find($id);
        return view('dosen_matakuliah.lihat')->with(array('dosen_matakuliah'=>$dosen_matakuliah));
    }

    public function update($id, Request $input)
    {
        $dosen_matakuliah = dosen_matakuliah::find($id);
        $dosen_matakuliah->dosen_id = $input->dosen_id;
        $dosen_matakuliah->matakuliah_id = $input->matakuliah_id;
        $informasi = $dosen_matakuliah->save()? 'berhasil update data' : 'gagal update data';
        return redirect('dosen_matakuliah')->with(['informasi'=>$informasi]);
    }
    public function hapus($id)
    {
        $dosen_matakuliah = dosen_matakuliah::find($id);
        $informasi = $dosen_matakuliah->delete() ? 'berhasil hapus data' : 'gagal hapus data';
        return redirect('dosen_matakuliah')->with(['informasi'=>$informasi]);
    }

}