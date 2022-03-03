<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="card mb-1 z-index-1">
	<div class="card-header p-0">
		<ul class="nav nav-tabs wizard-1" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="tabmaps-tab" data-toggle="tab" href="#tabmaps" role="tab" aria-controls="tabmaps" aria-selected="true">
					<span>Lokasi Kantor Desa</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="tabdetail-tab" data-toggle="tab" href="#tabdetail" role="tab" aria-controls="tabdetail" aria-selected="false">
					<span>Detail</span>
				</a>
			</li>
		</ul>
	</div>
	<div class="card-body">
		<div class="tab-content">
			<div class="tab-pane fade show active" id="tabmaps" role="tabpanel" aria-labelledby="tabmaps-tab">
				<div id="map_canvas" style="height:200px;"></div>
				<a href="https://www.google.com/maps/dir//<?=$data_config['lat'].",".$data_config['lng']?>" rel="noopener noreferrer" target="_blank">
					<button class="btn btn-success btn-block mb-1 mt-1">Titik Lokasi</button>
				</a>
			</div>
			<div class="tab-pane fade" id="tabdetail" role="tabpanel" aria-labelledby="tabdetail-tab">
				<?php if (is_file(FCPATH . LOKASI_LOGO_DESA . $desa['kantor_desa'])): ?>
				<a data-fancybox="gallery" href="<?=gambar_desa($desa['kantor_desa'], TRUE)?>">
				    <img src="<?=gambar_desa($desa['kantor_desa'], TRUE)?>" width="100%" class="img-responsive cover" style="float:left; margin:0px 0px 0px 0px;">
				</a>
				<?php endif; ?>
				<div class="info-desa">
					<table width="100%">
						<tr style="border-bottom: 1px solid #ddd;">
							<td class="label-info-desa" width="25%" height="30px">Alamat</td>
							<td width="5%" class="text-center">:</td>
							<td class="isi-info-desa" width="70%"><?php echo $desa['alamat_kantor']?></td>
						</tr>
						<tr style="border-bottom: 1px solid #ddd;">
							<td class="label-info-desa" width="25%" height="30px"><?php echo ucwords($this->setting->sebutan_desa)." "?></td>
							<td width="5%" class="text-center">:</td>
							<td class="isi-info-desa" width="70%" height="30px"><?php echo $desa['nama_desa']?></td>
						</tr>
						<tr style="border-bottom: 1px solid #ddd;">
							<td class="label-info-desa" width="25%" height="30px"><?php echo ucwords($this->setting->sebutan_kecamatan)?></td>
							<td width="5%" class="text-center">:</td>
							<td class="isi-info-desa" width="70%" height="30px"><?php echo $desa['nama_kecamatan']?></td>
						</tr>
						<tr style="border-bottom: 1px solid #ddd;">
							<td class="label-info-desa" width="25%" height="30px"><?php echo ucwords($this->setting->sebutan_kabupaten)?></td>
							<td width="5%" class="text-center">:</td>
							<td class="isi-info-desa" width="70%" height="30px"><?php echo $desa['nama_kabupaten']?></td>
						</tr>
						<tr style="border-bottom: 1px solid #ddd;">
							<td class="label-info-desa" width="25%" height="30px">Kodepos</td>
							<td width="5%" class="text-center">:</td>
							<td class="isi-info-desa" width="70%" height="30px"><?php echo $desa['kode_pos']?></td>
						</tr>
						<tr style="border-bottom: 1px solid #ddd;">
							<td class="label-info-desa" width="25%" height="30px">Telepon</td>
							<td width="5%" class="text-center">:</td>
							<td class="isi-info-desa" width="70%" height="30px"><?php echo $desa['telepon']?></td>
						</tr>
						<tr>
							<td class="label-info-desa" width="25%" height="30px">Email</td>
							<td width="5%" class="text-center">:</td>
							<td class="isi-info-desa" width="70%" height="30px"><?php echo $desa['email_desa']?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	//Jika posisi kantor desa belum ada, maka posisi peta akan menampilkan seluruh Indonesia
	<?php if (!empty($data_config['lat']) && !empty($data_config['lng'])): ?>
	var posisi = [<?=$data_config['lat'].",".$data_config['lng']?>];
	var zoom = <?=$data_config['zoom'] ?: 10?>;
	<?php else: ?>
		var posisi = [-1.0546279422758742,116.71875000000001];
		var zoom = 10;
	<?php endif; ?>

	var lokasi_kantor = L.map('map_canvas').setView(posisi, zoom);

	//Menampilkan BaseLayers Peta
	var baseLayers = getBaseLayers(lokasi_kantor, '<?= $this->setting->mapbox_key; ?>');
	L.control.layers(baseLayers, null, {position: 'topright', collapsed: true}).addTo(lokasi_kantor);

	//Jika posisi kantor desa belum ada, maka posisi peta akan menampilkan seluruh Indonesia
	<?php if (!empty($data_config['lat']) && !empty($data_config['lng'])): ?>
	var kantor_desa = L.marker(posisi).addTo(lokasi_kantor);
	<?php endif; ?>
</script>
