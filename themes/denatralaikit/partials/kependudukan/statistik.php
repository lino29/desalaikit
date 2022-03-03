<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<script type="text/javascript">
	let chart;
	const rawData = Object.values(<?= json_encode($stat) ?>);
	const type = '<?= $tipe == 1 ? 'column' : 'pie' ?>';
	const legend = Boolean(!<?= ($tipe) ?>);
	let categories = [];
	let data = [];
	let i = 1;
	let status_tampilkan = true;
	for (const stat of rawData) {
		if (stat.nama !== 'TOTAL' && stat.nama !== 'JUMLAH' && stat.nama != 'PENERIMA') {
			let filteredData = [stat.nama, parseInt(stat.jumlah)];
			categories.push(i);
			data.push(filteredData);
			i++;
		}
	}

	function tampilkan_nol(tampilkan = false) {
		if (tampilkan) {
			$(".nol").parent().show();
		} else {
			$(".nol").parent().hide();
		}
	}

	function toggle_tampilkan() {
		$('#showData').click();
		tampilkan_nol(status_tampilkan);
		status_tampilkan = !status_tampilkan;
		if (status_tampilkan) $('#tampilkan').text('Tampilkan Nol');
		else $('#tampilkan').text('Sembunyikan Nol');
	}

	function switchType(){
		var chartType = chart_penduduk.series[0].type;
		chart_penduduk.series[0].update({
			type: (chartType === 'pie') ? 'column' : 'pie'
		});
	}

	$(document).ready(function () {
		tampilkan_nol(false);
		if (<?=$this->setting->statistik_chart_3d?>) {
			chart_penduduk = new Highcharts.Chart({
				chart: {
					renderTo: 'container',
					options3d: {
						enabled: true,
						alpha: 45
					}
				},
				title: 0,
				yAxis: {
					showEmpty: false,
				},
				xAxis: {
					categories: categories,
				},
				plotOptions: {
					series: {
						colorByPoint: true
					},
					column: {
						pointPadding: -0.1,
						borderWidth: 0,
						showInLegend: false,
						depth: 45
					},
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						showInLegend: true,
						depth: 45,
						innerSize: 70
					}
				},
				legend: {
					enabled: legend
				},
				series: [{
					type: type,
					name: 'Jumlah Populasi',
					shadow: 1,
					border: 1,
					data: data
				}]
			});
		} else {
			chart_penduduk = new Highcharts.Chart({
				chart: {
					renderTo: 'container'
				},
				title: 0,
				yAxis: {
					showEmpty: false,
				},
				xAxis: {
					categories: categories,
				},
				plotOptions: {
					series: {
						colorByPoint: true
					},
					column: {
						pointPadding: -0.1,
						borderWidth: 0,
						showInLegend: false,
					},
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						showInLegend: true,
					}
				},
				legend: {
					enabled: legend
				},
				series: [{
					type: type,
					name: 'Jumlah Populasi',
					shadow: 1,
					border: 1,
					data: data
				}]
			});
		}

		$('#showData').click(function () {
			$('tr.lebih').show();
			$('#showData').hide();
			tampilkan_nol(false);
		});

	});
