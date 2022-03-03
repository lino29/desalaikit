<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="card mb-1">
	<div class="container mt-3 main-container">
		<div class="media">
			<div class="media-body">
				<h4 class="content-color-primary mb-0"><i class="material-icons icon-sm">event</i> Agenda</h4><hr>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-md-12">
				<div class="card mb-3">
					<div class="card-header p-0">
						<ul class="nav nav-tabs wizard-1" role="tablist">
							<?php if (count($hari_ini) > 0): ?>
							<li class="nav-item">
								<a class="nav-link active" id="tabhariini-tab" data-toggle="tab" href="#tabhariini" role="tab" aria-controls="tabhariini" aria-selected="true">
									<span>Hari ini</span>
								</a>
							</li>
							<?php endif; ?>
							<?php if (count($yad) > 0): ?>
							<li class="nav-item">
								<a class="nav-link <?php count($hari_ini) == 0 and print('active')?>" id="tabyad-tab" data-toggle="tab" href="#tabyad" role="tab" aria-controls="tabyad" aria-selected="false">
									<span>Mendatang</span>
								</a>
							</li>
							<?php endif; ?>
							<?php if (count($lama) > 0): ?>
							<li class="nav-item">
								<a class="nav-link <?php count(array_merge($hari_ini, $yad)) == 0 and print('active')?>" id="tablama-tab" data-toggle="tab" href="#tablama" role="tab" aria-controls="tablama" aria-selected="false">
									<span>Terdahulu</span>
								</a>
							</li>
							<?php endif; ?>
						</ul>
					</div>
					<div class="card-body">
						<div class="tab-content">
							<?php if (count(array_merge($hari_ini, $yad, $lama)) > 0): ?>
							<div class="tab-pane fade show active" id="tabhariini" role="tabpanel" aria-labelledby="tabhariini-tab">
								<?php foreach ($hari_ini as $agenda): ?>
								<a href="<?= site_url('artikel/'.buat_slug($agenda))?>"><?= $agenda['judul']?>
									<ul class="list-group list-group-flush w-100 log-information bubble-sheet mt-2">
										<li class="list-group-item">
											<div class="avatar avatar-15 border-primary"></div>
											<p class="content-color-primary">
												<small class="content-color-secondary">
													<i class="material-icons icon-sm">date_range</i> <?= tgl_indo2($agenda['tgl_agenda'])?><br>
													<i class="material-icons icon-sm">place</i> Lokasi : <?= $agenda['lokasi_kegiatan']?><br>
													<i class="material-icons icon-sm">account_circle</i> Koordinator : <?= $agenda['koordinator_kegiatan']?>
												</small>
											</p>
										</li>
									</ul>
								</a>
								<?php endforeach; ?>
							</div>
							<div class="tab-pane fade <?php count($hari_ini) == 0 and print('show active')?>" id="tabyad" role="tabpanel" aria-labelledby="tabyad-tab">
								<?php if (count($yad) > 0): ?>
								<?php foreach ($yad as $agenda): ?>
								<a href="<?= site_url('artikel/'.buat_slug($agenda))?>"><?= $agenda['judul']?>
									<ul class="list-group list-group-flush w-100 log-information bubble-sheet mt-2">
										<li class="list-group-item">
											<div class="avatar avatar-15 border-success"></div>
											<p class="content-color-primary">
												<small class="content-color-secondary">
													<i class="material-icons icon-sm">date_range</i> <?= tgl_indo2($agenda['tgl_agenda'])?><br>
													<i class="material-icons icon-sm">place</i> Lokasi : <?= $agenda['lokasi_kegiatan']?><br>
													<i class="material-icons icon-sm">account_circle</i> Koordinator : <?= $agenda['koordinator_kegiatan']?>
												</small>
											</p>
										</li>
									</ul>
								</a>
								<?php endforeach; ?>
								<?php endif; ?>
							</div>
							<div class="tab-pane fade <?php count(array_merge($hari_ini, $yad)) == 0 and print('show active')?>" id="tablama" role="tabpanel" aria-labelledby="tablama-tab">
								<?php foreach ($lama as $agenda): ?>
								<a href="<?= site_url('artikel/'.buat_slug($agenda))?>"><?= $agenda['judul']?>
									<ul class="list-group list-group-flush w-100 log-information bubble-sheet mt-2">
										<li class="list-group-item">
											<div class="avatar avatar-15 border-danger"></div>
											<p class="content-color-primary">
												<small class="content-color-secondary">
													<i class="material-icons icon-sm">date_range</i> <?= tgl_indo2($agenda['tgl_agenda'])?><br>
													<i class="material-icons icon-sm">place</i> Lokasi : <?= $agenda['lokasi_kegiatan']?><br>
													<i class="material-icons icon-sm">account_circle</i> Koordinator : <?= $agenda['koordinator_kegiatan']?>
												</small>
											</p>
										</li>
									</ul>
								</a>
								<?php endforeach; ?>
							</div>
							<?php else: ?>
							<ul class="list-group list-group-flush w-100 log-information bubble-sheet mt-2">
								<li class="list-group-item">
									<div class="avatar avatar-15 border-success"></div>
									<p class="content-color-primary">Belum ada agenda</p>
								</li>
							</ul>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
