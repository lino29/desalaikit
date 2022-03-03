<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php 
  $s_links = [
    [
      'target' => 'statistikPenduduk',
      'title' => 'Statistik Penduduk',
      'icon' => 'fa-pie-chart',
      'submenu' => [
        [
          'slug' => 'first/statistik/13',
          'title' => 'Umur (Rentang)'
        ],
        [
          'slug' => 'first/statistik/15',
          'title' => 'Umur (Kategori)'
        ],
        [
          'slug' => 'first/statistik/0',
          'title' => 'Pendidikan Dalam KK'
        ],
        [
          'slug' => 'first/statistik/14',
          'title' => 'Pendidikan Sedang Ditempuh'
        ],
        [
          'slug' => 'first/statistik/1',
          'title' => 'Pekerjaan'
        ],
        [
          'slug' => 'first/statistik/2',
          'title' => 'Status Perkawinan'
        ],
        [
          'slug' => 'first/statistik/3',
          'title' => 'Agama'
        ],
        [
          'slug' => 'first/statistik/4',
          'title' => 'Jenis Kelamin'
        ],
        [
          'slug' => 'first/statistik/hubungan_kk',
          'title' => 'Hubungan Dalam KK'
        ],
        [
          'slug' => 'first/statistik/5',
          'title' => 'Warga Negara'
        ],
        [
          'slug' => 'first/statistik/6',
          'title' => 'Status Penduduk'
        ],
        [
          'slug' => 'first/statistik/7',
          'title' => 'Golongan Darah'
        ],
        [
          'slug' => 'first/statistik/9',
          'title' => 'Penyandang Cacat'
        ],
        [
          'slug' => 'first/statistik/10',
          'title' => 'Penyakit Menahun'
        ],
        [
          'slug' => 'first/statistik/16',
          'title' => 'Akseptor KB'
        ],
        [
          'slug' => 'first/statistik/17',
          'title' => 'Akta Kelahiran'
        ],
        [
          'slug' => 'first/statistik/18',
          'title' => 'Kepemilikan KTP'
        ],
        [
          'slug' => 'first/statistik/19',
          'title' => 'Asuransi Kesehatan'
        ],
        [
          'slug' => 'first/statistik/covid',
          'title' => 'Status Covid'
        ],
        [
          'slug' => 'first/statistik/suku',
          'title' => 'Suku / Etnis'
        ],
        [
          'slug' => 'first/statistik/bpjs-tenagakerja',
          'title' => 'BPJS Ketenagakerjaan'
        ]
      ]
    ],
    [
      'target' => 'statistikKeluarga',
      'title' => 'Statistik Keluarga',
      'icon' => 'fa-bar-chart',
      'submenu' => [
        [
          'slug' => 'first/statistik/kelas_sosial',
          'title' => 'Kelas Sosial'
        ]
      ]
    ],
    [
      'target' => 'statistikBantuan',
      'title' => 'Statistik Bantuan',
      'icon' => 'fa-line-chart',
      'submenu' => [
        [
          'slug' => 'first/statistik/bantuan_penduduk',
          'title' => 'Penerima Bantuan Penduduk'
        ],
        [
          'slug' => 'first/statistik/bantuan_keluarga',
          'title' => 'Penerima Bantuan Keluarga'
        ],
        [
          'slug' => 'first/statistik/501',
          'title' => 'BPNT'
        ],
        [
          'slug' => 'first/statistik/502',
          'title' => 'BLSM'
        ],
        [
          'slug' => 'first/statistik/503',
          'title' => 'PKH'
        ],
        [
          'slug' => 'first/statistik/504',
          'title' => 'Bedah Rumah'
        ],
        [
          'slug' => 'first/statistik/505',
          'title' => 'JAMKESMAS'
        ]
      ]
    ],
    [
      'target' => 'statistikLainnya',
      'title' => 'Statistik Lainnya',
      'icon' => 'fa-area-chart',
      'submenu' => [
        [
          'slug' => 'first/dpt',
          'title' => 'Calon Pemilih'
        ],
        [
          'slug' => IS_PREMIUM ? 'data-wilayah' : 'first/wilayah',
          'title' => 'Wilayah Administratif'
        ]
      ]
    ]
  ]
?>
<div id="accordion">
    <?php foreach($s_links as $statistik) : ?>
    <?php $url_slug = str_replace(site_url(), '', current_url()) ?>
    <?php $is_active = array_search($url_slug, array_column($statistik['submenu'], 'slug')) !== false ? true : false ?>
    <div class="card mb-1">
        <button class="btn btn-link text-white font-weight-bold p-0" data-toggle="collapse" data-target="#collapse<?= $statistik['target'] ?>" aria-expanded="<?= $is_active ? 'true' : 'false' ?>" aria-controls="collapse<?= $statistik['target'] ?>">
            <div class="card-header bg-primary text-white" style="text-align:left" id="heading<?= $statistik['target'] ?>">
                <i class="fa <?= $statistik['icon'] ?>" aria-hidden="true"></i>
				<span><?= $statistik['title'] ?></span>
				<i class="material-icons icon arrow">expand_more</i>
            </div>
        </button>
        <div id="collapse<?= $statistik['target'] ?>" class="collapse <?php $is_active && print('show') ?>" aria-labelledby="heading<?= $statistik['target'] ?>" data-parent="#accordion">
            <ul class="nav flex-column">
                <?php foreach($statistik['submenu'] as $submenu) : ?>
                <?php $stat_slug = str_replace('first/', '', $submenu['slug']) ?>
                <?php if($this->web_menu_model->menu_aktif($stat_slug)) : ?>
                <li class="nav-item"><a href="<?= site_url($submenu['slug']) ?>" class="nav-link <?= site_url($submenu['slug']) === current_url() ? 'pink-gradient' : '' ?>"><i class="fa fa-check" aria-hidden="true"></i> <?= $submenu['title'] ?></a></li>
                <?php endif ?>
              <?php endforeach ?>
            </ul>
        </div>
    </div>
    <?php endforeach ?>
</div>
