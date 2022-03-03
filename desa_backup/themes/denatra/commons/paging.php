<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php if ($paging->num_rows > $paging->per_page): ?>
<div class="pagination_area mt-3">
	<p>Halaman <?= $paging->page ?> dari <?= $paging->end_link ?></p>
	<nav>
		<ul class="pagination pagination-sm no-margin">
			<?php if ($paging->start_link): ?>
			<li class="page-item"><a class="page-link" href="<?= site_url("$paging_page/$paging->start_link" . $paging->suffix); ?>" title="Halaman Pertama"><span aria-hidden="true">&laquo;</span></a></li>
			<?php endif; ?>
			<?php foreach ($pages as $i): ?>
			<li <?= ($paging->page == $i) ? 'class="page-item active"' : "" ?>>
				<a class="page-link" href="<?=site_url("$paging_page/$i" . $paging->suffix); ?>" title="Halaman <?= $i ?>"><?= $i ?></a>
			</li>
			<?php endforeach; ?>
			<?php if ($paging->end_link): ?>
			<li class="page-item"><a class="page-link" href="<?= site_url("$paging_page/$paging->end_link" . $paging->suffix); ?>" title="Halaman Terakhir"><span aria-hidden="true">&raquo;</span></a></li>
			<?php endif; ?>
		</ul>
	</nav>
</div>
<?php endif; ?>
