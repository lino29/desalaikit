<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<script>
	const KODE_KOTA = "<?= config_item('kode_kota') ?>";
	const TANGGAL = "<?= date('Y/m/d') ?>";
</script>
<div class="mb-1 z-index-2">
	<div id="shalat">
		<div class="card">
			<button class="btn btn-link text-white p-0" data-toggle="collapse" data-target="#jadwal_shalat" aria-expanded="true" aria-controls="jadwal_shalat">
				<div class="card-header pink-gradient font-weight-bold" id="headshalat">JADWAL IMSAK & SHALAT <i class="material-icons icon arrow">expand_more</i></div>
			</button>
			<div id="jadwal_shalat" class="collapse" aria-labelledby="headshalat" data-parent="#shalat">
				<div class="container-fluid">
                   	<section id="jadwal-shalat" class="py-0 bg-white">
                   		<div class="container-fluid mt-2 main-container">
                   			<div class="media mb-2">
                   				<div class="media-body">
                   					<span class="font-weight-bold">
                   					    <a href="https://www.ariandi.net/kode" rel="noopener noreferrer" target="_blank" ><i class="material-icons icon arrow">brightness_4</i> <span data-name="kota">...</span></a>
                   					</span>
                   				</div>
                   			</div>
                   			<div class="row border-top mt-0">
                   				<div class="card-body">
                   					<div class="content-color-secondary"><?= hr(date('Y-m-d'))?></div>
                   					<div class="row">
                   						<div class="col-4 col-lg-2 col-md-2  px-2 py-1">
                   							<div class="square shalat shimmer" data-name="imsak"></div>
                   						</div>
                   						<div class="col-4 col-lg-2 col-md-2  px-2 py-1">
                   							<div class="square shalat shimmer"  data-name="subuh"></div>
                   						</div>
                   						<div class="col-4 col-lg-2 col-md-2  px-2 py-1">
                   							<div class="square shalat shimmer" data-name="dzuhur"></div>
                   						</div>
                   						<div class="col-4 col-lg-2 col-md-2  px-2 py-1">
                   							<div class="square shalat shimmer"  data-name="ashar"></div>
                   						</div>
                   						<div class="col-4 col-lg-2 col-md-2  px-2 py-1">
                   							<div class="square shalat shimmer"  data-name="maghrib"></div>
                   						</div>
                   						<div class="col-4 col-lg-2 col-md-2  px-2 py-1">
                   							<div class="square shalat shimmer"  data-name="isya"></div>
                   						</div>
                   					</div>
                   				</div>
                   			</div>
                   		</div>
                   	</section>
        		</div>
        	</div>
        </div>
    </div>
</div>
