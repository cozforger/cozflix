<?php
namespace App\Controllers;

//memanggil model
use App\Models\FilmModel;
use App\Models\KategoriModel;
use App\Models\DompetkuModel;
use App\Models\UsersModel;
use App\Models\TransaksiModel;

//memanggil package excel
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

//memanggil package pdf
use Dompdf\Dompdf;

class FileExport extends BaseController
{
    public function __construct()
    {
        //load model untuk digunakan
        $this->FilmModel = new FilmModel();
        $this->KategoriModel = new KategoriModel();
        $this->DompetkuModel = new DompetkuModel();
        $this->UsersModel = new UsersModel();
        $this->TransaksiModel = new TransaksiModel();
    }

    function transaksi_pdf()
    {
        $transaksi =  $this->TransaksiModel->select('transaksi.*, film.judul, users.nama as user_nama, users.email, bayar.jenis as bayar_jenis')
        ->join('film','film.id = transaksi.film_id')
        ->join('users', 'users.id = transaksi.user_id')
        ->join('bayar', 'bayar.id = transaksi.bayar_id')
        ->orderBy('transaksi.id', 'DESC')
        ->findAll();

        $dompdf = new Dompdf();
        
        $data = [
            'transaksi' => $transaksi,
        ];
        //load view
        $dompdf->loadHtml(view('export/transaksi_pdf', $data));
        //setting pdf
       
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream("rekap_transaksi.pdf", array("Attachment" => false));
        exit(0);
    }
    function film_xls()
    {
        //select data from table Film
        $list = $this->FilmModel->select('film.id, film.gambar, film.judul, film.sinopsis, film.director, film.aktor, film.durasi, film.bahasa, kategori.nama AS kategori_nama, harga')->join('kategori','film.kategori_id = kategori.id')->orderBy('kategori.nama, judul')->findAll();

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

    function film_pdf()
    {
        //select data from table Film
        $list = $this->FilmModel->select('film.id, film.gambar, film.judul, film.sinopsis, film.director, film.aktor, film.durasi, film.bahasa, kategori.nama AS kategori_nama, harga')->join('kategori','film.kategori_id = kategori.id')->orderBy('kategori.nama, judul')->findAll();

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // load HTML content
        $output = [
            'list' => $list,
        ];
        $dompdf->loadHtml(view('export/film_pdf', $output));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream("rekap_transaksi.pdf", array("Attachment" => false));
        exit(0);
    }

    public function transaksi_xls()
    {
      //get data transaksi
      $transaksi =  $this->TransaksiModel->select('transaksi.*, film.judul, users.nama as user_nama, users.email, bayar.jenis as bayar_jenis')
      ->join('film','film.id = transaksi.film_id')
      ->join('users', 'users.id = transaksi.user_id')
      ->join('bayar', 'bayar.id = transaksi.bayar_id')
      ->orderBy('transaksi.id', 'DESC')
      ->findAll();
  
      $fileName = 'rekap_transaksi.xlsx';
  
      //start package excel
      $spreadsheet = new Spreadsheet();
  
      //header
      $sheet = $spreadsheet->getActiveSheet();
      //(A1 : lokasi line & column excel, No : display data)
      $sheet->setCellValue('A1', 'No');
      $sheet->setCellValue('B1', 'Judul Film');
      $sheet->setCellValue('C1', 'Customer Name');
      $sheet->setCellValue('D1', 'Jenis Pembayaran');
      $sheet->setCellValue('E1', 'Email');
      $sheet->setCellValue('F1', 'Total Pembayaran');
      $sheet->setCellValue('G1', 'Tanggal');

  
      //data
      $line = 2;
      foreach ($transaksi as $row) {
        $sheet->setCellValue('A' . $line, $line-1);
        $sheet->setCellValue('B' . $line, $row['judul']);
        $sheet->setCellValue('C' . $line, $row['user_nama']);
        $sheet->setCellValue('D' . $line, $row['bayar_jenis']);
        $sheet->setCellValue('E' . $line, $row['email']);
        $sheet->setCellValue('F' . $line, $row['total']);
        $sheet->setCellValue('G' . $line, $row['tanggal']);
        $line++;
      }
  
      //export
      header("Content-Type: application/vnd.ms-excel");
      header('Content-Disposition: attachment; filename="' . urlencode($fileName) . '"');
      $writer = new Xlsx($spreadsheet);
      $writer->save('php://output');
    }
}