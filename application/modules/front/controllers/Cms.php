<?php
/*
 * Content Management System[CMS]
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Cms extends MY_Controller {

    function __construct() {

        parent::__construct();
        $this->load->model('Custom_model');

        $this->lang->load('menu', $this->session->userdata('site_language'));
		$this->lang->load('home', $this->session->userdata('site_language'));
		$this->lang->load('why_choose_ila', $this->session->userdata('site_language'));
		$this->lang->load('footer', $this->session->userdata('site_language'));
    }

    
    function about_us()
    {        
        $site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		$cms = $this->Custom_model->fetch_data(CMS_PAGE,
               array(
                   CMS_PAGE.'.id',
				   CMS_LANG.'.title',
                   CMS_LANG.'.short_desc',
                   CMS_LANG.'.content'
                   ),
               array(CMS_PAGE.'.slug'=>'about-us'),
               array(
                   CMS_LANG=>CMS_LANG.'.cms_page_id='.CMS_PAGE.'.id AND ' . CMS_LANG . '.language_id=' . $selected_lang)
		);
		$data['cms'] = $cms[0];

        $partials = array('content' => 'cms/about_us_content', 'banner'=>'cms/about_us_banner', 'menu'=>'menu', 'footer'=>'footer');
        $this->template->load('home_template', $partials, $data);
    }

	function values()
    {        
        $site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		$data['values'] = $this->Custom_model->fetch_data(CORE_VALUES,
               array(
                   CORE_VALUES.'.id',
				   CORE_VALUES_LANG.'.title',
                   CORE_VALUES_LANG.'.content',
                   MEDIA.'.url',
                   MEDIA.'.media_name',
                   MEDIA.'.extension',
                   MEDIA.'.raw_name'
                   ),
               array(CORE_VALUES.'.isblocked'=>0, CORE_VALUES.'.isdeleted'=>0),
               array(
                   CORE_VALUES_LANG=>CORE_VALUES_LANG.'.core_value_id='.CORE_VALUES.'.id AND ' . CORE_VALUES_LANG . '.language_id=' . $selected_lang,
				   MEDIA=>MEDIA.'.id='.CORE_VALUES.'.media_id'
			   )
		);
		//print_r($data['values']); exit;

        $partials = array('content' => 'cms/vision_content', 'banner'=>'cms/vision_banner', 'menu'=>'menu', 'footer'=>'footer');
        $this->template->load('home_template', $partials, $data);
    }

	function awards()
    {        
        $site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		$data['awards'] = $this->Custom_model->fetch_data(AWARDS,
               array(
                   AWARDS.'.id',
				   AWARDS_LANG.'.title',
                   AWARDS_LANG.'.content',
                   MEDIA.'.url',
                   MEDIA.'.media_name',
                   MEDIA.'.extension',
                   MEDIA.'.raw_name'
                   ),
               array(AWARDS.'.isblocked'=>0, AWARDS.'.isdeleted'=>0),
               array(
                   AWARDS_LANG=>AWARDS_LANG.'.award_id='.AWARDS.'.id AND ' . AWARDS_LANG . '.language_id=' . $selected_lang,
				   MEDIA=>MEDIA.'.id='.AWARDS.'.media_id'
			   )
		);
		//print_r($data['values']); exit;

        $partials = array('content' => 'cms/awards_content', 'banner'=>'cms/awards_banner', 'menu'=>'menu', 'footer'=>'footer');
        $this->template->load('home_template', $partials, $data);
    }

	function why_choose_us()
    {        
        $site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		$data['pages'] = $this->Custom_model->fetch_data(CMS_PAGE,
               array(
                   CMS_PAGE.'.id',
                   CMS_PAGE.'.videos',
				   CMS_LANG.'.title',
			       CMS_LANG.'.short_desc',
                   MEDIA.'.url',
                   MEDIA.'.media_name',
                   MEDIA.'.extension',
                   MEDIA.'.raw_name'
                   ),
               array(CMS_PAGE.'.page_parent'=>2),
               array(
                   CMS_LANG=>CMS_LANG.'.cms_page_id='.CMS_PAGE.'.id AND ' . CMS_LANG . '.language_id=' . $selected_lang,
				   MEDIA=>MEDIA.'.id='.CMS_PAGE.'.media_id|left'
			   ),
			   $search = '', $order = CMS_PAGE . '.sort_order', $by = 'asc'
		);
		//print_r($data['pages']); exit;

        $partials = array('content' => 'cms/why_choose_us_content', 'banner'=>'cms/why_choose_us_banner', 'menu'=>'menu', 'footer'=>'footer');
        $this->template->load('home_template', $partials, $data);
    }

	function learning_guarantees()
    {        
        $site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		$pages = $this->Custom_model->fetch_data(CMS_PAGE,
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
               array(CMS_PAGE.'.id'=>6),
               array(
                   CMS_LANG=>CMS_LANG.'.cms_page_id='.CMS_PAGE.'.id AND ' . CMS_LANG . '.language_id=' . $selected_lang,
				   MEDIA=>MEDIA.'.id='.CMS_PAGE.'.media_id|left'
			   )
		);
		$data['pages'] = $pages[0];
		//print_r($data['pages']); exit;

        $partials = array('content' => 'cms/learning_guarantees_content', 'banner'=>'cms/learning_guarantees_banner', 'menu'=>'menu', 'footer'=>'footer');
        $this->template->load('home_template', $partials, $data);
    }
    
}
