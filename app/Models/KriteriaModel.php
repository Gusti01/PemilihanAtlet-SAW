<?php

namespace App\Models;

use CodeIgniter\Model;

class KriteriaModel extends Model
{
    protected $table = 'rule';
    protected $primaryKey = 'id_kriteria';

    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'nama_kriteria',
        'bobot'
    ];

    function insertKriteria($kriteriaData)
    {
        return $this->insert($kriteriaData);
    }
}
