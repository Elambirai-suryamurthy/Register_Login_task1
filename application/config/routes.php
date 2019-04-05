<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['signup'] = 'authentication/register';
$route['login'] = 'authentication/login_validation';
$route['export'] = 'authentication/export';
$route['update'] = 'authentication/update';
$route['users'] = 'authentication/dispdata';
$route['user'] = 'authentication/user';
$route['logout'] = 'authentication/logout';
$route['sale'] = 'Sale_controller/display_customer_sale';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
