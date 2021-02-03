<?php

namespace App\Models;

use CodeIgniter\Model;

class ParticipantModel extends Model
{
    protected $table = 'peserta';
    protected $allowedFields = ['id_jadwal', 'nama_peserta', 'kode_verifikasi', 'terverifikasi'];
    protected $primaryKey = 'id';

    public function validasi($params = null){

        $validasi = 1;

        if(!isset($params['id_jadwal']) || empty($params['id_jadwal'])) {
            $validasi = 0;
        }

        if(!isset($params['nama_peserta']) || empty($params['nama_peserta'])) {
            $validasi = 0;
        }

        if(!isset($params['kode_verifikasi']) || empty($params['kode_verifikasi'])) {
            $validasi = 0;
        }

        return $validasi;
    }

}