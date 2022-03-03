<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="fullscreen has-background-img ">
	<div class="row">
		<div class="col-sm-12">
			<div class="card mb-4 fullscreen">
				<div class="card-header border-bottom">
					<div class="media">
						<div class="icon-circle icon-40 bg-light-primary mr-3">
							<i class="material-icons">favorite</i>
						</div>
						<div class="media-body">
							<h6 class="my-0 content-color-primary">Tabel <?= $heading ?></h6>
							<p class="small mb-0">
								<i class="material-icons icon-sm">date_range</i> <?= ucwords($this->setting->sebutan_desa)." ".$desa['nama_desa']?>
							</p>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped table-bordered" id="info_publik">
							<thead>
								<tr>
									<th>No</th>
									<th>Judul Informasi</th>
									<th>Tahun</th>
									<th>Kategori</th>
									<th>Tanggal Upload</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    var url = "<?= site_url('first/ajax_informasi_publik')?>";
    table = $('#info_publik').DataTable({
      'processing': true,
      'serverSide': true,
      "pageLength": 10,
      'order': [],
      "ajax": {
        "url": url,
        "type": "POST"
      },
      //Set column definition initialisation properties.
      "columnDefs": [
      {
          "targets": [ 0 ], //first column / numbering column
          "orderable": false, //set not orderable
        },
        ],
        'language': {
          'url': BASE_URL + '/assets/bootstrap/js/dataTables.indonesian.lang'
        },
        'drawCallback': function (){
          $('.dataTables_paginate > .pagination').addClass('pagination-sm no-margin');
        }
      });

  } );
</script>
