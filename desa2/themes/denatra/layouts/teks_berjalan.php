<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php if(!in_array($this->uri->segment(1), ['lapak']) || (in_array($this->uri->segment(2), ['lapak']))): ?>
<div class="card mb-1 z-index-1">
	<marquee onmouseover="this.stop()" onmouseout="this.start()">
		<div class="teks_berjalan">
			<?php foreach ($teks_berjalan AS $teks): ?>
			<span class="teks small"><?= $teks['teks']?>
				<?php if ($teks['tautan']): ?>
				<a href="<?= $teks['tautan'] ?>" rel="noopener noreferrer" title="Baca Selengkapnya"><?= $teks['judul_tautan']?></a>
				<?php endif; ?>
			</span>
			<?php endforeach; ?>
		</div>
	</marquee>
</div>
<?php endif; ?>
