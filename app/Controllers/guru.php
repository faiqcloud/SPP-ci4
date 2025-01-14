<?php

namespace App\Controllers;

use App\Models\gurumodel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Guru extends BaseController
{
    protected $guruModel;
    
    public function __construct()
    {
        $this->guruModel = new gurumodel();
    }

    public function index()
    {
        $guru = $this->guruModel->findAll();
        $data = [
            'title'=>'Data Guru | Web Spp',
            'data'=>$guru
        ];
        return view('dasboard/guru/v_guru',$data);
    }

    public function input(){
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nips' => 'required',
            'nama' => 'required',
            'nuptk' => 'required',
            'jk' => 'required',
            'tempat' => 'required',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'tingkat' => 'required',
            'jurusan' => 'required',
            'mapel' => 'required',
            'kelas' => 'required',
            'jabatan' => 'required',
            'sertifikat' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $data_save = [
                'nips' => $this->request->getVar('nips'),
                'nama' => $this->request->getVar('nama'),
                'nuptk' => $this->request->getVar('nuptk'),
                'jk' => $this->request->getVar('jk'),
                'tempat' => $this->request->getVar('tempat'),
                'tgl_lahir' => $this->request->getVar('tgl_lahir'),
                'agama' => $this->request->getVar('agama'),
                'tingkat' => $this->request->getVar('tingkat'),
                'jurusan' => $this->request->getVar('jurusan'),
                'mapel' => $this->request->getVar('mapel'),
                'kelas' => $this->request->getVar('kelas'),
                'jabatan' => $this->request->getVar('jabatan'),
                'sertifikat' => $this->request->getVar('sertifikat'),
            ];

            $this->guruModel->insert($data_save);

            session()->setFlashdata('pesan', 'Data Berhasil Ditambah');
            return redirect()->to(base_url('guru'));
        }
        $data = [
            'title'=>'Data Guru | Web Spp',
        ];
        return view('dasboard/guru/v_inputGuru',$data);
    }

    public function delete($id)
    {
        $this->guruModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('guru'));
    }

    public function edit($id)
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nips' => 'required',
            'nama' => 'required',
            'nuptk' => 'required',
            'jk' => 'required',
            'tempat' => 'required',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'tingkat' => 'required',
            'jurusan' => 'required',
            'mapel' => 'required',
            'kelas' => 'required',
            'jabatan' => 'required',
            'sertifikat' => 'required',
        ]);

        $isDataValid = $validation->withRequest($this->request)->run();
        if ($isDataValid) {
            // mendapatkan username dan password dari form
            $this->guruModel->where('nips', $id);
            $data_save = [
                'nips' => $this->request->getVar('nips'),
                'nama' => $this->request->getVar('nama'),
                'nuptk' => $this->request->getVar('nuptk'),
                'jk' => $this->request->getVar('jk'),
                'tempat' => $this->request->getVar('tempat'),
                'tgl_lahir' => $this->request->getVar('tgl_lahir'),
                'agama' => $this->request->getVar('agama'),
                'tingkat' => $this->request->getVar('tingkat'),
                'jurusan' => $this->request->getVar('jurusan'),
                'mapel' => $this->request->getVar('mapel'),
                'kelas' => $this->request->getVar('kelas'),
                'jabatan' => $this->request->getVar('jabatan'),
                'sertifikat' => $this->request->getVar('sertifikat'),
            ];
            $this->guruModel->set($data_save);
            $this->guruModel->update();

            session()->setFlashdata('pesan', 'Data Berhasil DIedit');
            return redirect()->to(base_url('guru')); // Redirect setelah update
        }

        $data = [
            'title' => 'Edit Guru | Web SPP',
            'guru' => $this->guruModel->where('nips', $id)->first()
        ];
        return view('dasboard/guru/v_editGuru', $data);
    }

    public function exportToExcel()
    {
        // Ambil data dari database
        $guruData = $this->guruModel->findAll();

        // Buat instance Spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set header kolom
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'NIPS');
        $sheet->setCellValue('C1', 'Nama');
        $sheet->setCellValue('D1', 'NUPTK');
        $sheet->setCellValue('E1', 'Jenis Kelamin');
        $sheet->setCellValue('F1', 'Tempat Lahir');
        $sheet->setCellValue('G1', 'Tanggal Lahir');
        $sheet->setCellValue('H1', 'Agama');
        $sheet->setCellValue('I1', 'Tingkat');
        $sheet->setCellValue('J1', 'Jurusan');
        $sheet->setCellValue('K1', 'Mapel');
        $sheet->setCellValue('L1', 'Kelas');
        $sheet->setCellValue('M1', 'Jabatan');
        $sheet->setCellValue('N1', 'Sertifikat');

        // Tulis data ke dalam Excel
        $row = 2; // Mulai dari baris kedua
        $no = 1;  // Nomor urut
        foreach ($guruData as $data) {
            $sheet->setCellValue('A' . $row, $no++);
            $sheet->setCellValue('B' . $row, $data['nips']);
            $sheet->setCellValue('C' . $row, $data['nama']);
            $sheet->setCellValue('D' . $row, $data['nuptk']);
            $sheet->setCellValue('E' . $row, $data['jk']);
            $sheet->setCellValue('F' . $row, $data['tempat']);
            $sheet->setCellValue('G' . $row, $data['tgl_lahir']);
            $sheet->setCellValue('H' . $row, $data['agama']);
            $sheet->setCellValue('I' . $row, $data['tingkat']);
            $sheet->setCellValue('J' . $row, $data['jurusan']);
            $sheet->setCellValue('K' . $row, $data['mapel']);
            $sheet->setCellValue('L' . $row, $data['kelas']);
            $sheet->setCellValue('M' . $row, $data['jabatan']);
            $sheet->setCellValue('N' . $row, $data['sertifikat']);
            $row++;
        }

        // Menyimpan file sebagai Excel
        $fileName = 'Laporan_Data_Guru.xlsx';
        $writer = new Xlsx($spreadsheet);

        // Output ke browser untuk di-download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit;
    }
}
