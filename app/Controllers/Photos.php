<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlbumModel;
use App\Models\FotoModel;
use CodeIgniter\HTTP\ResponseInterface;

class Photos extends BaseController
{
    protected $M_foto;

    public function __construct()
    {
        $this->M_foto = new FotoModel();
    }

    public function index()
    {
        $photos = $this->M_foto->select(['foto.*','users.username'])->join('users', 'foto.user_id = users.id')->findAll();
        $data = [
            'title' => 'Galeri Foto',
            'photos' => $photos,
        ];
        return view('index', $data);
    }

    public function myphotos()
    {
        $photos = $this->M_foto->select(['foto.*','users.username'])
        ->join('users', 'foto.user_id = users.id')
        ->where(['user_id'=>session()->get('user_id')])
        ->findAll();
        $data = [
            'title' => 'My photos',
            'bigTitle' => 'My photos',
            'photos' => $photos,
        ];
        return view('index', $data);
    }

    public function detail($id){
        $foto = $this->M_foto->select(['foto.*', 'users.username', 'album.nama as album_name'])
        ->join('users', 'users.id = foto.user_id')
        ->join('album', 'album.id = foto.album_id')
        ->where(['foto.id'=>$id])->first();
        // dd($foto);
        $data = [
            'title' => 'Tambah Foto',
            'photo' => $foto
        ];

        return view('photos/detail', $data);
    }

    public function create(){
        $this->isLogedIn();
        $albumModel = new AlbumModel();
        $album = $albumModel->where(['user_id'=>session()->get('user_id')])->findAll();
        $data = [
            'title' => 'Tambah Foto',
            'album' => $album
        ];
        return view('photos/create', $data);
    }

    public function aksi_create(){
        $this->isLogedIn();

        $d = $this->request->getVar();
        $file= $this->request->getFile('gambar');
        $d['album_id'] = empty($d['album_id']) ? null : $d['album_id'] ;
        $d['lokasi_file'] = $file->getRandomName();
        $d['user_id'] = session()->get('user_id');
        d($d);
        $this->M_foto->insert($d);

        $file->move('assets/img', $d['lokasi_file']);

        $data = [
            'success' => 'Berhasil Tambah Foto',
        ];
        session()->setFlashdata($data);
        return redirect()->to('photos');
    }

    public function edit($id){
        $this->isLogedIn();

        $albumModel = new AlbumModel();
        $album = $albumModel->where(['user_id'=>session()->get('user_id')])->findAll();
        $photo = $this->M_foto->where(['id'=>$id])->first();

        if ($photo['user_id']!=session()->get('user_id')) {
            $data = [
                'error' => 'Anda tidak berhak mengedit foto ini',
            ];
            session()->setFlashdata($data);
            return redirect()->to('photos/myphotos');
        }

        $data = [
            'title' => 'Tambah Foto',
            'album' => $album,
            'photo' => $photo
        ];
        return view('photos/edit', $data);
    }

    public function aksi_edit(){
        $this->isLogedIn();

        $d = $this->request->getVar();
        $file= $this->request->getFile('gambar');
        $d['album_id'] = empty($d['album_id']) ? null : $d['album_id'] ;
        $d['lokasi_file'] = $file->getRandomName();
        $d['user_id'] = session()->get('user_id');
        d($d);
        $this->M_foto->insert($d);

        $file->move('assets/img', $d['lokasi_file']);

        $data = [
            'success' => 'Berhasil Tambah Foto',
        ];
        session()->setFlashdata($data);
        return redirect()->to('photos');
    }

}
