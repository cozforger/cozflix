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
          series: [{
            name: "Terjual",
            data: [<?php foreach ($transaksi as $row):?><?= $row['chart']?>,<?php endforeach ?>],
        }],
          chart: {
          height: 350,
          type: 'area',
          zoom: {
            enabled: false
          }
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'straight'
        },
        title: {
          text: 'Product Trends by Month',
          align: 'left'
        },
        grid: {
          row: {
            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
          },
        },
        xaxis: {
          categories: [<?php foreach ($transaksi as $row):?>"<?= $row['tanggal']?>",<?php endforeach ?>],
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
</script>
<?= $this->endSection('content'); ?>