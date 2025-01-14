<?php

namespace App\Controllers;

use App\Models\masterpangkalmodel;
use App\Models\pagkalmodel;
use App\Models\pangkalmodel;
use App\Models\siswamodel;

class Pangkal extends BaseController
{
    protected $pangkalModel;
    protected $masterpangkalModel;
    protected $siswaModel;

    public function __construct()
    {
        $this->pangkalModel = new pangkalmodel();
        $this->masterpangkalModel = new masterpangkalmodel();
        $this->siswaModel = new siswamodel();
    }

    public function index()
    {
        $datapangkal = $this->masterpangkalModel->getpangkalWithSiswa();
        $bebanpangkal = 2100000;
        $data = [
            'title' => 'Laporan pangkal | Web pangkal',
            'datapangkal' => $datapangkal,
            'bebanpangkal' => $bebanpangkal
        ];
        return view('dasboard/pangkal/v_masterpangkal', $data);
    }

    public function input()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nis' => 'required',
            'kpangkal' => 'required',
            'periode' => 'required',
            'bpangkal' => 'required',
        ]);

        $isDataValid = $validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $nis = $this->request->getVar('nis');
            $periode = $this->request->getVar('periode');
            $beban = 2100000;
            $bpangkal = $this->request->getVar('bpangkal');

            // Cek apakah data sudah ada di master_pangkal
            $masterpangkal = $this->masterpangkalModel->getByNisAndPeriode($nis, $periode);

            if (!$masterpangkal) {
                // Jika belum ada, tambahkan data ke master_pangkal
                $masterId = $this->masterpangkalModel->insert([
                    'nis' => $nis,
                    'periode' => $periode,
                    'totbpangkal' => $bpangkal,
                    'status' => $bpangkal >= $beban ? 'Lunas' : 'Belum Lunas',
                ]);
            } else {
                // Jika sudah ada, update total_bayar dan status
                $masterId = $masterpangkal['id'];
                $totalBayar = $masterpangkal['totbpangkal'] + $bpangkal;
                $status = $totalBayar >= $beban ? 'Lunas' : 'Belum Lunas';

                $this->masterpangkalModel->update($masterId, [
                    'totbpangkal' => $totalBayar,
                    'status' => $status,
                ]);
            }
            // Tambahkan data ke transaksi pangkal
            $datapangkal = [
                'id' => $masterId,
                'kpangkal' => $this->request->getVar('kpangkal'),
                'nis' => $nis,
                'periode' => $periode,
                'bpangkal' => $bpangkal,
                'tgl_pangkal' => date('Y-m-d H:i:s'),
            ];
            $this->pangkalModel->insert($datapangkal);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambah');
            return redirect()->to(base_url('pangkal')); // Redirect setelah input

        }

        $datasiswa = $this->siswaModel->findAll();
        $data = [
            'title' => 'Input pangkal | Web pangkal',
            'siswa' => $datasiswa,
        ];
        return view('dasboard/pangkal/transaksi/v_inputpangkal', $data);
    }

    public function delete($transaksiId)
    {
        // 1. Ambil data transaksi berdasarkan ID
        $transaksi = $this->pangkalModel->find($transaksiId);

        if ($transaksi) {
            $masterId = $transaksi['id'];

            $bpangkal = $transaksi['bpangkal'];

            // 2. Hapus data transaksi
            $this->pangkalModel->delete($transaksiId);

            // 3. Hitung ulang total_bayar di master_pangkal
            $totalBayar = $this->pangkalModel->where('id', $masterId)->selectSum('bpangkal')->get()->getRow()->bpangkal;

            // 4. Perbarui data master_pangkal
            $status = $totalBayar >= 2100000 ? 'Lunas' : 'Belum Lunas';

            $this->masterpangkalModel->update($masterId, [
                'totbpangkal' => $totalBayar,
                'status' => $status,
            ]);

            session()->setFlashdata('pesan', 'Data transaksi berhasil dihapus dan data master diperbarui!');
        }
        return redirect()->to(base_url('pangkal'));
    }
    public function edit($kpangkal)
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'periode' => 'required',
            'bpangkal' => 'required',
        ]);

        $transaksi = $this->pangkalModel->find($kpangkal);

        $isDataValid = $validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $nis = $this->request->getVar('nis');
            $periode = $this->request->getVar('periode');
            $beban = 2100000;
            $bpangkal = $this->request->getVar('bpangkal');

            // Cek apakah data sudah ada di master_pangkal

            $masterpangkal = $this->masterpangkalModel->find();

                $this->pangkalModel->where('kpangkal', $kpangkal);
                $dataupdate = [
                    'bpangkal' => $bpangkal,
                    'periode' => $periode,
                    'tgl_pangkal' => date('Y-m-d H:i:s'),
                ];
                $this->pangkalModel->set($dataupdate);
                $this->pangkalModel->update();
                $masterId = $masterpangkal['id'];
                $totalBayar = $this->pangkalModel
                    ->where('id', $masterId)
                    ->selectSum('bpangkal')
                    ->get()
                    ->getRow()
                    ->bpangkal;
                $status = $totalBayar >= $beban ? 'Lunas' : 'Belum Lunas';

                $this->masterpangkalModel->update($masterId, [
                    'totbpangkal' => $totalBayar,
                    'status' => $status,
                ]);
                session()->setFlashdata('pesan', 'Data Berhasil Diedit');
                return redirect()->to(base_url('pangkal')); // Redirect setelah input
        }
        $siswa = $this->siswaModel->where('nis', $transaksi['nis'])->first();

        $data = [
            'title' => 'Edit pangkal | Web pangkal',
            'siswa' => $siswa,
            'detail' => $this->pangkalModel->where('kpangkal', $kpangkal)->first()
        ];
        return view('dasboard/pangkal/transaksi/v_edit', $data);
    }

    public function detail()
    {
        $datapangkal = $this->pangkalModel->getpangkalWithSiswa();
        $data = [
            'title' => 'Input pangkal | Web pangkal',
            'detail' => $datapangkal
        ];
        return view('dasboard/pangkal/transaksi/v_tpangkal', $data);
    }
}
