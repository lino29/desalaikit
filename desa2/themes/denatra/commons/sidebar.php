<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!-- sidebar left -->
<div class="sidebar sidebar-left">
    <div class="container has-background-img">
        <figure class="background-img pink-gradient">
            <img src="<?= gambar_desa($desa['logo']);?>" alt="" class="">
        </figure>
        <div class="media w-100 my-3">
            <figure class="avatar avatar-40 rounded-circle align-self-start ">
                <label class="checkbox-user-check">
                    <input type="checkbox">
                    <i class="material-icons">check</i>
                </label>
                <img src="<?= gambar_desa($desa['logo']);?>" alt="Generic placeholder image">
            </figure>
            <div class="media-body mx-70">
                <h5 class="time-title mb-0 text-white"><?= ucwords($this->setting->sebutan_desa).' '.$desa['nama_desa'] ?></h5>
                <p class="mb-0 text-truncate text-white"><?= ucwords($this->setting->sebutan_kecamatan_singkat).' '.$desa['nama_kecamatan'] ?></p>
            </div>
        </div>
    </div>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="<?= site_url(); ?>" class="nav-link"><i class="material-icons icon">home</i> <span>Beranda</span></a>
        </li>
        <li class="nav-item">
            <a href="javascript:void(0);" class="nav-link dropdwown-toggle">
                <i class="material-icons icon">widgets</i>
                <span>Menu Kategori</span>
                <i class="material-icons icon arrow">expand_more</i>
            </a>
            <ul class="nav flex-column">
                <?php foreach($menu_kiri as $data): ?>
				<li class="nav-item">
					<a href="<?= site_url("artikel/kategori/$data[slug]"); ?>" class="nav-link pink-gradient-active">
						<i class="material-icons icon arrow"><?php if(count($data['submenu']) > 0): ?>keyboard_arrow_right<?php endif; ?></i>
						<span><?= $data['kategori']; ?></span>
					</a>
					<?php if(count($data['submenu']) > 0): ?>
					<ul class="nav flex-column">
						<?php foreach($data['submenu'] as $submenu): ?>
						<li class="nav-item">
							<a href="<?= site_url("artikel/kategori/$submenu[slug]"); ?>" class="nav-link pink-gradient-active"> <i class="material-icons icon"></i><span><?= $submenu['kategori']; ?></span></span></a>
						</li>
						<?php endforeach; ?>
					</ul>
					<?php endif; ?>
				</li>
                <?php endforeach; ?>
            </ul>
        </li>
		<?php foreach($menu_atas as $data): ?>
		<li class="nav-item">
			<a href="<?= count($data['submenu'])>0 ? 'javascript:void(0);' : $data['link'] ?>" class="nav-link <?= count($data['submenu'])>0 ? 'dropdwown-toggle' : 'pink-gradient-active' ?>">
				<i class="material-icons icon">list_alt</i>
				<span><?= $data['nama']; ?></span>
				<?php if(count($data['submenu'])>0): ?>
				<i class="material-icons icon arrow">expand_more</i>
				<?php endif; ?>
			</a>
			<?php if(count($data['submenu'])>0): ?>
			<ul class="nav flex-column">
				<?php foreach($data['submenu'] as $submenu): ?>
				<li class="nav-item">
					<a href="<?= $submenu['link']?>" class="nav-link pink-gradient-active">
						<i class="material-icons icon"></i>
						<span><?= $submenu['nama']?></span>
					</a>
				</li>
				<?php endforeach; ?>
			</ul>
			<?php endif; ?>
		</li>
        <?php endforeach; ?>
	</ul>
</div>
<div class="backdrop"></div>
<!-- sidebar left ends -->
<!-- sidebar right -->
<div class="sidebar sidebar-right">
    <button type="button" class="btn close-sidebar"><i class="material-icons">settings</i></button>
    <div class="row mx-0 pt-2">
        <div class="col-12">
            <p class="sidebar-color-primary page-sub-title-small"><span class="icon-circle mr-2"><i class="material-icons">settings</i></span> Pengaturan Tampilan</p>
			<p class="sidebar-color-secondary"><small>Kami menyediakan berbagai skema tampilan untuk diubah.</small></p>
			<div class="row">
				<?php include("$this->theme_folder/$this->theme/commons/statistik_pengunjung.php"); ?>
				<ul class="list-group border-top border-bottom list-group-flush w-100">
					<li class="list-group-item">
						<span class="vm">Layar Kotak</span>
						<input type="checkbox" id="boxlayout" class="switch switch-sm">
						<label for="boxlayout" class="pink-gradient float-right"></label>
					</li>
					<li class="list-group-item">
						<span class="vm">Tampilan Penuh</span>
						<input type="checkbox" id="full-width2" class="switch switch-sm">
						<label for="full-width2" class="pink-gradient float-right"></label>
						<p class="sidebar-color-secondary mt-2 mb-0"><small>Tombol ini menjadikan tampilan penuh di layar</small></p>
					</li>
					<li class="list-group-item">
						<span class="vm">RTL</span>
						<input type="checkbox" id="rtl" class="switch switch-sm">
						<label for="rtl" class="pink-gradient float-right"></label>
					</li>
					<li class="list-group-item">
						<span class="vm">Ikon Sidebar</span>
						<input type="checkbox" id="iconsibarbar" class="switch switch-sm">
						<label for="iconsibarbar" class="pink-gradient float-right"></label>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- sidebar right ends -->
