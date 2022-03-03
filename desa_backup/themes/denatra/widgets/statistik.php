<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php if ($w_cos): ?>
<?php foreach ($w_cos as $data): ?>
<?php if (($data["isi"] == "statistik.php") or ($data["eneble"] == 1)): ?>
<style type="text/css">
	.highcharts-xaxis-labels tspan {font-size: 8px;}
</style>
<div class="card mb-1">
	<div class="card-header border-bottom">
		<div class="media">
			<div class="media-body">
				<h4 class="content-color-primary mb-0"><i class="material-icons icon-sm">assessment</i> <a href="<?= site_url('first/statistik/4')?>"> Statistik <?= ucwords($this->setting->sebutan_desa);?></a></h4>
			</div>
		</div>
	</div>
	<div class="card-body text-center">
		<script type="text/javascript">
			$(function () {
			  var chart_widget;
			  $(document).ready(function () {
			  // Build the chart
			  chart_widget = new Highcharts.Chart({
				chart: {
				  renderTo: 'container_widget',
				  plotBackgroundColor: null,
				  plotBorderWidth: null,
				  plotShadow: false
				},
				title: {
				  text: 'Jumlah Penduduk'
				},
				yAxis: {
				  title: {
					text: 'Jumlah'
				  }
				},
				xAxis: {
				  categories:
				  [
				  <?php foreach($stat_widget as $data): ?>
					<?php if ($data['jumlah'] != "-" AND $data['nama']!= "JUMLAH"): ?>
					  ['<?= $data['jumlah']?> <br> <?= $data['nama']?>'],
					<?php endif; ?>
				  <?php endforeach; ?>
				  ]
				},
				legend: {
				  enabled:false
				},
				plotOptions: {
				  series: {
					colorByPoint: true
				  },
				  column: {
					pointPadding: 0,
					borderWidth: 0
				  }
				},
				series: [{
				  type: 'column',
				  name: 'Populasi',
				  data: [
				  <?php foreach ($stat_widget as $data): ?>
					<?php if ($data['jumlah'] != "-" AND $data['nama']!= "JUMLAH"): ?>
					  ['<?= $data['nama']?>',<?= $data['jumlah']?>],
					<?php endif; ?>
				  <?php endforeach; ?>
				  ]
				}]
			  });
			});
			});
		</script>
		<div id="container_widget" style="width: 100%; height: 200px; margin: 0 auto"></div>
	</div>
</div>
<?php endif; ?>
<?php endforeach; ?>
<?php endif; ?>
