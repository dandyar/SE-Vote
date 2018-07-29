<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'auth/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'auth/login';

$route['dashboard'] = 'AdminController';
$route['votes'] = 'AdminController/kotak_suara';
$route['users'] = 'AdminController/daftar_peserta';

$route['home'] = 'HomeController';
$route['profile'] = 'HomeController/profile';

$route['vote/(:num)']= 'HomeController/vote/$1';

$route['info'] = 'auth/thankyou';
$route['home/try_again'] = 'HomeController/error';




