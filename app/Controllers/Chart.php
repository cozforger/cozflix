<?php
namespace App\Controllers;

//memanggil model
use App\Models\FilmModel;
use App\Models\KategoriModel;
use App\Models\TransaksiModel;

class Chart extends BaseController
{
    public function __construct()
    {
        //load model untuk digunakan
        $this->FilmModel = new FilmModel();
        $this->TransaksiModel = new TransaksiModel();
    }

    public function pie()
    {
        $transaksi =  $this->TransaksiModel->select('COUNT(film.id) as chart, kategori.nama')
        ->join('film','film.id = transaksi.film_id')
        ->join('kategori','kategori.id = transaksi.kategori_id')
        ->groupBy('kategori.id')
        ->findAll();

        $data = [
            'transaksi' => $transaksi
        ];

        return view('/admin/chart_pie', $data);
    }

    public function line()
    {
        //select data from table buku
        $transaksi =  $this->TransaksiModel->select('COUNT(transaksi.id) as chart, tanggal')
        ->join('film','film.id = transaksi.film_id')
        ->join('kategori','kategori.id = transaksi.kategori_id')
        ->groupBy('tanggal')
        ->findAll();

        $data = [
            'transaksi' => $transaksi
        ];


        return view('/admin/chart_line', $data);
    }

}