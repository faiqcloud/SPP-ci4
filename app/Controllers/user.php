<?php

namespace App\Controllers;

use App\Models\usermodel;
use App\Models\sppmodel;
use App\Models\mastersppmodel;
use App\Models\pangkalmodel;
use App\Models\masterpangkalmodel;
use App\Models\mastertahunanmodel;
use App\Models\tahunanmodel;
use App\Models\siswamodel;

class User extends BaseController
{
    protected $userModel;
    protected $mastersppModel;
    protected $sppModel;
    protected $siswaModel;
    protected $pangkalModel;
    protected $masterpangkalModel;
    protected $mastertahunanModel;
    protected $tahunanModel;
    public function __construct()
    {
        $this->userModel = new usermodel();
        $this->mastersppModel = new mastersppmodel();
        $this->sppModel = new sppmodel();
        $this->siswaModel = new siswamodel();
        $this->masterpangkalModel = new  masterpangkalmodel();
        $this->pangkalModel = new pangkalmodel();
        $this->tahunanModel = new tahunanmodel();
        $this->mastertahunanModel = new mastertahunanmodel();
    }

    public function index()
    {
        $nis = session()->get('username'); // Ambil NIS dari session
        $namaSiswa = null;
        $idspp = null;

        if ($nis) {
            $db = \Config\Database::connect();
            $query = $db->table('data_siswa')->select('nama')->where('nis', $nis)->get();
            $result = $query->getRow();

            if ($result) {
                $namaSiswa = $result->nama;
            }
        }
        $queryTransaksi = $db->table('spp')
            ->select('id')
            ->where('nis', $nis)
            ->get();
        $resultTransaksi = $queryTransaksi->getRow();

        if ($resultTransaksi) {
            $idspp = $resultTransaksi->id;
        }
        $kirimdata = [
            'idspp' => $idspp,
            'nis' => $nis
        ];
        $data = [
            'title' => 'Beranda | Web Spp',
            'namaSiswa' => $namaSiswa ?? 'Pengguna',
            'data' => $kirimdata
        ];
        return view('user/vuser', $data);
    }


    public function laporan($nis)
    {
        $db = \Config\Database::connect();
        $siswa =$this->siswaModel->where('nis', $nis)->first();
        $sppmaster = $this->mastersppModel->where('nis',$nis)->first();
        $spp = $db->table('tspp')->where('nis', $nis)->get()->getResultArray(); // Mengembalikan array asosiatif
        $pangkalmaster = $this->masterpangkalModel->where('nis',$nis)->first();
        $pangkal = $db->table('tpangkal')->where('nis', $nis)->get()->getResultArray(); // Mengembalikan array asosiatif
        $tahunanmaster = $this->mastertahunanModel->where('nis',$nis)->first();
        $tahunan = $db->table('ttahunan')->where('nis', $nis)->get()->getResultArray(); // Mengembalikan array asosiatif

        $datakirim = [
            'title' => 'cetak laporan | Web Spp',
            'spp' => $spp,
            'siswa'=>$siswa,
            'mspp'=>$sppmaster,
            'tahunan'=>$tahunan,
            'mtahunan'=>$tahunanmaster,
            'pangkal'=>$pangkal,
            'mpangkal'=>$pangkalmaster,
        ];
        return view('user/cetak', $datakirim);
    }
}
