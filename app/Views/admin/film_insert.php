<?= $this->extend('theme/index'); ?>
<?= $this->section('content'); ?>

<form method="post" action="<?= site_url('admin/film/insert') ?>">
  <?= csrf_field() ?>
  <table class="table table-striped">
    <tr>
      <td>Kategori Film</td>
      <td>
        <select name="kategori_id">
          <?php foreach($data_kategori as $kategori):?>
          <option value="<?= $kategori['id'] ?>"><?= $kategori['nama'] ?></option>
          <?php endforeach?>
        </select>
      </td>
    </tr>
    <td>Gambar Film</td>
      <td>
    <form method="post" enctype="multipart/form-data" action="">
    <input type="file" name="gambar">
  </form>
        </td>
    <tr>
      <td>Judul Film</td>
      <td>
        <input type="text" name="judul" value="" />
      </td>
    </tr>
    <tr>
      <td>Sinopsis Film</td>
      <td>
        <input type="text" name="sinopsis" value="" />
      </td>
    </tr>
    <tr>
      <td>Director Film</td>
      <td>
        <input type="text" name="director" value="" />
      </td>
    </tr>
    <tr>
      <td>Aktor Film</td>
      <td>
        <input type="text" name="aktor" value="" />
      </td>
    </tr>
    <tr>
      <td>Durasi Film</td>
      <td>
        <input type="text" name="durasi" value="" />
      </td>
    </tr>
    <tr>
      <td>Bahasa Film</td>
      <td>
        <input type="text" name="bahasa" value="" />
      </td>
    </tr>
    <tr>
      <td>Harga Film</td>
      <td>
        <input type="text" name="harga" value="" />
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
          <td>
      <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
      </td>
    </tr>
  </table>
</form>
<?= $this->endSection('content'); ?>