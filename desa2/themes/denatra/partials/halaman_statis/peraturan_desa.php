<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="fullscreen has-background-img">
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
						<a href="javascript:void(0);" class="icon-circle icon-30 content-color-secondary fullscreenbtn">
							<i class="material-icons ">crop_free</i>
						</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                    <div class="col-12">
                        <form id="peraturanForm" onsubmit="formAction(); return false;">
                            <div class="row">
                                <div class="col-12 col-lg-3 col-md-3">
                                    <select class="form-control" name="kategori" id="kategori" onchange="formAction()" style="margin-top: 0.2rem;">
                                        <option value="">Jenis - Semua</option>
                                        <?php foreach($kategori as $s): ?>
                                        <option value="<?= $s['id'] ?>" <?php selected($s['id'], $kategori_dokumen) ?>><?= $s['nama'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-12 col-lg-3 col-md-3">
                                    <select class="form-control" name="tahun" id="tahun" onchange="formAction()" style="margin-top: 0.2rem;">
                                        <option value="">Tahun - Semua</option>
                                        <?php foreach($tahun as $t): ?>
                                        <option value="<?= $t['tahun'] ?>" <?php selected($t['tahun'], $tahun_dokumen) ?> ><?= $t['tahun'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-12 col-lg-3 col-md-3">
                                    <input type="text" name="tentang" id="tentang" class="form-control" placeholder="Tentang" style="margin-top: 0.2rem;">
                                </div>
                                <div class="col-12 col-lg-3 col-md-3">
                                    <button type="submit" class="btn btn-info" style="margin-top: 0.2rem;"><i class="fa fa-search"></i> Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            	<div style="margin-right: 1rem; margin-left: 1rem;">
            		<table class="table table-striped table-bordered" id="jdih-table">
            			<thead>
            				<tr>
            					<th class="text-center">Judul Produk Hukum</th>
            					<th class="text-center">Jenis</th>
            					<th class="text-center">Tahun</th>
            				</tr>
            			</thead>
            			<tbody id="tbody-dokumen">
            			</tbody>
            		</table>
            	</div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $('#jdih-table').DataTable({
    	"dom": 'rt<"bottom"p><"clear">',
    	"destroy": true,
      "paging": false,
      "ordering": false
    });

    get_table();
} );

function get_table() {
  var url = "<?= site_url('first/ajax_table_peraturan')?>";

  $.ajax({
    type: "GET",
    url: url,
    dataType: "JSON",
    success: function(data)
    {
      var html;
      if (data.length == 0)
      {
        html = "<tr><td colspan='3' align='center'>No Data Available</td></tr>";
      }
      for (var i = 0; i < data.length; i++)
      {
        html += "<tr>"+"<td><a href='<?= site_url('dokumen_web/unduh_berkas/')?>"+data[i].id+"'>"+data[i].nama+"</a></td>"+
        "<td align='center'>"+data[i].kategori+"</td>"+
        "<td align='center'>"+data[i].tahun+"</td></tr>";
      }
      $('#tbody-dokumen').html(html);
    },
    error: function(err, jqxhr, errThrown)
    {
      console.log(err);
    }
  })
}

function formAction()
{
  $('#tbody-dokumen').html('');
  var url = "<?= site_url('first/filter_peraturan') ?>";
  var kategori = $('#kategori').val();
  var tahun = $('#tahun').val();
  var tentang = $('#tentang').val();

  $.ajax({
    type: "POST",
    url: url,
    data: {
      kategori: kategori,
      tahun: tahun,
      tentang: tentang
    },
    dataType: "JSON",
    success: function(data)
    {
      var html;
      if (data.length == 0)
      {
        html = "<tr><td colspan='3' align='center'>No Data Available</td></tr>";
      }
      for (var i = 0; i < data.length; i++)
      {
        html += "<tr>"+"<td><a href='<?= site_url('dokumen_web/unduh_berkas/')?>"+data[i].id+"'>"+data[i].nama+"</a></td>"+
        "<td align='center'>"+data[i].kategori+"</td>"+
        "<td align='center'>"+data[i].tahun+"</td></tr>";
      }
      $('#tbody-dokumen').html(html);
    },
    error: function(err, jqxhr, errThrown)
    {
      console.log(err);
    }
  })
}
</script>
