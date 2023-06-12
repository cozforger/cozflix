<?php
namespace App\Controllers;

//memanggil model
use App\Models\DompetkuModel;

class Dompetku extends BaseController
{
    public function __construct()
    {
        //load model untuk digunakan
        $this->DompetkuModel = new DompetkuModel();
    }

    public function list()
    {
        //select data from table Dompetku
        $list = $this->DompetkuModel->select('id, jenis, nama, nomor')->orderBy('jenis')->findAll();

        $output = [
            'list' => $list,
        ];

        return view('admin/dompetku_list', $output);
    }

    public function insert()
    {
        return view('admin/dompetku_insert');
    }

    public function insert_save()
    {
        $jenis = $this->request->getVar('jenis');
        $nama = $this->request->getVar('nama');
        $nomor = $this->request->getVar('nomor');

        //insert data ke table Dompetku
        $this->DompetkuModel->insert([
            'nama' => $nama,
            'jenis' => $jenis,
            'nomor' => $nomor,
        ]);

        return redirect()->to('admin/dompetku');
    }

    public function update($id)
    {
        //select data Dompetku yang dipilih (filter by id)
        $data =  $this->DompetkuModel->where('id', $id)->first();
        
        $output = [
            'data' => $data,
        ];

        return view('admin/dompetku_update', $output);
    }

    public function update_save($id)
    {
        $jenis = $this->request->getVar('jenis');
        $nama = $this->request->getVar('nama');
        $nomor = $this->request->getVar('nomor');

        //update data ke table Dompetku filter by id
        $this->DompetkuModel->update($id, [
            'nama' => $nama,
            'jenis' => $jenis,
            'nomor' => $nomor,
        ]);

        return redirect()->to('admin/dompetku/');
    }

    public function delete($id)
    {   
        //delete data table Dompetku filter by id
        $this->DompetkuModel->delete($id);
        return redirect()->to('admin/dompetku');
    }
}