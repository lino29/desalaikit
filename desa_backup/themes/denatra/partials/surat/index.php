<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!doctype html>
<html>
	<head>
		<title><?= ucwords($this->setting->sebutan_desa) . (($config['nama_desa']) ? ' ' . $config['nama_desa']: '') . get_dynamic_title_page_from_path(); ?></title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<meta name="description" content="<?= 'Verifikasi Surat '.ucwords($this->setting->sebutan_desa . ' ' . $config['nama_desa']).' '.ucwords($this->setting->sebutan_kecamatan . ' ' . $config['nama_kecamatan']).' '.ucwords($this->setting->sebutan_kabupaten . ' ' . $config['nama_kabupaten']).' Propinsi '.ucwords($config['nama_propinsi']);?>">
        <meta property='og:url' content="<?= site_url(); ?>" />
        <meta property="og:title" content="<?= "Surat " . $surat->perihal." a.n. " . $surat->nama_penduduk ?? $surat->nama_non_warga; ?>"/>
        <meta property='og:description' content="<?= 'Verifikasi Surat '.ucwords($this->setting->sebutan_desa . ' ' . $config['nama_desa']).' '.ucwords($this->setting->sebutan_kecamatan . ' ' . $config['nama_kecamatan']).' '.ucwords($this->setting->sebutan_kabupaten . ' ' . $config['nama_kabupaten']).' Propinsi '.ucwords($config['nama_propinsi']);?>" />
        <meta property="og:image" content="<?= gambar_desa($config['logo']); ?>"/>
		<?php if(is_file(LOKASI_LOGO_DESA . "favicon.ico")): ?>
		<link rel="icon" type="image/x-icon" href="<?= base_url()?><?= LOKASI_LOGO_DESA?>favicon.ico" />
		<?php else: ?>
		<link rel="icon" type="image/x-icon" href="<?= base_url()?>favicon.ico" />
		<?php endif; ?>
		<link href="https://fonts.googleapis.com/css?family=Red+Hat+Text:400,500&amp;display=swap" rel="stylesheet">
		<link rel="stylesheet" href="<?= base_url("$this->theme_folder/$this->theme/assets/css/verifikasi.css"); ?>">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="page-verify col-md-8 offset-md-2">
					<div class="text-center mb-3">
						<img src="<?= gambar_desa($config['logo']); ?>" height="80px">
						<h2 class="mb-2 mt-2">
						Verifikasi Surat
						<span class="d-block translation font-italic text-muted mt-2">
						Pemerintah <?= ucwords($this->setting->sebutan_kabupaten . ' ' . $config['nama_kabupaten']); ?><br/>
						<?= ucwords($this->setting->sebutan_kecamatan . ' ' . $config['nama_kecamatan']); ?><br/>
						<?= ucwords($this->setting->sebutan_desa . ' ' . $config['nama_desa']); ?>
						</span>
						</h2>
						<h4>Menyatakan bahwa:</h4>
					</div>
					<div class="entry p-5 mb-2">
						<span>Nomor Surat :</span><p class="font-weight-bold mb-0 text-break"><?= $surat->nomor_surat; ?></p>
						<small class="d-block font-italic text-break mb-2"><?= $this->uri->segment(2); ?></small>
						<span>Tanggal Surat :</span><p class="font-weight-bold mb-2 text-break"><?= tgl_indo($surat->tanggal); ?></p>
						<span>Perihal :</span>
						<p class="font-weight-bold mb-0 text-break"><?= "Surat " . $surat->perihal; ?></p>
						<p class="font-weight-bold mb-3 text-break"><?= "a.n. " . $surat->nama_penduduk ?? $surat->nama_non_warga; ?></p>
						<p class="mb-2">Ditandatangani oleh :</p>
						<div class="mt-0 px-3 py-4 bg-light radius">
							<div class="row">
								<div class="col-md-6">
									<div class="box-icon">
										<span class="icon">
											<svg focusable="false" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 32 32" aria-hidden="true"><path d="M16 4a5 5 0 11-5 5 5 5 0 015-5m0-2a7 7 0 107 7A7 7 0 0016 2zM26 30H24V25a5 5 0 00-5-5H13a5 5 0 00-5 5v5H6V25a7 7 0 017-7h6a7 7 0 017 7z"></path></svg>
										</span>
										<h3 class="h-400"><?= $surat->pamong_nama; ?></h3>
										<span class="text-muted d-block mt-3 font-weight-normal h-300">Jabatan :</span><p class="h-300"><?= $surat->pamong_jabatan; ?></p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="pl-5 pl-md-0">
										<span class="text-muted d-block font-weight-normal h-300">Pada Tanggal :</span><p class="h-300"><?= tgl_indo2($surat->tanggal); ?></p>
									</div>
								</div>
							</div>
						</div>
						<div class="text-center mt-2">
							<h4 class="font-weight-bolder h-500 mb-2">
								<span class="text-success icon2x icon">
									<svg focusable="false" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 32 32" aria-hidden="true"><path d="M16,2A14,14,0,1,0,30,16,14,14,0,0,0,16,2Zm0,26A12,12,0,1,1,28,16,12,12,0,0,1,16,28Z"></path><path d="M14 21.5L9 16.54 10.59 14.97 14 18.35 21.41 11 23 12.58 14 21.5z"></path></svg>
								</span>
								Adalah benar dan tercatat dalam database sistem informasi kami.
							</h4>
							<p class="small mb-0">Untuk memastikan kebenaran informasi ini pastikan URL pada browser anda adalah <?= $config['website']?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