<!-- setting sidebar -->
<div class="settings-sidebar close-settings-sidebar-backdrop">
    <button type="button" class="btn close-setting-sidebar pink-gradient"><i class="material-icons">keyboard_arrow_left</i></button>
    <ul class="nav nav-tabs row no-gutters pink-gradient" role="tablist">
        <li class="nav-item text-center col">
            <a class="nav-link active" id="tabhome3settings-tab" data-toggle="tab" href="#tabhome3settings" role="tab" aria-controls="tabhome3settings" aria-selected="false">
                <h5 class="content-color-primary mb-0"><i class="material-icons">notifications</i></h5>
                <p class="content-color-secondary mb-0 small">Updates</p>
            </a>
        </li>
        <li class="nav-item text-center col">
            <a class="nav-link" id="tabhome1settings-tab" data-toggle="tab" href="#tabhome1settings" role="tab" aria-controls="tabhome1settings" aria-selected="true">
                <h5 class="content-color-primary mb-0"><i class="material-icons">assignment_ind</i></h5>
                <p class="content-color-secondary mb-0 small">Aparatur</p>
            </a>
        </li>
        <li class="nav-item text-center col">
            <a class="nav-link" id="tabhome2settings-tab" data-toggle="tab" href="#tabhome2settings" role="tab" aria-controls="tabhome2settings" aria-selected="false">
                <h5 class="content-color-primary mb-0"><i class="material-icons">settings</i></h5>
                <p class="content-color-secondary mb-0 small">Settings</p>
            </a>
        </li>
    </ul>
    <div class="tab-content">
		<div class="tab-pane fade" id="tabhome1settings" role="tabpanel" aria-labelledby="tabhome1settings-tab">
            <ul class="list-group list-group-flush mb-5" id="chat-list">
                <?php foreach($aparatur_desa['daftar_perangkat'] as $data) : ?>
                <li class="list-group-item new">
                    <div class="media">
                        <figure class="avatar avatar-40 mr-3">
        				<?php if($data['foto']) : ?>
                            <img data-src="<?= $data['foto'] ?>" loading="lazy" class="lazyload" />
        				<?php else: ?>
                            <img data-src="<?= base_url("assets/files/user_pict/kuser.png") ?>" loading="lazy" class="lazyload" />
        				<?php endif; ?>
                        </figure>
                        <div class="media-body">
                            <h6 class="my-0"><?= $data['nama'] ?></h6>
                            <p><?= $data['jabatan'] ?> <span class="float-right page-sub-title-small"></span></p>
                        </div>
                    </div>
                </li>
    			<?php endforeach; ?>
            </ul>
        </div>
        <div class="tab-pane fade" id="tabhome2settings" role="tabpanel" aria-labelledby="tabhome2settings-tab">
            <div class="row mx-0">
                <div class="col-12">
                    <div class="alert alert-success alert-dismissible  mt-2 p-2" role="alert" id="settingalert">
                        <strong>Berhasil!</strong><br>Perubahan telah diterapkan.
                        <button type="button" class="close btn-sm" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                </div>
            </div>
            <div class="row mx-0 mt-2">
				<div class="col-12">
					<p class="page-sub-title-small"><span class="icon-circle mr-2"><i class="material-icons">settings</i></span> Pengaturan Layar</p>
				</div>
			</div>
               <ul class="list-group  list-group-flush w-100">
                <li class="list-group-item">
                    <label class="d-inline-block mr-2">Hide Backdrop</label>
                    <input type="checkbox" id="hidebackdrop" class="switch switch-sm">
                    <label for="hidebackdrop" class="pink-gradient float-right"></label>
                </li>                      
            </ul>
        </div>
        <div class="tab-pane active" id="tabhome3settings" role="tabpanel" aria-labelledby="tabhome3settings-tab">
            <div class="row mx-0 mt-0 bg-light">
                <div class="col-12">
                    <div class="card my-3">
                        <div class="card-body">
                            <div class="media">
                                <div class="icon-circle icon-50 bg-light-primary mr-3">
                                    <i class="material-icons">fingerprint</i>
                                </div>
                                <div class="media-body">
                                    <?php include("$this->theme_folder/$this->theme/commons/statistik_pengunjung.php"); ?>
                                    <?php
                                        $persen = number_format($today/$yesterday,5);
                                        $persen = number_format($persen,4)*100;
                                    ?>
                                    <h4 class="content-color-primary mb-0"><?= ribuan($today) ?> views</h4>
                                    <p class="content-color-secondary mb-3">Pengunjung Hari Ini</p>
                                </div>
                            </div>                            
                            <div class="progress progress-bar-striped bg-danger progress-bar-animated " align="right" style="background-color: #27b2c8">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: <?= $persen ?>%" aria-valuenow="<?= $persen ?>" aria-valuemin="0" aria-valuemax="100">
                                    <span><?= $persen ?> %</span>
                                </div>
                            </div>
                            <div class="content-color-secondary text-right">
                                <small>Kemarin <?= ribuan($yesterday) ?> views</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mx-0 mt-2 bg-light">
                <div class="col-12">
                    <p class="page-sub-title-small"><span class="icon-circle mr-2"><i class="material-icons">router</i></span> OpenSID <?= AmbilVersi()?></p>
				</div>
			</div>
			<a href="<?= site_url(); ?>siteman" class="content-color-secondary" rel="noopener noreferrer" target="_top">
				<ul class="list-group list-group-flush w-100 log-information bubble-sheet mt-2">
					<li class="list-group-item">
						<div class="avatar avatar-15 border-primary"></div>
						<p class="content-color-primary"><i class="material-icons">lock</i> Login Aplikasi<br><small class="content-color-secondary">Halaman Administrator</small></p>
					</li>
				</ul>
			</a>
			<a href="<?= site_url('layanan-mandiri'); ?>" rel="noopener noreferrer" target="_top">
				<ul class="list-group list-group-flush w-100 log-information bubble-sheet mt-2 not-found">
                    <li class="list-group-item">
                        <div class="avatar avatar-15 border-success"></div>
                        <p class="content-color-primary"><i class="material-icons">print</i> Layanan Mandiri<br><small class="content-color-secondary">Permohonan Surat, Cetak KK, dll</small></p>
					</li>
				</ul>
			</a>
			<a href="https://www.google.com/maps/dir//<?=$data_config['lat'].",".$data_config['lng']?>" rel="noopener noreferrer" target="_blank">
				<ul class="list-group list-group-flush w-100 log-information bubble-sheet mt-2">
					<li class="list-group-item">
						<div class="avatar avatar-15 border-warning"></div>
						<p class="content-color-primary"><i class="material-icons">room</i> Lokasi Kantor<br><small class="content-color-secondary"><?= ucwords($this->setting->sebutan_desa).' '.$desa['nama_desa']; ?></small></p>
					</li>
				</ul>
			</a>
        </div>
    </div>
</div>
<div class="settings-sidebar-backdrop pink-gradient"></div>
