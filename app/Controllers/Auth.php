<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        $data = [
            'title' => 'Login | Web SPP'
        ];
        return view('login/v_login', $data);
    }

    public function loginProcess()
    {
        $session = session();
        $userModel = new UserModel();

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $user = $userModel->where('username', $username)->first();
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $session->set([
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'level' => $user['level'],
                    'isLoggedIn' => true,
                ]);

                // Redirect berdasarkan level
                if ($user['level'] == 'admin') {
                    return redirect()->to(base_url('admin'));
                } else {
                    return redirect()->to(base_url('vuser'));
                }
            } else {
                $session->setFlashdata('error', 'Password salah.');
                return redirect()->to(base_url('/'));
            }
        } else {
            $session->setFlashdata('error', 'Username tidak ditemukan.');
            return redirect()->to(base_url('/'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/'));
    }
}
