<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model
{
    protected $table = 'master_jadwal';
    protected $allowedFields = ['transportasi', 'asal', 'tujuan', 'jadwal_keberangkatan', 'slot', 'remaining_slot'];
    protected $primaryKey = 'id';

    public function validasi($params = null){

        $validasi = 1;

        if(!isset($params['transportasi']) || empty($params['transportasi'])) {
            $validasi = 0;
        }

        if(!isset($params['asal']) || empty($params['asal'])) {
            $validasi = 0;
        }

        if(!isset($params['tujuan']) || empty($params['tujuan'])) {
            $validasi = 0;
        }

        if(!isset($params['jadwal_keberangkatan']) || empty($params['jadwal_keberangkatan'])) {
            $validasi = 0;
        }

        if(!isset($params['slot']) || empty($params['slot'])) {
            $validasi = 0;
        }

        return $validasi;
    }

}