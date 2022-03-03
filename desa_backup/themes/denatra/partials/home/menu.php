<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="container-fluid pink-gradient font-weight-bold text-hide-xs">
    <nav class="container<?= config_item('fluid') ? '-fluid' : '' ?> navbar navbar-expand navbar-light">
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?= site_url(); ?>">Beranda</a>
                </li>
                <?php if($menu_atas) : ?>
                <?php foreach($menu_atas as $menu) : ?>
                <?php if(count($menu['submenu']) == 0) : ?>
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?= $menu['link'] ?>"><?= $menu['nama'] ?></a>
                </li>
                <?php endif ?>
                <li class="nav-item dropdown">
                    <?php if(count($menu['submenu']) > 0) : ?>
                    <a class="nav-link dropdown-toggle text-white" href="<?= count($menu['submenu'])>0 ? 'javascript:void(0);' : $menu['link'] ?>" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= $menu['nama'] ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <?php foreach($menu['submenu'] as $submenu) : ?>
                        <a class="dropdown-item" href="<?= $submenu['link'] ?>"><?= $submenu['nama'] ?></a>
                        <?php endforeach ?>
                    </div>
                </li>
                <?php endif ?>
                <?php endforeach ?>
                <?php endif ?>
            </ul>
        </div>
    </nav>
</div>
