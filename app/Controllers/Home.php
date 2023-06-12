<?php
namespace App\Controllers;

use App\Models\FilmModel;
use App\Models\KategoriModel;

class Home extends BaseController
{
    public function __construct()
    {
        $this->FilmxModel = new FilmModel();
        $this->KategoriModel = new KategoriModel();

    }

    public function index()
    {
        $user_id = session()->get('id');
        $list = $this->FilmxModel->select('film.id, film.gambar, film.judul, film.sinopsis, film.director, film.aktor, film.durasi, film.bahasa, kategori.nama AS kategori_nama, harga')->join('kategori','film.kategori_id = kategori.id')->orderBy('kategori.nama, judul')->findAll();
        
        $output = [
            
            'list' => $list,

        ];

        return view('index', $output);
    }

    public function filmx()
    {
        $list = $this->FilmxModel->select('film.id, film.gambar, film.judul, film.sinopsis, film.director, film.aktor, film.durasi, film.bahasa, kategori.nama AS kategori_nama, harga')->join('kategori','film.kategori_id = kategori.id')->orderBy('kategori.nama, judul')->findAll();

        $output = [
            'list' => $list,

        ];

        return view('film', $output);
    }

    public function detail($id)
    {

        //select data film yang dipilih (filter by id)
        $data =  $this->FilmxModel->select('film.id, film.gambar, film.judul, film.sinopsis, film.director, film.aktor, film.durasi, film.bahasa, kategori.nama AS kategori_nama, harga')->join('kategori','film.kategori_id = kategori.id')->find($id);
        $data_kategori = $this->KategoriModel->orderBy('nama')->findAll();

        $output = [
            'data' => $data,
            'data_kategori' => $data_kategori,

        ]; 
        return view('detail', $output);
    }

}

