<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['register'] = 'main/register';
$route['signin'] = 'main/signin';
$route['users/new'] = 'users/newUser';
$route['registerUser'] = 'main/registerUser';
$route['users/show/(:any)'] = 'users/show/$1';
$route['logoff'] = 'main/logoff';
$route['users/edit/(:any)'] = 'users/edit/$1';
$route['users/save/(:any)'] = 'users/save/$1';
$route['users/removeUser(:any)'] = 'users/removeUser/$1';