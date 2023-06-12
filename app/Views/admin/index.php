<?= $this->extend('theme/index'); ?>
<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <section class="content-header">
            <h1>
                Dashboard
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin/"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="/admin/dompetku/"><i class="fa fa-dashboard"></i> Wallet</a></li>
                <li class="active"><i class="fa fa-dashboard"></i><a href="<?= site_url('/admin/chart/line'); ?>"> Chart</a></li>
            </ol>
        </section>
        <br>
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>5</h3>

                            <p>Film</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="/admin/film" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>60%</h3>

                            <p>Action</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-tshirt"></i>
                        </div>
                        <a href="/admin/transaksi" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>0%</h3>

                            <p>Thriler</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-headphone"></i>
                        </div>
                        <a href="/admin/transaksi" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>40%</h3>

                            <p>Drama</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-briefcase"></i>
                        </div>
                        <a href="/admin/transaksi" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        </section>
        <!-- /.content -->
</div>
<?= $this->endSection('content'); ?>
