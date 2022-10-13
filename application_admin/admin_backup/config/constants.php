<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

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

define('FOPEN_READ', 'rb');
define('FOPEN_READ_WRITE', 'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE', 'ab');
define('FOPEN_READ_WRITE_CREATE', 'a+b');
define('FOPEN_WRITE_CREATE_STRICT', 'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

define('BANNERS_UPLOAD_PATH', 'uploads/banners/');
define('BANNERS_UPLOAD_THUMB_PATH', 'uploads/banners/thumbs/');
define('SPECIALITIES_UPLOAD_PATH', '../uploads/specialities/');
define('SPECIALITIES_UPLOAD_PATH_THUMB', '../uploads/specialities/thumbs/');
define('FACILITIES_ICON_UPLOAD_PATH', '../uploads/specialities/icons/');
if(!file_exists('../uploads/specialities/icons/')){
    mkdir('../uploads/specialities/icons/',0777,true);
}
define('DOCTOR_IMAGE_PATH','../uploads/doctors/');
if(!file_exists('../uploads/doctors/')){
    mkdir('../uploads/doctors/',0777,true);
}
define('BANNER_IMAGE_PATH', '../uploads/banners/');
if (!file_exists('../uploads/banners/')) {
    mkdir('../uploads/banners/', 0777, true);
}
define('SETTINGS_UPLOAD_PATH', '../uploads/settings/');
if(!file_exists('../uploads/settings/')){
  mkdir('../uploads/settings/',0777,true);
}
define('PAGES_VIDEO_IMAGE_PATH', '../uploads/pages/video_image/');
if (!file_exists('../uploads/pages/video_image/')) {
    mkdir('../uploads/pages/video_image/', 0777, true);
}
define('BLOG_PHOTO_UPLOAD_PATH', '../uploads/blog/post_image/');
if (!file_exists('../uploads/blog/post_image/')) {
    mkdir('../uploads/blog/post_image/', 0777, true);
}
define('PAGES_VIDEO_URL_PATH', '../uploads/pages/video/');
if (!file_exists('../uploads/pages/video/')) {
    mkdir('../uploads/pages/video/', 0777, true);
}
define('PRODUCT_CATEGORY_IMAGE_PATH', '../uploads/products/product_category/');
if (!file_exists('../uploads/products/product_category/')) {
    mkdir('../uploads/products/product_category/', 0777, true);
}
define('TESTIMONIALS_IMAGE_PATH', '../uploads/testimonials/');
if (!file_exists('../uploads/testimonials/')) {
    mkdir('../uploads/testimonials/', 0777, true);
}
define('PRODUCTS_VIDEO_PATH', '../uploads/products/product_video/');
if (!file_exists('../uploads/products/product_video/')) {
    mkdir('../uploads/products/product_video/', 0777, true);
}
define('PRODUCTS_SIDE_IMAGE_PATH', '../uploads/products/product_image/');
if (!file_exists('../uploads/products/product_image/')) {
    mkdir('../uploads/products/product_image/', 0777, true);
}
define('PRODUCTS_VIDEO_IMAGE_PATH', '../uploads/products/video_image/');
if (!file_exists('../uploads/products/video_image/')) {
    mkdir('../uploads/products/video_image/', 0777, true);
}
define('PRODUCTS_IMAGE_PATH', '../uploads/products/product_image/');
if (!file_exists('../uploads/products/product_image/')) {
    mkdir('../uploads/products/product_image/', 0777, true);
}
define('VIDEO_IMAGE_PATH', '../uploads/video_image/');
if (!file_exists('../uploads/video_image/')) {
    mkdir('../uploads/video_image/', 0777, true);
}
define('VIDEO_URL_PATH', '../uploads/video/');
if (!file_exists('../uploads/video/')) {
    mkdir('../uploads/video/', 0777, true);
}
define('VIDEO_CATEGORY_IMAGE_PATH', '../uploads/video_category_image/');
if (!file_exists('../uploads/video_category_image/')) {
    mkdir('../uploads/video_category_image/', 0777, true);
}
define('VIDEO_CATEGORY_PATH', '../uploads/video_category/');
if (!file_exists('../uploads/video_category/')) {
    mkdir('../uploads/video_category/', 0777, true);
}
define('GALLERY_IMAGE_PATH', '../uploads/gallery/');
if (!file_exists('../uploads/gallery/')) {
    mkdir('../uploads/gallery/', 0777, true);
}
define('GALLERY_CATEGORY_IMAGE_PATH', '../uploads/gallery_category/');
if (!file_exists('../uploads/gallery_category/')) {
    mkdir('../uploads/gallery_category/', 0777, true);
}

define('PROJECT_PICTURE_PATH', '../uploads/project/');
if (!file_exists('../uploads/project/')) {
    mkdir('../uploads/project/', 0777, true);
}
define('PROJECT_DOCUMENT_PATH', '../uploads/project_document/');
if (!file_exists('../uploads/project_document/')) {
    mkdir('../uploads/project_document/', 0777, true);
}
define('CUSTOMER_DOCUMENTS_PATH', '../uploads/customer_documents/');
if (!file_exists('../uploads/customer_documents/')) {
    mkdir('../uploads/customer_documents/', 0777, true);
}
define('PERSONAL_PHOTO_PATH', '../uploads/personal_photo/');
if (!file_exists('../uploads/personal_photo/')) {
    mkdir('../uploads/personal_photo/', 0777, true);
}
define('BANNERS_PHOTO_UPLOAD_PATH', '../uploads/banners/');
if (!file_exists('../uploads/banners/')) {
    mkdir('../uploads/banners/', 0777, true);
}
define('PAGES_PHOTO_UPLOAD_PATH', '../uploads/pages/');
if (!file_exists('../uploads/pages/')) {
    mkdir('../uploads/pages/', 0777, true);
}

define('SETTINGS_UPLOAD_PATH_VIDEO_IMAGE', '../uploads/settings_video/');
if (!file_exists('../uploads/settings_video/')) {
    mkdir('../uploads/settings_video/', 0777, true);
}
define('BANNERS_PHOTO_UPLOAD_PATH_THUMB', '../uploads/banners/thumbs/');
if (!file_exists('../uploads/banners/thumbs/')) {
    mkdir('../uploads/banners/thumbs/', 0777, true);
}
define('WIDGETS_UPLOAD_PATH', '../uploads/widgets/');
if (!file_exists('../uploads/widgets/')) {
    mkdir('../uploads/widgets/', 0777, true);
}
/* End of file constants.php */
/* Location: ./application/config/constants.php */