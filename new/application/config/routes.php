<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');

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



$route['default_controller'] = "index";

$route['404_override'] = '';
$route['specialities'] = "specialities/index/specialities";
$route['specialities/(:any)'] = "specialities/index/specialities/$1";

include_once("database.php");

$con = mysqli_connect($db['default']['hostname'], $db['default']['username'],$db['default']['password'], $db['default']['database'] ) or die("Some error occurred during connection " . mysqli_error($con));

$query_pages = mysqli_query($con, "SELECT page_slug from pages where status_ind=1");
while($result_page = mysqli_fetch_assoc($query_pages)){
  // print_r($result_page);

        if(!empty($result_page['page_slug'])){
                $route[$result_page['page_slug']] = "pages/index/".$result_page['page_slug'];
        } else {
                $route[$result_page['page_id']] = "pages/index/".$result_page['page_id'];
        }
}
$doctor_pages =  mysqli_query($con, "SELECT page_slug from doctors where status_ind=1");
while($result_page = mysqli_fetch_assoc($doctor_pages)){
// print_r($result_page);
        if(!empty($result_page['page_slug'])){
                $route['doctors/'.$result_page['page_slug']] = "doctors/index/".$result_page['page_slug'];
        } else {
                $route['doctors/'.$result_page['doctors_id']] = "doctors/index/".$result_page['doctors_id'];
        }
}

// $route['contact-us'] = "contact_us";


