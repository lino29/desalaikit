<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php if($list_jawab): ?>
<?php $this->load->view($folder_themes .'/partials/analisis/detail') ?>
<?php else: ?>
<div class="card mb-2 fullscreen has-background-img ">
	<div class="card-header border-bottom">
		<div class="media">
			<div class="icon-circle icon-40 bg-light-primary mr-3">
				<i class="material-icons">folder</i>
			</div>
			<div class="media-body">
				<h6 class="my-0 content-color-primary">Daftar Agregasi Data Analisis Desa</h6>
				<p class="small mb-0">
					<i class="material-icons icon-sm">date_range</i> <?= ucwords($this->setting->sebutan_desa)." ".$desa['nama_desa']?>
				</p>
			</div>
		</div>
	</div>
	<div class="card-body">
	<?php if(IS_PREMIUM) : ?>
		<?php if ($list_indikator): ?>
			<?php if (count($master_indikator) > 1) : ?>
			<form action="<?=site_url('data_analisis');?>" method="get">
				<div class="row" style="margin-bottom: 20px;">
					<label style="padding-top: 5px;" class="col-sm-2 control-label" >Analisis: </label>
					<div class="col-sm-6">
						<select class="form-control select2" name="master" onchange="this.form.submit()" style="width: 100%;">
							<?php foreach ($master_indikator as $master): ?>
							<option value="<?= $master['id']?>" <?= selected($list_indikator['0']['id_master'], $master['id'])?> ><?= "{$master['master']} ({$master['tahun']})"?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
			</form>
			<?php endif; ?>
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover">
					<tbody>
						<tr>
							<td width="15%">Pendataan </td>
							<td width="1%">:</td>
							<td><?= $list_indikator['0']['master']; ?></td>
						</tr>
						<tr>
							<td>Subjek </td>
							<td>:</td>
							<td><?= $list_indikator['0']['subjek']; ?></td>
						</tr>
						<tr>
							<td>Tahun </td>
							<td>:</td>
							<td><?= $list_indikator['0']['tahun']; ?></td>
						</tr>
					</tbody>
				</table>
			</div>
			<h4 style="margin-top: 15px; margin-bottom: 10px;">Indikator</h4>
			<div class="table-responsive">
				<table id="analisis" class="table table-striped">
					<thead>
						<tr>
							<th>Kode</th>
							<th>Indikator</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($list_indikator AS $data): ?>
					<tr>
						<td width="5%"><?= $data['nomor'].'.'; ?>
						<td><a href="<?= site_url("jawaban_analisis/$data[id]/$data[subjek_tipe]/$data[id_periode]"); ?>"><b><?= $data['indikator']?></b></a></td>
					</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		<?php else: ?>
		<div class="font-weight-bold text-center mt-4 mb-4">
			<h5>Data tidak tersedia.</h5>
		</div>
		<?php endif; ?>
	<?php else: ?>
	<div class="table-responsive">
		<table id="analisis" class="table table-striped">
			<thead>
				<tr>
					<th>Pendataan</th>
					<th>Subjek</th>
					<th>Indikator</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($list_indikator AS $data): ?>
				<tr>
					<td><?= $data['master']; ?></td>
					<td><?= $data['subjek']; ?> (<?= $data['tahun']; ?>)</td>
					<td><a href="<?= site_url("data_analisis/$data[id]/$data[subjek_tipe]/$data[id_periode]"); ?>"><b><?= $data['indikator']?></b></a></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<?php endif; ?>
	</div>
	<script>
		$(document).ready(function() {
			var table = $('#analisis').DataTable( {
                'processing': true,
                'order': [],
                'pageLength': 25,
                'language': {
                    'url': BASE_URL + '/assets/bootstrap/js/dataTables.indonesian.lang'
                    }
				} )
				.columns.adjust()
				.responsive.recalc();
		} );
	</script>
</div>
<?php endif; ?>
