<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	http://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'home';
$route['404_override'] = 'page/show404';
$route['translate_uri_dashes'] = FALSE;

//Website URL
$route['page/contact']='page/page/contact';
$route['page/(:any)'] = 'page/page/pages/$1';
$route['category/(:any)'] = 'category/category/subcategory/$1';
$route['category/(:any)/subcategory/(:any)'] = 'category/category/item/$1';
$route['category/(:any)/item/(:any)'] = 'category/category/itemview/$1';

//Admin URL
$route['admin']='home/admin_home';
$route['admin/authenticate']='home/admin_home/authenticate';
$route['admin/logout']='home/admin_home/logout';
$route['admin/home']='home/admin_home';
$route['admin/home/create']='home/admin_home/create';
$route['admin/home/view']='home/admin_home/view';
$route['admin/home/edit/(:any)']='home/admin_home/edit/$1';
$route['admin/home/update']='home/admin_home/update';
$route['admin/home/delete/(:any)']='home/admin_home/destroy/$1';

$route['admin/page']='page/admin_page';
$route['admin/page/create']='page/admin_page/create';
$route['admin/page/store']='page/admin_page/store';
$route['admin/page/edit/(:any)']='page/admin_page/edit/$1';
$route['admin/page/update']='page/admin_page/update';
$route['admin/page/delete/(:any)']='page/admin_page/destroy/$1';

$route['admin/category']='category/admin_category';
$route['admin/category/create']='category/admin_category/create';
$route['admin/category/store']='category/admin_category/store';
$route['admin/category/edit/(:any)']='category/admin_category/edit/$1';
$route['admin/category/update']='category/admin_category/update';
$route['admin/category/delete/(:any)']='category/admin_item/destroy/$1';

$route['admin/subcategory']='subcategory/admin_subcategory';
$route['admin/subcategory/create']='subcategory/admin_subcategory/create';
$route['admin/subcategory/store']='subcategory/admin_subcategory/store';
$route['admin/subcategory/edit/(:any)']='subcategory/admin_subcategory/edit/$1';
$route['admin/subcategory/update']='subcategory/admin_subcategory/update';
$route['admin/subcategory/delete/(:any)']='subcategory/admin_item/destroy/$1';

$route['admin/item']='item/admin_item';
$route['admin/item/create']='item/admin_item/create';
$route['admin/item/store']='item/admin_item/store';
$route['admin/item/edit/(:any)']='item/admin_item/edit/$1';
$route['admin/item/update']='item/admin_item/update';
$route['admin/item/delete/(:any)']='item/admin_item/destroy/$1';

$route['admin/review']='review/admin_review';
$route['admin/review/create']='review/admin_review/create';
$route['admin/review/store']='review/admin_review/store';
$route['admin/review/edit/(:any)']='review/admin_review/edit/$1';
$route['admin/review/update']='review/admin_review/update';
$route['admin/review/delete/(:any)']='review/admin_review/destroy/$1';