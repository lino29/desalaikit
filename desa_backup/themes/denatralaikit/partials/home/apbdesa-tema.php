<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<style type="text/css">
	.progress-bar span
	{
		position: absolute;
		right: 20px;
		color: #FFFFFF;
	}
</style>
<div id="apbdesa" class="container<?= config_item('fluid') ? '-fluid' : '' ?> mb-1 main-container">
    <div class="card-header pink-gradient font-weight-bold text-center"><i class="fa fa-info-circle"></i> TRANSPARANSI ANGGARAN <br><small>Sumber Data : Siskeudes</small></div>
	<section class="py-0">
		<div class="card mb-0 mt-0 fullscreen has-background-img">
			<div class="container-fluid mt-0 mb-2 main-container">
				<div class="row">
					<?php foreach ($data_widget as $subdata_name => $subdatas): ?>
					<div class="col-12 col-md-4 col-lg-4 mb-2">
						<div class="card-header border-bottom">
							<div class="media">
								<div class="icon-circle icon-40 bg-light-primary mr-3">
									<i class="material-icons">insert_chart</i>
								</div>
								<div class="media-body">
									<h6 class="my-0 content-color-primary"><?= ($subdatas['laporan'])?></h6>
									<p class="small mb-0">
										Realisasi | Anggaran
									</p>
								</div>
							</div>
						</div>
						<?php foreach ($subdatas as $key => $subdata): ?>
						<?php if($subdata['judul'] != NULL and $key != 'laporan' and $subdata['realisasi'] != 0 or $subdata['anggaran'] != 0): ?>
						<div class="progress-group mt-2">
							<small><?= $subdata['judul']; ?><br>
							<b>Rp. <?= number_format($subdata['realisasi']); ?> | Rp. <?= number_format($subdata['anggaran']); ?></b></small>
							<div class="progress progress-bar-striped bg-danger" align="right" style="background-color: #27b2c8">
								<div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: <?= $subdata['persen'] ?>%" aria-valuenow="<?= $subdata['persen'] ?>" aria-valuemin="0" aria-valuemax="100"><span><?= $subdata['persen'] ?> %</span></div>
							</div>
						</div>
						<?php endif; ?>
						<?php endforeach; ?>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>
</div>
