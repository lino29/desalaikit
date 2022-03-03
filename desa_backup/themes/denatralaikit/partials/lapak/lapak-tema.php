<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php $file = __DIR__ . '/lapak.json'; ?>
<?php if(is_file($file)) : ?>
<?php $json = file_get_contents($file); ?>
<?php $array = json_decode($json, true); ?>
<?php if($array['aktif']) : ?>
<style>
.map {
  width:100%;
  height:70vh;
}
#qrcode .panel-body-lg {
  margin-right: 5px;
  margin-bottom: 20px;
  pointer-events: visiblePainted;
	pointer-events: auto;
  position: relative;
  z-index: 800;
}
.leaflet-popup-content {
  height: auto;
  width: 225px;
  overflow-y: scroll;
}
</style>
<div class="mt-0 mb-1 z-index-2">
	<div id="accordion3">
		<div class="card">
			<button class="btn btn-link text-white p-0" data-toggle="collapse" data-target="#produk_desa" aria-expanded="true" aria-controls="produk_desa">
				<div class="card-header pink-gradient font-weight-bold" id="headingFour3">LAPAK ONLINE <?= strtoupper($this->setting->sebutan_desa) ?><i class="material-icons icon arrow">expand_more</i></div>
			</button>
			<div id="produk_desa" class="collapse" aria-labelledby="headingFour3" data-parent="#accordion3">
				<div class="container-fluid">
        			<div class="row">
        				<?php shuffle($array['lapak']); foreach($array['lapak'] as $index => $product) : ?>
        				<?php $hp = $array['multi'] ? $product['hp'] : $array['default_hp'] ?>
        				<?php $link = $array['mode'] == 'hp' ? 'https://api.whatsapp.com/send?phone='.$hp.'&text=Saya Mau Pesan '.$product['produk'] : $product['link'] ?>
        				<?php $gambar = base_url($this->theme_folder.'/'.$this->theme .'/assets/lapak/' . $product['gambar']) ?>
        				<div class="col-12 <?= config_item('fluid') ? 'col-lg-3 col-md-3' : 'col-lg-4 col-md-4' ?> order-2 order-md-1">
        					<div class="card mb-2 mt-0">
        						<div class="card-body py-0">
        						    <div class="row border-bottom">
        						        <?php
                                        $allowed = array('mp4', 'webm', 'ogg');
                                        $filename = pathinfo($gambar);
                                        $ext = $filename['extension'];
                                        $allowed_pic = array('jpg', 'png', 'jpeg');
                                        $filename_pic = pathinfo($gambar);
                                        $ext_pic = $filename['extension'];
                                        if (in_array($ext, $allowed)): ?>
        							    <div class="col-12 p-3 text-center">
        							        <object class="mw-100" height="210">
                                                <param name="src" value="<?= $gambar ?>">
                                                <param name="autoplay" value="false">
                                                <param name="controller" value="true">
                                                <param name="bgcolor" value="#333333">
                                                <embed type="mp4" src="<?= $gambar ?>" autostart="false" loop="false" controller="true" bgcolor="#333333"></embed>
                                            </object>
                                        </div>
                                        <?php elseif (in_array($ext_pic, $allowed_pic)): ?>
                                        <div class="col-12 p-3 text-center">
                                            <a data-fancybox="gallery" href="<?= $gambar ?>">
                                                <img src="<?= $gambar ?>" alt="<?= $product['produk'] ?>" class="mw-100" loading="lazy">
                                            </a>
                                        </div>
                                        <?php else: ?>
                                        <div class="col-12 p-3 text-center">
                                            <iframe class="mw-100" height="171" src="<?= $gambar ?>" frameborder="no" loading="lazy"></iframe>
                                        </div>
                                        <?php endif; ?>
        								<div class="col-12 mb-2">
        									<div class="card no-shadow h-100">
													<div class="font-weight-bold "><?= $product['produk'] ?></div>													
        													<?php
        													if ($gambar) {
        														$harga_produk = number_format($product['diskon']);
        														$diskon = '<small class="text-danger font-weight-light "><s>Rp. ' . number_format($product['harga']) . ',-</s></small>';
        													} else {
        														$harga_produk = number_format($product['harga']);
        													}
            												?>
													<span class="text-success"><b>Rp. <?= $harga_produk; ?>,- </b> <?= $diskon; ?></small></b>
													</span>
													<div class="d-flex justify-content-between align-items-center mt-2">
														<div class="btn-group">
														<a class="btn btn-sm btn-success" href="<?= $link ?>" rel="noopener noreferrer" target="_blank" title="WhatsApp"><i class="fa fa-whatsapp"></i> Pesan</a>
														<a class="btn btn-sm btn-danger text-white" data-remote="false" data-toggle="modal" data-target="#modalBesar<?= $product['id']; ?>" title="Titik Lokasi"><i class="fa fa-map"></i> Lokasi</a>
														<a class="btn btn-sm btn-primary text-white" data-remote="false" data-toggle="modal" data-target="#descModal<?= $product['id']; ?>" title="Deskripsi"><i class="fa fa-info-circle"></i> Deskripsi</a>
														</div>
													</div>
        									</div>
        								</div>
        							</div>
        						</div>
        					</div>
        				</div>
        	    		<?php endforeach; ?>
            		</div>
        		</div>
        	</div>
        </div>
    </div>
