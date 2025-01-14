<?php

namespace App\Controllers;

use App\Models\usermodel;

class Kuser extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new usermodel();
    }

    public function index()
    {
        $datauser = $this->userModel->findAll();
        $data = [
            'title' => 'Data User | Web Spp',
            'datauser' => $datauser
        ];
        return view('dasboard/kelolauser/v_user', $data);
    }

    public function input()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required',
            'password' => 'required',
        ]);

        $isDataValid = $validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $data_save = [
                'username' => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'level' => $this->request->getVar('level')
            ];

            $this->userModel->insert($data_save);

            session()->setFlashdata('pesan', 'Data Berhasil Ditambah');
            return redirect()->to(base_url('user'));
        }

        $data = [
            'title' => 'Input User | Web Spp',
        ];
        return view('dasboard/kelolauser/v_inputUser', $data);
    }

    public function delete($id)
    {
        $this->userModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('user'));
    }

    public function edit($id)
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required',
            'password' => 'required',
        ]);

        $isDataValid = $validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $data_save = [
                'username' => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'level' => $this->request->getVar('level')
            ];

            $this->userModel->insert($data_save);

            session()->setFlashdata('pesan', 'Data Berhasil Ditambah');
            return redirect()->to(base_url('user'));
        }
       
        $data = [
            'title' => 'Input User | Web Spp',
            'user' => $this->userModel->where('id',$id)->first(),
        ];
        return view('dasboard/kelolauser/v_editUser', $data);
    }
}
