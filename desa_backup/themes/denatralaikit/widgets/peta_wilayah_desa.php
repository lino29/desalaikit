<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="card mb-1 z-index-1">
	<div class="card-header border-bottom">
		<div class="media">
			<div class="media-body">
				<h4 class="content-color-primary mb-0"><i class="material-icons icon-sm">map</i> <?="Wilayah ".ucwords($this->setting->sebutan_desa)?></h4>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div id="map_wilayah" style="height:212px;"></div>
		<a href="https://www.openstreetmap.org/#map=15/<?=$data_config['lat']."/".$data_config['lng']?>" rel="noopener noreferrer" target="_blank">
			<button class="btn btn-success btn-block mt-1">Buka Peta</button>
		</a>
	</div>
</div>
<script>
  //Jika posisi kantor desa belum ada, maka posisi peta akan menampilkan seluruh Indonesia
  <?php if (!empty($data_config['lat']) && !empty($data_config['lng'])): ?>
  var posisi = [<?=$data_config['lat'].",".$data_config['lng']?>];
  var zoom = <?=$data_config['zoom'] ?: 10?>;
  <?php else: ?>
    var posisi = [-1.0546279422758742,116.71875000000001];
    var zoom = 10;
  <?php endif; ?>
  //Style polygon
  var style_polygon = {
    stroke: true,
    color: '#FF0000',
    opacity: 1,
    weight: 2,
    fillColor: '#8888dd',
    fillOpacity: 0.5
  };
  var wilayah_desa = L.map('map_wilayah').setView(posisi, zoom);

  //Menampilkan BaseLayers Peta
  var baseLayers = getBaseLayers(wilayah_desa, '<?= $this->setting->mapbox_key; ?>');

  L.control.layers(baseLayers, null, {position: 'topright', collapsed: true}).addTo(wilayah_desa);

  <?php if (!empty($data_config['path'])): ?>
    var polygon_desa = <?= $data_config['path']; ?>;
    var kantor_desa = L.polygon(polygon_desa, style_polygon).bindTooltip("Wilayah Desa").addTo(wilayah_desa);
    wilayah_desa.fitBounds(kantor_desa.getBounds());
  <?php endif; ?>
</script>
