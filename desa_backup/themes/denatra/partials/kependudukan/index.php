<?php

  defined('BASEPATH') or exit('No direct script access allowed');
  
  if ($tipe == 2) {

    $this->load->view($folder_themes.'/partials/kependudukan/statistik_sos');

  } elseif ($tipe == 3) {

    $this->load->view($folder_themes.'/partials/kependudukan/wilayah');

  } elseif ($tipe == 4) {

    $this->load->view($folder_themes.'/partials/kependudukan/dpt');

  } else {

    $this->load->view($folder_themes.'/partials/kependudukan/statistik');

  }

?>
