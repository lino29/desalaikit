<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="card mb-2 fullscreen has-background-img ">
	<div class="card-header border-bottom">
		<div class="media">
			<div class="icon-circle icon-40 bg-light-primary mr-3">
				<i class="material-icons">view_day</i>
			</div>
			<div class="media-body">
				<h6 class="my-0 content-color-primary"><?= $main['suplemen']['nama']; ?></h6>
				<p class="small mb-0">
					<i class="material-icons icon-sm">local_offer</i> Sasaran Terdata : <?= $sasaran[$main['suplemen']['sasaran']]; ?>
				</p>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="mb-0">
			<div class="table-responsive">
				<h5>Data Suplemen</h5>
				<table class="table table-striped">
					<thead>
						<tr>
							<td width="10%">Keterangan</td>
							<td width="1%">:</td>
							<td><?= $main['suplemen']['keterangan']; ?></td>
						</tr>
					</thead>
				</table>
			</div>
			<h5>Daftar Terdata</h5>
			<div class="table-responsive">
				<table class="table table-striped" id="tabel-data">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Jenis Kelamin</th>
							<th>RT</th>
							<th>RW</th>
							<th>Alamat</th>
							<th>Keterangan</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($main['terdata'] as $key => $data): ?>
						<tr>
							<td class="text-center"><?= ($key + 1); ?></td>
							<td><?= $data['terdata_nama']; ?></td>
							<td><?= $data["sex"]; ?></td>
							<td><?= $data["rt"];?></td>
							<td><?= $data["rw"];?></td>
							<td><?= $data["alamat"];?></td>
							<td><?= $data["keterangan"];?></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('#tabel-data').DataTable({
			'processing': true,
			"pageLength": 25,
			'order': [],
			'columnDefs': [
			{
				'searchable': false,
				'targets': 0
			},
			{
				'orderable': false,
				'targets': 0
			}
		],
		'language': {
			'url': BASE_URL + '/assets/bootstrap/js/dataTables.indonesian.lang'
			},
		});
	});
</script>
