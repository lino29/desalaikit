<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php if ($this->setting->covid_data) : ?>
<?php
//API Local Data COVID19
$odpd = $covid[0]; //"Orang Dalam Pemantauan (ODP)" => "ODP",
$pdpd = $covid[1]; //"Pasien Dalam Pengawasan (PDP)" => "PDP",
$odr = $covid[2]; //"Orang Dalam Resiko (ODR)" => "ODR"
$otg = $covid[3]; //"Orang Tanpa Gejala (OTG)" => "OTG",
$positif = $covid[4]; //"Positif Covid-19" => "POSITIF",
?>
<div class="row">
    <div class="col-12 mb-1 z-index-1">
        <div id="accordion2">
            <div class="card">
                <button class="btn btn-link text-white p-0" data-toggle="collapse" data-target="#collapseFour2" aria-expanded="true" aria-controls="collapseFour2">
                    <div class="card-header bg-primary font-weight-bold" id="headingFour2">LIVE DATA STATUS COVID-19 <i class="material-icons icon arrow">expand_more</i></div>
                </button>
                <div id="collapseFour2" class="collapse" aria-labelledby="headingFour2" data-parent="#accordion2">
                    <div class="card-body">
                        <div class="row">
                            <?php if ($this->setting->covid_desa) : ?>
							<div id="covid-desa" class="col-12 mb-2">
								<div class="media border-bottom">
									<div class="media-body">
										<span class="font-weight-bold" data-name="wilayah">
											<a href=""><?= strtoupper($this->setting->sebutan_desa . ' ' . $desa['nama_desa']); ?></a>
										</span>
									</div>
								</div>
								<div class="row">
								<?php if(IS_PREMIUM) : ?>
									<?php foreach ($covid as $key => $val):
										if ($key >= 7) break;
										if($key >= 3) echo '<br/>'
									?>
									<div class="col-6 col-lg-3 col-md-3 px-2 py-1">
										<div class="square covid odr">
											<span><?= $val['nama']; ?></span>
											<span><?= number_format($val['jumlah']); ?></span>
											<span class="small">Orang</span>
										</div>
									</div>
									<?php endforeach; ?>
									<div class="col-6 col-lg-3 col-md-3 px-2 py-1">
										<div class="square covid odr">
											<span>Jumlah Terdata</span>
											<span><?= number_format($val['jumlah']); ?></span>
											<span class="small">Orang</span>
										</div>
									</div>
								<?php else: ?>
								<div class="col-6 col-lg-3 col-md-3 px-2 py-1">
                                            <div class="square covid odr">
                                                <span>Kontak Erat</span>
                                                <span data-name="odp"><?= ribuan($odpd['jumlah']) ?></span>
                                                <span class="small">Orang</span>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3 col-md-3 px-2 py-1">
                                            <div class="square covid pdp">
                                                <span>Suspek</span>
                                                <span data-name="pdp"><?= ribuan($pdpd['jumlah']) ?></span>
                                                <span class="small">Orang</span>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3 col-md-3 px-2 py-1">
                                            <div class="square covid positif">
                                                <span>Konfirmasi</span>
                                                <span data-name="positif"><?= ribuan($positif['jumlah']) ?></span>
                                                <span class="small">Orang</span>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3 col-md-3 px-2 py-1">
                                            <div class="square covid odp">
                                                <span>Discarded</span>
                                                <span data-name="odr"><?= ribuan($odr['jumlah']) ?></span>
                                                <span class="small">Orang</span>
                                            </div>
                                        </div>
								<?php endif; ?>
								</div>
							</div>
                            <?php endif ?>
    						<?php if ($this->setting->provinsi_covid) : ?>
							<div id="covid-provinsi" class="col-12 col-md-6 mb-2">
								<div class="media border-bottom">
									<div class="media-body">
										<span class="font-weight-bold">
											<a href="http://covid19.go.id/" rel="noopener noreferrer" target="_blank">COVID-19 di <span class="nama-wilayah1">Loading...</span></a>
										</span>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-4 col-md-4 col-12 px-2 py-1">
										<div class="square covid positif">
											<span>Terkonfirmasi</span>
											<span data-status="positif"></span>
											<span class="small">Orang</span>
										</div>
									</div>
									<div class="col-lg-4 col-md-4 col-6 px-2 py-1">
										<div class="square covid sembuh">
											<span>Total Sembuh</span>
											<span data-status="sembuh"></span>
											<span class="small">Orang</span>
										</div>
									</div>
									<div class="col-lg-4 col-md-4 col-6 px-2 py-1">
										<div class="square covid meninggal">
											<span>Total Meninggal</span>
											<span data-status="meninggal"></span>
											<span class="small">Orang</span>
										</div>
									</div>
								</div>
							</div>
                            <?php endif ?>
                            <div id="covid-nasional" class="col-12 col-md-6">
                                <div class="media border-bottom">
                                    <div class="media-body">
                                        <span class="font-weight-bold">
                                            <a href="http://covid19.go.id/" rel="noopener noreferrer" target="_blank">COVID-19 di <span class="nama-wilayah2">Loading...</span></a>
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-12 px-2 py-1">
                                        <div class="square covid positif">
                            				<span>Terkonfirmasi</span>
                                            <span data-status="positif1"></span>
                                            <span class="small">Orang</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-6 px-2 py-1">
                                        <div class="square covid sembuh">
                                            <span>Total Sembuh</span>
                                            <span data-status="sembuh1"></span>
                                            <span class="small">Orang</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-6 px-2 py-1">
                                        <div class="square covid meninggal">
                                            <span>Total Meninggal</span>
                                            <span data-status="meninggal1"></span>
                                            <span class="small">Orang</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif ?>
