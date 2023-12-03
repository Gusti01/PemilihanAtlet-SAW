<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'login';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'username',
        'password'
    ];
    function cek_login($username, $password)
    {
        $query = $this->where('username', $username)->where('password', $password)->get();

        return $query->getRowArray();
    }
}
