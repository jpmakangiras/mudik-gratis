<?php

namespace App\Models;

use CodeIgniter\Model;

class DestinasiModel extends Model
{
    protected $table = 'master_destinasi';
    protected $allowedFields = ['nama_destinasi'];
    protected $primaryKey = 'id';

}