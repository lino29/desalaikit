<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<script type="text/javascript">
	$(document).ready(function() {
		hiRes ();
	});

	var chart;
	function hiRes () {
		chart = new Highcharts.Chart({
			chart: {
				renderTo: 'chart',
				border:0,
				defaultSeriesType: 'column'
			},
			title: {
				text: ''
			},
			xAxis: {
				title: {
					text:''
				},
				categories: [
				<?php $i=0;foreach ($list_jawab as $data){$i++;?>
					<?php if ($data['nilai'] != "-"){echo "'$data[jawaban]',";}?>
				<?php }?>
				]
			},
			yAxis: {
				title: {
					text: 'Jumlah Populasi'
				}
			},
			legend: {
				layout: 'vertical',
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
				shadow:1,
				border:0,
				data: [
				<?php foreach ($list_jawab as $data){?>
					<?php if ($data['jawaban'] != "TOTAL"){?>
						<?php if ($data['nilai'] != "-"){?>
							<?= $data['nilai']?>,
						<?php }?>
					<?php }?>
				<?php }?>
				]
			}]
		});
	};
</script>
<style>
	tr#total {
		background:#fffdc5;
		font-size:12px;
		white-space:nowrap;
		font-weight:bold;
	}
	h3 {
		margin-left: 10px;
	}
</style>
<div class="card mb-1">
	<div class="card">
		<div class="card-header border-bottom">
			<div class="media">
				<div class="icon-circle icon-40 bg-light-primary mr-3">
					<i class="material-icons">assessment</i>
				</div>
				<div class="media-body">
					<h6 class="my-0 content-color-primary"><?= IS_PREMIUM ? $indikator['pertanyaan'] : $indikator ?></h6>
					<p class="small mb-0">
						<i class="material-icons icon-sm">local_offer</i> Pertanyaan/Indikator
					</p>
				</div>
				<a class="btn btn-sm btn-purple pink-gradient" href="<?= IS_PREMIUM ? site_url("data_analisis?master={$indikator['id_master']}") : site_url('data_analisis') ?>" style="float: right;">Kembali</a>
			</div>
		</div>
		<div class="card-body">
			<div class="mb-0 content-color-secondary">
				<div class="ui-layout-center" id="chart" style="padding: 5px;"></div>
			</div>
		</div>
	<div class="card-body">
		<div class="mb-0 content-color-secondary">
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<td width='3%' style='text-align:center'><b>No.</b></td>
							<td style='text-align:center'><b>Jawaban</b></td>
							<td width='20%' style='text-align:center'><b>Jumlah Responden</b></td>
						</tr>
					</thead>
					<tbody>
					    <?php foreach ($list_jawab as $data): ?>
       					<tr>
       						<td style='text-align:center'><?= $data['no']; ?></td>
       						<td style='text-align:left'><?= $data['jawaban']; ?></td>
       						<td style='text-align:center'><?= $data['nilai']; ?></td>
       					</tr>
        				<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>
