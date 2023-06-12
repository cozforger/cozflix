<?= $this->extend('theme/index'); ?>
<?= $this->section('content'); ?>
<h1 class="h3 mb-4 text-gray-800">Data Film</h1>

<a href="<?= site_url('admin/film/insert') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Insert</a>
<br /><br />

<table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
    <thead class="thead-dark">
      <tr>
        <th>No</th>
        <th>Kategori</th>
        <th>Gambar</th>
        <th>Judul</th>
        <th>Sinopsis</th>
        <th>Director</th>
        <th>Actor</th>
        <th>Durasi</th>
        <th>Bahasa</th>
        <th>Harga</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $num=1 ?>
      <?php foreach ($list as $row) : ?>
        <tr>
          <td><?= $num++; ?></td>
          <td><?= $row['kategori_nama']; ?></td>
          <td><img src="/asset/img/<?= $row['gambar']; ?>" class="rounded mx-auto d-block" width="150" height="200"></td>
          <td><?= $row['judul']; ?></td>
          <td><?= $row['sinopsis']; ?></td>
          <td><?= $row['director']; ?></td>
          <td><?= $row['aktor']; ?></td>
          <td><?= $row['durasi']; ?></td>
          <td><?= $row['bahasa']; ?></td>
          <td><?= $row['harga']; ?></td>
          <td nowrap>
            <a href="<?= site_url('admin/film/'.$row['id']) ?>" class="btn btn-info"><i class="fas fa-edit"></i> Update</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
</table>

<br />
<a href="<?= site_url('export/film_xls') ?>" class="btn btn-success"><i class="fas fa-download"></i> Export Excel</a>
<a href="<?= site_url('export/film_pdf') ?>" class="btn btn-danger"><i class="fas fa-download"></i> Export PDF</a>
<?= $this->endSection('content'); ?>