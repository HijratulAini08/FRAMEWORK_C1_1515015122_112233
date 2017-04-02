<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengguna extends Model
{
    protected $table='pengguna';
    //protected $fillable=['username','password'];
    protected $guarded = ['id']; // ketika dilakukan insert data, kolom id akan diabaikan. karena secara default guarded berisikan array.

    
    public function mahasiswa() //fungsi dengan nama mahasiswa
    {
		return $this->hasOne(mahasiswa::class,'pengguna_id'); // return nilai fungsi mahasiswa, dimana nilai return tersebut memiliki metode dengan nama hasOne.
                                                          // hasOne menandakan bahwa relasi tersebut bernilai one to one. 
                                                          // (mahasiswa::class,'pengguna_id') -> mahasiswa adalah nama dari model yang direlasikan pada model pengguna
                                                          //                                     pengguna_id adalah nama field yang berfungsi sebagai foreign key.
                                                              

    }

    public function dosen()
    {
        return $this->hasOne(dosen::class,'pengguna_id'); // return nilai fungsi dosen, dimana nilai return tersebut memiliki metode dengan nama hasOne.
                                                          // hasOne menandakan bahwa relasi tersebut bernilai one to one. 
                                                          // (dosen::class,'pengguna_id') -> dosen adalah nama dari model yang direlasikan pada model pengguna
                                                          //                                 pengguna_id adalah nama field yang berfungsi sebagai foreign key.
    }    
    
}
