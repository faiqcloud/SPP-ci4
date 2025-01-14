<?php

namespace App\Controllers;

use App\Models\siswamodel;
use App\Models\usermodel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Siswa extends BaseController
{
    protected $siswaModel;
    protected $userModel;

    public function __construct()
    {
        $this->siswaModel = new siswamodel();
        $this->userModel = new usermodel();
    }

    // menampilkan laporan data siswa
    public function index()
    {
        $datasiswa = $this->siswaModel->findAll();
        $data = [
            'title' => 'Data Siswa | Web Spp',
            'datasiswa' => $datasiswa
        ];
        return view('dasboard/siswa/v_siswa', $data);
    }

    // menginput data siswa
    public function input()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nis' => 'required',
            'nama' => 'required',
            'nisn' => 'required',
            'jk' => 'required',
            'kelas' => 'required',
            'agama' => 'required',
            'tempat' => 'required',
            'tanggal' => 'required',
            'pekortu' => 'required',
            'ayah' => 'required',
            'ibu' => 'required',
        ]);

        $isDataValid = $validation->withRequest($this->request)->run();
        if ($isDataValid) {
            // mendapatkan username dan password dari form
            $tanggal = $this->request->getVar('tanggal'); // Ambil input tanggal
            $tanggalTanpaStrip = str_replace('-', '', $tanggal);
            $dataLogin = [
                'username' => $this->request->getVar('nis'),
                'password' => password_hash(($tanggalTanpaStrip), PASSWORD_DEFAULT), // Hash password
                'level' => 'user'
            ];
            $this->userModel->insert($dataLogin);
            // mendapatkan id dari tabel login
            $idLogin = $this->userModel->getInsertID();

            $data_save = [
                'nis' => $this->request->getVar('nis'),
                'id_user' => $idLogin,
                'nama' => $this->request->getVar('nama'),
                'nisn' => $this->request->getVar('nisn'),
                'jk' => $this->request->getVar('jk'),
                'kelas' => $this->request->getVar('kelas'),
                'agama' => $this->request->getVar('agama'),
                'tempat' => $this->request->getVar('tempat'),
                'tanggal' => $this->request->getVar('tanggal'),
                'sekolah' => $this->request->getVar('sekolah'),
                'pekortu' => $this->request->getVar('pekortu'),
                'ayah' => $this->request->getVar('ayah'),
                'ibu' => $this->request->getVar('ibu'),
            ];

            $this->siswaModel->insert($data_save);

            session()->setFlashdata('pesan', 'Data Berhasil Ditambah');
            return redirect()->to(base_url('siswa')); // Redirect setelah input
        }
        $data = [
            'title' => 'Input Siswa | Web SPP'
        ];
        return  view('dasboard/siswa/v_inputSiswa', $data);
    }

    //menghapus data
    public function delete($id)
    {
        $this->siswaModel->delete($id);
        $this->userModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('siswa'));
    }

    //edit Data
    public function edit($id)
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nis' => 'required',
            'nama' => 'required',
            'nisn' => 'required',
            'jk' => 'required',
            'kelas' => 'required',
            'agama' => 'required',
            'tempat' => 'required',
            'tanggal' => 'required',
            'pekortu' => 'required',
            'ayah' => 'required',
            'ibu' => 'required',
        ]);

        $isDataValid = $validation->withRequest($this->request)->run();
        if ($isDataValid) {
            // mendapatkan username dan password dari form
            $this->userModel->where('id', $id);
            $tanggal = $this->request->getVar('tanggal'); // Ambil input tanggal
            $tanggalTanpaStrip = str_replace('-', '', $tanggal);
            $dataLogin = [
                'username' => $this->request->getVar('nis'),
                'password' => password_hash(($tanggalTanpaStrip), PASSWORD_DEFAULT), // Hash password
                'level' => 'user'
            ];
            $this->userModel->set($dataLogin);
            $this->userModel->update();

            $this->siswaModel->where('id_user', $id);
            $data_save = [
                'nis' => $this->request->getVar('nis'),
                'nama' => $this->request->getVar('nama'),
                'nisn' => $this->request->getVar('nisn'),
                'jk' => $this->request->getVar('jk'),
                'kelas' => $this->request->getVar('kelas'),
                'agama' => $this->request->getVar('agama'),
                'tempat' => $this->request->getVar('tempat'),
                'tanggal' => $this->request->getVar('tanggal'),
                'sekolah' => $this->request->getVar('sekolah'),
                'pekortu' => $this->request->getVar('pekortu'),
                'ayah' => $this->request->getVar('ayah'),
                'ibu' => $this->request->getVar('ibu'),
            ];
            $this->siswaModel->set($data_save);
            $this->siswaModel->update();

            session()->setFlashdata('pesan', 'Data Berhasil DIedit');
            return redirect()->to(base_url('siswa')); // Redirect setelah update
        }

        $data = [
            'title' => 'Edit Siswa | Web SPP',
            'siswa' => $this->siswaModel->where('id_user', $id)->first()
        ];
        return view('dasboard/siswa/v_editSiswa', $data);
    }

    // export ke excel
    public function exportToExcel()
    {
        // Ambil data dari database
        $siswaData = $this->siswaModel->findAll();

        // Buat instance Spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set header kolom
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'NIS');
        $sheet->setCellValue('C1', 'Nama');
        $sheet->setCellValue('D1', 'NISN');
        $sheet->setCellValue('E1', 'Jenis Kelamin');
        $sheet->setCellValue('F1', 'Kelas');
        $sheet->setCellValue('G1', 'Agama');
        $sheet->setCellValue('H1', 'Tempat Lahir');
        $sheet->setCellValue('I1', 'Tanggal Lahir');
        $sheet->setCellValue('J1', 'Sekolah');
        $sheet->setCellValue('K1', 'Pekerjaan Orang Tua');
        $sheet->setCellValue('L1', 'Nama Ayah');
        $sheet->setCellValue('M1', 'Nama Ibu');

        // Tulis data ke dalam Excel
        $row = 2; // Mulai dari baris kedua
        $no = 1;  // Nomor urut
        foreach ($siswaData as $data) {
            $sheet->setCellValue('A' . $row, $no++);
            $sheet->setCellValue('B' . $row, $data['nis']);
            $sheet->setCellValue('C' . $row, $data['nama']);
            $sheet->setCellValue('D' . $row, $data['nisn']);
            $sheet->setCellValue('E' . $row, $data['jk']);
            $sheet->setCellValue('F' . $row, $data['kelas']);
            $sheet->setCellValue('G' . $row, $data['agama']);
            $sheet->setCellValue('H' . $row, $data['tempat']);
            $sheet->setCellValue('I' . $row, $data['tanggal']);
            $sheet->setCellValue('J' . $row, $data['sekolah']);
            $sheet->setCellValue('K' . $row, $data['pekortu']);
            $sheet->setCellValue('L' . $row, $data['ayah']);
            $sheet->setCellValue('M' . $row, $data['ibu']);
            $row++;
        }

        // Menyimpan file sebagai Excel
        $fileName = 'Laporan_Data_Siswa.xlsx';
        $writer = new Xlsx($spreadsheet);

        // Output ke browser untuk di-download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit;
    }
}
