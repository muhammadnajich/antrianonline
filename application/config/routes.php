<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'C_Front/home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['admin']                 = 'C_Login';
$route['auth']                  = 'C_Login/auth';
$route['admin/auth']            = 'C_login/auth';
$route['auth/(:any)']			= 'C_Login/auth/';
$route['admin/auth/(:any)']		= 'C_Login/auth/';
$route['logout']          		= 'C_Login/logout';

//Back Admin
$route['dashboard/admin']       	= 'C_Back/dashboard';

//Kelola data mining
//$route['admin/kelolamining']       			= 'C_Kelolamining';
$route['admin/prosesmining']       			= 'C_Kelolamining/proses';
//import data excel
$route['admin/kelolamining']       			= 'Excel_import';
$route['admin/excel_import/fetch']       			= 'Excel_import/fetch';
$route['admin/excel_import/import']       			= 'Excel_import/import';

//lihat pohon keputusan
$route['admin/lihatpohonkeputusan']       			= 'C_Pohonkeputusan';

//akun
$route['admin/akun']       			= 'C_Akun';
$route['admin/akun/add']       		= 'C_Akun/tambah';
$route['admin/akun/edit/(:any)']    = 'C_Akun/edit/';
$route['admin/akun/hapus/(:any)']   = 'C_Akun/hapus/';
//informasi
$route['admin/informasi']       		 = 'C_Informasi';
$route['admin/informasi/add']       	 = 'C_Informasi/tambah';
$route['admin/informasi/edit/(:any)']    = 'C_Informasi/edit/';
$route['admin/informasi/hapus/(:any)']   = 'C_Informasi/hapus/';
//permohonan
$route['admin/permohonan']       		  = 'C_Permohonan';
$route['admin/data_permohonan']       	  = 'C_Permohonan/data_permohonan';
$route['admin/permohonan/terima/(:any)']  = 'C_Permohonan/terima/';
$route['admin/permohonan/tunda/(:any)']   = 'C_Permohonan/ditunda/';
$route['admin/permohonan/tolak/(:any)']   = 'C_Permohonan/tolak/';
//pengambilan
$route['admin/pengambilan']       		   = 'C_Pengambilan';
$route['admin/data_pengambilan']       	   = 'C_Pengambilan/data_pengambilan';
$route['admin/pengambilan/terima/(:any)']  = 'C_Pengambilan/terima/';
$route['admin/pengambilan/tunda/(:any)']   = 'C_Pengambilan/tunda/';
$route['admin/pengambilan/tolak/(:any)']   = 'C_Pengambilan/tolak/';
//pelayanan
$route['admin/pelayanan']       		   = 'C_Pelayanan';
$route['admin/laporan_pelayanan']          = 'C_Pelayanan/laporan';
$route['admin/laporan/hapus/(:any)']   	   = 'C_Pelayanan/hapus/';
//kuotaantrian
$route['admin/kuota']       		   	   = 'C_Kuota';
$route['admin/kuota/edit/(:any)']          = 'C_Kuota/edit/';
//pesan
$route['admin/pesan']       		   	   = 'C_Pesan';
//Front
$route['home']       			= 'C_Front/home';
$route['antrian_permohonan']       				= 'C_Front/antrian_permohonan';
$route['antrian_pengambilan']       			= 'C_Front/antrian_pengambilan';