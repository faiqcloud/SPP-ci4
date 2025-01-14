<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LoginUser extends Seeder
{
    public function run()
    {
        $data =[
            'username'=>'admin',
            'password'=>password_hash('admin',PASSWORD_DEFAULT),
            'level'=>'admin'
        ];
        $this->db->table('login_user')->insert($data);
    }
}
