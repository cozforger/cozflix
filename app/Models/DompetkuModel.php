<?php
namespace App\Models;
use CodeIgniter\Model;

class DompetkuModel extends Model
{
    protected $table = 'bayar';
    protected $allowedFields = ['jenis', 'nama', 'nomor'];
}