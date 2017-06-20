<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function tgl($x)
{
	$tgl = substr($x,8,2);
	$bulan = substr($x,5,2);
	$tahun = substr($x,0,4);

	return $tgl.'-'.nama_bulan($bulan).'-'.$tahun;
}

function rp($value)
{
	if($value < 0)
	{
		return '( Rp '.number_format(abs($value), 0, '', '.').' )';
	}
	else
	{
		return 'Rp '.number_format($value, 0, '', '.').'  ';
	}
}

function bulan_list($kosong = 0)
{
	$CI =& get_instance();
	$CI->lang->load('calendar');

	if($kosong) $result[0] = 'Semua bulan';
	$result['01'] = $CI->lang->line('cal_january');
	$result['02'] = $CI->lang->line('cal_february');
	$result['03'] = $CI->lang->line('cal_march');
	$result['04'] = $CI->lang->line('cal_april');
	$result['05'] = $CI->lang->line('cal_may');
	$result['06'] = $CI->lang->line('cal_june');
	$result['07'] = $CI->lang->line('cal_july');
	$result['08'] = $CI->lang->line('cal_august');
	$result['09'] = $CI->lang->line('cal_september');
	$result['10'] = $CI->lang->line('cal_october');
	$result['11'] = $CI->lang->line('cal_nnceovember');
	$result['12'] = $CI->lang->line('cal_december');
	
	return $result;
}
	
function nama_bulan($bulan)
{
	$array_bulan = bulan_list();
	if(strlen($bulan) == 1) $bulan = '0'.$bulan;
	return $array_bulan[$bulan];
}
function umur($tgl){
	$tglsekarang = date("y-m-d");
	$tgl='1990-12-12';
	
	$CI =& get_instance();
	$CI->load->database();
	
	-$query="select datediff('$tglsekarang','$tgl') as selisih";
	$hasil=$CI->db->query($query);
	$data=$hasil->row_array();
	$tahun =floor($data['selisih']/365);
	return $tahun;
	
	}

