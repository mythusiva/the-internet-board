<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "welcome";
$route['404_override'] = 'welcome/notFound';

// $route['filter/(:any)'] = 'welcome/index/$1';
$route['view/(:any)'] = 'welcome/viewLink/$1';

$route['fetch_more'] = '/welcome/getMoreTiles';
$route['has_new_items'] = '/welcome/hasNewerItems';
$route['sitemap'] = '/welcome/sitemap';

// $route['album/(:any)'] = 'welcome/checkAlbum/$1';
// $route['updateAlbum/(:any)'] = 'welcome/updateAlbum/$1';
// $route['fetchImage/(:any)/(:any)'] = 'welcome/getImage/$1/$2';
// $route['imageLoad/(:any)/(:any)/(:any)/(:any)'] = 'welcome/imageLoad/$1/$2/$3/$4';
// $route['logout/(:any)'] = 'welcome/clearLogin/$1';


/* End of file routes.php */
/* Location: ./application/config/routes.php */