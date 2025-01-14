<?php

namespace App\Models;

use CodeIgniter\Model;

class pangkalmodel extends Model
{
    protected $table = 'tpangkal';
    protected $primaryKey = 'kpangkal';
    protected $allowedFields = ['id','kpangkal','nis','tgl_pangkal','bpangkal','periode'];
    
    public function getpangkalWithSiswa()
    {
        return $this->select('tpangkal.*, data_siswa.nama')
                    ->join('data_siswa', 'data_siswa.nis = tpangkal.nis')
                    ->findAll();
    }
}