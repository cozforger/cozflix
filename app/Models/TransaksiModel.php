<?php
namespace App\Models;
use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $allowedFields = ['user_id', 'kategori_id', 'bayar_id', 'film_id', 'total', 'tanggal'];
}