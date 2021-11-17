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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// DashboardController
$route['admin/dashboard'] = 'DashboardController/index';
$route['admin'] = 'AdminController/login';
//AdminLogin
$route['admin/settings'] = 'SettingController/index';
$route['admin/update-settings'] = 'SettingController/update_settings';
$route['admin/login'] = 'AdminController/login';
$route['admin/login-admin'] = 'AdminController/login_admin';
$route['admin/logout'] = 'AdminController/logout';

// AdminProfile
$route['admin/profile'] = 'AdminController/admin_profile';
$route['admin/admin-edit'] = 'AdminController/admin_edit';
$route['admin/change-password'] = 'AdminController/change_password';

//User
$route['admin/user-list'] = 'AdminController/list_user';
// $route['admin/create-user'] = 'AdminController/create_user';
// $route['admin/add-user'] = 'AdminController/add_user';
$route['admin/edit-user/(:any)'] = 'AdminController/edit_user/$1';
$route['admin/update-user'] = 'AdminController/update_user';
$route['admin/trash-user'] = 'AdminController/trash_user';


// contacts
$route['admin/contacts'] = 'SettingController/admin_contacts';
$route['admin/request_store'] = 'SettingController/request_store';
$route['admin/neweslater'] = 'SettingController/neweslater';

//update-settings   request_store
$route['admin/vendor-list'] = 'AdminController/list_vendor';
$route['admin/create-vendor'] = 'AdminController/create_vendor';
$route['admin/add-vendor'] = 'AdminController/add_vendor';
$route['admin/edit-vendor/(:any)'] = 'AdminController/edit_vendor/$1';
$route['admin/update-vendor'] = 'AdminController/update_vendor';
$route['admin/trash-vendor'] = 'AdminController/trash_vendor';

//Likes
$route['admin/likes-list'] = 'AdminController/list_likes';
$route['admin/like-view/(:any)'] = 'AdminController/likeview/$1';

//Reviews
$route['admin/reviews-list'] = 'AdminController/list_reviews';
$route['admin/reviews-view/(:any)'] = 'AdminController/reviews_view/$1';
$route['admin/trash-reviews'] = 'AdminController/trash_reviews';

//Category
$route['admin/category-list'] = 'AdminController/list_category';
$route['admin/create-category'] = 'AdminController/create_category';
$route['admin/add-category'] = 'AdminController/add_category';
$route['admin/edit-category/(:any)'] = 'AdminController/edit_category/$1';
$route['admin/update-category'] = 'AdminController/update_category';
$route['admin/trash-category'] = 'AdminController/trash_category';

//Restaurants
$route['admin/restaurants-list'] = 'AdminController/list_restaurants';
$route['admin/create-restaurants'] = 'AdminController/create_restaurants';
$route['admin/add-restaurants'] = 'AdminController/add_restaurants';
$route['admin/edit-restaurants/(:any)'] = 'AdminController/edit_restaurants/$1';
$route['admin/update-restaurants'] = 'AdminController/update_restaurants';
$route['admin/trash-restaurants'] = 'AdminController/trash_restaurants';

$route['admin/approved-restaurants/(:any)'] = 'AdminController/approved_restaurants/$1';
$route['admin/note-approved-restaurants/(:any)'] = 'AdminController/note_approved_restaurants/$1';

//Banners
$route['admin/banners-list'] = 'AdminController/list_banners';
$route['admin/create-banners'] = 'AdminController/create_banners';
$route['admin/add-banners'] = 'AdminController/add_banners';
$route['admin/edit-banners/(:any)'] = 'AdminController/edit_banners/$1';
$route['admin/update-banners'] = 'AdminController/update_banners';
$route['admin/trash-banners'] = 'AdminController/trash_banners';

