<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Photos extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Galeri Foto',
        ];
        return view('beranda', $data);
    }
}
