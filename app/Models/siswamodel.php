<?php

namespace App\Models;

use CodeIgniter\Model;

class siswamodel extends Model
{
    protected $table = 'data_siswa';
    protected $primaryKey='nis';
    protected $allowedFields = ['nis','id_user','nama','nisn','jk','kelas','agama','tempat','tanggal','sekolah','pekortu','ayah','ibu'];
}