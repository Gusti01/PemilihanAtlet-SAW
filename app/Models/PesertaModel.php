<?php

namespace App\Models;

use CodeIgniter\Model;

class PesertaModel extends Model
{
    protected $table = 'peserta';
    protected $primaryKey = 'id_peserta';

    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'nama',
        'usia',
        'alamat',
        'perguruan_karate',
        'id_sabuk'
    ];
    public function getPeserta()
    {
        $query = $this->db->query("SELECT id_peserta, sabuk_karate, nama, usia, alamat, perguruan_karate FROM peserta INNER JOIN sabuk_karate ON peserta.id_sabuk = sabuk_karate.id_sabuk");
        return $query->getResultArray();
    }

    public function countPeserta(){
        $query = $this->db->query("SELECT COUNT(nama) FROM peserta");
        return $query->getResultArray();
    }


    public function insertPeserta($dataPeserta)
    {
        return $this->insert($dataPeserta);
    }
}
