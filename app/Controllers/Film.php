<?php
namespace App\Controllers;

//memanggil model
use App\Models\FilmModel;
use App\Models\KategoriModel;

class Film extends BaseController
{
    public function __construct()
    {
        //load model untuk digunakan
        $this->FilmModel = new FilmModel();
        $this->KategoriModel = new KategoriModel();
    }

    public function list()
    {
        //select data from table Film
        $list = $this->FilmModel->select('film.id, film.gambar, film.judul, film.sinopsis, film.director, film.aktor, film.durasi, film.bahasa, kategori.nama AS kategori_nama, harga')->join('kategori','film.kategori_id = kategori.id')->orderBy('kategori.nama, judul')->findAll();

        $output = [
            'list' => $list,
        ];

        return view('admin/film_list', $output);
    }

    public function insert()
    {
        //select data from table kategori (untuk data di selectbox/dropdown)
        $data_kategori = $this->KategoriModel->orderBy('nama')->findAll();

        $output = [
            'data_kategori' => $data_kategori,
        ];

        return view('admin/film_insert', $output);
    }

    public function insert_save()
    {
        $kategori_id = $this->request->getVar('kategori_id');
        $judul = $this->request->getVar('judul');
        $gambar = $this->request->getVar('gambar');
        $sinopsis = $this->request->getVar('sinopsis');
        $director = $this->request->getVar('director');
        $aktor = $this->request->getVar('aktor');
        $durasi = $this->request->getVar('durasi');
        $bahasa = $this->request->getVar('bahasa');
        $harga = $this->request->getVar('harga');

        //insert data ke table Film
        $this->FilmModel->insert([
            'kategori_id' => $kategori_id,
            'judul' => $judul,
            'gambar' => $gambar,
            'sinopsis' => $sinopsis,
            'director' => $director,
            'aktor' => $aktor,
            'durasi' => $durasi,
            'bahasa' => $bahasa,
            'harga' => $harga,
        ]);

        return redirect()->to('admin/film');
    }

    public function update($id)
    {
        //select data kategori yang dipilih (filter by id)
        $data =  $this->FilmModel->where('id', $id)->first();
        
        //select data from table kategori (untuk data di selectbox/dropdown)
        $data_kategori = $this->KategoriModel->orderBy('nama')->findAll();

        $output = [
            'data' => $data,
            'data_kategori' => $data_kategori,
        ];

        return view('admin/film_update', $output);
    }

    public function update_save($id)
    {
        $kategori_id = $this->request->getVar('kategori_id');
        $judul = $this->request->getVar('judul');
        $gambar = $this->request->getVar('gambar');
        $sinopsis = $this->request->getVar('sinopsis');
        $director = $this->request->getVar('director');
        $aktor = $this->request->getVar('aktor');
        $durasi = $this->request->getVar('durasi');
        $bahasa = $this->request->getVar('bahasa');
        $harga = $this->request->getVar('harga');

        //update data ke table Film filter by id
        $this->FilmModel->update($id, [
            'kategori_id' => $kategori_id,
            'judul' => $judul,
            'gambar' => $gambar,
            'sinopsis' => $sinopsis,
            'director' => $director,
            'aktor' => $aktor,
            'durasi' => $durasi,
            'bahasa' => $bahasa,
            'harga' => $harga,
        ]);

        return redirect()->to('admin/film/');
    }

    public function delete($id)
    {   
        //delete data table Film filter by id
        $this->FilmModel->delete($id);
        return redirect()->to('admin/film');
    }
}