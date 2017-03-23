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
    
}
