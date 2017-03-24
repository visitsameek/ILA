<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends MY_Controller {

    function __construct() {

        parent::__construct();
        $this->load->model('Custom_model');

        $this->lang->load('menu', $this->session->userdata('site_language'));
		$this->lang->load('home', $this->session->userdata('site_language'));
		$this->lang->load('why_choose_ila', $this->session->userdata('site_language'));
		$this->lang->load('footer', $this->session->userdata('site_language'));
    }

    
    function english_kids($cat_id=null)
    {        
        $site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		$data['courses'] = $this->Custom_model->fetch_data(COURSES,
               array(
                   COURSES.'.id',
				   COURSES.'.age_from',
				   COURSES.'.age_to',
				   COURSES_LANG.'.course_title'
                   ),
               array(COURSES.'.course_category_id'=>$cat_id),
               array(
                   COURSES_LANG=>COURSES_LANG.'.course_id='.COURSES.'.id AND ' . COURSES_LANG . '.language_id=' . $selected_lang)
		);

        $partials = array('content' => 'course/kids_content', 'banner'=>'course/kids_banner', 'menu'=>'menu', 'footer'=>'footer');
        $this->template->load('home_template', $partials, $data);
    }
	
	function jumpstart($course_id=null)
    {        
        $site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		$data['courses'] = $this->Custom_model->fetch_data(PROGRAMS,
               array(
                   PROGRAMS.'.id',
				   PROGRAMS_LANG.'.program_name'
                   ),
               array(PROGRAMS.'.course_id'=>$course_id),
               array(
                   PROGRAMS_LANG=>PROGRAMS_LANG.'.program_id='.PROGRAMS.'.id AND ' . PROGRAMS_LANG . '.language_id=' . $selected_lang)
		);

        $partials = array('content' => 'course/jumpstart_content', 'banner'=>'course/jumpstart_banner', 'menu'=>'menu', 'footer'=>'footer');
        $this->template->load('home_template', $partials, $data);
    }

	function jumpstart_levels($course_id=null, $program_id=null)
    {        
        $site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		$data['levels'] = $this->Custom_model->fetch_data(COURSE_LEVELS,
               array(
                   COURSE_LEVELS.'.id',
				   COURSE_LEVELS.'.duration_hours',
				   COURSE_LEVELS.'.duration_months',
				   COURSE_LEVELS.'.age_from',
				   COURSE_LEVELS.'.age_to',
				   COURSE_LEVEL_LANG.'.title'
                   ),
               array(COURSE_LEVELS.'.course_id'=>$course_id, COURSE_LEVELS.'.program_id'=>$program_id),
               array(
                   COURSE_LEVEL_LANG=>COURSE_LEVEL_LANG.'.course_level_id='.COURSE_LEVELS.'.id AND ' . COURSE_LEVEL_LANG . '.language_id=' . $selected_lang)
		);

        $partials = array('content' => 'course/jumpstart_levels_content', 'banner'=>'course/jumpstart_levels_banner', 'menu'=>'menu', 'footer'=>'footer');
        $this->template->load('home_template', $partials, $data);
    }

	function super_juniors($course_id=null)
    {        
        $site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		$data['courses'] = $this->Custom_model->fetch_data(PROGRAMS,
               array(
                   PROGRAMS.'.id',
				   PROGRAMS_LANG.'.program_name'
                   ),
               array(PROGRAMS.'.course_id'=>$course_id),
               array(
                   PROGRAMS_LANG=>PROGRAMS_LANG.'.program_id='.PROGRAMS.'.id AND ' . PROGRAMS_LANG . '.language_id=' . $selected_lang)
		);

        $partials = array('content' => 'course/super_juniors_content', 'banner'=>'course/super_juniors_banner', 'menu'=>'menu', 'footer'=>'footer');
        $this->template->load('home_template', $partials, $data);
    }

	function super_juniors_levels($course_id=null, $program_id=null)
    {        
        $site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		$data['levels'] = $this->Custom_model->fetch_data(COURSE_LEVELS,
               array(
                   COURSE_LEVELS.'.id',
				   COURSE_LEVELS.'.duration_hours',
				   COURSE_LEVELS.'.duration_months',
				   COURSE_LEVELS.'.age_from',
				   COURSE_LEVELS.'.age_to',
			       COURSE_LEVELS.'.cefr',
			       COURSE_LEVELS.'.cambridge_exam',
				   COURSE_LEVEL_LANG.'.title'
                   ),
               array(COURSE_LEVELS.'.course_id'=>$course_id, COURSE_LEVELS.'.program_id'=>$program_id),
               array(
                   COURSE_LEVEL_LANG=>COURSE_LEVEL_LANG.'.course_level_id='.COURSE_LEVELS.'.id AND ' . COURSE_LEVEL_LANG . '.language_id=' . $selected_lang)
		);

        $partials = array('content' => 'course/super_juniors_levels_content', 'banner'=>'course/super_juniors_levels_banner', 'menu'=>'menu', 'footer'=>'footer');
        $this->template->load('home_template', $partials, $data);
    }

	function smart_teens($course_id=null)
    {        
        $site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		$data['courses'] = $this->Custom_model->fetch_data(PROGRAMS,
               array(
                   PROGRAMS.'.id',
				   PROGRAMS_LANG.'.program_name'
                   ),
               array(PROGRAMS.'.course_id'=>$course_id),
               array(
                   PROGRAMS_LANG=>PROGRAMS_LANG.'.program_id='.PROGRAMS.'.id AND ' . PROGRAMS_LANG . '.language_id=' . $selected_lang)
		);

        $partials = array('content' => 'course/smart_teens_content', 'banner'=>'course/smart_teens_banner', 'menu'=>'menu', 'footer'=>'footer');
        $this->template->load('home_template', $partials, $data);
    }

	function smart_teens_levels($course_id=null, $program_id=null)
    {        
        $site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		$data['levels'] = $this->Custom_model->fetch_data(COURSE_LEVELS,
               array(
                   COURSE_LEVELS.'.id',
				   COURSE_LEVELS.'.duration_hours',
				   COURSE_LEVELS.'.duration_months',
				   COURSE_LEVELS.'.age_from',
				   COURSE_LEVELS.'.age_to',
			       COURSE_LEVELS.'.cefr',
			       COURSE_LEVELS.'.cambridge_exam',
			       COURSE_LEVELS.'.ielts',
			       COURSE_LEVELS.'.toefl_ibt',
			       COURSE_LEVELS.'.toeic_reading',
			       COURSE_LEVELS.'.toeic_writing',
				   COURSE_LEVEL_LANG.'.title'
                   ),
               array(COURSE_LEVELS.'.course_id'=>$course_id, COURSE_LEVELS.'.program_id'=>$program_id),
               array(
                   COURSE_LEVEL_LANG=>COURSE_LEVEL_LANG.'.course_level_id='.COURSE_LEVELS.'.id AND ' . COURSE_LEVEL_LANG . '.language_id=' . $selected_lang)
		);

        $partials = array('content' => 'course/smart_teens_levels_content', 'banner'=>'course/smart_teens_levels_banner', 'menu'=>'menu', 'footer'=>'footer');
        $this->template->load('home_template', $partials, $data);
    }

	function english_adults($cat_id=null)
    {        
        $site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		$data['courses'] = $this->Custom_model->fetch_data(COURSES,
               array(
                   COURSES.'.id',
				   COURSES_LANG.'.course_title'
                   ),
               array(COURSES.'.course_category_id'=>$cat_id),
               array(
                   COURSES_LANG=>COURSES_LANG.'.course_id='.COURSES.'.id AND ' . COURSES_LANG . '.language_id=' . $selected_lang)
		);

        $partials = array('content' => 'course/adults_content', 'banner'=>'course/adults_banner', 'menu'=>'menu', 'footer'=>'footer');
        $this->template->load('home_template', $partials, $data);
    }

	function global_english($course_id=null)
    {        
        $site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		$data['courses'] = $this->Custom_model->fetch_data(PROGRAMS,
               array(
                   PROGRAMS.'.id',
				   PROGRAMS_LANG.'.program_name'
                   ),
               array(PROGRAMS.'.course_id'=>$course_id),
               array(
                   PROGRAMS_LANG=>PROGRAMS_LANG.'.program_id='.PROGRAMS.'.id AND ' . PROGRAMS_LANG . '.language_id=' . $selected_lang)
		);

        $partials = array('content' => 'course/global_english_content', 'banner'=>'course/global_english_banner', 'menu'=>'menu', 'footer'=>'footer');
        $this->template->load('home_template', $partials, $data);
    }

	function exam_english($course_id=null)
    {        
        $site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		$data['courses'] = $this->Custom_model->fetch_data(PROGRAMS,
               array(
                   PROGRAMS.'.id',
				   PROGRAMS_LANG.'.program_name'
                   ),
               array(PROGRAMS.'.course_id'=>$course_id),
               array(
                   PROGRAMS_LANG=>PROGRAMS_LANG.'.program_id='.PROGRAMS.'.id AND ' . PROGRAMS_LANG . '.language_id=' . $selected_lang)
		);

        $partials = array('content' => 'course/exam_english_content', 'banner'=>'course/exam_english_banner', 'menu'=>'menu', 'footer'=>'footer');
        $this->template->load('home_template', $partials, $data);
    }

	function schedules($course_id=null, $city_id=null, $center_id=null, $level_id=null, $time=null, $status=null)
    {        
        $site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		//get course list
		$data['course_list'] = $this->Custom_model->fetch_data(COURSES,
               array(
				   COURSES.'.id',
                   COURSES_LANG.'.course_title'
                   ),
               array(),
               array(
                   COURSES_LANG=>COURSES_LANG.'.course_id='.COURSES.'.id AND ' . COURSES_LANG . '.language_id=' . $selected_lang)
		);
		if(!empty($course_id))
		{
			//get course name
			$course = $this->Custom_model->fetch_data(COURSES,
				   array(
					   COURSES_LANG.'.course_title'
					   ),
				   array(COURSES.'.id'=>$course_id),
				   array(
					   COURSES_LANG=>COURSES_LANG.'.course_id='.COURSES.'.id AND ' . COURSES_LANG . '.language_id=' . $selected_lang)
			);
			$data['course_name'] = $course[0]->course_title;

			//get level list
			$data['level_list'] = $this->Custom_model->fetch_data(COURSE_LEVELS,
				   array(
					   COURSE_LEVELS.'.id',
					   COURSE_LEVEL_LANG.'.title'
					   ),
				   array(COURSE_LEVELS.'.course_id'=>$course_id),
				   array(
					   COURSE_LEVEL_LANG=>COURSE_LEVEL_LANG.'.course_level_id='.COURSE_LEVELS.'.id AND ' . COURSE_LEVEL_LANG . '.language_id=' . $selected_lang)
			);
		}		

		//get city list
		$data['city_list'] = $this->Custom_model->fetch_data(CITIES,
               array(
				   CITIES.'.id',
                   CITIES_LANG.'.city_name'
                   ),
               array(),
               array(
                   CITIES_LANG=>CITIES_LANG.'.city_id='.CITIES.'.id AND ' . CITIES_LANG . '.language_id=' . $selected_lang)
		);

		if(!empty($city_id))
		{
			//get city name
			$city = $this->Custom_model->fetch_data(CITIES,
				   array(
					   CITIES_LANG.'.city_name'
					   ),
				   array(CITIES.'.id'=>$city_id),
				   array(
					   CITIES_LANG=>CITIES_LANG.'.city_id='.CITIES.'.id AND ' . CITIES_LANG . '.language_id=' . $selected_lang)
			);
			$data['city_name'] = $city[0]->city_name;

			//get center list
			$data['center_list'] = $this->Custom_model->fetch_data(TRAINING_CENTERS,
				   array(
					   TRAINING_CENTERS.'.id',
					   TRAINING_CENTERS_LANG.'.title'
					   ),
				   array(TRAINING_CENTERS.'.city_id'=>$city_id),
				   array(
					   TRAINING_CENTERS_LANG=>TRAINING_CENTERS_LANG.'.center_id='.TRAINING_CENTERS.'.id AND ' . TRAINING_CENTERS_LANG . '.language_id=' . $selected_lang)
			);
		}

		if(!empty($center_id))
		{
			//get center name
			$center = $this->Custom_model->fetch_data(TRAINING_CENTERS,
				   array(
					   TRAINING_CENTERS_LANG.'.title'
					   ),
				   array(TRAINING_CENTERS.'.id'=>$center_id),
				   array(
					   TRAINING_CENTERS_LANG=>TRAINING_CENTERS_LANG.'.center_id='.TRAINING_CENTERS.'.id AND ' . TRAINING_CENTERS_LANG . '.language_id=' . $selected_lang)
			);
			$data['center_name'] = $center[0]->title;
		}
		
		if(!empty($level_id))
		{
			//get level name
			$level = $this->Custom_model->fetch_data(COURSE_LEVELS,
				   array(
					   COURSE_LEVEL_LANG.'.title'
					   ),
				   array(COURSE_LEVELS.'.id'=>$level_id),
				   array(
					   COURSE_LEVEL_LANG=>COURSE_LEVEL_LANG.'.course_level_id='.COURSE_LEVELS.'.id AND ' . COURSE_LEVEL_LANG . '.language_id=' . $selected_lang)
			);
			$data['level_name'] = $level[0]->title;
		}

		$data['time_list'] = $this->Custom_model->fetch_data(COURSE_SCHEDULES, array('DISTINCT(CONCAT(`class_time_from`, " - ", `class_time_to`)) AS time_period'), array(), array());

		$time_name = !empty($time) ? $time : '';
		$status_name = !empty($status) ? str_replace("%20", " ", $status) : '';

		if(!empty($course_id) && !empty($center_id))
		{
			$where_condn = array('course_id'=>$course_id, 'center_id'=>$center_id);
			if(!empty($level_id))
				$where_condn = array_merge($where_condn, array('level_id'=>$level_id));
			if(!empty($time))
				$where_condn = array_merge($where_condn, array('CONCAT(`class_time_from`, " - ", `class_time_to`) LIKE '=>'%'.str_replace("%20", " ", $time).'%'));
			if(!empty($status))
				$where_condn = array_merge($where_condn, array('status'=>str_replace("%20", " ", $status)));

			$data['schedule_list'] = $this->Custom_model->fetch_data(COURSE_SCHEDULES, array('*'), $where_condn, array());
		}

        $partials = array('content' => 'course/schedules_content', 'banner'=>'course/schedules_banner', 'menu'=>'menu', 'footer'=>'footer');
        $this->template->load('home_template', $partials, $data);
    }
    
}
