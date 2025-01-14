<?php

namespace App\Models;

use CodeIgniter\Model;

class mastersppmodel extends Model
{
    protected $table = 'spp';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nis', 'periode', 'totbspp', 'status'];

    public function getByNisAndPeriode($nis, $periode)
    {
        return $this->where(['nis' => $nis, 'periode' => $periode])->first();
    }

    public function getSppWithSiswa()
    {
        return $this->select('spp.*, data_siswa.nama')
                    ->join('data_siswa', 'data_siswa.nis = spp.nis')
                    ->findAll();
    }
}