//Offers
$route['admin/offers-list'] = 'OfferController/list_offers';
$route['admin/create-offers'] = 'OfferController/create_offers';
$route['admin/add-offers'] = 'OfferController/add_offers';
$route['admin/edit-offers/(:any)'] = 'OfferController/edit_offers/$1';
$route['admin/update-offers'] = 'OfferController/update_offers';
$route['admin/trash-offers'] = 'OfferController/trash_offers';
$route['offers'] = 'OfferController/offers';


//regions
$route['admin/regions-list'] = 'RegionsController/list_regions';
$route['admin/create-regions'] = 'RegionsController/create_regions';
$route['admin/add-regions'] = 'RegionsController/add_regions';
$route['admin/edit-regions/(:any)'] = 'RegionsController/edit_regions/$1';
$route['admin/update-regions'] = 'RegionsController/update_regions';
$route['admin/trash-regions'] = 'RegionsController/trash_regions';
$route['regions'] = 'RegionsController/regions';

//locations
$route['admin/locations-list'] = 'LocationsController/list_locations';
$route['admin/create-locations'] = 'LocationsController/create_locations';
$route['admin/add-locations'] = 'LocationsController/add_locations';
$route['admin/edit-locations/(:any)'] = 'LocationsController/edit_locations/$1';
$route['admin/update-locations'] = 'LocationsController/update_locations';
$route['admin/trash-locations'] = 'LocationsController/trash_locations';
$route['locations'] = 'LocationsController/locations';
$route['admin/fetch_location'] = 'LocationsController/fetch_location';

//Notifications

$route['admin/notifications'] = 'AdminController/notifications';

$route['admin/user-notifications'] = 'AdminController/user_notifications';
$route['admin/send-user-notifications'] = 'AdminController/send_user_notifications';
$route['admin/vendor-notifications'] = 'AdminController/vendor_notifications';
$route['admin/send-vendor-notifications'] = 'AdminController/send_vendor_notifications';
///front login 

$route['login'] = 'UserController/login';
$route['forgetpassword'] = 'UserController/forgetpassword';
$route['user/forget-user'] = 'UserController/forget_user';

$route['register'] = 'UserController/register';
$route['logout'] = 'UserController/logout';
$route['user/login-user'] = 'UserController/login_user';
$route['user/register-user'] = 'UserController/register_user';

// AdminProfile
$route['user/profile'] = 'UserController/user_profile';
$route['user/user-edit'] = 'UserController/user_edit';
$route['user/change-password'] = 'UserController/change_password';
$route['profile'] = 'UserController/profile';
//User
$route['user/user-list'] = 'UserController/list_user';
// $route['user/create-user'] = 'userController/create_user';
// $route['user/add-user'] = 'userController/add_user';
$route['user/edit-user/(:any)'] = 'UserController/edit_user/$1';
$route['user/update-user'] = 'UserController/update_user';
$route['user/update-vendor'] = 'UserController/update_vendor';

$route['favourite'] = 'CategoryController/favourite';

$route['lang'] = 'CategoryController/lang';
$route['about'] = 'SettingController/about';
$route['contact'] = 'SettingController/contact';
$route['terms'] = 'SettingController/terms';
$route['prives'] = 'SettingController/prives';
$route['contact_submit'] = 'SettingController/contact_submit';



$route['likeRes'] = 'OfferController/likeRes';
$route['unlikeRes'] = 'OfferController/unlikeRes';

$route['search'] = 'SearchController/index';
$route['search/(:any)'] = 'SearchController/index';

$route['give_review'] = 'RegionsController/give_review';
$route['subscribe'] = 'SettingController/subscribe';
$route['subscribe_submit'] = 'SettingController/subscribe_submit';

$route['subscriebe_mail'] = 'SettingController/subscriebe_mail';


$route['categories-all'] = 'CategoryController/index';
$route['categories/(:any)'] = 'CategoryController/show/$1';

$route['agents'] = 'AgentsController/index';
$route['add-listing'] = 'AddListingController/add_listing';

$route['agents/(:any)'] = 'AgentsController/index';
$route['agent/(:any)'] = 'AgentsController/show/$1';



$route['store/(:any)'] = 'CategoryController/store/$1';
