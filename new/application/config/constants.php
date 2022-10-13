<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



/*

|--------------------------------------------------------------------------

| File and Directory Modes

|--------------------------------------------------------------------------

|

| These prefs are used when checking and setting modes when working

| with the file system.  The defaults are fine on servers with proper

| security, but you may wish (or even need) to change the values in

| certain environments (Apache running a separate process for each

| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should

| always be used to set the mode correctly.

|

*/

define('FILE_READ_MODE', 0644);

define('FILE_WRITE_MODE', 0666);

define('DIR_READ_MODE', 0755);

define('DIR_WRITE_MODE', 0777);



/*

|--------------------------------------------------------------------------

| File Stream Modes

|--------------------------------------------------------------------------

|

| These modes are used when working with fopen()/popen()

|

*/



define('FOPEN_READ',							'rb');

define('FOPEN_READ_WRITE',						'r+b');

define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care

define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care

define('FOPEN_WRITE_CREATE',					'ab');

define('FOPEN_READ_WRITE_CREATE',				'a+b');

define('FOPEN_WRITE_CREATE_STRICT',				'xb');

define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');



define('PAGE_SIZE', 9);

define('SETTINGS_UPLOAD_PATH', 'uploads/settings/');

define('SPECIALITIES_UPLOAD_PATH', 'uploads/specialities/');
define('SPECIALITIES_UPLOAD_PATH_THUMB', 'uploads/specialities/thumbs/');
define('FACILITIES_ICON_UPLOAD_PATH', 'uploads/specialities/icons/');
define('SPECIALITIES_ICON_UPLOAD_PATH', 'uploads/specialities/specialt_icons/');
define('DOCTOR_IMAGE_PATH', 'uploads/doctors/');
if (!file_exists('uploads/doctors/')) {
    mkdir('uploads/doctors/', 0777, true);
}
define('BANNER_IMAGE_PATH', 'uploads/banners/');
if (!file_exists('uploads/banners/')) {
    mkdir('uploads/banners/', 0777, true);
}
define('BLOG_PHOTO_UPLOAD_PATH', 'uploads/blog/post_image/');
if (!file_exists('uploads/blog/post_image/')) {
    mkdir('uploads/blog/post_image/', 0777, true);
}
define('TESTIMONIALS_IMAGE_PATH', 'uploads/testimonials/');
if (!file_exists('uploads/testimonials/')) {
    mkdir('uploads/testimonials/', 0777, true);
}
define('BANNERS_PHOTO_UPLOAD_PATH', 'uploads/banners/');
if (!file_exists('uploads/banners/')) {
    mkdir('uploads/banners/', 0777, true);
}

/*define('MENU_IMAGE_UPLOAD_PATH', 'r2d2/uploads/menuimages/');

define('MENU_THUMB_IMAGE_UPLOAD_PATH', 'r2d2/uploads/menuimages/thumbs/');

*/

/*define('BANNERS_UPLOAD_PATH', 'r2d2/uploads/banners/');

define('BANNERS_UPLOAD_THUMB_PATH', 'r2d2/uploads/banners/thumbs/');*/



