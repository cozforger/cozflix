<?= $this->extend('theme/index'); ?>
<?= $this->section('content'); ?>

<div id="chart"></div>


<!-- online -->
<!-- <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> -->

<!-- offline -->
<script src="<?=base_url('asset/js/jquery-3.6.1.min.js')?>"></script>
<script src="<?=base_url('asset/js/apexcharts.js')?>"></script>

<script>
  var options = {
    //series: [44, 55, 41, 17, 15],
    series: [<?php foreach ($transaksi as $row):?><?= $row['chart']?>,<?php endforeach ?>],
    chart: {
      type: 'donut',
      width: '50%',
    },
    //labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],    
    labels: [<?php foreach ($transaksi as $row):?>"<?= $row['nama']?>",<?php endforeach ?>],

  };

  var chart = new ApexCharts(document.querySelector("#chart"), options);
  chart.render();
</script>
<?= $this->endSection('content'); ?>