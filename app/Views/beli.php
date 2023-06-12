<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>
<form method="post" action="/beli/<?= $film['id'] ?>">
  <?= csrf_field() ?>
<div style="margin-top: 150px;">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-heading">
        <h2><em>Form</em>Pembayaran</h2>
        </div>
      </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
          <div class="card bg-dark mb-3"">
            <div class="row g-0">
              <div class="col-lg-4">
              <img src="/asset/img/<?= $film['gambar'] ?>" class="img-fluid rounded-lg mobile:px-1 mx-auto" alt="">
              </div>
              <div class="col-lg-8">
                <div class="card-body">
                  <h5 class="card-title text-white" ><?= $film['judul'] ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted" ><?= $film['kategori_nama'] ?>|<span class="card-text"><?= $film['durasi'] ?></span></h6>
                  <div class="border border-opacity-20 rounded-2xl p-5 mb-9">
                  <input type="date" name="tanggal" value="<?= date('Y-m-d') ?>" class="from-control" required hidden>
                  <p class="card-text text-white" >Harga Film : <?= $film['harga'] ?></p>
                  <form method="post" action="<?= site_url('beli/'.$film['id']) ?>" >
                  <p class="card-text text-white" >Total :
                  <input type="text" name="total"  value="<?= $film['harga'] ?>" disabled>
                  <p class="card-text text-white" >Metode Pembayaran : <select name="bayar_id">
                  <?php foreach($data_dompetku as $bayar):?>
                  <option value="<?= $bayar['id'] ?>"><?= $bayar['jenis'] ?>-<?= $bayar['nomor'] ?>-<?= $bayar['nama'] ?></option>
                  <?php endforeach?>
                  </select></p>
                  <p class="card-text text-white" hidden><select name="kategori_id">
                  <?php foreach($data_kategori as $kategori):?>
                  <option value="<?= $kategori['id'] ?>"></option>
                  <?php endforeach?>
                  </select>
                  </div>
                </div>
                <center><button type="submit" class="btn btn-success"> Lanjut Pembayaran </button></center>
              </div>   
              </div>
            </div>
          </div>
        </div>
        <a href="/detail/<?= $film['id'] ?>" class="btn btn-info"><i class="fas fa-back"></i> < </a>
    </div>
  </div>
</div>
</form>

<?= $this->endSection('content'); ?>
<?= $this->section('scripts') ?>
<script>
  // default date start
  const Total = document.getElementById('Total');
</script>
<?= $this->endSection() ?>