<?= $this->extend('theme/index'); ?>
<?= $this->section('content'); ?>
<h1 class="h3 mb-4 text-gray-800">Data Transaksi</h1>
<?php if (session()->getFlashdata('success')) : ?>
          <div class="alert alert-success text-white fw-bold" role="alert">
            <?= session()->getFlashdata('success') ?>
          </div>
        <?php endif ?>
<br /><br />

<table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
    <thead class="thead-dark">
      <tr style="text-align: center;">
        <th>No</th>
        <th>Judul</th>
        <th>Customer Name</th>
        <th>Email</th>
        <th>Jenis Pembayaran</th>
        <th>Total Pembayaran</th>
        <th>Tanggal</th>
      </tr>
    </thead>
    <tbody>
      <?php $num=1 ?>
      <?php foreach ($transaksi as $list) : ?>
        <tr style="text-align: center;">
          <td><?= $num++; ?></td>
          <td><?= $list['judul']; ?></td>
          <td><?= $list['user_nama']; ?></td>
          <td><?= $list['email']; ?></td>
          <td><?= $list['bayar_jenis']; ?></td>
          <td><?= $list['total']; ?></td>
          <td><?= $list['tanggal']; ?></td>
        </tr>
      <?php endforeach ?>
    </tbody>
</table>

<br />
<a href="<?= site_url('export/transaksi_xls') ?>" class="btn btn-success"><i class="fas fa-download"></i> Export Excel</a>
<a href="<?= site_url('export/transaksi_pdf') ?>" class="btn btn-danger"><i class="fas fa-download"></i> Export PDF</a>
<?= $this->endSection('content'); ?>