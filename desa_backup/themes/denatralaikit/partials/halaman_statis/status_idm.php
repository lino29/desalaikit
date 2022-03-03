<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<style>
	.small-box {
	  border-radius: 5px;
	  position: relative;
	  display: block;
	  margin-bottom: 10px;
	  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
	}
	.small-box > .inner {
	  padding: 10px;
	}
	.small-box > .small-box-footer {
	  position: relative;
	  text-align: center;
	  padding: 3px 0;
	  color: #fff;
	  color: rgba(255, 255, 255, 0.8);
	  display: block;
	  z-index: 10;
	  background: rgba(0, 0, 0, 0.1);
	  text-decoration: none;
	}
	.small-box > .small-box-footer:hover {
	  color: #fff;
	  background: rgba(0, 0, 0, 0.15);
	}
	.small-box h3 {
	  font-size: 20px;
	  font-weight: bold;
	  margin: 0 0 5px 0;
	  white-space: nowrap;
	  padding: 0;
	}
	.small-box p {
	  font-size: 15px;
	}
	.small-box p > small {
	  display: block;
	  color: #6f00ff;
	  font-size: 13px;
	  margin-top: 5px;
	}
	.small-box h3,
	.small-box p {
	  z-index: 5;
	}
	.small-box .icon {
	  -webkit-transition: all 0.3s linear;
	  -o-transition: all 0.3s linear;
	  transition: all 0.3s linear;
	  position: absolute;
	  top: 0px;
	  right: 10px;
	  z-index: 0;
	  font-size: 90px;
	  color: rgba(0, 0, 0, 0.15);
	}
	.small-box:hover {
	  text-decoration: none;
	  color: #6f00ff;
	}
	.small-box:hover .icon {
	  font-size: 95px;
	}
	@media (max-width: 767px) {
	  .small-box {
		text-align: center;
	  }
	  .small-box .icon {
		display: none;
	  }
	  .small-box p {
		font-size: 12px;
	  }
	}
</style>
<link rel="stylesheet" href="<?= base_url()?>assets/bootstrap/css/ionicons.min.css">
<script type="text/javascript">
	$(document).ready(function () {
		Highcharts.chart('container', {
		chart: {
			type: 'pie',
			options3d: {
				enabled: true,
				alpha: 45
			}
		},
		title: {
			text: 'Indeks Desa Membangun (IDM) <?= $idm->SUMMARIES->TAHUN ?>'
		},
		subtitle: {
			text: 'SKOR : IKS, IKE, IKL'
		},
		plotOptions: {
			series: {
			colorByPoint: true
		},
		pie: {
			allowPointSelect: true,
			cursor: 'pointer',
			showInLegend: true,
			depth: 45,
			innerSize: 70,
			dataLabels: {
			enabled: true,
			format: '<b>{point.name}</b>: {point.y:,.2f} / {point.percentage:.1f} %'
			}
		}
	},
	series: [{
		name: 'SKOR',
		shadow: 1,
		border: 1,
		data: [
			['IKS', <?= $idm->ROW[35]->SKOR ?>],
			['IKE', <?= $idm->ROW[48]->SKOR ?>],
			['IKL', <?= $idm->ROW[52]->SKOR ?>]
		]
    	}]
    });
});
</script>
<style>
	.table-striped > tbody >tr.judul {
	background-color: lightgrey !important;
	}
	tr.judul > td,
	tr.judul > th {
	background-color: inherit !important;
	}
	.table > thead > tr > th,
	.table > tbody > tr > th,
	.table > tfoot > tr > th,
	.table > thead > tr > td,
	.table > tbody > tr > td,
	.table > tfoot > tr > td {
		font-size: 12px;
		padding: 5px;
	}
	@media (max-width:780px) {
		.btn-group-vertical {
			display: block;
		}
	}
	.table-responsive {
		min-height:275px;
	}
	#container {
		height: 400px;
	}
	.highcharts-figure, .highcharts-data-table table {
		min-width: 310px;
		max-width: 800px;
		margin: 1em auto;
	}
	.highcharts-data-table table {
		font-family: Verdana, sans-serif;
		border-collapse: collapse;
		border: 1px solid #EBEBEB;
		margin: 10px auto;
		text-align: center;
		width: 100%;
		max-width: 500px;
	}
	.highcharts-data-table caption {
		padding: 1em 0;
		font-size: 1.2em;
		color: #555;
	}
	.highcharts-data-table th {
		font-weight: 600;
		padding: 0.5em;
	}
	.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
		padding: 0.5em;
	}
	.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
		background: #f8f8f8;
	}
	.highcharts-data-table tr:hover {
		background: #f1f7ff;
	}
