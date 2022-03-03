<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="card mb-2 fullscreen has-background-img ">
	<div class="card-header border-bottom">
		<div class="media">
			<div class="icon-circle icon-40 bg-light-primary mr-3">
				<i class="material-icons">folder</i>
			</div>
			<div class="media-body">
				<h6 class="my-0 content-color-primary">Arsip Konten Situs Web</h6>
				<p class="small mb-0">
					<i class="material-icons icon-sm">date_range</i> <?= ucwords($this->setting->sebutan_desa)." ".$desa['nama_desa']?>
				</p>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="mb-0 content-color-secondary">
			<div class="table-responsive">
				<?php if($farsip): ?>
				<table class="table table-striped">
					<thead>
						<tr>
							<td width="3%"><b>No.</b></td>
							<td width="20%"><b>Tanggal Artikel</b></td>
							<td><b>Judul Artikel</b></td>
							<td width="20%"><b>Penulis</b></td>
							<td width="10%"><b>Dibaca</b></td>
						</tr>
					</thead>
					<tbody>
						<?php foreach($farsip AS $data): ?>
						<tr>
							<td style="text-align:center;">
								<?= $data["no"]?>
							</td>
							<td>
								<?= tgl_indo($data["tgl_upload"])?>
							</td>
							<td>
								<a href="<?= site_url('artikel/'.buat_slug($data))?>"><?= $data["judul"]?></a>
							</td>
							<td style="text-align:center;">
								<?= $data["owner"]?>
							</td>
							<td style="text-align:center;">
								<?= hit($data['hit']) ?>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				<?php if($paging->num_rows > $paging->per_page): ?>
				<div class="pagination_area">
					<p>Halaman <?= $p ?> dari <?= $paging->end_link ?></p>
					<nav>
						<ul class="pagination pagination-sm no-margin">
							<?php if ($paging->start_link): ?>
							<li class="page-item"><a class="page-link" href="<?= site_url("arsip/".$paging_page."/$paging->start_link" . $paging->suffix) ?>" title="Halaman Pertama"><span aria-hidden="true">&laquo;</span></a></li>
							<?php endif; ?>
							<?php for ($i=$paging->start_link; $i<=$paging->end_link; $i++): ?>
							<li <?= ($p == $i) ? 'class="page-item active"' : "" ?>>
								<a class="page-link <?php ($p != $i) or print('active');?>" href="<?= site_url("arsip/$i") ?>" title="Halaman <?= $i ?>"><?= $i ?></a>
							</li>
							<?php endfor; ?>
							<?php if ($paging->end_link): ?>
							<li class="page-item"><a class="page-link" href="<?= site_url("arsip/".$paging_page."/$paging->end_link" . $paging->suffix) ?>" title="Halaman Terakhir"><span aria-hidden="true">&raquo;</span></a></li>
							<?php endif; ?>
						</ul>
					</nav>
				</div>
				<?php endif; ?>
				<?php else: ?>
					Belum ada arsip konten web.
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
