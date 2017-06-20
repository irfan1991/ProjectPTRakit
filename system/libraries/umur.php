<?php 
//if ( ! defined(‘BASEPATH’)) exit(‘No direct script access allowed’);
class Umur {
function cekUmur($tgl_lahir) {
$tglHariIni=date('Y-m-d');
list($tahun,$bulan,$nohari)=explode("-",$tgl_lahir);
$jdetikLahir=mktime(0,0,0,$bulan,$nohari,$tahun);
list($tahun,$bulan,$nohari)=explode("-",$tglHariIni);
$jdetikHariIni=mktime(0,0,0,$bulan,$nohari,$tahun);
$jTahun=floor(($jdetikHariIni-$jdetikLahir)/86400/365.25);
echo $jTahun;
}
}