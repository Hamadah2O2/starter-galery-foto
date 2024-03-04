<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlbumModel;
use App\Models\FotoModel;
use CodeIgniter\HTTP\ResponseInterface;

class Album extends BaseController
{
    protected $albumM; 
    protected $fotoM; 

    public function __construct()
    {
        $this->albumM = new AlbumModel();
        $this->fotoM = new FotoModel();
    }

    public function index()
    {
        $album = $this->albumM->select(['album.*', 'users.username'])->join('users', 'album.user_id = users.id')
        ->where(['user_id'=>session('user_id')])->findAll();
        $data = [
            'title' => 'Galeri Foto',
            'album' => $album,
        ];
        return view('album/index', $data);
    }

    public function detail($id){
        $album = $this->albumM->where(['id'=>$id])->first();
        $foto = $this->fotoM->select(['foto.*', 'users.username'])->join('users', 'users.id = foto.user_id')->where(['album_id'=>$id])->findAll();
        // dd($foto);
        $data = [
            'title' => 'Tambah Foto',
            'photos' => $foto,
            'album' => $album
        ];

        return view('album/detail', $data);
    }

    public function create(){
        $this->isLogedIn();
        $album = $this->albumM->where(['user_id'=>session()->get('user_id')])->findAll();
        $data = [
            'title' => 'Tambah Album'
        ];
        return view('album/create', $data);
    }

    public function aksi_create(){
        $this->isLogedIn();

        $d = $this->request->getVar();
        $d['user_id'] = session()->get('user_id');
        // d($d);

        $this->albumM->insert($d);

        $data = [
            'success' => 'Berhasil Tambah Album',
        ];
        session()->setFlashdata($data);
        return redirect()->to('album');
    }

    public function edit($id){
        $this->isLogedIn();
        $album = $this->albumM->where(['id'=>$id,'user_id'=>session()->get('user_id')])->first();
        $data = [
            'title' => 'Tambah Album',
            'album' => $album
        ];
        return view('album/edit', $data);
    }

    public function aksi_edit(){
        $this->isLogedIn();

        $d = $this->request->getVar();
        // dd($d);
        if($d['user_id']!=session()->get('user_id')){
            $data = [
                'error' => 'Anda tidak mempunyai akses',
            ];
            session()->setFlashdata($data);
            return redirect()->to('album');
        }

        $this->albumM->update($d['id'], $d);

        $data = [
            'success' => 'Berhasil Edit Album',
        ];
        session()->setFlashdata($data);
        return redirect()->to('album');
    }

    public function delete($id){
        $this->isLogedIn();
        $user_id = session()->get('user_id');
        
        $album = $this->albumM->where(['id'=>$id,'user_id'=>$user_id])->findAll();
        if(count($album)>0){
            $this->albumM->delete($id);
        } else {
            $data = [
                'error' => 'Anda tidak mempunyai akses',
            ];
            session()->setFlashdata($data);
            return redirect()->to('album');
        };

        $data = [
            'success' => 'Berhasil Hapus Album',
        ];
        session()->setFlashdata($data);
        return redirect()->to('album');
    }
}
