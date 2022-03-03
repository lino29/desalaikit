<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="card mb-2 fullscreen has-background-img ">
	<div class="card-header border-bottom">
		<div class="media">
			<div class="icon-circle icon-40 bg-light-primary mr-3">
				<i class="material-icons">view_day</i>
			</div>
			<div class="media-body">
				<h6 class="my-0 content-color-primary">Data Kelompok</h6>
				<p class="small mb-0">
					<i class="material-icons icon-sm">local_offer</i> <?= $detail['kategori']?>
				</p>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="mb-0 content-color-secondary">
			<div class="table-responsive">
			    <h5 class="subtitle">Rincian Kelompok</h5>
				<table class="table table-bordered table-striped table-hover">
					<tbody>
						<tr>
							<td width="20%">Kode Kelompok</td>
							<td width="1"> : </td>
							<td><?= $detail['kode']?></td>
						</tr>
						<tr>
							<td>Nama Kelompok</td>
							<td> : </td>
							<td><?= $detail['nama']?></td>
						</tr>
						<tr>
							<td>Keterangan</td>
							<td> : </td>
							<td><?= $detail['keterangan']?></td>
						</tr>
					</tbody>
				</table>
			</div>
			<h5>Daftar Anggota</h5>
			<div class="table-responsive">
				<table id="tabel-data" class="table table-striped">
					<thead>
						<tr>
							<th>No. Anggota</th>
							<th>Nama</th>
							<th>Jabatan</th>
							<th>Jenis Kelamin</th>
							<th>Umur</th>
							<th>Alamat</th>
						</tr>
					</thead>
					<tbody>
					    <?php foreach ($pengurus as $key => $data): ?>
						<tr>
							<td><?= $data['no_anggota'] ?:'-'; ?></td>
							<td nowrap><?= $data['nama']?></td>
							<td><?= $data['jabatan']?></td>
							<td><?= $data['sex']; ?></td>
							<td><?= $data['umur']; ?></td>
							<td><?= $data['alamat']?></td>
						</tr>
					    <?php endforeach; ?>
					    <?php foreach ($anggota as $key => $data): ?>
						<tr>
							<td><?= $data['no_anggota'] ?:'-'; ?></td>
							<td nowrap><?= $data['nama']; ?></td>
							<td><?= $data['jabatan']; ?></td>
							<td><?= $data['sex']; ?></td>
							<td><?= $data['umur']; ?></td>
							<td><?= $data['alamat']; ?></td>
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
