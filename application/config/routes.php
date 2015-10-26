<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['register'] = 'main/register';
$route['signin'] = 'main/signin';
$route['registerUser'] = 'main/registerUser';
$route['signinUser'] = 'main/signinUser';
$route['logoff'] = 'main/logoff';
$route['products/show/(:any)'] = 'products/show/$1';