<?php

namespace App\Models;

use CodeIgniter\Model;

class tahunanmodel extends Model
{
    protected $table = 'ttahunan';
    protected $primaryKey = 'ktahunan';
    protected $allowedFields = ['id','ktahunan','nis','tgl_tahunan','btahunan','periode'];
    
    public function getTahunanWithSiswa()
    {
        return $this->select('ttahunan.*, data_siswa.nama')
                    ->join('data_siswa', 'data_siswa.nis = ttahunan.nis')
                    ->findAll();
    }
}