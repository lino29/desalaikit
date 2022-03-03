<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="mt-0 mb-1 z-index-2">
    <div class="card-header pink-gradient font-weight-bold text-center">
        Pembangunan <?= ucwords($this->setting->sebutan_desa); ?>
    </div>
	<div class="card mb-0 fullscreen has-background-img">
        <div class="container-fluid">
			<?php if ($pembangunan): ?>
			<div class="row">
				<?php foreach ($pembangunan as $data): ?>
				<div class="col-12 col-lg-4 col-md-4 order-2 order-md-1">
					<div class="card mb-2 mt-2">
						<div class="card-header border-bottom">
							<div class="media">
								<div class="media-body">
									<h4 class="mb-0 header-color-primary"><?= $data->judul ?></h4>
								</div>
							</div>
						</div>
						<a data-fancybox="gallery" href="<?= base_url() . LOKASI_GALERI . $data->foto; ?>">
							<img class="mw-100" height="200" loading="lazy" src="<?= is_file(LOKASI_GALERI . $data->foto) == TRUE ? base_url() . LOKASI_GALERI . $data->foto : base_url("$this->theme_folder/$this->theme/assets/image/noimage.png") ?>">
						</a>
						<div class="table-responsive">
							<table class="table table-striped">
								<tbody>
									<tr><td>Lokasi</td><td>:</td><td><?= ($data->alamat == "=== Lokasi Tidak Ditemukan ===") ? 'Lokasi tidak diketahui' : $data->alamat; ?></td></tr>
									<tr><td>Volume</td><td>:</td><td><?= $data->volume ?></td></tr>
									<tr><td>Anggaran</td><td>:</td><td>Rp. <?= number_format($data->anggaran,0) ?></td></tr>
									<tr><td>Tahun</td><td>:</td><td><?= $data->tahun_anggaran ?></td></tr>
								</tbody>
							</table>
						</div>
						<div class="card-body">
							<div class="d-flex justify-content-between align-items-center">
								<div class="btn-group">
								    <a class="btn btn-sm btn-danger" href="https://www.google.com/maps/dir//<?= $data->lat?>,<?= $data->lng?>" rel="noopener noreferrer" target="_blank" title="Titik Lokasi"><i class="fa fa-map-marker"></i> Titik Lokasi</a>
									<a href="<?= site_url("pembangunan/{$data->slug}"); ?>" class="btn btn-sm btn-primary text-white" title="Selengkapnya"><i class="fa fa-map"></i> Selengkapnya</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
			<?php $this->load->view("$folder_themes/commons/paging"); ?>
			<?php else: ?>
			<div class="font-weight-bold text-center mt-4 mb-4">
				<h5>Data pembangunan belum tersedia pada halaman ini.</h5>
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>
