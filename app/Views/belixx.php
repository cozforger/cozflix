<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>
<form id="contact-form" action="/beli/<?= $data['id'] ?>" method="post">
<div style="margin-top: 150px;">
  <div class="container">
    <div class="row header-text">
      <div class="col-lg-6">
        <div class="section-heading">
          <h2>Order The <em>Car</em></h2>
          <div class="line-dec"></div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="contact-us-content">
          <div class="row">
            <div class="col-md-8">
              <!-- card -->
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="section-heading">
                        <h2><em>Form</em> <span>Rent</span></h2>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="row">
                        <div class="col-lg-6">
                          <img src="/asset/img/<?= $data['gambar'] ?>" alt="car" class="img-fluid">
                        </div>
                        <div class="col-lg-6">
                          <h4><?= $data['kategori_nama'] ?>|<span class="card-text"><?= $data['durasi'] ?></span></h4>
                          <input type="date" id="date" name="tanggal" value="<?= date('Y-m-d') ?>" class="from-control" required>
                          <br>
                          <p style="color: black;">Harga : <?= $data['harga'] ?></p>
                          <p style="color: black;">Pilih Metode Pembayaran : <select name="bayar_id">
          <?php foreach($data_dompetku as $bayar):?>
          <option value="<?= $bayar['id'] ?>"><?= $bayar['jenis'] ?>-<?= $bayar['nomor'] ?>-<?= $bayar['nama'] ?></option>
          <?php endforeach?>
        </select></p>
                          <br>

                          
                            <div class="row">

                              <div class="col-lg-12">
                                <fieldset>
                                  <label class="form-label" for="subTotal">Total</label>
                                  <input type="text" name="" id="subTotal" value="<?= $data['harga'] ?>" disabled>
                                </fieldset>
                              </div>
                              <div class="col-lg-12">
                                <fieldset>
                                  <button type="submit" id="form-submit" class="orange-button">Lanjut Pembayaran</button>
                                </fieldset>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end card -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
  const subTotal = document.getElementById('subTotal');
</script>
<?= $this->endSection() ?>