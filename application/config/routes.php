<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Manager/index';

$route['dang-nhap'] = 'Manager/login';
$route['login'] = 'Manager/ajax_login';
$route['logout'] = 'Manager/logout';

/// quản lý
$route['quan-ly-du-an'] = 'Manager/manager_project';
$route['quan-ly-du-an/(:num)'] = 'Manager/manager_project';
$route['them-du-an'] = 'Manager/project';
$route['sua-du-an/(:num)'] = 'Manager/edit_project/$1';
$route['add_project'] = 'Manager/add_project';
$route['del_project'] = 'Manager/del_project';
$route['del_job'] = 'Manager/del_job';
$route['quan-ly-cong-viec'] = 'Manager/manager_job';
$route['quan-ly-cong-viec/(:num)'] = 'Manager/manager_job';
$route['them-cong-viec'] = 'Manager/job';
$route['sua-cong-viec/(:num)'] = 'Manager/edit_job/$1';
$route['add_job'] = 'Manager/add_job';
$route['quan-ly-thu-tien'] = 'Manager/manager_collect_money';
$route['quan-ly-thu-tien/(:num)'] = 'Manager/manager_collect_money';
$route['sua-thu-tien/(:num)'] = 'Manager/edit_collect_money/$1';
$route['them-moi-thu-tien'] = 'Manager/collect_money';
$route['add_collect_money'] = 'Manager/add_collect_money';
$route['delete_money'] = 'Manager/delete_money';
$route['default_job_mkt'] = 'Manager/default_job_mkt';
$route['them-thong-tin-du-an/(:num)'] = 'Manager/view_project_mkt/$1';
$route['add_project_mkt'] = 'Manager/add_project_mkt';
$route['default_job_mkt'] = 'Manager/default_job_mkt';
$route['du-an-khach-hang'] = 'Manager/customer_project';
$route['du-an-khach-hang/(:num)'] = 'Manager/customer_project';
//

$route['cong-viec-cong-tac-vien'] = 'Job/ctv_job';
$route['cong-viec-cong-tac-vien/(:num)'] = 'Job/ctv_job';
$route['change_ctv_job'] = 'Job/change_ctv_job';
$route['change_check_replly'] = 'Job/change_check_replly';
$route['cong-viec-qa'] = 'Job/qa_job';
$route['cong-viec-qa/(:num)'] = 'Job/qa_job';
$route['qa-them-cong-viec'] = 'Job/qa_add_job';
$route['cong-viec-index'] = 'Job/index_job';
$route['cong-viec-index/(:num)'] = 'Job/index_job';
$route['next_index'] = 'Job/next_index';
$route['get_job_index'] = 'Job/get_job_index';
$route['edit_job_index'] = 'Job/edit_job_index';
$route['get_job_qa'] = 'Job/get_job_qa';
$route['edit_job_qa'] = 'Job/edit_job_qa';

// cài đặt 
$route['loai-du-an'] = 'Setting/project_type';
$route['loai-du-an/(:num)'] = 'Setting/project_type';
$route['them-loai-du-an'] = 'Setting/view_add_project_type';
$route['add_project_type'] = 'Setting/add_project_type';
$route['change_project_type'] = 'Setting/change_project_type';
$route['loai-cong-viec'] = 'Setting/job_type';
$route['loai-cong-viec/(:num)'] = 'Setting/job_type';
$route['add_job_type'] = 'Setting/add_job_type';
$route['change_job_type'] = 'Setting/change_job_type';
$route['dau-viec-can-index'] = 'Setting/job_index';
$route['dau-viec-can-index/(:num)'] = 'Setting/job_index';
$route['add_job_index'] = 'Setting/add_job_index';
$route['change_job_index'] = 'Setting/change_job_index';
$route['thong-tin-nguon-nhan'] = 'Setting/input_source';
$route['thong-tin-nguon-nhan/(:num)'] = 'Setting/input_source';
$route['add_input_source'] = 'Setting/add_input_source';
$route['change_input_source'] = 'Setting/change_input_source';
$route['delete_type'] = 'Setting/delete_type';
$route['get_table'] = 'Setting/get_table';
$route['don-gia'] = 'Setting/unit_price';
$route['don-gia/(:num)'] = 'Setting/unit_price';
$route['them-don-gia'] = 'Setting/view_add_unit_price';
$route['them-don-gia/(:num)'] = 'Setting/view_add_unit_price/$1';
$route['add_unit_price'] = 'Setting/add_unit_price';
$route['get_unit_price'] = 'Setting/get_unit_price';
$route['thuong-hieu'] = 'Setting/brands';
$route['thuong-hieu/(:num)'] = 'Setting/brands';
$route['add_brand'] = 'Setting/add_brand';
//

// tài khoản
$route['tai-khoan'] = 'Account/account';
$route['tai-khoan/(:num)'] = 'Account/account';
$route['add_user'] = 'Account/add_user';
$route['edit_user'] = 'Account/edit_user';
$route['get_user'] = 'Account/get_user';
$route['delete_user'] = 'Account/delete_user';
$route['change_user'] = 'Account/change_user';


// Xuất excel

$route['excel_projects'] = 'Export_excel/excel_projects';
$route['excel_projects_mkt'] = 'Export_excel/excel_projects_mkt';
$route['excel_jobs'] = 'Export_excel/excel_jobs';
$route['excel_collect_money'] = 'Export_excel/excel_collect_money';
$route['excel_project_type'] = 'Export_excel/excel_project_type';
$route['excel_job_type'] = 'Export_excel/excel_job_type';
$route['excel_unit_price'] = 'Export_excel/excel_unit_price';
$route['excel_input_source'] = 'Export_excel/excel_input_source';
$route['excel_job_index'] = 'Export_excel/excel_job_index';
$route['excel_accounts'] = 'Export_excel/excel_accounts';
$route['excel_qa'] = 'Export_excel/excel_qa';
$route['excel_jobs_index'] = 'Export_excel/excel_jobs_index';
$route['excel_ctv_jobs'] = 'Export_excel/excel_ctv_jobs';
$route['excel_customer'] = 'Export_excel/excel_customer';


$route['cau-hinh-bo-loc'] = 'Advanced_filter/advanced_filter';
$route['save_advanced_filter'] = 'Advanced_filter/save_advanced_filter';