</script>
<!-- TODO: Pindahkan ke external css -->
<style>
	tr.lebih {
		display: none;
	}
	
	.input-sm {
		padding: 4px 4px;
	}

	@media (max-width:780px) {
		.btn-group-vertical {
			display: block;
		}
	}

	.table-responsive {
		min-height:275px;
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
					<h6 class="my-0 content-color-primary">Grafik <?= $heading ?></h6>
					<p class="small mb-0">
						<i class="material-icons icon-sm">local_offer</i> <?= ucwords($this->setting->sebutan_desa)." ".$desa["nama_desa"]?>
					</p>
				</div>
				<a class="btn btn-primary btn-xs text-white" onclick="switchType();">Ubah Grafik</a>
			</div>
		</div>
		<div class="card-body">
			<div class="mb-0 content-color-secondary">
				<div id="container"></div>
				<div id="contentpane">
					<div class="ui-layout-north panel top"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php if ($this->setting->daftar_penerima_bantuan):?>
<?php if (in_array($st, array('bantuan_keluarga', 'bantuan_penduduk'))):?>
<section class="content" id="maincontent">
	<div class="card mb-1 fullscreen has-background-img ">
		<input id="stat" type="hidden" value="<?=$st?>">
		<div class="card-header border-bottom">
			<div class="media">
				<div class="icon-circle icon-40 bg-light-primary mr-3">
					<i class="material-icons">view_day</i>
				</div>
				<div class="media-body">
					<h6 class="my-0 content-color-primary">Daftar <?= $heading ?></h6>
					<p class="small mb-0">
						<i class="material-icons icon-sm">local_offer</i> <?= ucwords($this->setting->sebutan_desa)." ".$desa["nama_desa"]?>
					</p>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="mb-0 content-color-secondary">
				<div class="table-responsive">
					<table class="table table-striped table-bordered" id="peserta_program">
						<thead>
							<tr>
								<th>No</th>
								<th>Program</th>
								<th>Nama Peserta</th>
								<th>Alamat</th>
							</tr>
						</thead>
						<tfoot>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
$(document).ready(function() {
	var url = "<?= site_url('first/ajax_peserta_program_bantuan')?>";
	table = $('#peserta_program').DataTable({
		'processing': true,
		'serverSide': true,
		"pageLength": 25,
		'order': [],
		"ajax": {
			"url": url,
			"type": "POST",
			"data": {stat: $('#stat').val()}
		},
		//Set column definition initialisation properties.
		"columnDefs": [
			{
				"targets": [ 0, 3 ], //first column / numbering column
				"orderable": false, //set not orderable
			},
		],
		'language': {
			'url': BASE_URL + '/assets/bootstrap/js/dataTables.indonesian.lang'
		},
		'drawCallback': function (){
			$('.dataTables_paginate > .pagination').addClass('pagination-sm no-margin');
		}
	});
} );
</script>
<?php endif;?>
<?php endif;?>
<div class="card mb-1 fullscreen has-background-img ">
	<div class="card-header border-bottom">
		<div class="media">
			<div class="icon-circle icon-40 bg-light-primary mr-3">
				<i class="material-icons">view_day</i>
			</div>
			<div class="media-body">
				<h6 class="my-0 content-color-primary">Tabel <?= $heading ?></h6>
				<p class="small mb-0">
					<i class="material-icons icon-sm">local_offer</i> <?= ucwords($this->setting->sebutan_desa)." ".$desa["nama_desa"]?>
				</p>
			</div>
			<a href="javascript:void(0);" class="icon-circle icon-30 content-color-secondary fullscreenbtn">
				<i class="material-icons ">crop_free</i>
			</a>
		</div>
	</div>
    <div class="card-body">
        <div class="mb-0 content-color-secondary">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th rowspan="2">No</th>
                        <th rowspan="2" style='text-align:left;'>Kelompok</th>
                        <th colspan="2" style='text-align:center'>Jumlah</th>
                        <th colspan="2" style='text-align:center'>Laki-laki</th>
                        <th colspan="2" style='text-align:center'>Perempuan</th>
                    </tr>
                    <tr>
                        <th style='text-align:center'>n</th><th style='text-align:center'>%</th>
                        <th style='text-align:center'>n</th><th style='text-align:center'>%</th>
                        <th style='text-align:center'>n</th><th style='text-align:center'>%</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; $l=0; $p=0; $hide=""; $h=0; $jm1=1; $jm = count($stat);?>
                        <?php foreach ($stat as $data):?>
                        <?php $jm1++; if (1):?>
                        <?php $h++; if ($h > 12 AND $jm > 10): $hide="lebih"; ?>
                        <?php endif;?>
                        <tr class="<?=$hide?>">
                            <td class="angka">
                                <?php if ($jm1 > $jm - 2):?>
                                <?=$data['no']?>
                                <?php else:?>
                                <?=$h?>
                                <?php endif;?>
                            </td>
                            <td><?=$data['nama']?></td>
                            <td class="angka <?php ($jm1 <= $jm - 2) and ($data['jumlah'] == 0) and print('nol')?>" style='text-align:center'><?=$data['jumlah']?></td>
                            <td class="angka" style='text-align:center'><?=$data['persen']?></td>
                            <td class="angka" style='text-align:center'><?=$data['laki']?></td>
                            <td class="angka" style='text-align:center'><?=$data['persen1']?></td>
                            <td class="angka" style='text-align:center'><?=$data['perempuan']?></td>
                            <td class="angka" style='text-align:center'><?=$data['persen2']?></td>
                        </tr>
                        <?php $i += $data['jumlah'];?>
                        <?php $l += $data['laki']; $p += $data['perempuan'];?>
                        <?php endif;?>
                        <?php endforeach;?>
                    </tbody>
                </table>
                <?php if($hide=="lebih"):?>
                <div style='float: left;'>
                    <button class='btn btn-sm btn-purple pink-gradient' id='showData'>Selengkapnya...</button>
                </div>
                <?php endif;?>
                <div style="float: right;">
                    <button id='tampilkan' onclick="toggle_tampilkan();" class="btn btn-sm btn-purple pink-gradient">Tampilkan Nol</button>
                </div>
            </div>
        </div>
    </div>
</div>
