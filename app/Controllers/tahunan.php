<?php

namespace App\Controllers;

use App\Models\masterTahunanmodel;
use App\Models\siswamodel;
use App\Models\tahunanmodel;

class Tahunan extends BaseController
{
    protected $tahunanModel;
    protected $mastertahunanModel;
    protected $siswaModel;

    public function __construct()
    {
        $this->siswaModel = new siswamodel();
        $this->mastertahunanModel = new mastertahunanmodel();
        $this->tahunanModel = new tahunanmodel();
    }

    public function index()
    {
        $dataTahunan = $this->mastertahunanModel->getTahunanWithSiswa();
        $bebanTahunan = 1200000;
        $data = [
            'title' => 'Laporan Tahunan | Web Tahunan',
            'datatahunan' => $dataTahunan,
            'bebantahunan' => $bebanTahunan
        ];
        return view('dasboard/tahunan/v_uangTahunan', $data);
    }

    public function detail()
    {
        $dataTahunan = $this->tahunanModel->getTahunanWithSiswa();
        $data = [
            'title' => 'Input Tahunan | Web Tahunan',
            'detail' => $dataTahunan
        ];
        return view('dasboard/tahunan/transaksi/v_ttahunan', $data);
    }

    public function input()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nis' => 'required',
            'ktahunan' => 'required',
            'periode' => 'required',
            'btahunan' => 'required',
        ]);

        $isDataValid = $validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $nis = $this->request->getVar('nis');
            $periode = $this->request->getVar('periode');
            $beban = 1200000;
            $btahunan = $this->request->getVar('btahunan');

            // Cek apakah data sudah ada di master_tahunan
            $mastertahunan = $this->mastertahunanModel->getByNisAndPeriode($nis, $periode);

            if (!$mastertahunan) {
                // Jika belum ada, tambahkan data ke master_tahunan
                $masterId = $this->mastertahunanModel->insert([
                    'nis' => $nis,
                    'periode' => $periode,
                    'totbtahunan' => $btahunan,
                    'status' => $btahunan >= $beban ? 'Lunas' : 'Belum Lunas',
                ]);
            } else {
                // Jika sudah ada, update total_bayar dan status
                $masterId = $mastertahunan['id'];
                $totalBayar = $mastertahunan['totbtahunan'] + $btahunan;
                $status = $totalBayar >= $beban ? 'Lunas' : 'Belum Lunas';

                $this->mastertahunanModel->update($masterId, [
                    'totbtahunan' => $totalBayar,
                    'status' => $status,
                ]);
            }
            // Tambahkan data ke transaksi tahunan
            $datatahunan = [
                'id' => $masterId,
                'ktahunan' => $this->request->getVar('ktahunan'),
                'nis' => $nis,
                'periode' => $periode,
                'btahunan' => $btahunan,
                'tgl_tahunan' => date('Y-m-d H:i:s'),
            ];
            $this->tahunanModel->insert($datatahunan);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambah');
            return redirect()->to(base_url('tahunan')); // Redirect setelah input

        }

        $datasiswa = $this->siswaModel->findAll();
        $data = [
            'title' => 'Input tahunan | Web tahunan',
            'siswa' => $datasiswa,
        ];
        return view('dasboard/tahunan/transaksi/v_inputtahunan', $data);
    }

    public function delete($transaksiId)
    {
        // 1. Ambil data transaksi berdasarkan ID
        $transaksi = $this->tahunanModel->find($transaksiId);

        if ($transaksi) {
            $masterId = $transaksi['id'];

            $btahunan = $transaksi['btahunan'];

            // 2. Hapus data transaksi
            $this->tahunanModel->delete($transaksiId);

            // 3. Hitung ulang total_bayar di master_tahunan
            $totalBayar = $this->tahunanModel->where('id', $masterId)->selectSum('btahunan')->get()->getRow()->btahunan;

            // 4. Perbarui data master_tahunan
            $status = $totalBayar >= 2100000 ? 'Lunas' : 'Belum Lunas';

            $this->mastertahunanModel->update($masterId, [
                'totbtahunan' => $totalBayar,
                'status' => $status,
            ]);

            session()->setFlashdata('pesan', 'Data transaksi berhasil dihapus dan data master diperbarui!');
        }
        return redirect()->to(base_url('tahunan'));
    }
    public function edit($ktahunan)
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'periode' => 'required',
            'btahunan' => 'required',
        ]);

        $transaksi = $this->tahunanModel->find($ktahunan);

        $isDataValid = $validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $nis = $this->request->getVar('nis');
            $periode = $this->request->getVar('periode');
            $beban = 2100000;
            $btahunan = $this->request->getVar('btahunan');

            // Cek apakah data sudah ada di master_tahunan

            $mastertahunan = $this->mastertahunanModel->find();

                $this->tahunanModel->where('ktahunan', $ktahunan);
                $dataupdate = [
                    'btahunan' => $btahunan,
                    'periode' => $periode,
                    'tgl_tahunan' => date('Y-m-d H:i:s'),
                ];
                $this->tahunanModel->set($dataupdate);
                $this->tahunanModel->update();
                $masterId = $mastertahunan['id'];
                $totalBayar = $this->tahunanModel
                    ->where('id', $masterId)
                    ->selectSum('btahunan')
                    ->get()
                    ->getRow()
                    ->btahunan;
                $status = $totalBayar >= $beban ? 'Lunas' : 'Belum Lunas';

                $this->mastertahunanModel->update($masterId, [
                    'totbtahunan' => $totalBayar,
                    'status' => $status,
                ]);
                session()->setFlashdata('pesan', 'Data Berhasil Diedit');
                return redirect()->to(base_url('tahunan')); // Redirect setelah input
        }
        $siswa = $this->siswaModel->where('nis', $transaksi['nis'])->first();

        $data = [
            'title' => 'Edit tahunan | Web tahunan',
            'siswa' => $siswa,
            'detail' => $this->tahunanModel->where('ktahunan', $ktahunan)->first()
        ];
        return view('dasboard/tahunan/transaksi/v_edit', $data);
    }
}
