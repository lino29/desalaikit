<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php if(in_array($this->uri->segment(1), ['', 'first']) && (in_array($this->uri->segment(2), ['']))) : ?>
<style type="text/css">
	.textgambar{
		position: absolute;
		color: black;
		
		background-color: #ffffff;
		border: 1px solid purple;
		border-radius: 2px;
		padding: 2px;
		opacity: 0.6;
		filter: alpha(opacity=60); /* For IE8 and earlier */
	}
</style>
<div class="card mb-1 mt-1 z-index-1">
	<div class="carosel swiper-location-carousel h-100 h-sm-auto">
		<div id="carouselDeNatra" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<?php $active = true; ?>
				<?php foreach ($slider_gambar['gambar'] as $gambar) : ?>
				<?php $file_gambar = $slider_gambar['lokasi'] . 'sedang_' . $gambar['gambar']; ?>
				<?php if(is_file($file_gambar)) : ?>
				<div class="carousel-item <?php echo ($active == true)?"active":"" ?>" data-artikel="<?php echo $gambar['id']?>" <?php if ($slider_gambar['sumber'] != 3): ?> onclick="location.href='<?='artikel/'.buat_slug($gambar); ?>'" <?php endif; ?>>
					<img style="<?php if(config_item('fluid') == true) : ?>max-height:450px<?php else: ?>max-height:350px<?php endif; ?>" class="img-responsive cover img-thumbnail img-fluid opacity-100" src="<?php echo base_url().$slider_gambar['lokasi'].'sedang_'.$gambar['gambar']?>">
					<?php if ($slider_gambar['sumber'] != 3): ?>
					<div class="carousel-caption d-none d-md-block textgambar">
						<h5><?= $gambar['judul'] ?></h5>
					</div>
					<?php endif; ?>
				</div>
				<a class="carousel-control-prev" href="#carouselDeNatra" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselDeNatra" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
				<?php $active = false; ?>
				<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
