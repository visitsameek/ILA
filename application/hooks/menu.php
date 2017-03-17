<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menu {

	public function __construct() {
        
    }

    public function all_menu_items() {
		$CI =& get_instance();
		$CI->load->model('Custom_model');
		
		$site_language = $CI->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;

		$CI->cities = $CI->Custom_model->fetch_data(CITIES, array(
            CITIES . '.id',
            CITIES_LANG . '.city_name'
                ), array(), array(CITIES_LANG => CITIES_LANG . '.city_id=' . CITIES . '.id AND ' . CITIES_LANG . '.language_id=' . $selected_lang), $search = '', $order = CITIES . '.id', $by = 'asc');
		//print_r($CI->cities); exit;

		$CI->course_cats = $CI->Custom_model->fetch_data(COURSE_CATEGORIES,
               array(
                   COURSE_CATEGORIES.'.id',
                   COURSE_CATEGORIES_LANG.'.category_name'
                   ),
               array(COURSE_CATEGORIES.'.isblocked'=>0, COURSE_CATEGORIES.'.isdeleted'=>0),
               array(
                       COURSE_CATEGORIES_LANG=>COURSE_CATEGORIES_LANG.'.course_category_id='.COURSE_CATEGORIES.'.id AND '.COURSE_CATEGORIES_LANG.'.language_id='.$selected_lang
					), $search = '', $order = COURSE_CATEGORIES . '.id', $by = 'asc');
		//echo '<pre>'; print_r($CI->course_cats); //exit;

		$CI->all_courses = array();       
        if(!empty($CI->course_cats)) {
            for($i=0;$i<sizeof($CI->course_cats);$i++) {
				array_push($CI->all_courses, $CI->course_cats[$i]);

				$CI->courses = $CI->Custom_model->fetch_data(COURSES,
				   array(
					   COURSES.'.id',
					   COURSES_LANG.'.course_title'
					   ),
				   array(COURSES.'.course_category_id'=>$CI->course_cats[$i]->id),
				   array(
						   COURSES_LANG=>COURSES_LANG.'.course_id='.COURSES.'.id AND '.COURSES_LANG.'.language_id='.$selected_lang
						), $search = '', $order = COURSES . '.id', $by = 'asc');

                $CI->all_courses[$i]->courses = array();
				if(!empty($CI->courses)) {
					for($j=0;$j<sizeof($CI->courses);$j++) {
						array_push($CI->all_courses[$i]->courses, $CI->courses[$j]);
					}					
				}
            }
           
        }
		//echo '<pre>'; print_r($CI->all_courses); exit;
	}

}