/*define('EVENTS_PATH', 'r2d2/uploads/events/');

define('EVENTS_THUMB_PATH', 'r2d2/uploads/events/thumbs/');



define('NEWS_PATH', 'r2d2/uploads/news/');

define('NEWS_THUMB_PATH', 'r2d2/uploads/news/thumbs/');

define('NEWS_UPLOAD_DOCS_PATH', 'r2d2/uploads/news/docs/');



define('PRESSRELEASE_PATH', 'r2d2/uploads/pressreleases/');

define('PRESSRELEASE_THUMB_PATH', 'r2d2/uploads/pressreleases/thumbs/');

define('PRESSRELEASE_UPLOAD_DOCS_PATH', 'r2d2/uploads/pressreleases/docs/');



define('PAGES_PATH', 'r2d2/uploads/pages/');

define('PAGES_PATH_THUMB', 'r2d2/uploads/pages/thumbs/');

define('PAGES_ROLL_OVER_IMAGE_UPLOAD_PATH','r2d2/uploads/pages/roll_over/');

define('PAGES_ROLL_OVER_IMAGE_UPLOAD_THUMB_PATH','r2d2/uploads/pages/roll_over/thumbs/');



define('PHOTOS_PATH', 'r2d2/uploads/photos/');

define('PHOTOS_THUMB_PATH', 'r2d2/uploads/photos/thumbs/');

define('RECOGNITION_PHOTOS_THUMB_PATH', 'r2d2/uploads/recognitions/photos/');

define('RECOGNITION_PHOTOS_PATH', 'r2d2/uploads/recognitions/photos/thumbs/');

define('RECOGNITION_ATTACHMENTS_PATH', 'r2d2/uploads/recognitions/attachments/');

define('HOPESTORIES_PATH', 'r2d2/uploads/hopestories/');

define('HOPESTORIES_THUMB_PATH', 'r2d2/uploads/hopestories/thumbs/');

define('VIDEOS_PATH', 'images/image-video-tour.png');



define('UPLOAD_BIODATA', 'r2d2/uploads/matrimonybiodata/');

define('UPLOAD_CV', 'r2d2/uploads/jobscv/');



define('PARTNERS_PATH', 'r2d2/uploads/partners/');

define('PARTNERS_THUMB_PATH', 'r2d2/uploads/partners/thumbs/');

define('PARTNERS_THUMB_SLIDER_PATH', 'r2d2/uploads/partners/thumbs_slider/');



define('PARTNER_TYPES_UPLOAD_PATH', 'r2d2/uploads/partnertypes/'); 

define('PARTNER_TYPES_THUMB_UPLOAD_PATH', 'r2d2/uploads/partnertypes/thumbs/');

define('PARTNER_TYPE_IMAGE_WIDTH', 320);

define('PARTNER_TYPE_IMAGE_HEIGHT', 250);



define('ACHIEVEMENTS_PATH', 'r2d2/uploads/achievements/');

define('ACHIEVEMENTS_THUMB_PATH', 'r2d2/uploads/achievements/thumbs/');

define('ACHIEVEMENTS_THUMB_SLIDER_PATH', 'r2d2/uploads/achievements/thumbs_slider/');



define('MILESTONES_PATH', 'r2d2/uploads/milestones/');

define('MILESTONES_THUMB_PATH', 'r2d2/uploads/milestones/thumbs/');

define('MILESTONES_THUMB_SLIDER_PATH', 'r2d2/uploads/milestones/thumbs_slider/');



define('BLOGS_PATH', 'r2d2/uploads/blogs/');

define('BLOGS_THUMB_PATH', 'r2d2/uploads/blogs/thumbs/');

define('TESTIMONIAL_PATH', 'r2d2/uploads/testimonial/thumbs/');

define('TESTIMONIAL_ENQUIRY_PATH', 'r2d2/uploads/testimonial/enquiry/');

define('TESTIMONIAL_ENQUIRY_THUMB_PATH', 'r2d2/uploads/testimonial/enquiry/thumb/');

define('SETTINGS_UPLOAD_PATH', 'r2d2/uploads/settings/');



define('TOOLKITS_WALLPAPERS_PATH', 'r2d2/uploads/downloads/wallpapers/');

define('TOOLKITS_WALLPAPERS_PATH_THUMB', 'r2d2/uploads/downloads/wallpapers/thumbs/');

define('TOOLKITS_BROCHOURES_PATH', 'r2d2/uploads/downloads/brochures/');

define('TOOLKITS_BROCHOURES_PATH_THUMB', 'r2d2/uploads/downloads/brochures/thumbs/');

define('TOOLKITS_BRANDINGS_PATH', 'r2d2/uploads/downloads/brandings/');

define('TOOLKITS_BRANDINGS_PATH_THUMB', 'r2d2/uploads/downloads/brandings/thumbs/');



define('DOWNLOADS_WALLPAPERS_UPLOAD_PATH', 'r2d2/uploads/downloads/wallpapers/');

define('DOWNLOADS_WALLPAPERS_THUMB_UPLOAD_PATH', 'r2d2/uploads/downloads/wallpapers/thumbs/');

define('DOWNLOADS_BROCHURES_UPLOAD_PATH', 'r2d2/uploads/downloads/brochures/');

define('DOWNLOADS_BROCHURES_THUMB_UPLOAD_PATH', 'r2d2/uploads/downloads/brochures/thumbs/');

define('DOWNLOADS_KRISHNA_BIOGRAPHY_UPLOAD_PATH', 'r2d2/uploads/downloads/krishnabiography/');

define('DOWNLOADS_KRISHNA_BIOGRAPHY_THUMB_UPLOAD_PATH', 'r2d2/uploads/downloads/krishnabiography/thumbs/');

define('DOWNLOADS_HARE_KRISHNA_MELLOWS_UPLOAD_PATH', 'r2d2/uploads/downloads/harekrishnamellows/');

define('DOWNLOADS_HARE_KRISHNA_MELLOWS_THUMB_UPLOAD_PATH', 'r2d2/uploads/downloads/harekrishnamellows/thumbs/');

define('DOWNLOADS_LECTURES_UPLOAD_PATH', 'r2d2/uploads/downloads/lectures/');

define('DOWNLOADS_LECTURES_THIMB_UPLOAD_PATH', 'r2d2/uploads/downloads/lectures/thumbs/');

define('DOWNLOADS_EVENT_CALENDER_UPLOAD_PATH', 'r2d2/uploads/downloads/eventcalender/');

define('DOWNLOADS_EVENT_CALENDER_THUMB_UPLOAD_PATH', 'r2d2/uploads/downloads/eventcalender/thumbs/');



define('DOWNLOAD_TYPES_UPLOAD_PATH', 'r2d2/uploads/downloadtypes/'); 

define('DOWNLOAD_TYPES_THUMB_UPLOAD_PATH', 'r2d2/uploads/downloadtypes/thumbs/');

define('DOWNLOAD_TYPE_IMAGE_WIDTH', 80);

define('DOWNLOAD_TYPE_IMAGE_HEIGHT', 80);



define('STATIC_IMAGE_UPLOAD_PATH', 'r2d2/uploads/widgets/');

define('STATIC_IMAGE_THUMB_UPLOAD_PATH', 'r2d2/uploads/widgets/thumbs/');

define('STATIC_ROLL_OVER_IMAGE_UPLOAD_PATH', 'r2d2/uploads/widgets/roll_over/');

define('STATIC_ROLL_OVER_THUMB_IMAGE_UPLOAD_PATH', 'r2d2/uploads/widgets/roll_over/thumbs/');



define('FUNDRAISING_CAMPAIGNS_PATH', 'r2d2/uploads/fundraisingcampaigns/');

define('DOWNLOAD_DOCUMENT_PATH', 'r2d2/uploads/download_documents/');

define('BOARD_MEMBERS', 'r2d2/uploads/boardmembers/thumbs/');

define('FINANCIAL_REPORTS', 'r2d2/uploads/financialreports/');

define('ESTIMONIAL_IMAGE_WIDTH', 300);

define('ESTIMONIAL_IMAGE_HEIGHT', 220);



define('COVER_IMAGE_PATH', 'r2d2/uploads/usercoverimage/');



define('ADVERTISER_UPLOAD_PATH', 'r2d2/uploads/advertiser/');

define('ADVERTISER_UPLOAD_THUMB_PATH', 'r2d2/uploads/advertiser/thumbs/');



define('MATRIMONY_IMAGE_UPLOAD_PATH','r2d2/uploads/matrimonyimages/');

define('MATRIMONY_IMAGE_UPLOAD_THUMB_PATH','r2d2/uploads/matrimonyimages/thumbs/');

define('MATRIMONY_IMAGE_WIDTH',200);

define('MATRIMONY_IMAGE_HEIGHT',200);



define('GROUP_IMAGE_UPLOAD_PATH','r2d2/uploads/groupimages/');

define('GROUP_IMAGE_UPLOAD_THUMB_PATH','r2d2/uploads/groupimages/thumbs/');

define('GROUP_IMAGE_WIDTH',300);

define('GROUP_IMAGE_HEIGHT',200);



define('FORUM_IMAGE_UPLOAD_PATH','r2d2/uploads/forumimages/');

define('FORUM_IMAGE_UPLOAD_THUMB_PATH','r2d2/uploads/forumimages/thumbs/');

define('FORUM_IMAGE_WIDTH',300);

define('FORUM_IMAGE_HEIGHT',200);



define('FORUM_COMMENT_IMAGE_UPLOAD_PATH','r2d2/uploads/forumcommentimages/');

define('FORUM_COMMENT_IMAGE_THUMB_UPLOAD_PATH','r2d2/uploads/forumcommentimages/thumbs/');

define('FORUM_COMMENT_IMAGE_WIDTH',200);

define('FORUM_COMMENT_IMAGE_HEIGHT',100);



define('GROUP_COMMENT_IMAGE_UPLOAD_PATH','r2d2/uploads/groupcommentimages/');

define('GROUP_COMMENT_IMAGE_THUMB_UPLOAD_PATH','r2d2/uploads/groupcommentimages/thumbs/');

define('GROUP_COMMENT_IMAGE_WIDTH',200);

define('GROUP_COMMENT_IMAGE_HEIGHT',100);



define('ITEM_HOME_PAGE_IMAGE_UPLOAD_PATH','r2d2/uploads/itemcategoryhomeimage/');

define('ITEM_HOME_PAGE_IMAGE_UPLOAD_THUMB_PATH','r2d2/uploads/itemcategoryhomeimage/thumbs/');

define('ITEM_HOME_PAGE_IMAGE_WIDTH',300);

define('ITEM_HOME_PAGE_IMAGE_HEIGHT',200);



define('ITEM_ADV_IMAGE_UPLOAD_PATH','r2d2/uploads/itemadvimages/');

define('ITEM_ADV_IMAGE_UPLOAD_THUMB_PATH','r2d2/uploads/itemadvimages/thumbs/');

define('ITEM_ADV_IMAGE_WIDTH',300);

define('ITEM_ADV_IMAGE_HEIGHT',200);



define('LOCALLIFE_ITEM_COVER_UPLOAD_PATH', 'r2d2/uploads/locallifeitem/');

define('LOCALLIFE_ITEM_COVER_UPLOAD_THUMB_PATH', 'r2d2/uploads/locallifeitem/thumbs/');

define('LOCALLIFE_ITEM_COVER_IMAGE_WIDTH', 239);

define('LOCALLIFE_ITEM_COVER_IMAGE_HEIGHT', 124);



define('ITEM_CAT_IMAGE_UPLOAD_PATH','r2d2/uploads/itemcategoryimage/');

define('ITEM_CAT_IMAGE_UPLOAD_THUMB_PATH','r2d2/uploads/itemcategoryimage/thumbs/');



define('ITEM_JOBS_IMAGE_UPLOAD_PATH','r2d2/uploads/jobs/');

define('ITEM_JOBS_IMAGE_UPLOAD_THUMB_PATH','r2d2/uploads/jobs/thumbs/');

define('ITEM_JOBS_IMAGE_WIDTH',300);

define('ITEM_JOBS_IMAGE_HEIGHT',200);*/



/* End of file constants.php */

/* Location: ./application/config/constants.php */