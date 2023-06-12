<?php

namespace App\Controllers;

use App\Models\FilmModel;
use App\Models\KategoriModel;
use App\Models\DompetkuModel;
use App\Models\TransaksiModel;

class Beli extends BaseController
{
    public function __construct()
    {
        $this->FilmModel = new FilmModel();
        $this->KategoriModel = new KategoriModel();
        $this->DompetkuModel = new DompetkuModel();
        $this->TransaksiModel = new TransaksiModel();

    }
public function index($id)
    {

        //select data film yang dipilih (filter by id)
        $film =  $this->FilmModel->select('film.id, film.gambar, film.judul, film.sinopsis, film.director, film.aktor, film.durasi, film.bahasa, kategori.nama AS kategori_nama, harga')->join('kategori','film.kategori_id = kategori.id')->orderBy('kategori.nama, judul')->find($id);
        $data_kategori = $this->KategoriModel->orderBy('nama')->findAll();
        $data_dompetku = $this->DompetkuModel->orderBy('jenis')->findAll();

        $output = [
            'film' => $film,
            'data_kategori' => $data_kategori,
            'data_dompetku' => $data_dompetku,

        ]; 
        return view('beli', $output);
    }
    
    public function beli_insert($id)
    {
      $film = $this->FilmModel->find($id);
      $user_id = session()->get('id');

      $total = $film['harga'];
      $film_id = $this->request->getVar('film_id');
      $kategori_id = $this->request->getVar('kategori_id');
      $bayar_id = $this->request->getVar('bayar_id');
      $tanggal = $this->request->getVar('tanggal');
      $judul = $this->request->getVar('judul');

      $data = [
        'user_id' => $user_id,
        'total' => $total,
        'tanggal' => $tanggal,
        'film_id' => $id,
        'kategori_id' => $kategori_id,
        'bayar_id' => $bayar_id,
        'judul' => $judul
        
      ];
  
      $this->TransaksiModel->insert($data);
  
      session()->setFlashdata('success', 'Order Success');
      return redirect()->to('/')->with('success', 'Order Success, Please Wait for Confirmation!');
    }

    public function filmsaya()
  {
    $user_id = session()->get('id');

    $transaksi = $this->TransaksiModel->select('transaksi.*, film.judul, film.gambar, film.harga, kategori.nama as kategori_nama')
      ->join('film', 'transaksi.film_id = film.id')
      ->join('kategori', 'transaksi.kategori_id = kategori.id')
      ->where('transaksi.user_id', $user_id)
      ->findAll();

    $data = [

      'transaksi' => $transaksi
    ];

    return view('filmsaya', $data);
  }
}
