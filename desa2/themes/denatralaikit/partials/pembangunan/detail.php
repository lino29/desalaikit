<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="mt-0 mb-1 z-index-2">
    <div class="card-header pink-gradient font-weight-bold text-center">
        Detail Pembangunan
    </div>
    <?php if($pembangunan) : ?>
	<div id="printableArea" class="card mb-0 fullscreen has-background-img">
		<div class="row">
			<div class="col-12 col-lg-6 col-md-6">
				<div class="card-header border-bottom">
					<div class="media">
						<div class="icon-circle icon-40 bg-light-primary mr-3">
							<i class="material-icons">account_balance</i>
						</div>
						<div class="media-body">
							<h6 class="my-0 content-color-primary"><?= $pembangunan->judul ?></h6>
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
					<a data-fancybox="gallery" href="<?= base_url() . LOKASI_GALERI . $pembangunan->foto; ?>">
						<img title="<?= $pembangunan->keterangan; ?>" class="img-fluid border mb-1" height="200" loading="lazy" src="<?= is_file(LOKASI_GALERI . $pembangunan->foto) == TRUE ? base_url() . LOKASI_GALERI . $pembangunan->foto : base_url("$this->theme_folder/$this->theme/assets/image/noimage.png") ?>">
					</a>
					<div class="table-responsive">
						<table class="table table-striped">
							<tbody>
								<tr><td>Nama Kegiatan</td><td>:</td><td><?= $pembangunan->judul ?></td></tr>
								<tr><td>Lokasi</td><td>:</td><td><?= ($pembangunan->alamat == "=== Lokasi Tidak Ditemukan ===") ? 'Lokasi tidak diketahui' : $pembangunan->alamat; ?></td></tr>
								<tr><td>Anggaran</td><td>:</td><td>Rp. <?= number_format($pembangunan->anggaran,0) ?></td></tr>
								<tr><td>Volume</td><td>:</td><td><?= $pembangunan->volume ?></td></tr>
								<tr><td>Sumber Dana</td><td>:</td><td><?= $pembangunan->sumber_dana ?></td></tr>
								<tr><td>Tahun</td><td>:</td><td><?= $pembangunan->tahun_anggaran ?></td></tr>
								<tr><td>Pelaksana</td><td>:</td><td><?= $pembangunan->pelaksana_kegiatan ?></td></tr>
								<tr><td>Manfaat</td><td>:</td><td><?= $pembangunan->manfaat ?></td></tr>
								<tr><td>Keterangan</td><td>:</td><td><?= $pembangunan->keterangan ?></td></tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-6 col-md-6">
				<div class="card-header border-bottom">
					<div class="media">
						<div class="icon-circle icon-40 bg-light-primary mr-3">
							<i class="material-icons">account_balance</i>
						</div>
						<div class="media-body">
							<h6 class="my-0 content-color-primary">Progres Pembangunan</h6>
							<p class="small mb-0">
								<i class="material-icons icon-sm">local_offer</i> <?= $pembangunan->judul ?>
							</p>
						</div>
						<a class="btn btn-sm btn-info" href="<?= site_url(); ?>pembangunan">Kembali</a>
					</div>
				</div>
				<div class="card-body">
					<div class="row">
						<?php if ($dokumentasi): ?>
						<?php foreach ($dokumentasi as $value): ?>
						<div class="col-12 col-lg-6 col-md-6 text-center">
							<a data-fancybox="gallery" href="<?= base_url() . LOKASI_GALERI . $value->gambar; ?>">
								<img title="<?= $value->keterangan; ?>" class="img-fluid border mb-1" loading="lazy" src="<?= is_file(LOKASI_GALERI . $value->gambar) == TRUE ? base_url() . LOKASI_GALERI . $value->gambar : base_url("$this->theme_folder/$this->theme/assets/image/noimage.png") ?>">
							</a><br>
							<b><?= $value->persentase; ?></b>
						</div>
						<?php endforeach; ?>
						<?php else: ?>
						<div class="col-12 text-center">
							<b>Belum ada progres.</b>
						</div>
						<?php endif; ?>
					</div>
				</div>
				<div class="card-header border-bottom">
					<div class="media">
						<div class="media-body">
							<h4 class="my-0 content-color-primary">Lokasi Pembangunan</h4>
						</div>
						<a class="btn btn-sm btn-danger" href="https://www.google.com/maps/dir//<?= $pembangunan->lat?>,<?= $pembangunan->lng?>" rel="noopener noreferrer" target="_blank" title="Titik Lokasi"><i class="fa fa-map-marker"></i> Titik Lokasi</a>
					</div>
				</div>
				<div class="card-body">				
					<div id="map" class="z-index-1" style="height: 340px;"></div>
				</div>
			</div>
			<?php
			$share = ['link' => site_url('pembangunan/' . $pembangunan->slug), 'judul' => $pembangunan->judul, ];
			$this->load->view("$folder_themes/commons/share", $share);
			?>
		</div>
        <script type="text/javascript">
        	$(document).ready(function() {
        		let map_key = "<?= $this->setting->mapbox_key; ?>";
        		let lat = "<?= $pembangunan->lat ?? $desa['lat']; ?>";
        		let lng = "<?= $pembangunan->lng ?? $desa['lng']; ?>";
        		let posisi = [lat, lng];
        		let zoom = 15;
        		let logo = L.icon({
        			iconUrl: "<?= base_url('assets/images/gis/point/construction.png'); ?>",
                    iconSize: [25, 25],
                    shadowSize: [25, 32],
                    iconAnchor: [20, 20],
                    shadowAnchor: [5, 5],
                    popupAnchor: [0, 0]
            });
        		pembangunan = L.map('map').setView(posisi, zoom);
        		baseLayers = getBaseLayers(pembangunan, map_key);
        		pembangunan.addLayer(new L.Marker(posisi, {icon:logo}));
        		L.control.layers(baseLayers, null, {position: 'topright', collapsed: true}).addTo(pembangunan);
        	});
        </script>
	</div>
    <?php else: ?>
    <div class="font-weight-bold text-center mt-4 mb-4">
        <h5>Belum ada pembangunan pada halaman ini.</h5>
    </div>
    <?php endif; ?>
</div>
