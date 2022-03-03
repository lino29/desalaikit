<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php
$page1 = $this->uri->segment(1);
$page2 = $this->uri->segment(2); // Yg masih menggunakan first
$page5 = $this->uri->segment(5); // SLUG Artikel struktur-organisasi
$page6 = $this->uri->segment(6); // Yg masih menggunakan first struktur-organisasi
$layout = 'right-widget'; // Pilihan right-widget, left-widget, dan full-width
switch (true) {
// Halaman artikel
case ($page5 == 'struktur-organisasi' || $page6 == 'struktur-organisasi'):
	$tampil = 'artikel/detail';
	$layout = 'full-width';
	break;

case ($page1 == 'artikel' && $page2 == 'kategori'):
	$tampil = 'artikel/index';
	$layout = 'full-width';
	break;

case ($page1 == 'artikel' || $page2 == 'artikel'):
	$tampil = 'artikel/detail';
	break;

case ($page1 == 'arsip' || $page2 == 'arsip'):
	$tampil = 'artikel/arsip';
	break;

// Halaman kelompok
case ($page1 == 'data-kelompok' || $page2 == 'kelompok'):
	$tampil = 'kependudukan/kelompok';
	break;

// Halaman suplemen
case ($page1 == 'data-suplemen' || $page2 == 'suplemen'):
	$tampil = 'kependudukan/suplemen';
	break;

// Halaman analisis
case ($page1 == 'data_analisis' || $page2 == 'data_analisis'):
	$tampil = 'analisis/index';
	break;

case ($page1 == 'jawaban_analisis' || $page2 == 'jawaban_analisis'):
	$tampil = 'analisis/detail';
	break;

// Halaman statistik
case (in_array($page1, ['data-wilayah']) || in_array($page2, ['statistik', 'wilayah', 'dpt'])):
	$tampil = 'kependudukan/index';
	$data['tipe'] = $tipe;
	$layout = 'full-width';
	break;

// Halaman galeri
case ($page1 == 'galeri' && $page2 != '' || $page2 == 'sub_gallery'):
	$tampil = 'galeri/detail';
	break;

case ($page1 == 'galeri' || $page2 == 'gallery'):
	$tampil = 'galeri/index';
	break;

// Halaman statis
case ($page1 == 'peta' || $page2 == 'peta'):
	$tampil = 'halaman_statis/index';
	$data['halaman_statis'] = $halaman_peta;
	$layout = 'full-width';
	break;

case ($page1 == 'peraturan_desa' || $page2 == 'peraturan_desa'):
	$tampil = 'halaman_statis/peraturan_desa';
	break;
				
case ($page1 == 'informasi_publik' || $page2 == 'informasi_publik'):
	$tampil = 'halaman_statis/informasi_publik';
	break;

case ($page1 == 'status-idm' || $page2 == 'status_idm'):
	$tampil = 'halaman_statis/status_idm';
	$layout = 'full-width';
	break;
				
case ($page1 == 'status-sdgs' || $page2 == 'status_sdgs'):
	$tampil = 'halaman_statis/status_sdgs';
	$layout = 'full-width';
	break;

default:
	$tampil = 'artikel/index';
	$layout = 'full-width';
	break;
}

if(IS_PREMIUM) :
switch (true) {
case ($page1 == 'lapak'):
	$tampil = 'lapak/index';
	$layout = 'full-width';
	break;

case ($page1 == 'pembangunan' && $page2 != ''):
	$tampil = 'pembangunan/detail';
	$layout = 'full-width';
	break;

case ($page1 == 'pembangunan'):
	$tampil = 'pembangunan/index';
	$layout = 'full-width';
	break;

case ($page1 == 'pengaduan'):
	$tampil = 'pengaduan/index';
	$layout = 'full-width';
	break;
}

endif ?>
