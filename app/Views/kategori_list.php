<?= $this->extend('theme/index'); ?>
<?= $this->section('content'); ?>

<a href="<?= site_url('kategori/insert') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Insert</a>
<br />
<br />
<table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
    <thead class="thead-dark">
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $num=1 ?>
      <?php foreach ($list as $row) : ?>
        <tr>
          <td><?= $num++; ?></td>
          <td><?= $row['nama']; ?></td>
          <td nowrap>
            <a href="<?= site_url('kategori/'.$row['id']) ?>" class="btn btn-info"><i class="fas fa-edit"></i> Update</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
</table>
<?= $this->endSection('content'); ?>