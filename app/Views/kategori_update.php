<?= $this->extend('theme/index'); ?>
<?= $this->section('content'); ?>

<form method="post" action="<?= site_url('kategori/'.$data['id']) ?>">
  <?= csrf_field() ?>
  <table class="table">
    <tr>
      <td>Nama</td>
      <td>
        <input type="text" class="form-control" name="nama" value="<?= $data['nama'] ?>" />
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
        <a href="<?= site_url('kategori/delete/'.$data['id']) ?>" onclick="return confirm('Yakin bro?')" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
      </td>
    </tr>
  </table>
</form>
<?= $this->endSection('content'); ?>