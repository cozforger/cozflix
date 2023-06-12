<style>
  table {
    border-collapse: collapse;
    width: 100%;
  }

  th {
    padding: 8px;
  }

  td {
    text-align: center;
    padding: 8px;
  }

  tr:nth-child(even) {
    background-color: #3b82f680;
  }
</style>

<div style="text-align: center;">
  <h2>Data Transaksi</h2>
</div>

<table style="width:100%">
  <thead>
    <tr style="background-color: #007aff">
      <th width="5%">No</th>
      <th>Judul Film</th>
      <th>Nama Pembeli</th>
      <th>Email</th>
      <th>Jenis Pembayaran</th>
      <th>Total Pembayaran</th>
      <th>Tanggal</th>
    </tr>
  </thead>
  <tbody>
    <?php $num = 1 ?>
    <?php foreach ($transaksi as $transaksi) : ?>
      <tr>
        <td><?= $num++; ?></td>
        <td><?= $transaksi['judul']; ?></td>
        <td><?= $transaksi['user_nama']; ?></td>
        <td><?= $transaksi['email']; ?></td>
        <td><?= $transaksi['bayar_jenis']; ?></td>
        <td><?= $transaksi['total']; ?></td>
        <td><?= $transaksi['tanggal']; ?></td>
      <?php endforeach ?>
  </tbody>
</table>