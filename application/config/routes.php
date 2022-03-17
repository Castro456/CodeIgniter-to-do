<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//=========================== Task API =====================================
$route['api/task/views'] = 'api/Tasks_api/view';
$route['api/task/views/view/(:num)'] = 'api/Tasks_api/oneview/$1';
$route['api/task/delete'] = 'api/Tasks_api/taskdelete';
$route['api/task/update'] = 'api/Tasks_api/taskupdate';
$route['api/task/add'] = 'api/Tasks_api/taskadd';
$route['api/task/status'] = 'api/Tasks_api/task_status';



//========================== JWT Generator =================================
$route['api/admin/generate-api'] = 'api/v1/admin_api/generate_api';


//========================== v1 Admin API ==================================
$route['api/admin/users'] = 'api/v1/admin_api/all_users';
$route['api/admin/update-user'] = 'api/v1/admin_api/update_user';
$route['api/admin/delete-user'] = 'api/v1/admin_api/delete_user';

//========================== v1 Task API ===================================
$route['api/user/tasks'] = 'api/v1/tasks_api/list_task';
$route['api/user/add-task'] = 'api/v1/tasks_api/add_task';


/*Default Controller */
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
