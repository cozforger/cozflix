<?= $this->extend('theme/index'); ?>
<?= $this->section('content'); ?>

<form method="post" action="<?= site_url('kategori/insert') ?>">
  <?= csrf_field() ?>
  <table class="table">
    <tr>
      <td>Nama</td>
      <td>
        <input type="text" class="form-control" name="nama" value="" />                            
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
      </td>
    </tr>
  </table>
</form>
<?= $this->endSection('content'); ?>