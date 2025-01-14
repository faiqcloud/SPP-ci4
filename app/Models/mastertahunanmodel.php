<?php

namespace App\Models;

use CodeIgniter\Model;

class mastertahunanmodel extends Model
{
    protected $table = 'tahunan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nis', 'periode', 'totbtahunan', 'status'];

    public function getByNisAndPeriode($nis, $periode)
    {
        return $this->where(['nis' => $nis, 'periode' => $periode])->first();
    }

    public function getTahunanWithSiswa()
    {
        return $this->select('tahunan.*, data_siswa.nama')
                    ->join('data_siswa', 'data_siswa.nis = tahunan.nis')
                    ->findAll();
    }
}
