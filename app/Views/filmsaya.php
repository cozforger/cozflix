<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>
<div id="shell">
      <div id="header">
      <div id="sub-navigation">
<div style="margin-top: 150px;">
  <div class="container">
    <div class="row header-text">
      <div class="col-lg-6">
        <div class="section-heading">
          <h2>Film Saya</h2>
          <div class="line-dec"></div>
        </div>
      </div>
    </div>
<div class="grid grid-cols-4 gap-3">
<?php foreach ($transaksi as $list) : ?>
<div class="movie">
    <div class="movie-image">
    <a href="<?= site_url('/detail/'.$list['film_id']) ?>"><span class="play"><span class="name"><?= $list['judul'] ?></span></span> <img src="/asset/img/<?= $list['gambar'] ?>" class="rounded-lg mobile:px-1 mx-auto cursor-pointer" alt="" /></a>
    </div>
    <?php endforeach; ?>
</div>
<div class="cl">&nbsp;</div>
</div>
</div>
</div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>

</script>
<?= $this->endSection() ?>