<?php

namespace App\Models;

use CodeIgniter\Model;

class TransportasiModel extends Model
{
    protected $table = 'master_transportasi';
    protected $allowedFields = ['nama_transportasi'];
    protected $primaryKey = 'id';
}