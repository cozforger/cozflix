<?php
namespace App\Controllers;

//memanggil model
use App\Models\FilmModel;
use App\Models\KategoriModel;
use App\Models\TransaksiModel;
use App\Models\DompetkuModel;


class Transaksi extends BaseController
{
    public function __construct()
    {
        //load model untuk digunakan
        $this->FilmModel = new FilmModel();
        $this->KategoriModel = new KategoriModel();
        $this->TransaksiModel = new TransaksiModel();

    }

    public function list()
    {

        $transaksi =  $this->TransaksiModel->select('transaksi.*, film.judul, film.gambar, users.nama as user_nama, bayar.jenis as bayar_jenis, users.email')
        ->join('film','film.id = transaksi.film_id')
        ->join('kategori','kategori.id = transaksi.kategori_id')
        ->join('users', 'users.id = transaksi.user_id')
        ->join('bayar', 'bayar.id = transaksi.bayar_id')
        ->orderBy('transaksi.id', 'DESC')
        ->findAll();

        $data = [
            'transaksi' => $transaksi
        ];
        return view('admin/transaksi_list', $data);
    }

}