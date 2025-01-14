<?php

namespace App\Models;

use CodeIgniter\Model;

class gurumodel extends Model
{
    protected $table = 'data_guru';
    protected $primaryKey = 'nips';
    protected $allowedFields = ['nips','nama','nuptk','jk','agama','tempat','tgl_lahir','tingkat','jurusan','mapel','kelas','jabatan','sertifikat'];
}