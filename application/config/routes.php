<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'products';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['register'] = 'users/register';
$route['signin'] = 'users/signin';
$route['registerUser'] = 'users/registerUser';
$route['signinUser'] = 'users/signinUser';
$route['logoff'] = 'users/logoff';
$route['products/show/(:any)'] = 'products/show/$1';
$route['products/edit/(:any)'] = "products/edit/$1";
$route['products/delete/(:any)'] = "products/delete/$1";