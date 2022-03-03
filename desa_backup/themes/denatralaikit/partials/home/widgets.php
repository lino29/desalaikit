<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<form method="get" action="<?= site_url(); ?>">
	<div class="card col-12 mb-1">
		<div class="row no-gutters">
			<div class="col mt-2 mb-2">
				<div class="input-group input-group-sm">
					<input type="text" name="cari" class="form-control form-control-rounded" value="<?= $cari ?>" placeholder="Cari Artikel" aria-label="Cari Artikel">
				</div>
			</div>
			<div class="col-auto mt-2 mb-2">
				<button class="btn btn-outline-primary btn-rounded btn-sm ml-2" type="submit"><span class="text-hide-xs">Cari</span> <i class="material-icons">send</i></button>
			</div>
		</div>
	</div>
</form>
<?php if ($w_cos): ?>
<?php foreach ($w_cos as $data): ?>
<?php
	$widget = trim($data['isi']);
	if ($data["jenis_widget"] == 1):
	include("$this->theme_folder/$this->theme/widgets/".$widget);
    elseif ($data["jenis_widget"] == 2):
	include($widget);
	else: ?>
	<div class="card mb-1">
		<div class="card-header border-bottom">
			<div class="media">
				<div class="media-body">
					<h4 class="content-color-primary mb-0"><i class="material-icons icon-sm">reorder</i> <?=$data["judul"]?></h4>
				</div>
			</div>
		</div>
		<div class="card-body text-center">
			<div class="align-items-center no-gutters ml-3 mr-3">
				<?= html_entity_decode($data['isi']) ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
<?php endforeach; ?>
<?php endif; ?>
