<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php include("$this->theme_folder/$this->theme/commons/statistik_pengunjung.php"); ?>
<div class="card mb-1">
	<div class="card-header border-bottom">
		<div class="media">
			<div class="media-body">
				<h4 class="content-color-primary"><i class="material-icons icon-sm">assessment</i> Statistik Pengunjung</a></h4>
			</div>    
		</div>
	</div>
	<div class="card-body text-center">
		<table class="table table-striped table-inverse" >
			<tr>
				<td style="text-align:left">Hari ini</td><td>:</td><td style="text-align:right"><?= ribuan($hari_ini) ?></td>
			</tr>
			<tr>
				<td style="text-align:left">Kemarin</td><td>:</td><td style="text-align:right"><?= ribuan($kemarin) ?></td>
			</tr>
			<tr>
				<td style="text-align:left">Total Pengunjung</td><td>:</td><td style="text-align:right"><?= ribuan($total) ?></td>
			</tr>
			<tr>
				<td style="text-align:left">Sistem Operasi</td><td>:</td><td style="text-align:right"><?= $os; ?></td>
			</tr>
			<tr>
				<td style="text-align:left">IP Address</td><td>:</td><td style="text-align:right"><?= $ip_address; ?></td>
			</tr>
			<tr>
				<td style="text-align:left">Browser</td><td>:</td><td style="text-align:right"><?= $browser; ?></td>
			</tr>
		</table>
	</div>
</div>
