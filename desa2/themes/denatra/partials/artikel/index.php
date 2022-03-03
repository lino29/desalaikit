<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php
$title = (!empty($judul_kategori))? $judul_kategori: 'Artikel Terkini';
$slug = 'terkini';
if(is_array($title)){
	$slug = $title['slug'];
	$title = $title['kategori'];
}
?>
<div class="row">
	<div class="container<?= config_item('fluid') ? '-fluid' : '' ?> main-container text-center mt-0 mb-2">
		<div class="card fullscreen pink-gradient">
			<h5 class="mt-2 mb-2"><b><?= $title ?></b></h5>
		</div>
	</div>
	<?php if ($artikel): ?>
	<div class="container<?= config_item('fluid') ? '-fluid' : '' ?> main-container mt-0">
		<div class="row">
			<?php foreach ($artikel as $data): ?>
			<?php $url = site_url('artikel/'.buat_slug($data)) ?>
			<?php $abstract = potong_teks(strip_tags($data['isi']), 300) ?>
			<?php $image = ($data['gambar'] && is_file(LOKASI_FOTO_ARTIKEL.'sedang_'.$data['gambar'])) ? AmbilFotoArtikel($data['gambar'],'sedang') : base_url("$this->theme_folder/$this->theme/assets/image/noimage.png"); ?>
			<div class="col-12 <?= config_item('fluid') ? 'col-lg-4 col-md-4' : 'col-lg-6 col-md-6' ?>">
				<div class="card mb-1">
					<a href="<?= $url ?>" title="Baca Selengkapnya">
						<div class="background-img blog-header-img" style="<?= config_item('fluid') ? 'max-height:220px' : 'max-height:300px' ?>">
							<img src="<?= $image ?>" class="<?php $image !== base_url("$this->theme_folder/$this->theme/assets/image/noimage.png") and print('img-responsive cover img-fluid opacity-100') ?>">
						</div>
					</a>
					<div class="card-header border-bottom" style="min-height:85px">
						<div class="media">
							<div class="icon-circle icon-40 bg-light-primary mr-3">
								<i class="material-icons">fingerprint</i>
							</div>
							<div class="media-body">
								<h6 class="my-0 content-color-primary"><a href="<?= site_url('artikel/'.buat_slug($data))?>" title="Baca Selengkapnya"><?= $data["judul"] ?></a></h6>
								<p class="small mb-0">
									<i class="fa fa-calendar" aria-hidden="true"></i> <?= tjs($data['tgl_upload'],'s');?>
									<i class="fa fa-user" aria-hidden="true"></i> <?= $data['owner'] ?>
								</p>
							</div>
						</div>
					</div>
					<div class="card-body text-hide-xs" style="min-height:100px">
						<div class="mb-0">
							<p align="justify"><?= $abstract ?> ...</p>
						</div>
					</div>
					<div class="card-footer border-top">
						<div class="row">
							<div class="col">
								<div class="media">
									<div class="media-body">
										<p class="content-color-secondary mb-0 small">
											<i class="material-icons icon-sm">chat</i> <?= number_format($this->db->query("SELECT * FROM komentar WHERE id_artikel = '".$data['id']."' AND status ='1'")->num_rows(),0,',','.') ?> Komentar
											<?php if (trim($data['kategori']) != '') : ?>
											<i class="fa fa-flag" aria-hidden="true"></i> <?= $data['kategori']?>
											<?php endif; ?>
										</p>
									</div>
								</div>
							</div>
							<div class="text-right pr-3">
								<div class="media">
									<div class="media-body">
										<p class="content-color-secondary mb-0 small">
											<i class="fa fa-heart" aria-hidden="true"></i> <?= hit($data['hit']) ?>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
	<?php else: ?>	
	<div class="container main-container h-100">
		<div class="row align-items-center ">
			<div class="col-12 mx-auto text-center">
				<img src="<?= base_url("$this->theme_folder/$this->theme/assets/img/404.svg") ?>" alt="" class="mw-100 mt-2">
				<h2 class="text-black">404! HALAMAN BELUM TERSEDIA</h2>
				<p class="lead mb-4 text-black">Maaf, halaman ini belum tersedia atau sedang dalam perbaikan.</p>
			</div>
		</div>
	</div>
	<?php endif; ?>
</div>
