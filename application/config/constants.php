<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
  |--------------------------------------------------------------------------
  | Display Debug backtrace
  |--------------------------------------------------------------------------
  |
  | If set to TRUE, a backtrace will be displayed along with php errors. If
  | error_reporting is disabled, the backtrace will not display, regardless
  | of this setting
  |
 */
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

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
defined('FILE_READ_MODE') OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE') OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE') OR define('DIR_WRITE_MODE', 0755);

/*
  |--------------------------------------------------------------------------
  | File Stream Modes
  |--------------------------------------------------------------------------
  |
  | These modes are used when working with fopen()/popen()
  |
 */
defined('FOPEN_READ') OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE') OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE') OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE') OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE') OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE') OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT') OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT') OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
  |--------------------------------------------------------------------------
  | Exit Status Codes
  |--------------------------------------------------------------------------
  |
  | Used to indicate the conditions under which the script is exit()ing.
  | While there is no universal standard for error codes, there are some
  | broad conventions.  Three such conventions are mentioned below, for
  | those who wish to make use of them.  The CodeIgniter defaults were
  | chosen for the least overlap with these conventions, while still
  | leaving room for others to be defined in future versions and user
  | applications.
  |
  | The three main conventions used for determining exit status codes
  | are as follows:
  |
  |    Standard C/C++ Library (stdlibc):
  |       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
  |       (This link also contains other GNU-specific conventions)
  |    BSD sysexits.h:
  |       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
  |    Bash scripting:
  |       http://tldp.org/LDP/abs/html/exitcodes.html
  |
 */
defined('EXIT_SUCCESS') OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR') OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG') OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE') OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS') OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT') OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE') OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN') OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX') OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

define('UPLOAD_PATH', 'uploads');

define('SITE_TITLE', 'ILA');

//******** database table *********//
defined('ADMIN') ? null : define('ADMIN', 'ila_admin');

defined('LANGUAGE') ? null : define('LANGUAGE', 'ila_language');
defined('MEDIA') ? null : define('MEDIA', 'ila_media');
defined('COUNTRIES') ? null : define('COUNTRIES', 'countries');

defined('BASIC_SETTINGS') ? null : define('BASIC_SETTINGS', 'ila_basic_settings');
defined('BASIC_SETTINGS_LANG') ? null : define('BASIC_SETTINGS_LANG', 'ila_basic_settings_lang');
defined('CMS_PAGE') ? null : define('CMS_PAGE', 'ila_cms_page');
defined('CMS_LANG') ? null : define('CMS_LANG', 'ila_cms_language');

defined('CITIES') ? null : define('CITIES', 'ila_cities');
defined('CITIES_LANG') ? null : define('CITIES_LANG', 'ila_cities_lang');
defined('DISTRICTS') ? null : define('DISTRICTS', 'ila_districts');
defined('DISTRICTS_LANG') ? null : define('DISTRICTS_LANG', 'ila_districts_lang');
defined('TRAINING_CENTERS') ? null : define('TRAINING_CENTERS', 'ila_training_centers');
defined('TRAINING_CENTERS_LANG') ? null : define('TRAINING_CENTERS_LANG', 'ila_training_centers_lang');

defined('COURSE_CATEGORIES') ? null : define('COURSE_CATEGORIES', 'ila_course_categories');
defined('COURSE_CATEGORIES_LANG') ? null : define('COURSE_CATEGORIES_LANG', 'ila_course_categories_lang');
defined('COURSES') ? null : define('COURSES', 'ila_courses');
defined('COURSE_LEVELS') ? null : define('COURSE_LEVELS', 'ila_course_levels');
defined('COURSE_LEVEL_LANG') ? null : define('COURSE_LEVEL_LANG', 'ila_course_level_lang');
defined('COURSE_SCHEDULES') ? null : define('COURSE_SCHEDULES', 'ila_course_schedules');

defined('CORE_VALUES') ? null : define('CORE_VALUES', 'ila_core_values');
defined('CORE_VALUES_LANG') ? null : define('CORE_VALUES_LANG', 'ila_core_values_lang');
defined('AWARDS') ? null : define('AWARDS', 'ila_awards');
defined('AWARDS_LANG') ? null : define('AWARDS_LANG', 'ila_awards_lang');
defined('STORIES') ? null : define('STORIES', 'ila_stories');
defined('STORIES_LANG') ? null : define('STORIES_LANG', 'ila_stories_lang');
defined('TEACHERS') ? null : define('TEACHERS', 'ila_teachers');
defined('TEACHERS_LANG') ? null : define('TEACHERS_LANG', 'ila_teachers_lang');
defined('COMMUNITY_NETWORKS') ? null : define('COMMUNITY_NETWORKS', 'ila_community_networks');
defined('COMMUNITY_NETWORKS_LANG') ? null : define('COMMUNITY_NETWORKS_LANG', 'ila_community_networks_lang');
