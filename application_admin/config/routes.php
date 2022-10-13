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

//$route['default_controller'] = "welcome";
$route['default_controller'] = "index";
$route['404_override'] = '';

$route['dashboard'] = "index/dashboard";
$route['logout'] = "index/logout";
$route['register'] = "index/register";
$route['forgot-password'] = "index/forgotpassword";
$route['change-language'] = "index/changelanguage";

$route['admin-users/(:any)'] = "adminusers/$1";
$route['admin-users'] = "adminusers";
$route['profile'] = "adminusers/profile";

$route['admin-roles/(:any)'] = "adminroles/$1";
$route['admin-roles'] = "adminroles";

$route['widgets-setting/(:any)'] = "widgets_setting/$1";
$route['widgets-setting'] = "widgets_setting";

$route['email-templates/(:any)'] = "emailtemplates/$1";
$route['email-templates'] = "emailtemplates";

$route['newsletter-templates/(:any)'] = "newslettertemplates/$1";
$route['newsletter-templates'] = "newslettertemplates";

$route['photo-galleries/(:any)/(:any)'] = "galleries/$1/P/$2";
$route['photo-galleries/(:any)'] = "galleries/$1/P";
$route['photo-galleries'] = "galleries/index/P";

$route['video-galleries/(:any)/(:any)'] = "galleries/$1/V/$2";
$route['video-galleries/(:any)'] = "galleries/$1/V";
$route['video-galleries'] = "galleries/index/V";

$route['board-members/(:any)'] = "boardmembers/$1";
$route['board-members'] = "boardmembers";

$route['press-releases/(:any)'] = "pressreleases/$1";
$route['press-releases'] = "pressreleases";

$route['donation-options/(:any)'] = "donationoptions/$1";
$route['donation-options'] = "donationoptions";

$route['donation-modes/(:any)'] = "donationmodes/$1";
$route['donation-modes'] = "donationmodes";

$route['donation-types/(:any)'] = "donation_types/$1";
$route['donation-types'] = "donation_types";

$route['honor-rolls/(:any)'] = "honorrolls/$1";
$route['honor-rolls'] = "honorrolls";

$route['blog-categories/(:any)'] = "blogcategory/$1";
$route['blog-categories'] = "blogcategory";

$route['blog-items/(:any)'] = "blogitmes/$1";
$route['blog-items'] = "blogitmes";

$route['cls-item-category/(:any)/(:any)'] = "cls_item_category/$1/$2";
$route['cls-item-category/(:any)'] = "cls_item_category/$1";
$route['cls-item-category'] = "cls_item_category/index/";

$route['jobs/(:any)'] = "cls_jobs_adv/$1";
$route['jobs'] = "cls_jobs_adv";

$route['forum-categories/(:any)'] = "forumcategories/$1";
$route['forum-categories'] = "forumcategories";

$route['matrimony/(:any)'] = "cls_matrimony_adv/$1";
$route['matrimony'] = "cls_matrimony_adv";

$route['faq-categories/(:any)'] = "faqcategories/$1";
$route['faq-categories'] = "faqcategories";

$route['news-categories/(:any)'] = "newscategories/$1";
$route['news-categories'] = "newscategories";

$route['template-layout/(:any)'] = "template_layout/$1";
$route['template-layout'] = "template_layout";

$route['newsletter-subscribers/(:any)'] = "newsletter_subscribers/$1";
$route['newsletter-subscribers'] = "newsletter_subscribers";

$route['enquiry-natures/(:any)'] = "enquiry_natures/$1";
$route['enquiry-natures'] = "enquiry_natures";

$route['fundraising-enquiry'] = "enquiries/index/F";
$route['fundraising-enquiry/(:any)'] = "enquiries/edit/F/$1";
$route['fundraising-enquiry-delete/(:any)'] = "enquiries/delete/F/$1";

$route['general-enquiry'] = "enquiries/index/G";
$route['general-enquiry/(:any)'] = "enquiries/edit/V/$1";
$route['general-enquiry-delete/(:any)'] = "enquiries/delete/V/$1";

$route['phrases/(donations|enuiries|general|users)'] = "phrases/index/$1";
$route['phrases'] = "phrases";

/* End of file routes.php */
/* Location: ./application/config/routes.php */