/*$route['classifieds'] = "classifieds/index/classifieds";

$route['item-list'] = "classifieds/item_list/item-list";

$route['item-list/email-contact/(:any)'] = "classifieds/email_contact/item-list/email-contact/$1";

$route['item-list/item-adv-details/(:any)'] = "classifieds/view_item_details/item-list/item-adv-details/$1";

$route['item-list/allcategory/(:any)'] = "classifieds/allcategory/item-list/$1";

$route['item-list/(:any)'] = "classifieds/view_item_adv/item-list/$1";

$route['item-category-list/(:any)'] = "classifieds/view_item_categories/item-category-list/$1";



$route['matrimony'] = "matrimony/index/matrimony";

$route['matrimony/postmatrimony'] = "matrimony/matrimony_details/matrimony/postmatrimony";

$route['matrimony/profile-details/(:any)'] = "matrimony/profile_details/matrimony/$1";



$route['contact-us'] = "contactus/contact_us/contact-us";



$route['jobs-list'] = "classifieds/jobs_list/jobs-list";

$route['job-details/(:any)'] = "classifieds/job_details/job-details/$1";

$route['jobs-cat'] = "classifieds/jobs_cat/jobs-cat";

$route['jobs-add/(:any)'] = "classifieds/jobs_add/jobs-add/$1";

$route['jobs-insert'] = "classifieds/jobinsert/jobs-insert";



//$route['email-contact'] = "contact_email/index/email-contact";

$route['email-contact/(:any)/(:any)'] = "contact_email/email_contact/email-contact/$1/$2";



//$route['forumadd'] = "forum/index/forumadd";

//$route['forums'] = "forum/forumlist/forums";

//$route['forum-details/addcomment/(:any)'] = "forum/addcomment/forum-details/$1";

//$route['forum-details/(:any)'] = "forum/forum_details/forum-details/$1";



$route['forumadd/(:any)/(:any)'] = "forum/index/forumadd/$1/$2";

$route['forum'] = "forum/forum_category_list/forum";

$route['forum/add-comment/(:any)/(:any)'] = "forum/add_comment/forum/$1/$2";

$route['forum/(:any)/(:any)'] = "forum/forum_comments/forum/$1/$2";

$route['forum/(:any)'] = "forum/forum_category_details/forum/$1";



$route['forum/recent-comments'] = "forum/latestComment/forum/$1";

$route['forum/recent-posts'] = "forum/latestPost/forum/$1";



$route['groups'] = "groups/index/groups";



$route['joined-groups'] = "my_account/index/joined-groups";

$route['joined-groups/(:any)'] = "my_account/joined_group_details/joined-groups/$1";

$route['my-groups'] = "my_account/my_group_list/my-groups";

$route['my-groups/delete/(:any)'] = "my_account/delete_my_group/my-groups/$1";

$route['my-groups/edit/(:any)'] = "my_account/edit_my_group/my-groups/$1";

$route['my-groups/unsubscribe/(:any)'] = "my_account/unsubscribe_my_joined_group/my-groups/$1";

$route['my-groups/(:any)'] = "my_account/my_group_details/my-groups/$1";



$route['my-forums'] = "my_account/my_forums/my-forums";

$route['my-forums/add-comment/(:any)'] = "my_account/add_comment/my-forums/$1";

$route['my-forums/delete/(:any)'] = "my_account/delete_my_forum/my-forums/$1";

$route['my-forums/edit/(:any)'] = "my_account/edit_my_forum/my-forums/$1";

$route['my-forums/(:any)'] = "my_account/my_forums_details/my-forums/$1";



$route['posted-jobs'] = "my_account/posted_jobs/posted-jobs";

$route['posted-jobs/delete/(:any)'] = "my_account/delete_my_posted_job/posted-jobs/$1";

$route['posted-jobs/(:any)'] = "my_account/posted_job_details/posted-jobs/$1";



$route['posted-items'] = "my_account/posted_items/posted-items";

$route['posted-items/delete/(:any)'] = "my_account/delete_my_posted_item/posted-items/$1";

$route['posted-items/edit/(:any)'] = "my_account/edit_my_posted_item/posted-items/$1";

$route['posted-items/(:any)'] = "my_account/posted_item_details/posted-items/$1";



$route['posted-matrimony'] = "my_account/posted_matrimony/posted-matrimony";

$route['posted-matrimony/delete/(:any)'] = "my_account/delete_my_matrimony/posted-matrimony/$1";

$route['posted-matrimony/(:any)'] = "my_account/posted_matrimony_details/posted-matrimony/$1";



$route['change-password'] = "my_account/change_password/change-password";

$route['my-dashboard'] = "my_account/my_dashboard/my-dashboard";



$route['community-groups'] = "community_groups/index/community-groups";

$route['community-groups/(:num)'] = "community_groups/index/community-groups/$1";

$route['community-groups/add-comment/(:any)/(:any)'] = "community_groups/comment_add/community-groups/$1/$2";

$route['community-groups/join/(:any)/(:any)'] = "community_groups/join/community-groups/$1/$2";

$route['community-groups/post/(:any)/(:any)'] = "community_groups/post/community-groups/$1/$2";

$route['community-groups/join-msg/(:any)/(:any)'] = "community_groups/join_msg/community-groups/$1/$2";

$route['community-groups/search/(:any)'] = "community_groups/search/community-groups/$1";

$route['community-groups/success'] = "community_groups/success/community-groups";

$route['community-groups/post-add/(:any)/(:any)'] = "community_groups/post_add/community-groups/$1/$2";

$route['community-groups/(:any)/(:any)'] = "community_groups/post_details/community-groups/$1/$2";

$route['community-groups/(:any)'] = "community_groups/group_details/community-groups/$1";



$route['verifyemail/(:any)'] = "users/verifyEmail/registration/$1";

$route['registration/(:any)'] = "users/index/registration/$1";

$route['registration'] = "users/index/registration";

$route['login'] = "users/login/login";

$route['my-account'] = "users/myaccount/my-account";

$route['forgot-password'] = "users/forgotpassword/forgot-password";

$route['logout'] = "users/logout";

$route['ajax-login'] = "users/ajax_login/ajax-login";

$route['earned-points'] = "users/earned_points/earned-points";



$route['post-ur-add'] = "cls_item_adv/index/post-ur-add";

$route['post-ur-add/create/(:any)'] = "cls_item_adv/create/post-ur-add/$1";

$route['post-ur-add/save'] = "cls_item_adv/save/post-ur-add";

$route['post-ur-add/get-category/(:any)/(:any)'] = "cls_item_adv/getTypeCategory/post-ur-add/$1/$2";

$route['post-ur-add/get-category/(:any)'] = "cls_item_adv/getTypeCategory/post-ur-add/$1";

$route['post-ur-add/get-fields/(:any)'] = "cls_item_adv/getfields/post-ur-add/$1";



$route['guide-to-goa'] = "guidetogoa/index/guide-to-goa";



$route['widgets/(:any)'] = "widgets/$1";



$route['news-events/pages/(:any)'] = "newsevents/index/news-events/pages/$1";

$route['news-events/(:any)'] = "newsevents/index/news-events/$1/A";

$route['news-events'] = "newsevents/index/news-events/A/A";



$route['events/date/(:any)'] = "newsevents/events_date/news-events/$1";

$route['news/(:any)'] = "newsevents/news/news-events/$1";

$route['events/(:any)'] = "newsevents/events/news-events/$1";



$route['add-event'] = "newsevents/add_event/add-event";



$route['blogs'] = "blogs/index/blogs/A";

$route['blogs/blog-details/(:any)'] = "blogs/blog_details/blogs/$1";

$route['blogs/(:any)'] = "blogs/index/blogs/$1";



$route['ask-ur-question'] = "ask_question/index/ask-ur-question";

$route['search-result/search/(:any)/(:any)'] = "searchresult/index/search-result/$1/$2";



$route['page-not-found'] = "index/error_page/page-not-found";

$route['ajax/(:any)'] = "ajax/$1";

$route['ajax'] = "ajax";



$route['info/(:any)'] = "info/index/$1";





/////////////////////



$route['(:any)'] = "index/index/$1";

*/

/* End of file routes.php */

/* Location: ./application/config/routes.php */