<?php

namespace App\Models;

use CodeIgniter\Model;

class SabukModel extends Model
{
    protected $table = 'sabuk_karate';
    protected $primaryKey = 'id_sabuk';

    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'sabuk_karate'
    ];

    function insertSabuk($sabukData)
    {
        return $this->insert($sabukData);
    }

    public function getSabuk()
    {
        $query = $this->db->query("SELECT COUNT(sabuk_karate) FROM `sabuk_karate`");
        return $query->getResultArray();
    }

    
}
