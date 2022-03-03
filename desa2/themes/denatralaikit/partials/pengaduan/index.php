<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<style type="text/css">
	.list-group li {
		cursor: pointer;
	}

	.list-group li:hover {
		background: #eee;
	}

</style>
<div class="card mt-0 mb-1 has-background-img">
	<form action="<?= $search_action; ?>" method="get" class="form-inline text-center">
		<select class="form-control input-sm select2 ml-1 mr-1 mb-1 mt-1" id="caristatus" name="caristatus">
			<option value="">Semua Status</option>
			<option value="1" <?= selected($caristatus, 1); ?>>Menunggu Diproses</option>
			<option value="2" <?= selected($caristatus, 2); ?>>Sedang Diproses</option>
			<option value="3" <?= selected($caristatus, 3); ?>>Selesai Diproses</option>
		</select>
		<div class="input-group mb-1 small ml-1 mr-1 mt-1">
			<input type="text" name="cari" class="form-control" value="<?= $cari; ?>" placeholder="Cari Pengaduan" aria-label="Cari Pengaduan">
			<div class="input-group-append">
				<button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
			</div>
		</div>
		<?php if ($cari) : ?>
		<div class="input-group-append ml-1 mt-1 mb-1">
			<a href="<?=site_url('pengaduan')?>" class="btn btn-info"><i class="fa fa-times"></i></a>
		</div>
		<?php endif ?>
		<button type="button" class="btn btn-success ml-1 mr-1 mb-1 mt-1" data-toggle="modal" data-target="#newpengaduan">Formulir Pengaduan</button>
	</form>
