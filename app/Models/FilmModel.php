<?php
namespace App\Models;
use CodeIgniter\Model;

class FilmModel extends Model
{
    protected $table = 'film';
    protected $allowedFields = ['kategori_id', 'gambar', 'judul', 'sinopsis', 'director', 'aktor', 'durasi', 'bahasa', 'harga'];
}