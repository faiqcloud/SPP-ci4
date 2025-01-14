<?php

namespace App\Models;

use CodeIgniter\Model;

class masterpangkalmodel extends Model
{
    protected $table = 'pangkal';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nis', 'periode', 'totbpangkal', 'status'];

    public function getByNisAndPeriode($nis, $periode)
    {
        return $this->where(['nis' => $nis, 'periode' => $periode])->first();
    }

    public function getpangkalWithSiswa()
    {
        return $this->select('pangkal.*, data_siswa.nama')
                    ->join('data_siswa', 'data_siswa.nis = pangkal.nis')
                    ->findAll();
    }
}