</div>
<div class="mt-0 mb-1 z-index-2">
	<div class="card-header pink-gradient font-weight-bold text-center">Halaman Pengaduan</div>
	<div class="card mb-0 fullscreen has-background-img">
		<div class="container-fluid mt-2">
			<!-- Notifikasi -->
			<?php if ($notif = $this->session->flashdata('notif')): ?>
			<div class="alert alert-<?= $notif['status']; ?>" role="alert">
				<?= $notif['pesan']; ?>
			</div>
			<?php endif; ?>
			<?php if ($pengaduan) : ?>
			<ul class="list-group list-group-flush w-100 log-information mt-2">
				<?php foreach ($pengaduan as $key => $value) : ?>
				<li class="list-group-item status<?=$value['status']?> allstatus mb-2" data-toggle="modal" data-target="#pengaduan<?=$value['id']?>">
					<div class="avatar avatar-15 border-success"></div>
					<div class="media experience">
						<div class="icon-rounded icon-40 bg-light-success mr-3">
							<?php if($value['foto']) : ?>
							<img src="<?= base_url(LOKASI_PENGADUAN . $value['foto']); ?>" width="100%">
							<?php else : ?>
							<i class="material-icons icon-sm">person</i>
							<?php endif; ?>
						</div>
						<div class="media-body">
							<h6 class="my-0 content-color-primary"><?= $value['nama']; ?></h6>
							<p class="mb-2"><small class="content-color-secondary">
							<?= tjs($value['created_at'], 's') ?> | <?php if ($value['status'] == '1') : ?>
							<span class="badge badge-danger">Menunggu Diproses</span>
							<?php elseif ($value['status'] == '2') : ?>
							<span class="badge badge-info">Sedang Diproses</span>
							<?php elseif ($value['status'] == '3') : ?>
							<span class="badge badge-success">Selesai Diproses</span>
							<?php endif; ?></small></p>
							<p class="info">
								<span><b><?=$value['judul']?></b></span><br>
								<span><?= substr($value['isi'], 0, 50); ?> <?php if (strlen($value['isi']) > 50) : ?><span class="badge badge-info">selengkapnya...</span><?php endif; ?></span>
								<span class="badge badge-<?= $value['jumlah'] > 0 ? 'primary' : 'danger'; ?> pull-right mt-1"><i class="fa fa-comments"></i> <?= $value['jumlah']; ?> Tanggapan</span>
							</p>
						</div>
					</div>
				</li>
				<!-- BEGIN DETAIL TICKET -->
				<div class="modal fade" id="pengaduan<?= $value['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="pengaduan<?= $value['id'] ?>" aria-hidden="true">
					<div class="modal-wrapper">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header bg-blue">
									<h6 class="modal-title"><i class="fa fa-file"></i> <?= $value['judul'] ?></h6>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								</div>
								<div class="modal-body">
									<div class="row mb-2">
										<div class="col-md-12">
											<span class="small"><?= tjs($value['created_at'], "s") ?> dari <span class="badge badge-info"><?= $value['nama']; ?></span></span>
											<p><?= $value['isi'] ?></p>
											<?php if($value['foto']) : ?>
												<img src="<?= base_url(LOKASI_PENGADUAN . $value['foto']); ?>" width="100%">
											<?php endif; ?>
										</div>
									</div>
										<?php foreach ($pengaduan_balas as $keyna => $valuena) : ?>
										<?php if ($valuena['id_pengaduan'] && $valuena['id_pengaduan'] == $value['id']) : ?>
										<li class="list-group-item mb-2">
										<div class="avatar avatar-15 border-info"></div>
										<div class="media experience">
											<div class="icon-rounded icon-40 bg-light-success mr-3">
												<i class="material-icons icon-sm">person</i>
											</div>
											<div class="media-body">
												<span class="small"><?= tjs($valuena['created_at'], "s") ?> | Ditanggapi oleh <span class="badge badge-info"><?= $valuena['nama']; ?></span></span>
												<p><?= $valuena['isi'] ?></p>
											</div>
										</div>
										</li>
										<?php endif; ?>
										<?php endforeach; ?>
								</div>
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-sm btn-danger pull-left" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Tutup</button>
                                      </div>
							</div>
						</div>
					</div>
				</div>
				<!-- END DETAIL TICKET -->
				<?php endforeach; ?>
			</ul>
			<?php $this->load->view("$folder_themes/commons/paging"); ?>
			<?php else : ?>
			<div class="font-weight-bold text-center mt-4 mb-4">
				<h5>Data pengaduan belum tersedia pada halaman ini.</h5>
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>
<!-- Formulir Pengaduan -->
<div class="modal fade" id="newpengaduan" tabindex="-1" role="dialog" aria-labelledby="newpengaduan" aria-hidden="true">
	<div class="modal-wrapper">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-blue">
					<h6 class="modal-title"><i class="fa fa-pencil"></i> Buat Pengaduan Baru</h6>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<form action="<?= $form_action; ?>" method="POST" enctype="multipart/form-data">
					<div class="modal-body">
                     	<div class="form-group row">
                            <div class="col-lg-6 col-md-6">
                                <input name="nik" type="text" maxlength="16" class="form-control" placeholder="NIK">
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <input name="nama" type="text" required="" class="form-control" placeholder="Nama*">
                            </div>
                        </div>
                     	<div class="form-group row">
                            <div class="col-lg-6 col-md-6">
                                <input name="email" type="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <input name="telepon" type="text" class="form-control" placeholder="Telepon">
                            </div>
                        </div>
						<div class="form-group">
							<input name="judul" type="text" class="form-control" required="" placeholder="Judul*">
						</div>
						<div class="form-group">
							<textarea name="isi" required="" class="form-control" placeholder="Isi Pengaduan*" style="height: 120px;"></textarea>
						</div>
                      	<div class="invalid-feedback">*wajib diisi</div>
                     	<div class="form-group row">
                            <div class="col-lg-6 col-md-6">
								<small class="badge badge-info mb-1">Gambar: png, jpg, jpeg</small>
								<div class="custom-file">
									<input type="text" accept="image/*" onchange="readURL(this);" class="form-control" id="file_path" placeholder="Unggah Foto" name="foto">
									<input type="file" accept="image/*" onchange="readURL(this);" class="custom-file-input" id="file" name="foto">
									<label class="custom-file-label" for="validatedCustomFile" id="file_browser">Lampirkan Foto</label>
								</div>
                            </div>
                            <div class="col-lg-6 col-md-6">
								<br><img id="blah" src="#" alt="gambar" width="100%"/>
                            </div>
                        </div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-sm btn-danger pull-left" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Tutup</button>
						<button type="submit" class="btn btn-sm btn-primary pull-right"><i class="fa fa-pencil"></i> Kirim</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah')
                    .attr('src', e.target.result)
              		.width(auto)
              		.height(auto);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
