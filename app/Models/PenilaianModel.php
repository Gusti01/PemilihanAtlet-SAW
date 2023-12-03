<?php

namespace App\Models;

use CodeIgniter\Model;

class PenilaianModel extends Model
{
    protected $table = 'penilaian';
    protected $primaryKey = 'id_penilaian';

    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'id_peserta',
        'umur',
        'kedisiplinan',
        'kesehatan',
        'teknik_pukulan',
        'teknik_tendangan',
        'kekuatan_fisik'
    ];

    function insertPenilaian($penilaianData)
    {
        return $this->insert($penilaianData);
    }

    public function getDataPenilaian()
    {
        $query = $this->db->query("SELECT peserta.id_peserta, nama, umur, sabuk_karate, kedisiplinan, kesehatan, teknik_pukulan, teknik_tendangan, kekuatan_fisik FROM penilaian INNER JOIN peserta ON peserta.id_peserta = penilaian.id_peserta INNER JOIN sabuk_karate ON peserta.id_sabuk = sabuk_karate.id_sabuk");
        return $query->getResultArray();
    }
    public function getDataKriteria()
    {
        $query = $this->db->query("SELECT nama_kriteria, bobot FROM rule");
        return $query->getResultArray();
    }
    public function penilaian()
    {
        $bobot = $this->getDataKriteria();
        $data = $this->getDataPenilaian();


        // Fungsi untuk mengonversi kriteria umur
        function konversiUmur($umur)
        {
            if ($umur <= 20) {
                return 1;
            } elseif ($umur >= 21 && $umur <= 24) {
                return 2;
            } elseif ($umur >= 25 && $umur <= 29) {
                return 3;
            } else {
                return 4;
            }
        }

        // Fungsi untuk mengonversi kriteria sabuk karate
        function konversiSabukKarate($sabuk)
        {
            $nilai = [
                "Putih" => 1,
                "Kuning" => 1,
                "Hijau" => 1,
                "Biru" => 2,
                "Cokelat" => 3,
                "Hitam" => 4,
            ];

            return $nilai[$sabuk];
        }

        // Data jenis kriteria (cost atau benefit)
        $jenisKriteria = [
            "umur" => "cost",
            "sabuk_karate" => "benefit",
            "kedisiplinan" => "benefit",
            "kesehatan" => "benefit",
            "teknik_pukulan" => "benefit",
            "teknik_tendangan" => "benefit",
            "kekuatan_fisik" => "benefit",
        ];
        // Fungsi untuk mengonversi kriteria kedisiplinan, kesehatan, teknik pukulan, teknik tendangan, dan kekuatan fisik
        function konversiKriteria($kriteria)
        {
            $nilai = [
                "Sangat kurang" => 0,
                "Kurang" => 1,
                "Cukup" => 2,
                "Baik" => 3,
                "Sangat baik" => 4,
            ];

            return $nilai[$kriteria];
        }

        // Mengonversi data ke dalam skala 1-4
        foreach ($data as &$peserta) {
            $peserta["umur"] = konversiUmur($peserta["umur"]);
            $peserta["sabuk_karate"] = konversiSabukKarate($peserta["sabuk_karate"]);
            $peserta["kedisiplinan"] = konversiKriteria($peserta["kedisiplinan"]);
            $peserta["kesehatan"] = konversiKriteria($peserta["kesehatan"]);
            $peserta["teknik_pukulan"] = konversiKriteria($peserta["teknik_pukulan"]);
            $peserta["teknik_tendangan"] = konversiKriteria($peserta["teknik_tendangan"]);
            $peserta["kekuatan_fisik"] = konversiKriteria($peserta["kekuatan_fisik"]);
        }
        // print_r($data);
        // die;

        // Fungsi untuk mencari nilai maksimum dan minimum dalam data
        function findMinMax($data, $kriteria)
        {
            $min = PHP_INT_MAX;
            $max = PHP_INT_MIN;

            foreach ($data as $peserta) {
                if ($peserta[$kriteria] < $min) {
                    $min = $peserta[$kriteria];
                }
                if ($peserta[$kriteria] > $max) {
                    $max = $peserta[$kriteria];
                }
            }

            return ["min" => $min, "max" => $max];
        }


        // Inisialisasi array untuk menyimpan nilai maksimum dan minimum setiap kriteria
        $nilaiMaksimum = [];
        $nilaiMinimum = [];

        // Menghitung nilai maksimum dan minimum untuk setiap kriteria
        foreach ($jenisKriteria as $kriteria => $jenis) {
            $hasilMinMax = findMinMax($data, $kriteria);
            $nilaiMinimum[$kriteria] = $hasilMinMax["min"];
            $nilaiMaksimum[$kriteria] = $hasilMinMax["max"];
        }

        // Normalisasi data
        foreach ($data as &$peserta) {
            foreach ($jenisKriteria as $kriteria => $jenis) {
                if ($jenis === "cost") {
                    // Kriteria cost: Bagi nilai minimum dengan nilai konversi kriteria
                    $peserta[$kriteria] = $nilaiMinimum[$kriteria] / $peserta[$kriteria];
                } elseif ($jenis === "benefit") {
                    // Kriteria benefit: Bagi nilai konversi kriteria dengan nilai maksimum
                    $peserta[$kriteria] = $peserta[$kriteria] / $nilaiMaksimum[$kriteria];
                }
            }
        }

        // Data bobot untuk setiap kriteri

        // Inisialisasi array untuk menyimpan nilai SAW tiap peserta
        $nilaiSAW = [];

        // Menghitung nilai SAW tiap peserta
        foreach ($data as &$peserta) {
            $nilai = 0;
            // print_r($peserta);
            foreach ($bobot as $kriteria) {
                $nilai += $peserta[$kriteria["nama_kriteria"]] * $kriteria["bobot"];
            }
            $nilaiSAW[] = [
                "id_peserta" => $peserta["id_peserta"],
                "nama" => $peserta["nama"],
                "nilai_SAW" => $nilai
            ];
            // print_r($nilaiSAW);
        }

        // Mengurutkan peserta berdasarkan nilai SAW dari yang tertinggi ke terendah
        usort($nilaiSAW, function ($a, $b) {
            return $b['nilai_SAW'] <=> $a['nilai_SAW'];
        });

        // Hasil perankingan peserta berdasarkan nilai SAW

        return $nilaiSAW;
    }
}