</div>
<?php foreach($array['lapak'] as $index => $product) : ?>
<?php $hp2 = $array['multi'] ? $product['hp'] : $array['default_hp'] ?>
<?php $link2 = $array['mode'] == 'hp' ? 'https://api.whatsapp.com/send?phone='.$hp.'&text=Saya Mau Pesan '.$product['produk'] : $product['link'] ?>
<div class="modal fade" id="modalBesar<?= $product['id']; ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class='modal-content'>
			<div class='modal-header'>
				<h6 class='modal-title' id='myModalLabel'><?=$product['judul']?></h6>
				<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
			</div>
			<div class='modal-body'>
				<div class="map" id="map_canvas<?= $product['id']; ?>">
					<div class="leaflet-bottom leaflet-right">
						<div id="qrcode">
							<div class="panel-body-lg">
								<a href="https://github.com/OpenSID/OpenSID">
									<img src="<?= base_url()?>assets/images/opensid.png" alt="OpenSID">
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="descModal<?= $product['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="descModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="descModalLabel"><?=$product['produk']?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5><i class="fa fa-user"></i>&nbsp;<?=$product['judul']?></h5>
                <?= $product['deskripsi'] ?><br><br>
                Kontak: <?= $hp2; ?>
            </div>
            <div class="modal-footer">
                <div class="btn-group">
				<a class="btn btn-sm btn-success" href="<?= $link2 ?>" rel="noopener noreferrer" target="_blank" title="WhatsApp"><i class="fa fa-whatsapp"></i> Pesan</a>
                <a class="btn btn-sm btn-danger" href="https://www.google.com/maps/dir//<?= $product['lat']; ?>,<?= $product['lng']; ?>" rel="noopener noreferrer" target="_blank" title="Titik Lokasi"><i class="fa fa-map-marker"></i> Titik Lokasi</a>
				</div>
			</div>
        </div>
    </div>
