<?= $this->extend('theme/index'); ?>
<?= $this->section('content'); ?>

<form method="post" action="<?= site_url('admin/film/'.$data['id']) ?>">
  <?= csrf_field() ?>
  <div class="mb-3 row">
    <div class="col-sm-2 col-form-label">Kategori Film</div>
    <div class="col-sm-10">
      <select name="kategori_id" class="form-control form-select">
        <?php foreach ($data_kategori as $kategori) : ?>
          <?php if ($kategori['id'] == $data['kategori_id']) : ?>
            <option value="<?= $kategori['id'] ?>" selected><?= $kategori['nama'] ?></option>
          <?php else : ?>
            <option value="<?= $kategori['id'] ?>"><?= $kategori['nama'] ?></option>
          <?php endif ?>
        <?php endforeach ?>
      </select>
    </div>
  </div>
  <div class="mb-3 row">
    <div class="col-sm-2 col-form-label">Judul Film</div>
    <div class="col-sm-10">
      <input type="text" name="judul" value="<?= $data['judul'] ?>" class="form-control" />
    </div>
  </div>
  <div class="mb-3 row">
    <div class="col-sm-2 col-form-label">Gambar Film</div>
    <div class="col-sm-10">
      <input type="file" name="gambar" value="<?= $data['gambar'] ?>" />
    </div>
  </div>
  <div class="mb-3 row">
    <div class="col-sm-2 col-form-label">Sinopsis Film</div>
    <div class="col-sm-10">
      <input type="text" name="sinopsis" value="<?= $data['sinopsis'] ?>" class="form-control" />
    </div>
  </div>
  <div class="mb-3 row">
    <div class="col-sm-2 col-form-label">Director Film</div>
    <div class="col-sm-10">
      <input type="text" name="director" value="<?= $data['director'] ?>" class="form-control" />
    </div>
  </div>
  <div class="mb-3 row">
    <div class="col-sm-2 col-form-label">Actor Film</div>
    <div class="col-sm-10">
      <input type="text" name="aktor" value="<?= $data['aktor'] ?>" class="form-control" />
    </div>
</div>
<div class="mb-3 row">
<div class="col-sm-2 col-form-label">Durasi Film</div>
    <div class="col-sm-10">
        <input type="text" name="durasi" value="<?= $data['durasi'] ?>" class="form-control" />
    </div>
</div>
<div class="mb-3 row">
<div class="col-sm-2 col-form-label">Bahasa Film</div>
    <div class="col-sm-10">
      <input type="text" name="bahasa" value="<?= $data['bahasa'] ?>" class="form-control" />
    </div>
 </div>
 <div class="mb-3 row">
<div class="col-sm-2 col-form-label">Harga Film</div>
    <div class="col-sm-10">
      <input type="text" name="harga" value="<?= $data['harga'] ?>" class="form-control" />
    </div>
 </div>
 <td>&nbsp;</td>
  <div class="mb-3 row">
    <div class="col-sm-2"></div>
    <div class="col-sm-10">
    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
      <a href="<?= site_url('admin/film/delete/' . $data['id']) ?>" onclick="return confirm('Yakin bro?')" class="btn btn-outline-secondary"><i class="fas fa-trash"></i></a>
    </div>
  </div>>
</form>
<?= $this->endSection('content'); ?>