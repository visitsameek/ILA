<?php
/*
 * Content Management System[CMS]
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends MY_Controller {

    function __construct() {

        parent::__construct();
        $this->load->model('Custom_model');

        $this->lang->load('menu', $this->session->userdata('site_language'));
		$this->lang->load('home', $this->session->userdata('site_language'));
		$this->lang->load('why_choose_ila', $this->session->userdata('site_language'));
		$this->lang->load('footer', $this->session->userdata('site_language'));
    }

    
    function career()
    {        
        $site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		$career = $this->Custom_model->fetch_data(CMS_PAGE,
               array(
                   CMS_PAGE.'.id',
				   CMS_LANG.'.content'
                   ),
               array(CMS_PAGE.'.id'=>12),
               array(
                   CMS_LANG=>CMS_LANG.'.cms_page_id='.CMS_PAGE.'.id AND ' . CMS_LANG . '.language_id=' . $selected_lang
			   )
		);
		$data['career'] = $career[0];

		$data['job_list'] = $this->Custom_model->fetch_data(JOBS,
               array(
                   JOBS.'.id',
				   JOBS_LANG.'.job_title'
                   ),
               array(JOBS.'.isblocked'=>0, JOBS.'.isdeleted'=>0),
               array(
                   JOBS_LANG=>JOBS_LANG.'.job_id='.JOBS.'.id AND ' . JOBS_LANG . '.language_id=' . $selected_lang
			   ), $search = '', $order = JOBS . '.id', $by = 'asc'
		);

        $partials = array('content' => 'site/career_content', 'banner'=>'site/career_banner', 'menu'=>'menu', 'footer'=>'footer');
        $this->template->load('home_template', $partials, $data);
    }

	function career_details($career_id=null)
    {        
        $site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		$job_details = $this->Custom_model->fetch_data(JOBS,
               array(
                   JOBS.'.id',
				   JOBS.'.contact_phone',
				   JOBS.'.contact_email',
				   JOBS_LANG.'.job_title',
				   JOBS_LANG.'.job_info',
				   JOBS_LANG.'.job_requirement',
				   JOBS_LANG.'.job_level',
				   JOBS_LANG.'.job_department',
				   CITIES_LANG.'.city_name'
                   ),
               array(JOBS.'.id'=>$career_id),
               array(
                   JOBS_LANG=>JOBS_LANG.'.job_id='.JOBS.'.id AND ' . JOBS_LANG . '.language_id=' . $selected_lang,
				   CITIES_LANG=>CITIES_LANG.'.city_id='.JOBS.'.city_id AND ' . CITIES_LANG . '.language_id=' . $selected_lang
			   )
		);
		$data['job_details'] = $job_details[0];

        $partials = array('content' => 'site/career_details_content', 'banner'=>'site/career_details_banner', 'menu'=>'menu', 'footer'=>'footer');
        $this->template->load('home_template', $partials, $data);
    }

	function beyond_english()
    {        
        $site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		$data['beyond_english'] = $this->Custom_model->fetch_data(CMS_PAGE,
               array(
                   CMS_PAGE.'.id',
				   CMS_LANG.'.title',
                   CMS_LANG.'.short_desc',
                   MEDIA.'.url',
                   MEDIA.'.media_name',
                   MEDIA.'.extension',
                   MEDIA.'.raw_name'
                   ),
               array(CMS_PAGE.'.page_parent'=>13),
               array(
                   CMS_LANG=>CMS_LANG.'.cms_page_id='.CMS_PAGE.'.id AND ' . CMS_LANG . '.language_id=' . $selected_lang,
				   MEDIA=>MEDIA.'.id='.CMS_PAGE.'.media_id'
			   ), $search = '', $order = CMS_PAGE . '.sort_order', $by = 'asc'
		);
		//print_r($data['values']); exit;

        $partials = array('content' => 'site/beyond_english_content', 'banner'=>'site/beyond_english_banner', 'menu'=>'menu', 'footer'=>'footer');
        $this->template->load('home_template', $partials, $data);
    }

	function century_skills($page_id=null)
    {        
        $site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		$century_skills = $this->Custom_model->fetch_data(CMS_PAGE,
               array(
                   CMS_PAGE.'.id',
				   CMS_PAGE.'.videos',
				   CMS_LANG.'.title',
				   CMS_LANG.'.short_desc',
                   CMS_LANG.'.content',
                   MEDIA.'.url',
                   MEDIA.'.media_name',
                   MEDIA.'.extension',
                   MEDIA.'.raw_name'
                   ),
               array(CMS_PAGE.'.id'=>$page_id),
               array(
                   CMS_LANG=>CMS_LANG.'.cms_page_id='.CMS_PAGE.'.id AND ' . CMS_LANG . '.language_id=' . $selected_lang,
				   MEDIA=>MEDIA.'.id='.CMS_PAGE.'.media_id'
			   )
		);
		$data['century_skills'] = $century_skills[0];
		//print_r($data['values']); exit;

        $partials = array('content' => 'site/21c_skills_content', 'banner'=>'site/21c_skills_banner', 'menu'=>'menu', 'footer'=>'footer');
        $this->template->load('home_template', $partials, $data);
    }

	function century_learning_environment($page_id=null)
    {        
        $site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		$century_skills = $this->Custom_model->fetch_data(CMS_PAGE,
               array(
                   CMS_PAGE.'.id',
				   CMS_PAGE.'.videos',
				   CMS_LANG.'.title',
				   CMS_LANG.'.short_desc',
                   CMS_LANG.'.content',
                   MEDIA.'.url',
                   MEDIA.'.media_name',
                   MEDIA.'.extension',
                   MEDIA.'.raw_name'
                   ),
               array(CMS_PAGE.'.id'=>$page_id),
               array(
                   CMS_LANG=>CMS_LANG.'.cms_page_id='.CMS_PAGE.'.id AND ' . CMS_LANG . '.language_id=' . $selected_lang,
				   MEDIA=>MEDIA.'.id='.CMS_PAGE.'.media_id'
			   )
		);
		$data['century_skills'] = $century_skills[0];
		//print_r($data['values']); exit;

        $partials = array('content' => 'site/21c_learning_environment_content', 'banner'=>'site/21c_learning_environment_banner', 'menu'=>'menu', 'footer'=>'footer');
        $this->template->load('home_template', $partials, $data);
    }

	function century_inspiration($page_id=null)
    {        
        $site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		$century_skills = $this->Custom_model->fetch_data(CMS_PAGE,
               array(
                   CMS_PAGE.'.id',
				   CMS_PAGE.'.videos',
				   CMS_LANG.'.title',
				   CMS_LANG.'.short_desc',
                   CMS_LANG.'.content',
                   MEDIA.'.url',
                   MEDIA.'.media_name',
                   MEDIA.'.extension',
                   MEDIA.'.raw_name'
                   ),
               array(CMS_PAGE.'.id'=>$page_id),
               array(
                   CMS_LANG=>CMS_LANG.'.cms_page_id='.CMS_PAGE.'.id AND ' . CMS_LANG . '.language_id=' . $selected_lang,
				   MEDIA=>MEDIA.'.id='.CMS_PAGE.'.media_id'
			   )
		);
		$data['century_skills'] = $century_skills[0];
		//print_r($data['values']); exit;

        $partials = array('content' => 'site/21c_inspiration_content', 'banner'=>'site/21c_inspiration_banner', 'menu'=>'menu', 'footer'=>'footer');
        $this->template->load('home_template', $partials, $data);
    }

	function gallery($city_id=null)
    {
		$site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		$city = $this->Custom_model->fetch_data(CITIES,
               array(
                   CITIES_LANG.'.city_name'
                   ),
               array(CITIES.'.id'=>$city_id),
               array(
                   CITIES_LANG=>CITIES_LANG.'.city_id='.CITIES.'.id AND ' . CITIES_LANG . '.language_id=' . $selected_lang)
		);
		$data['city_name'] = $city[0]->city_name;

		$data['city_id'] = $city_id;

		$data['city_list'] = $this->Custom_model->fetch_data(CITIES,
               array(
				   CITIES.'.id',
                   CITIES_LANG.'.city_name'
                   ),
               array(),
               array(
                   CITIES_LANG=>CITIES_LANG.'.city_id='.CITIES.'.id AND ' . CITIES_LANG . '.language_id=' . $selected_lang)
		);

		$partials = array('content' => 'site/gallery_content', 'banner'=>'site/gallery_banner', 'menu'=>'menu', 'footer'=>'footer');
        $this->template->load('home_template', $partials, $data);
	}
    
}
