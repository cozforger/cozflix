<?php
namespace App\Controllers;

//memanggil model
use App\Models\FilmModel;
use App\Models\KategoriModel;

//memanggil package excel
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

//memanggil package pdf
use Dompdf\Dompdf;

class FilmExport extends BaseController
{
    public function __construct()
    {
        //load model untuk digunakan
        $this->FilmModel = new FilmModel();
        $this->KategoriModel = new KategoriModel();
    }

    function export_xls()
    {
        $transaksi =  $this->TransaksiModel->select('transaksi.*, film.judul, film.gambar, users.nama as user_nama, bayar.jenis as bayar_jenis')
        ->join('film','film.id = transaksi.film_id')
        ->join('users', 'users.id = transaksi.user_id')
        ->join('bayar', 'bayar.id = transaksi.bayar_id')
        ->orderBy('transaksi.id', 'DESC')
        ->findAll();

        $data = [
            'transaksi' => $transaksi
        //filename
        $fileName = 'rekap_film.xlsx';

        //start package excel
        $spreadsheet = new Spreadsheet();

        //header
        $sheet = $spreadsheet->getActiveSheet();
        //(A1 : lokasi line & column excel, No : display data)
        $sheet->setCellValue('A1', 'No')->getColumnDimension('A')->setAutoSize(true);
        $sheet->setCellValue('B1', 'Kategori')->getColumnDimension('B')->setAutoSize(true);
        $sheet->setCellValue('C1', 'Judul')->getColumnDimension('C')->setAutoSize(true);
        $sheet->setCellValue('D1', 'Sinopsis')->getColumnDimension('D')->setAutoSize(true);
        $sheet->setCellValue('E1', 'Director')->getColumnDimension('E')->setAutoSize(true);
        $sheet->setCellValue('F1', 'Aktor')->getColumnDimension('F')->setAutoSize(true);
        $sheet->setCellValue('G1', 'Durasi')->getColumnDimension('G')->setAutoSize(true);
        $sheet->setCellValue('H1', 'Bahasa')->getColumnDimension('H')->setAutoSize(true);
        $sheet->setCellValue('I1', 'Harga')->getColumnDimension('I')->setAutoSize(true);

        //body
        $line = 2;
        foreach ($list as $row) {
            $sheet->setCellValue('A'.$line, $line-1);
            $sheet->setCellValue('B'.$line, $row['kategori_nama']);
            $sheet->setCellValue('C'.$line, $row['judul']);
            $sheet->setCellValue('D'.$line, $row['sinopsis']);
            $sheet->setCellValue('E'.$line, $row['director']);
            $sheet->setCellValue('F'.$line, $row['aktor']);
            $sheet->setCellValue('G'.$line, $row['durasi']);
            $sheet->setCellValue('H'.$line, $row['bahasa']);
            $sheet->setCellValue('I'.$line, $row['harga']);
            $line++;
        }

        header("Content-Type: application/vnd.ms-excel");
        header('Content-Disposition: attachment; filename="' . urlencode($fileName) . '"');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }

    function export_pdf()
    {
        //select data from table Film
        $list = $this->FilmModel->select('film.id, film.gambar, film.judul, film.sinopsis, film.director, film.aktor, film.durasi, film.bahasa, kategori.nama AS kategori_nama, harga')->join('kategori','film.kategori_id = kategori.id')->orderBy('kategori.nama, judul')->findAll();

        //filename
        $fileName = 'rekap_film';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // load HTML content
        $output = [
            'list' => $list,
        ];
        $dompdf->loadHtml(view('film_export_pdf', $output));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($fileName);
    }
}