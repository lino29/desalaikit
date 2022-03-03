<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="card mb-1">
	<div class="card-header border-bottom">
		<div class="media">
			<div class="media-body">
				<h4 class="content-color-primary mb-0"><i class="material-icons icon-sm">message</i> Komentar Terkini</h4>
			</div>
		</div>
    </div>
    <div class="row">
		<div class="col-12">
			<div class="card-body border-bottom">
				<marquee onmouseover="this.stop()" onmouseout="this.start()" scrollamount="2" direction="up" width="100%" height="248" align="center" behavior=”alternate”>
                <ul class="list-group list-group-flush w-100 log-information">
					<?php foreach ($komen As $data): ?>
					<li class="list-group-item">
						<div class="avatar avatar-15 border-primary"></div>
						<div class="media experience">
							<div class="media-body">
								<h6 class="my-0 content-color-primary"><i class="material-icons icon-sm">person</i> <a href="<?= site_url('artikel/' . buat_slug($data)); ?>"><?= $data['owner']?></a></h6>
								<p class="mb-0"><small class="content-color-secondary"><i class="material-icons icon-sm">date_range</i> <?= tgl_indo2($data['tgl_upload'])?></small></p>
								<div class="card-text">
									<?= potong_teks($data['komentar'], 50); ?> [...]
								</div>
							</div>
						</div>
					</li>
                    <?php endforeach; ?>
                </ul>
				</marquee>
			</div>
		</div>
	</div>
</div>
