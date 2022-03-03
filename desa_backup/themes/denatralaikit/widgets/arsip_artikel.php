<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="card mb-1">
	<div class="container mt-3 main-container">
		<div class="media">
			<div class="media-body">
				<h4 class="content-color-primary mb-0"><i class="material-icons icon-sm">folder</i> <a href="<?= site_url();?>arsip">Arsip Artikel</a></h4><hr>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-md-12">
				<div class="card mb-3">
					<div class="card-header p-0">
						<ul class="nav nav-tabs wizard-1" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="tabterkini-tab" data-toggle="tab" href="#tabterkini" role="tab" aria-controls="tabterkini" aria-selected="true">
									<span>Terbaru</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="tabpopuler-tab" data-toggle="tab" href="#tabpopuler" role="tab" aria-controls="tabpopuler" aria-selected="false">
									<span>Populer</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="tabacak-tab" data-toggle="tab" href="#tabacak" role="tab" aria-controls="tabacak" aria-selected="false">
									<span>Acak</span>
								</a>
							</li>
						</ul>
					</div>
					<div class="card-body">
						<div class="tab-content">
							<?php foreach (array('tabterkini' => 'arsip_terkini', 'tabpopuler' => 'arsip_populer', 'tabacak' => 'arsip_acak') as $jenis => $jenis_arsip) : ?>
							<div class="tab-pane fade show <?php ($jenis == 'tabterkini') and print('active') ?>" id="<?= $jenis ?>" role="tabpanel" aria-labelledby="<?= $jenis ?>-tab">
								<?php foreach ($$jenis_arsip as $arsip): ?>
								<a href="<?= site_url('artikel/'.buat_slug($arsip))?>">
									<ul class="list-group list-group-flush w-100 log-information bubble-sheet mt-2">
										<li class="list-group-item">
											<div class="avatar avatar-15 border-primary"></div>
											<p class="content-color-primary"><?= $arsip['judul']?><br>
												<small class="content-color-secondary">
													<i class="material-icons icon-sm">date_range</i> <?= tgl_indo($arsip['tgl_upload']); ?>
													<i class="material-icons icon-sm">favorite</i> <?= hit($arsip['hit']) ?>
												</small>
											</p>
										</li>
									</ul>
								</a>
								<?php endforeach; ?>
							</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
