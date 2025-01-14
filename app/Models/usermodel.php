<?php

namespace App\Models;

use CodeIgniter\Model;

class usermodel extends Model
{
    protected $table = 'login_user';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password','level'];
}