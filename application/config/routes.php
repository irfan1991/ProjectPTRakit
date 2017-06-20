<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['profile'] = 'user/profile';
$route['register'] = 'user/form';
//$route['tbn'] = 'karyawan/form';
$route['logout'] = 'auth/logout';
$route['register'] = 'auth/register';
$route['verify/(:any)/(:any)'] = 'auth/verify_register/$1/$1';
$route['default_controller'] = "login";
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */
