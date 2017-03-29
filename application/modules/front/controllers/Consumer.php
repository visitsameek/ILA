<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consumer extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Custom_model');

		$this->lang->load('menu', $this->session->userdata('site_language'));
		$this->lang->load('home', $this->session->userdata('site_language'));
		$this->lang->load('why_choose_ila', $this->session->userdata('site_language'));
		$this->lang->load('footer', $this->session->userdata('site_language'));
    }

    
    function index()
    {	        
		$site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		if($this->input->post('hidcoursecat')) {
			$this->session->set_userdata('consumer_course_cat', $this->input->post('hidcoursecat'));

			if($this->input->post('hidcoursecat') == 1)
				redirect(base_url() . 'career-inspiration-kids');
			else if($this->input->post('hidcoursecat') == 2)
				redirect(base_url() . 'career-inspiration-adults');
		}

		$data['course_cat'] = $this->Custom_model->fetch_data(COURSE_CATEGORIES,
               array(
                   COURSE_CATEGORIES.'.id',
                   COURSE_CATEGORIES_LANG.'.category_name'
                   ),
               array(COURSE_CATEGORIES.'.isblocked'=>0, COURSE_CATEGORIES.'.isdeleted'=>0),
               array(
                       COURSE_CATEGORIES_LANG=>COURSE_CATEGORIES_LANG.'.course_category_id='.COURSE_CATEGORIES.'.id AND '.COURSE_CATEGORIES_LANG.'.language_id='.$selected_lang
					), $search = '', $order = COURSE_CATEGORIES . '.id', $by = 'asc');

        $partials = array('content' => 'consumer/home_content');
        $this->template->load('consumer_template', $partials, $data);
    }
	
	function career_inspiration_kids()
    {	        
		$site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

        $partials = array('content' => 'consumer/career_inspiration_kids');
        $this->template->load('consumer_template', $partials, $data);
    }

	function kids_name()
    {	        
		$site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		if($this->input->post('kid_name')) {
			$this->session->set_userdata('consumer_kid_name', $this->input->post('kid_name'));
			redirect(base_url() . 'kids-age');
		}

        $partials = array('content' => 'consumer/kids_name');
        $this->template->load('consumer_template', $partials, $data);
    }

	function kids_age()
    {	        
		$site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		if($this->input->post('hidkidage')) {
			$this->session->set_userdata('consumer_kid_age', $this->input->post('hidkidage'));
			redirect(base_url() . 'kids-start-level');
		}

		$data['consumer_kid_name'] = $this->session->userdata('consumer_kid_name');

        $partials = array('content' => 'consumer/kids_age');
        $this->template->load('consumer_template', $partials, $data);
    }

	function kids_start_level()
    {	        
		$site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		if($this->input->post('hidkidstart')) {
			$this->session->set_userdata('consumer_kid_start_level', $this->input->post('hidkidstart'));
			redirect(base_url() . 'kids-reach-level');
		}

		$data['consumer_kid_name'] = $this->session->userdata('consumer_kid_name');

        $partials = array('content' => 'consumer/kids_start_level');
        $this->template->load('consumer_template', $partials, $data);
    }

	function kids_reach_level()
    {	        
		$site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		if($this->input->post('hidkidreach')) {
			$this->session->set_userdata('consumer_kid_reach_level', $this->input->post('hidkidreach'));
			redirect(base_url() . 'kids-name');
		}

		$data['consumer_kid_name'] = $this->session->userdata('consumer_kid_name');
		$data['consumer_kid_start_level'] = $this->session->userdata('consumer_kid_start_level');

        $partials = array('content' => 'consumer/kids_reach_level');
        $this->template->load('consumer_template', $partials, $data);
    }

	/************************************* Adults Starts ***************************************/

	function career_inspiration_adults()
    {	        
		$site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

        $partials = array('content' => 'consumer/career_inspiration_adults');
        $this->template->load('consumer_template', $partials, $data);
    }

	function adults_name()
    {	        
		$site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		if($this->input->post('adult_name')) {
			$this->session->set_userdata('consumer_adult_name', $this->input->post('adult_name'));
			$this->session->set_userdata('consumer_adult_age', $this->input->post('adult_age'));
			redirect(base_url() . 'adults-start-level');
		}

        $partials = array('content' => 'consumer/adults_name');
        $this->template->load('consumer_template', $partials, $data);
    }	

	function adults_start_level()
    {	        
		$site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		if($this->input->post('hidadultstart')) {
			$this->session->set_userdata('consumer_adult_start_level', $this->input->post('hidadultstart'));
			redirect(base_url() . 'adults-reach-level');
		}

        $partials = array('content' => 'consumer/adults_start_level');
        $this->template->load('consumer_template', $partials, $data);
    }

	function adults_reach_level()
    {	        
		$site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		if($this->input->post('hidadultreach')) {
			$this->session->set_userdata('consumer_kid_reach_level', $this->input->post('hidadultreach'));
			redirect(base_url() . 'adults-name');
		}
		$data['consumer_adult_start_level'] = $this->session->userdata('consumer_adult_start_level');

        $partials = array('content' => 'consumer/adults_reach_level');
        $this->template->load('consumer_template', $partials, $data);
    }
    
}
