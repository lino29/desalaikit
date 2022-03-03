<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php defined('IS_PREMIUM') or define('IS_PREMIUM', preg_match('/premium/', ambilVersi())) ?>

<link rel="stylesheet" href="<?= base_url("$this->theme_folder/$this->theme/assets/css/bootstrap-lazy-load.css") ?>">
<link rel="stylesheet" href="<?= base_url("$this->theme_folder/$this->theme/assets/css/widget.min.css?" . THEME_VERSION) ?>">
<script src="<?= base_url("$this->theme_folder/$this->theme/assets/js/widget.js?" . THEME_VERSION) ?>"></script>
