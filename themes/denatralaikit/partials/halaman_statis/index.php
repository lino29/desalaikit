<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="fullscreen has-background-img">
    <div class="row">
        <div class="col-sm-12">
            <div class="card mb-1 fullscreen">
                <div class="card-header border-bottom">
                    <div class="media">
                        <div class="icon-circle icon-40 bg-light-primary mr-3">
                            <i class="material-icons">map</i>
                        </div>
                        <div class="media-body">
                            <h6 class="my-0 content-color-primary">Peta Wilayah</h6>
                            <p class="small mb-0">
                                <i class="material-icons icon-sm">date_range</i> <?= ucwords($this->setting->sebutan_desa)." ".$desa['nama_desa']?>
                            </p>
                        </div>
						<a href="javascript:void(0);" class="icon-circle icon-30 content-color-secondary fullscreenbtn">
							<i class="material-icons ">crop_free</i>
						</a>
                    </div>
                </div>
                <div class="card-body z-index-1">
                    <?php $this->load->view($halaman_peta); ?>
                </div>
            </div>
        </div>
    </div>
</div>
