<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<div style="margin-top: 150px;">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="section-heading">
          <h2>Choose <em>Your</em> favorite <span>film</span></h2>
          <div class="line-dec"></div>
        </div>
      </div>
    </div>
    <div class="row">
      <?php foreach ($list as $list) : ?>
        <div class="col-md-6">
          <div class="card bg-dark mb-3"">
            <div class="row g-0">
              <div class="col-lg-4">
                <img src="/asset/img/<?= $list['gambar'] ?>" class="img-fluid rounded-lg mobile:px-1 mx-auto" alt="">
                    <center><a href="#" class="btn btn-success"> Beli </a></center>
              </div>
              <div class="col-lg-8">
                <div class="card-body">
                  <h5 class="card-title text-white" ><?= $list['judul'] ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted" ><?= $list['kategori_nama'] ?>|<span class="card-text"><?= $list['durasi'] ?></span></h6>
                  <p class="card-text text-white"><?= $list['sinopsis'] ?></p> 
                  <p class="card-text text-warning" ><?= $list['harga'] ?>
                  <p class="card-text text-dark"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <a href="/" class="btn btn-info"><i class="fas fa-back"></i> < </a>
  </div>
</div>


<?= $this->endSection('content'); ?>