</div>
<?php endforeach; ?>
<script>
$(document).ready(function(){
<?php foreach($array['lapak'] as $index => $product) : ?>
<?php $gambar = base_url($this->theme_folder.'/'.$this->theme .'/assets/lapak/' . $product['gambar']) ?>
  $('#modalBesar<?= $product['id']; ?>').on('shown.bs.modal', function(){
    var container = L.DomUtil.get('map<?= $product['id']; ?>'); if(container != null){ container._leaflet_id = null; }
    var map<?= $product['id']; ?> = L.map('map_canvas<?= $product['id']; ?>').setView([<?= $product['lat']; ?>,<?= $product['lng']; ?>], 15);
    var logo = L.icon({
      iconUrl: '<?= BASE_URL()?>assets/images/gis/point/fastfood.png',
      iconSize:     [32, 32], // size of the icon
      iconAnchor:   [16, 16], // point of the icon which will correspond to marker's location
      popupAnchor:  [-1,1] // point from which the popup should open relative to the iconAnchor
    });
    var foto = "<img src='<?= $gambar; ?>' class='mw-100' style='border-radius:1px;-moz-border-radius:3px;-webkit-border-radius:1px;'/>";
    var info_tempat =
    '<div id="content">'
    + '<h6><b style="color:red"><center>' + <?=json_encode($product['produk'])?> + '</center></b></h6>'
    + '<?php $allowed = array("mp4", "webm", "ogg"); $filename = pathinfo($gambar); $ext = $filename["extension"]; $allowed_pic = array('jpg', 'png', 'jpeg');
    $filename_pic = pathinfo($gambar);
    $ext_pic = $filename['extension']; if (in_array($ext, $allowed)): ?>'
    + '<div class="col-12 p-3 text-center">'
    + '    <object class="mw-100">'
    + '      <param name="src" value="<?= $gambar; ?>">'
    + '      <param name="autoplay" value="false">'
    + '      <param name="controller" value="true">'
    + '      <param name="bgcolor" value="#333333">'
    + '      <embed type="mp4" src="<?= $gambar; ?>" autostart="false" loop="false" controller="true" bgcolor="#333333"></embed>'
    + '    </object>'
    + '</div>'
    + '<?php elseif (in_array($ext_pic, $allowed_pic)): ?>'
    + '<div id="bodyContent" class="mb-2 text-center">'+ foto
    + '</div>'
    + '<?php else: ?>'
    + '<div class="col-12 p-3 text-center">'
    + '<iframe class="mw-100" src="<?= $gambar; ?>" frameborder="no" loading="lazy"></iframe>'
    + '</div>'
    + '<?php endif; ?>'
    + '<table>'
    + '<tr>'
    + '<td width="60px" valign="top">Produksi</td>'
    + '<td width="10px" valign="top">:</td>'
    + '<td><b style="color:red">' + <?=json_encode($product['judul'])?> + '</b></td>'
    + '</tr>'
    + '<tr>'
    + '<td width="60px">Harga</td>'
    + '<td width="10px">:</td>'
    + '<td><s>Rp. ' + <?=json_encode($product['harga'])?> + ',-</s> Rp. ' + <?=json_encode($product['diskon'])?> + ',-</td>'
    + '</tr>'
    + '<tr>'
    + '<td width="60px" valign="top">Alamat</td>'
    + '<td width="10px" valign="top">:</td>'
    + '<td>' + <?=json_encode($product['alamat'])?> + '</td>'
    + '</tr>'
    + '<tr>'
    + '<td width="60px">Kontak</td>'
    + '<td width="10px">:</td>'
    + '<td>' + <?=json_encode(substr_replace($product['hp'],'0',0,2))?> + '</td>'
    + '</tr>'
    + '<tr>'
    + '<td width="60px">Tujuan</td>'
    + '<td width="10px">:</td>'
    + '<td><a class="btn btn-sm btn-danger danger-gradient mt-0" target="_blank" rel="noopener noreferrer" href="https://www.google.com/maps/dir//'+<?= $product['lat']; ?> +','+<?= $product['lng']; ?>+'/"><i class="fa fa-map-marker"></i> Arah ke Lokasi</a></td>'
    + '</tr>'
    + '</table>'
    + '</div>';
    var lapakmark = L.marker([<?= $product['lat']; ?>,<?= $product['lng']; ?>],{icon:logo}).addTo(map<?= $product['id']; ?>)
    .bindPopup(info_tempat).openPopup();
    L.control.scale().addTo(map<?= $product['id']; ?>);
  	var baseLayers = getBaseLayers(map<?= $product['id']; ?>, '<?=$this->setting->google_key?>');
  	L.control.layers(baseLayers, null, {position: 'topright', collapsed: true}).addTo(map<?= $product['id']; ?>);
    map<?= $product['id']; ?>.invalidateSize();
  });
  <?php endforeach; ?>
});
</script>
<?php endif ?>
<?php endif ?>
