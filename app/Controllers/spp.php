<?php

namespace App\Controllers;

use App\Models\mastersppmodel;
use App\Models\sppmodel;
use App\Models\siswamodel;

class Spp extends BaseController
{
    protected $sppModel;
    protected $mastersppModel;
    protected $siswaModel;

    public function __construct()
    {
        $this->sppModel = new sppmodel();
        $this->mastersppModel = new mastersppmodel();
        $this->siswaModel = new siswamodel();
    }

    public function index()
    {
        $dataspp = $this->mastersppModel->getSppWithSiswa();
        $bebanSpp = 2100000;
        $data = [
            'title' => 'Laporan Spp | Web Spp',
            'dataspp' => $dataspp,
            'bebanSpp' => $bebanSpp
        ];
        return view('dasboard/spp/v_masterspp', $data);
    }

    public function input()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nis' => 'required',
            'kspp' => 'required',
            'periode' => 'required',
            'bspp' => 'required',
        ]);

        $isDataValid = $validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $nis = $this->request->getVar('nis');
            $periode = $this->request->getVar('periode');
            $beban = 2100000;
            $bspp = $this->request->getVar('bspp');

            // Cek apakah data sudah ada di master_spp
            $masterSpp = $this->mastersppModel->getByNisAndPeriode($nis, $periode);

            if (!$masterSpp) {
                // Jika belum ada, tambahkan data ke master_spp
                $masterId = $this->mastersppModel->insert([
                    'nis' => $nis,
                    'periode' => $periode,
                    'totbspp' => $bspp,
                    'status' => $bspp >= $beban ? 'Lunas' : 'Belum Lunas',
                ]);
            } else {
                // Jika sudah ada, update total_bayar dan status
                $masterId = $masterSpp['id'];
                $totalBayar = $masterSpp['totbspp'] + $bspp;
                $status = $totalBayar >= $beban ? 'Lunas' : 'Belum Lunas';

                $this->mastersppModel->update($masterId, [
                    'totbspp' => $totalBayar,
                    'status' => $status,
                ]);
            }
            // Tambahkan data ke transaksi spp
            $dataspp = [
                'id' => $masterId,
                'kspp' => $this->request->getVar('kspp'),
                'nis' => $nis,
                'periode' => $periode,
                'bspp' => $bspp,
                'tgl_spp' => date('Y-m-d H:i:s'),
            ];
            $this->sppModel->insert($dataspp);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambah');
            return redirect()->to(base_url('spp')); // Redirect setelah input

        }

        $datasiswa = $this->siswaModel->findAll();
        $data = [
            'title' => 'Input SPP | Web SPP',
            'siswa' => $datasiswa,
        ];
        return view('dasboard/spp/transaksi/v_inputSpp', $data);
    }

    public function delete($transaksiId)
    {
        // 1. Ambil data transaksi berdasarkan ID
        $transaksi = $this->sppModel->find($transaksiId);

        if ($transaksi) {
            $masterId = $transaksi['id'];

            $bspp = $transaksi['bspp'];

            // 2. Hapus data transaksi
            $this->sppModel->delete($transaksiId);

            // 3. Hitung ulang total_bayar di master_spp
            $totalBayar = $this->sppModel->where('id', $masterId)->selectSum('bspp')->get()->getRow()->bspp;

            // 4. Perbarui data master_spp
            $status = $totalBayar >= 2100000 ? 'Lunas' : 'Belum Lunas';

            $this->mastersppModel->update($masterId, [
                'totbspp' => $totalBayar,
                'status' => $status,
            ]);

            session()->setFlashdata('pesan', 'Data transaksi berhasil dihapus dan data master diperbarui!');
        }
        return redirect()->to(base_url('spp'));
    }
    public function edit($kspp)
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'periode' => 'required',
            'bspp' => 'required',
        ]);

        $transaksi = $this->sppModel->find($kspp);

        $isDataValid = $validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $nis = $this->request->getVar('nis');
            $periode = $this->request->getVar('periode');
            $beban = 2100000;
            $bspp = $this->request->getVar('bspp');

            // Cek apakah data sudah ada di master_spp

            $masterSpp = $this->mastersppModel->find();

                $this->sppModel->where('kspp', $kspp);
                $dataupdate = [
                    'bspp' => $bspp,
                    'periode' => $periode,
                    'tgl_spp' => date('Y-m-d H:i:s'),
                ];
                $this->sppModel->set($dataupdate);
                $this->sppModel->update();
                $masterId = $masterSpp['id'];
                $totalBayar = $this->sppModel
                    ->where('id', $masterId)
                    ->selectSum('bspp')
                    ->get()
                    ->getRow()
                    ->bspp;
                $status = $totalBayar >= $beban ? 'Lunas' : 'Belum Lunas';

                $this->mastersppModel->update($masterId, [
                    'totbspp' => $totalBayar,
                    'status' => $status,
                ]);
                session()->setFlashdata('pesan', 'Data Berhasil Diedit');
                return redirect()->to(base_url('spp')); // Redirect setelah input
        }
        $siswa = $this->siswaModel->where('nis', $transaksi['nis'])->first();

        $data = [
            'title' => 'Edit SPP | Web SPP',
            'siswa' => $siswa,
            'detail' => $this->sppModel->where('kspp', $kspp)->first()
        ];
        return view('dasboard/spp/transaksi/v_edit', $data);
    }

    public function detail()
    {
        $dataspp = $this->sppModel->getSppWithSiswa();
        $data = [
            'title' => 'Input SPP | Web SPP',
            'detail' => $dataspp
        ];
        return view('dasboard/spp/transaksi/v_tspp', $data);
    }
}
