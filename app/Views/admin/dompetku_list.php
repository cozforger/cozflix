<?= $this->extend('theme/index'); ?>
<?= $this->section('content'); ?>

<a href="<?= site_url('admin/dompetku/insert') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Insert</a>
<br />
<br />
<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
    <thead class="thead-dark">
      <tr>
      <th scope="col">No</th>
      <th scope="col">Jenis</th>
      <th scope="col">Nama</th>
      <th scope="col">Nomor</th>
      <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $num=1 ?>
      <?php foreach ($list as $row) : ?>
        <tr>
          <td><?= $num++; ?></td>
          <td><?= $row['jenis']; ?></td>
          <td><?= $row['nama']; ?></td>
          <td><?= $row['nomor']; ?></td>
          <td nowrap>
            <a href="<?= site_url('admin/dompetku/'.$row['id']) ?>" class="btn btn-info"><i class="fas fa-edit"></i> Update</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
</table>
<?= $this->endSection('content'); ?>