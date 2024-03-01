<?php

namespace App\Models;

use CodeIgniter\Model;

class AlbumModel extends Model
{
    protected $table            = 'albums';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama','deskripsi','tanggal_buat','userid'
    ];
}
