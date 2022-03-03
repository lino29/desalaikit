<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php
	$CI =& get_instance();
	$CI->load->library('user_agent');

	if ($CI->agent->is_browser()) {
		$browser = $CI->agent->browser() . ' ' . $CI->agent->version();
	} elseif ($CI->agent->is_robot()) {
		$browser = $CI->agent->robot();
	} elseif ($CI->agent->is_mobile()) {
		$browser = $CI->agent->mobile();
	} else {
		$browser = 'Tidak ditemukan';
	}

	$ip = $CI->input->ip_address();
	$os = $CI->agent->platform();

	$rs = $this->db->query('SELECT Jumlah AS Visitor FROM sys_traffic WHERE Tanggal="'.date("Y-m-d").'" LIMIT 1');
	if ($rs->num_rows()>0) {
		$visitor = $rs->row(0);
		$today = $visitor->Visitor;
	} else {
		$today = 0;
	}

	$strSQL = "SELECT Jumlah AS Visitor FROM sys_traffic WHERE Tanggal=(SELECT DATE_ADD(CURDATE(),INTERVAL -1 DAY) FROM sys_traffic LIMIT 1) LIMIT 1";
	$rs = $this->db->query($strSQL);
	if ($rs->num_rows()>0) {
		$visitor = $rs->row(0);
		$yesterday = $visitor->Visitor;
	} else {
		$yesterday = 0;
	}

	$rs = $this->db->query('SELECT SUM(Jumlah) as Total FROM sys_traffic');
	$visitor = $rs->row(0);
	$total = $visitor->Total;

	$hari_ini = $today;
	$kemarin = $yesterday;
	$ip_address = $ip;
?>