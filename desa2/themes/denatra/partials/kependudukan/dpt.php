<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="row">
	<div class="col-md-4 col-lg-4 text-hide-xs">
		<?php $this->load->view($folder_themes .'/partials/kependudukan/navigasi') ?>
	</div>
	<div class="col-md-8 col-lg-8">
		<div class="card mb-2 fullscreen has-background-img ">
			<div class="card-header border-bottom">
				<div class="media">
					<div class="icon-circle icon-40 bg-light-primary mr-3">
						<i class="material-icons">view_day</i>
					</div>
					<div class="media-body">
						<h6 class="my-0 content-color-primary">Daftar Calon Pemilih</h6>
						<p class="small mb-0">
							<i class="material-icons icon-sm">local_offer</i> Berdasarkan Wilayah (pada tgl pemilihan <?= $tanggal_pemilihan ?>)
						</p>
					</div>
					<a href="javascript:void(0);" class="icon-circle icon-30 content-color-secondary fullscreenbtn">
						<i class="material-icons ">crop_free</i>
					</a>
				</div>
			</div>
			<div class="card-body">
				<?php if(count($main)>0): ?>
				<table id="dpt" class="table table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Dusun</th>
							<th>RW</th>
							<th>Jiwa</th>
							<th>Lk</th>
							<th>Pr</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($main as $data): ?>
						<tr>
							<td><?= $data['no'] ?></td>
							<td><?= strtoupper($data['dusun']) ?></td>
							<td><?= strtoupper($data['rw']) ?></td>
							<td><?= $data['jumlah_warga'] ?></td>
							<td><?= $data['jumlah_warga_l'] ?></td>
							<td><?= $data['jumlah_warga_p'] ?></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
					<tfooter>
						<tr>
							<th colspan="3">TOTAL</th>
							<th><?= $total['total_warga'] ?></th>
							<th><?= $total['total_warga_l'] ?></th>
							<th><?= $total['total_warga_p'] ?></th>
						</tr>
					</tfooter>
				</table>
				<?php else: ?>
				<div>Belum ada data</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
