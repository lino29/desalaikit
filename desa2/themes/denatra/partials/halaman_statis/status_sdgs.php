<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="fullscreen has-background-img z-index-1">
    <div class="row">
        <div class="col-sm-12">
            <div class="card mb-0 fullscreen">
                <div class="card-header border-bottom">
                    <div class="media">
                        <div class="icon-circle icon-40 bg-light-primary mr-3">
                            <i class="material-icons">map</i>
                        </div>
                        <div class="media-body mt-1">
                            <h6 class="my-0 content-color-primary">SDGs Desa</h6>
                            <p class="small mb-0">
                                <i class="material-icons icon-sm">date_range</i> <?= ucwords($this->setting->sebutan_desa)." ".$desa['nama_desa']?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php if ($evaluasi): ?>
                    <div class="panel-group" id="kemendes-sdgs" role="tablist" aria-multiselectable="true">
                        <?php foreach ($evaluasi as $index => $heading) : ?>
                        <div class="border-bottom">
                            <div class="media mt-2 mb-2">
                                <div class="icon-circle icon-30 bg-light-primary mr-2">
                                    <img height="30" src="<?= $heading['icon'] ?>"/>
                                </div>
                                <div class="media-body mt-1" role="tab">
                                    <h6 class="my-0 content-color-primary">
                                        <a role="button" data-toggle="collapse"  href="#<?= 'side'.$index ?>" aria-expanded="true"><?= $heading['uraian'] ?></a>
                                    </h6>
                                    <div id="<?= 'side'.$index ?>" class="panel-collapse collapse">
                                      <table class="table mt-3">
                                          <?php foreach ($heading['sub'] as $list) : ?>
                                          <tr>
                                              <td><?= $list['uraian'] ?></td>
                                              <td><?= $list['value'] ?></td>
                                          </tr>
                                          <?php endforeach ?>
                                      </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                        <div class="text-left mt-2">
							Sumber data : sid.kemendesa.go.id
                        </div>
                    </div>
                    <?php else: ?>
					<div class="text-center mt-2">
						<img src="<?= base_url("$this->theme_folder/$this->theme/assets/img/404.svg") ?>" alt="" class="mw-100 mt-2 mb-2">
						<h4 class="text-black">Maaf. Halaman ini tidak dapat di akses.</h4><hr>
					</div>
            		<?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
  $( document ).ready(function() {
    $('#side0').collapse()
  });
</script>