<?php $this->load->view('head_tags_front') ?>
<script>
	const COVID_API_URL = 'https://api.kawalcorona.com/';
	const KODE_PROVINSI = <?= $this->setting->provinsi_covid ? : 'undefined' ?> ;
	const ENDPOINT = KODE_PROVINSI ? 'indonesia/provinsi/' : 'indonesia/';

	function numberFormat(num) {
		return new Intl.NumberFormat('id-ID').format(num);
	}

	function parseToNum(data) {
		return parseFloat(data.toString().replace(/,/g, ''));
	}

	function showData(result) {
		const data = result[0];
		const wilayah = KODE_PROVINSI ? data.attributes.Provinsi : data.name;
		const meninggal = parseToNum(KODE_PROVINSI ? data.attributes.Kasus_Meni : data.meninggal);
		const sembuh = parseToNum(KODE_PROVINSI ? data.attributes.Kasus_Semb : data.sembuh);
		const positif = parseToNum(KODE_PROVINSI ? data.attributes.Kasus_Posi : data.positif);
		const perawatan = positif - (sembuh + meninggal);
		const attributes = ['positif', 'perawatan', 'sembuh', 'meninggal'];

		$('.nama-wilayah1').html(`${wilayah}`);
		attributes.forEach(function (attr) {
			$(`[data-status=${attr}]`).html(numberFormat(eval(attr)));
		})
	}

	function showData1(result) {
		const data = result[0];
		const wilayah = data.name;
		const meninggal1 = parseToNum(data.meninggal);
		const sembuh1 = parseToNum(data.sembuh);
		const positif1 = parseToNum(data.positif);
		const perawatan1 = positif1 - (sembuh1 + meninggal1);
		const attributes = ['positif1', 'perawatan1', 'sembuh1', 'meninggal1'];

		$('.nama-wilayah2').html(`${wilayah}`);
		attributes.forEach(function (attr) {
			$(`[data-status=${attr}]`).html(numberFormat(eval(attr)));
		})

	}

	function showError() {
		$('.nama-wilayah').html('');
		$('#covid .panel-body.text-center').html('<span class="text-small">Gagal mengambil data</span>');
	}

	$(document).ready(function () {
		try {
			$.ajax({
				type: "POST",
				dataType: 'json',
				async: true,
				cache: true,
				url: '<?= site_url("ambil_data_covid")?>',
				data: {
					endpoint: COVID_API_URL + ENDPOINT
				},
				success: function (response) {
					const result = response.filter(data => KODE_PROVINSI ? data.attributes.Kode_Provi == KODE_PROVINSI :
						data);
					showData(result);
				},
				error: function (err) {
					showError();
				}
			});
		} catch (error) {
			showError()
		}

		try {
			$.ajax({
				type: "POST",
				dataType: 'json',
				async: true,
				cache: true,
				url: '<?= site_url("ambil_data_covid")?>',
				data: {
					endpoint: 'https://api.kawalcorona.com/indonesia/'
				},
				success: function (response) {
					const result = response.filter(data => data);
					showData1(result);
				},
				error: function (err) {
					showError();
				}
			});
		} catch (error) {
			showError()
		}
	})
</script>
