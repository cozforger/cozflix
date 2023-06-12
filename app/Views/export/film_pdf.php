<table border="1">
    <thead>
      <tr>
      <th>No</th>
        <th>Kategori</th>
        <th>Judul</th>
        <th>Sinopsis</th>
        <th>Director</th>
        <th>Actor</th>
        <th>Durasi</th>
        <th>Bahasa</th>
        <th>Harga</th>
      </tr>
    </thead>
    <tbody>
      <?php $num=1 ?>
      <?php foreach ($list as $row) : ?>
        <tr>
          <td><?= $num++; ?></td>
          <td><?= $row['kategori_nama']; ?></td>
          <td><?= $row['judul']; ?></td>
          <td><?= $row['sinopsis']; ?></td>
          <td><?= $row['director']; ?></td>
          <td><?= $row['aktor']; ?></td>
          <td><?= $row['durasi']; ?></td>
          <td><?= $row['bahasa']; ?></td>
          <td><?= $row['harga']; ?></td>
      <?php endforeach ?>
    </tbody>
</table>