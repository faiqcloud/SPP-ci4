<?php

namespace App\Models;

use CodeIgniter\Model;

class sppmodel extends Model
{
    protected $table = 'tspp';
    protected $primaryKey = 'kspp';
    protected $allowedFields = ['id','kspp','nis','tgl_spp','bspp','periode'];
    
    public function getSppWithSiswa()
    {
        return $this->select('tspp.*, data_siswa.nama')
                    ->join('data_siswa', 'data_siswa.nis = tspp.nis')
                    ->findAll();
    }
}