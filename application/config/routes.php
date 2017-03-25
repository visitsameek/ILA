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
$route['default_controller'] = 'front/home';

$route['about-us'] = "front/cms/about_us";
$route['values'] = "front/cms/values";
$route['awards'] = "front/cms/awards";
$route['community-network'] = "front/cms/community_network";
$route['why-choose-us'] = "front/cms/why_choose_us";
$route['learning-guarantees'] = "front/cms/learning_guarantees";
$route['contact-us'] = "front/home/contact_us";
$route['teachers'] = "front/home/teachers";
$route['teachers/(:num)'] = "front/home/teacher_details/$1";
$route['career'] = "front/site/career";
$route['beyond-english'] = "front/site/beyond_english";
$route['21c-skills/(:num)'] = "front/site/century_skills/$1";
$route['21c-learning-environment/(:num)'] = "front/site/century_learning_environment/$1";
$route['21c-inspiration/(:num)'] = "front/site/century_inspiration/$1";
$route['gallery/(:num)'] = "front/site/gallery/$1";
$route['request-callback'] = "front/home/request_callback";

$route['stories'] = "front/cms/stories";
$route['stories/(:num)'] = "front/cms/story_details/$1";
$route['news'] = "front/cms/news";
$route['news/(:num)'] = "front/cms/news_details/$1";
$route['events'] = "front/cms/events";
$route['events/(:num)'] = "front/cms/event_details/$1";

$route['english-kids/(:num)'] = "front/course/english_kids/$1";
$route['jumpstart/(:num)'] = "front/course/jumpstart/$1";
$route['jumpstart-levels/(:num)/(:num)'] = "front/course/jumpstart_levels/$1/$2";
$route['super-juniors/(:num)'] = "front/course/super_juniors/$1";
$route['super-juniors-levels/(:num)/(:num)'] = "front/course/super_juniors_levels/$1/$2";
$route['smart-teens/(:num)'] = "front/course/smart_teens/$1";
$route['smart-teens-levels/(:num)/(:num)'] = "front/course/smart_teens_levels/$1/$2";
$route['global-english/(:num)'] = "front/course/global_english/$1";
$route['global-english-levels/(:num)/(:num)'] = "front/course/global_english_levels/$1/$2";
$route['exam-english/(:num)'] = "front/course/exam_english/$1";

$route['english-adults/(:num)'] = "front/course/english_adults/$1";

$route['schedules'] = "front/course/schedules";
$route['schedules/(:num)'] = "front/course/schedules/$1";
$route['schedules/(:num)/(:num)'] = "front/course/schedules/$1/$2";
$route['schedules/(:num)/(:num)/(:num)'] = "front/course/schedules/$1/$2/$3";
$route['schedules/(:num)/(:num)/(:num)/(:num)'] = "front/course/schedules/$1/$2/$3/$4";
$route['schedules/(:num)/(:num)/(:num)/(:num)/(:any)'] = "front/course/schedules/$1/$2/$3/$4/$5";
$route['schedules/(:num)/(:num)/(:num)/(:num)/(:any)/(:any)'] = "front/course/schedules/$1/$2/$3/$4/$5/$6";

$route['register'] = "front/course/register";
$route['register/(:num)'] = "front/course/register/$1";
$route['register/(:num)/(:num)'] = "front/course/register/$1/$2";
$route['register/(:num)/(:num)/(:num)'] = "front/course/register/$1/$2/$3";

$route['centers/(:num)'] = "front/home/centers/$1";

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