</style>
<div class="has-background-img mb-1">
	<div class="row">
		<div class="col-sm-12">
			<div class="card mb-0 fullscreen">
				<div class="card-header border-bottom">
                    <div class="media">
                    	<div class="icon-circle icon-40 bg-light-primary mr-3">
                    		<i class="material-icons">map</i>
                    	</div>
                    	<div class="media-body">
                    		<h6 class="my-0 content-color-primary">Status IDM <?= $idm->SUMMARIES->TAHUN ?></h6>
                    		<p class="small mb-0">
                    			<i class="material-icons icon-sm">date_range</i> <?= ucwords($this->setting->sebutan_desa)." ".$desa['nama_desa']?>
                    		</p>
                    	</div>
						<a href="javascript:void(0);" class="icon-circle icon-30 content-color-secondary fullscreenbtn">
							<i class="material-icons ">crop_free</i>
						</a>
                    </div>
				</div>
				<div class="card-body">
                    <div class="row">
                    	<div class="col-sm-12">
                    		<?php if ($idm->error_msg): ?>
                    		<div class="alert alert-danger">
                    			<?= $idm->error_msg ?>
                    		</div>
                    		<?php endif; ?>
                    		<div class="row">
                    			<div class="col-md-12">
                    				<div class="row">
                                        <div class="col-md-6">
                                    		<div class="row">
                                    			<div class="col-6 status-idm-kiri">
                                    				<div class="small-box primary-gradient">
                                                        <div class="inner">
                                                        	<h3><?= number_format($idm->SUMMARIES->SKOR_SAAT_INI, 4) ?></h3>
                                                        	<p>SKOR IDM SAAT INI</p>
                                                        </div>
                                                        <div class="icon">
                                                        	<i class="ion ion-stats-bars"></i>
                                                        </div>
                                    				</div>
                                    			</div>
                                    			<div class="col-6  status-idm-kiri status-idm-kanan">
                                    				<div class="small-box success-gradient">
                                                        <div class="inner">
                                                        	<h3><?= $idm->SUMMARIES->STATUS ?></h3>
                                                        	<p>STATUS IDM</p>
                                                        </div>
                                                        <div class="icon">
                                                        	<i class="ion-ios-pulse-strong"></i>
                                                        </div>
                                    				</div>
                                    			</div>
                                    			<div class="col-6 status-idm-kanan">
                                    				<div class="small-box danger-gradient">
                                                        <div class="inner">
                                                        	<h3><?= number_format($idm->SUMMARIES->SKOR_MINIMAL, 4) ?></h3>
                                                        	<p>SKOR MINIMAL</p>
                                                        </div>
                                                        <div class="icon">
                                                        	<i class="ion ion-ios-pie"></i>
                                                        </div>
                                    				</div>
                                    			</div>
                                    			<div class="col-6 status-idm-kiri status-idm-kanan">
                                    				<div class="small-box warning-gradient">
                                                        <div class="inner">
                                                        	<h3><?= $idm->SUMMARIES->TARGET_STATUS ?></h3>
                                                        	<p>TARGET STATUS</p>
                                                        </div>
                                                        <div class="icon">
                                                        	<i class="ion ion-arrow-graph-up-right"></i>
                                                        </div>
                                    				</div>
                                    			</div>
                                    		</div>
                                        	<!-- Tabel Data -->
                                    		<table class="table table-bordered table-striped dataTable table-hover">
                                    			<tbody>
                                    				<tr>
                                                        <th class="horizontal">TAHUN</th>
                                                        <td> : <?= $idm->SUMMARIES->TAHUN ?></td>
                                    				</tr>
                                    				<tr>
                                                        <th class="horizontal"><?= strtoupper($this->setting->sebutan_desa) ?></th>
                                                        <td> : <?= $idm->IDENTITAS[0]->nama_desa ?></td>
                                    				</tr>
                                    				<tr>
                                                        <th class="horizontal"><?= strtoupper($this->setting->sebutan_kecamatan) ?></th>
                                                        <td> : <?= $idm->IDENTITAS[0]->nama_kecamatan ?></td>
                                    				</tr>
                                    				<tr>
                                                        <th class="horizontal">KABUPATEN</th>
                                                        <td nowrap> : <?= $idm->IDENTITAS[0]->nama_kab_kota ?></td>
                                    				</tr>
                                    				<tr>
                                                        <th class="horizontal">PROVINSI</th>
                                                        <td> : <?= $idm->IDENTITAS[0]->nama_provinsi ?></td>
                                    				</tr>
                                    			</tbody>
                                    		</table>
                                    	</div>
                                        <div class="col-md-6">
                                        	<figure class="highcharts-figure">
                                        		<div id="container"></div>
                                        	</figure>
                                        </div>
                    				</div>
                    			</div>
                    		</div>
                    	</div>
                    </div>
                    <div class="row">
                    	<div class="col-sm-12">
                    		<div class="table-responsive">
                    			<table class="table table-bordered table-striped dataTable table-hover">
                    				<thead class="bg-gray color-palette">
                                        <tr>
                                        	<th rowspan="2" class="padat">NO</th>
                                        	<th rowspan="2" >INDIKATOR IDM</th>
                                        	<th rowspan="2" >SKOR</th>
                                        	<th rowspan="2" >KETERANGAN</th>
                                        	<th rowspan="2" nowrap>KEGIATAN YANG DAPAT DILAKUKAN</th>
                                        	<th rowspan="2" >+NILAI</th>
                                        	<th colspan="6" class="text-center">YANG DAPAT MELAKSANAKAN KEGIATAN</th>
                                        </tr>
                                        <tr>
                                        	<th>PUSAT</th>
                                        	<th>PROVINSI</th>
                                        	<th>KABUPATEN</th>
                                        	<th>DESA</th>
                                        	<th>CSR</th>
                                        	<th>LAINNYA</th>
                                        </tr>
                                    </thead>
                    				<tbody>
                                        <?php foreach ($idm->ROW as $data): ?>
                                       	<tr class="<?php empty($data->NO) and print('judul'); ?> ">
                                       		<td class="text-center"><?= $data->NO ?></td>
                                       		<td style="min-width: 150px;"><?= $data->INDIKATOR ?></td>
                                       		<td class="padat"><?= $data->SKOR ?></td>
                                       		<td style="min-width: 250px;"><?= $data->KETERANGAN ?></td>
                                       		<td><?= $data->KEGIATAN ?></td>
                                       		<td><?= $data->NILAI ?></td>
                                       		<td><?= $data->PUSAT ?></td>
                                       		<td><?= $data->PROV ?></td>
                                       		<td><?= $data->KAB ?></td>
                                       		<td><?= $data->DESA ?></td>
                                       		<td><?= $data->CSR ?></td>
                                       		<td><?= $data->SKOR[INDIKATOR['IKS 2021']] ?></td>
                                       	</tr>
                                        <?php endforeach; ?>
                    				</tbody>
                    			</table>
                    		</div>
                    	</div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
