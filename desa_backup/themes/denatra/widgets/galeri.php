<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!-- widget Galeri-->
<div class="card mb-1">
	<div class="card-header border-bottom">
		<div class="media">
			<div class="media-body">
				<h4 class="content-color-primary mb-0"><i class="material-icons icon-sm">insert_photo</i> <a href="<?= site_url();?>galeri">Album Galeri</a></h4>
			</div>    
		</div>
	</div>
	<div class="card-body text-center">
		<?php foreach ($w_gal As $data): ?>
		<a href="<?= site_url("galeri/{$data['id']}") ?>" title="Album : <?= $data['nama'] ?>">
			<img class="mw-100 border mb-1" width="120" loading="lazy" src="<?= is_file(LOKASI_GALERI."sedang_{$data['gambar']}") == TRUE ? base_url() . LOKASI_GALERI."sedang_{$data['gambar']}" : base_url("$this->theme_folder/$this->theme/assets/image/noimage.png") ?>">
		</a>
		<?php endforeach; ?>
	</div>
</div>
