<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



// CITIZEN ROUTES

$route['citizen/register']['get'] = 'Citizen/Auth/RegistrationController/form';
$route['citizen/register']['post'] = 'Citizen/Auth/RegistrationController/register';


$route['citizen/signin']['get'] = 'Citizen/Auth/SignInController/form';
$route['citizen/signin']['post'] = 'Citizen/Auth/SignInController/signin';
$route['citizen/signout']['get'] = 'Citizen/Auth/SignOutController/signout';


$route['citizen']['get'] = 'Citizen/Home/index';


$route['citizen/travel/create']['get'] = 'Citizen/TravelController/create';
$route['citizen/travel/create']['post'] = 'Citizen/TravelController/store';
$route['citizen/travel/(:num)/show']['get'] = 'Citizen/TravelController/show/$1';



$route['citizen/attachment/(:num)']['post'] = 'Citizen/AttachmentController/upload/$1'; 







// ADMIN
$route['super/signin']['get'] = 'Admin/Auth/SignInController/form';
$route['super/signin']['post'] = 'Admin/Auth/SignInController/signin';
$route['super/signout']['get'] = 'Admin/Auth/SignOutController/signout';


$route['super/dashboard']['get'] = 'Admin/DashboardController/index';

$route['super/request/(:any)']['get'] = 'Admin/RequestController/index/$1';
$route['super/request/(:num)/show']['get'] = 'Admin/RequestController/show/$1';


$route['super/request/(:num)/show']['post'] = 'Admin/RequestController/mark/$1';




// DEV

$route['dev/email']['get'] = 'DevController/email';