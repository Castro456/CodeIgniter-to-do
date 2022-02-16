<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//===========================Task API======================================
$route['api/task/views'] = 'api/Tasks_api/view';
$route['api/task/views/view/(:num)'] = 'api/Tasks_api/oneview/$1';
$route['api/task/delete'] = 'api/Tasks_api/taskdelete';
$route['api/task/update'] = 'api/Tasks_api/taskupdate';
$route['api/task/add'] = 'api/Tasks_api/taskadd';
$route['api/task/status'] = 'api/Tasks_api/task_status';



//========================== JWT Generator =================================
$route['admin/generate-api'] = 'admin_api/generate_api_key';


//========================== v1 Admin API ========================================
$route['api/admin/users'] = 'api/v1/admin_api/all_users';


/*Default Controller */
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*Login routes */
// $route['login/auth'] = 'login/loadlogin';

$route['login/jwt'] = 'api/v1/admin_api/generate_api_key';