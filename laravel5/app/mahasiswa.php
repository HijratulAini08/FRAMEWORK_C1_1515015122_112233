<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    //
    protected $table= 'mahasiswa';
    //protected $fillable= ['nama','nim','alamat','pengguna_id'];
    protected $guarded=['id']; // ketika dilakukan insert data, kolom id akan diabaikan. karena secara default guarded berisikan array.

    public function pengguna() //fungsi dengan nama pengguna
    {
    	return $this->belongsTo(pengguna::class); // return nilai fungsi pengguna, dimana nilai return tersebut memiliki metode dengan nama belongsTo.
                                                  // belongsTo digunakan untuk mendefinisikan kebalikan dari hubungan yang ada pada model pengguna. 
                                                  // (pengguna::class) -> pengguna adalah nama dari model yang direlasikan pada model mahasiswa.
    }

    public function jadwal_matakuliah() //fungsi dengan nama jadwal_matakuliah
    {
    	return $this->hasMany(jadwal_matakuliah::class,'mahasiswa_id');// return nilai fungsi jadwal_matakuliah, dimana nilai return tersebut memiliki metode dengan nama hasMany.
                                                                       // hasMany menandakan bahwa relasi tersebut bernilai Many. dimana setiap mahasiswa dapat memiliki banyak jadwal_matakuliah.
                                                                       // (jadwal_matakuliah::class,'mahasiswa_id') -> jadwal_matakuliah adalah nama dari model yang direlasikan pada model mahasiswa.
                                                                       //                                              mahasiswa_id adalah nama field yang berfungsi sebagai foreign key.
    }

}
