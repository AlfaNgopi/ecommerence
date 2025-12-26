<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'homepage';

$route['product/(:any)'] = 'product/index/$1';

$route['login'] = 'auth/login';
$route['auth/login'] = 'auth/actionLogin';

$route['register'] = 'auth/register';
$route['auth/register'] = 'auth/actionRegister';



$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
