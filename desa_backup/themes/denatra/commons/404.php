<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="container main-container h-100">
    <div class="row align-items-center ">
        <div class="col-12 mx-auto text-center">
            <img src="<?= base_url("$this->theme_folder/$this->theme/assets/img/404.svg") ?>" alt="" class="mw-100 mt-2">
            <h2 class="text-black">UPS! HALAMAN TIDAK DITEMUKAN</h2>
            <p class="lead mb-4 text-black">Maaf, halaman ini belum tersedia atau sedang dalam perbaikan.</p>
            <a href="<?= site_url() ?>">
                <button class="btn btn-success success-gradient btn-rounded mb-4" type="button">
                    <span class="icon fa fa-angle-double-left mr-2"></span> Kembali ke Halaman Utama
                </button>
            </a>
        </div>
    </div>
</div>
