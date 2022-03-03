<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="card mb-1">
	<div class="card-header border-bottom">
		<div class="media">
			<div class="media-body">
				<h4 class="content-color-primary mb-0"><i class="material-icons icon-sm">contacts</i> Info Media Sosial</a></h4>
			</div>    
		</div>
	</div>
	<div class="card-body text-center">
		<?php foreach ($sosmed As $data): ?>
		<?php if (!empty($data["link"])): ?>
		<a href="<?= $data['link']?>" title="<?= $data['nama'] ?>" rel="noopener noreferrer" target="_blank">
		    <img src="<?= base_url().'assets/front/'.$data['gambar'] ?>" class="img-responsive cover" style="width:40px;height:40px;">
		</a>
		<?php endif; ?>
		<?php endforeach; ?>
	</div>
</div>
