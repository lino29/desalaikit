<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="row">
	<div class="container-fluid mt-0 main-container z-index-1">
		<div class="row no-gutters box-shadow-large mb-1 bg-white rounded has-background-img mt-0">
			<div class="col-12 col-md-6 col-lg-7 has-background-img min-height-300 text-hide-xs">
				<div class="background-img pink-gradient">
					<div class="align-self-center text-center mt-4">
						<div class="logo-img-loader">
							<img src="<?= gambar_desa($desa['logo']);?>" alt="" class="logo-image">
						</div>
						<h2 class="mt-3 font-weight-light text-white">Layanan Mandiri</h2>
						<p class="mt-0 text-white">Warga dapat membuat Permohonan Surat Keterangan melalui Website Desa.</p>
						<p class="mt-0 text-white">Silakan hubungi operator desa untuk mendapatkan kode PIN anda.</p>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-6 col-lg-5 card mb-0 fullscreen">
				<?php if(!isset($_SESSION['mandiri']) OR $_SESSION['mandiri']<>1): ?>
				<div class="container mt-2 main-container">
					<div class="media">
						<div class="media-body">
							<h4 class="content-color-primary mb-0">Layanan Mandiri</h4><hr>
						</div>
					</div>
					<div class="row">
						<div class="col-12 col-md-12">
							<div class="card mb-3">
								<div class="card-body">
									<div class="tab-pane fade show active" id="tablogin" role="tabpanel" aria-labelledby="tablogin-tab">
										<form class="contact_form" action="<?= site_url('layanan-mandiri/cek'); ?>" method="post">
											<?php if ($this->session->mandiri_wait == 1): ?>
											<div class="alert alert-warning mt-1 text-center" role="alert">
												<p id="countdown" style="color:red; text-transform:uppercase"></p>
											</div>
											<?php else: ?>
											<?php $data = $this->session->flashdata('notif'); ?>
											<input style="margin-bottom:8px;" autocomplete="cc-csc" name="nik" type="text" placeholder="Ketik Nomor KTP" maxlength="16" class="form-control" value="" required>
											<input style="margin-bottom:8px;" autocomplete="cc-number" name="pin" type="password" placeholder="Ketik Kode PIN" id="pin" value="" maxlength="6" class="form-control" required>
											<div class="form-group">
												<center><input type="checkbox" id="checkbox"> Tampilkan PIN</center>
											</div>
											<button type="submit" class="btn btn-primary btn-block">Masuk</button>
											<?php endif; ?>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>      
				<?php else: ?>
				<div class="card-header border-bottom">
					<div class="media">
						<div class="media-body">
							<h4 class="content-color-primary mb-0">Menu Layanan</h4>
						</div>    
					</div>
				</div>
				<div class="card-body text-center">
					<a href="<?= site_url('layanan-mandiri/profil'); ?>"><button type="button" class="btn btn-primary btn-block mb-2">PROFIL</button></a>
					<a href="<?= site_url('layanan-mandiri/pesan-masuk'); ?>"><button type="button" class="btn btn-primary btn-block mb-2">KOTAK PESAN</button></a>
					<a href="<?= site_url('layanan-mandiri/surat/buat');  ?>"><button type="button" class="btn btn-primary btn-block mb-2">PERMOHONAN SURAT</button></a>
					<a href="<?= site_url('layanan-mandiri'); ?>" class="btn btn-danger btn-block mb-2" rel="noopener noreferrer" target="_top">MASUK HALAMAN</a>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	
	<?php if ($w_cos): ?>
	<?php foreach ($w_cos as $data): ?>
	<?php $widget = trim($data['isi']) ?>
	<?php if ($data["jenis_widget"] == 1): ?>
	<?php if ($data["isi"] == "komentar.php"): ?>
	<div class="col-12 col-lg-4 col-md-4">
		<?php include("$this->theme_folder/$this->theme/widgets/".$widget); ?>
	</div>
	<?php endif; ?>
	
	<?php if ($data["isi"] == "peta_lokasi_kantor.php"): ?>
	<div class="col-12 col-lg-4 col-md-4">
		<?php include("$this->theme_folder/$this->theme/widgets/".$widget); ?>
	</div>
	<?php endif; ?>
	
	<?php if ($data["isi"] == "peta_wilayah_desa.php"): ?>
	<div class="col-12 col-lg-4 col-md-4">
		<?php include("$this->theme_folder/$this->theme/widgets/".$widget); ?>
	</div>
	<?php endif; ?>
	<?php if ($data["isi"] == "statistik.php"): ?>
	<div class="col-12 col-md-12 mb-1">
		<section id="section-penduduk" class="rounded pink-gradient p-4">
			<div class="container-fluid overflow-hidden">
				<div class="row justify-content-between">
					<div class="col-12 text-center mb-2 text-light align-items-center">
						<div>
							<h4 class="my-title-mini text-center">DATA PENDUDUK</h4>
						</div>
					</div>
					<div class="col-12 text-center">
						<div class="row">
							<?php $i=0; ?>
							<?php foreach ($stat_widget as $data): ?>
							<?php if ($data['jumlah'] != "-" AND $data['nama']!= "JUMLAH"): ?>
							<div class="col-4">
								<i class="fa <?php if($i==0){ echo "fa-male"; } elseif($i==1){ echo "fa-female"; } elseif($i==2) { echo "fa-users"; } elseif($i==3) { echo "fa-user-times"; } ?> fa-2x"></i>
								<h3 class="font-weight-bold mt-1 text-dark-me"><span id="count-<?= $i ?>"><?= $data['jumlah']?></span></h3>
								<p class="text-gray text-hide-xs"><?= $data['nama']?></p>
							</div>
							<?php $i++; ?>
							<?php endif; ?>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<?php endif; ?>
	<?php endif; ?>
	<?php endforeach; ?>
	<?php endif; ?>
</div>
<script type="text/javascript">
$('document').ready(function() {
	var pass = $("#pin");
	$('#checkbox').click(function() {
		if (pass.attr('type') === "password") {
			pass.attr('type', 'text');
		} else {
			pass.attr('type', 'password')
		}
	});
	if ($('#countdown').length) {
		start_countdown();
	}
	window.setTimeout(function() {
		$("#notif").fadeTo(500, 0).slideUp(500, function(){
			$(this).remove();
		});
	}, 5000);
});
function start_countdown() {
	var times = eval(<?= json_encode($this->session->mandiri_timeout)?>) - eval(<?= json_encode(time())?>);
	var menit = Math.floor(times / 60);
	var detik = times % 60;
	timer = setInterval(function() {
		detik--;
		if (detik <= 0 && menit >=1) {
			detik = 60;
			menit--;
		}
		if (menit <= 0 && detik <= 0) {
			clearInterval(timer);
			location.reload();
		} else {
			document.getElementById("countdown").innerHTML = "<b>Gagal 3 kali silakan coba kembali dalam " + menit + " MENIT " + detik + " DETIK </b>";
		}
	}, 500);
}
</script>
