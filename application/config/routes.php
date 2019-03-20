<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'authentication/register';
$route['login'] = 'authentication/login_validation';
$route['export'] = 'authentication/export';
$route['display'] = 'authentication/dispdata';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
