<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

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

		$events = $this->Custom_model->fetch_data(EVENTS,
               array(
                   EVENTS.'.id',
                   EVENTS.'.event_date',
                   EVENTS.'.event_time',
                   EVENTS_LANG.'.title',
				   EVENTS_LANG.'.event_place',
                   MEDIA.'.url',
                   MEDIA.'.media_name',
                   MEDIA.'.extension',
                   MEDIA.'.raw_name'
                   ),
               array(EVENTS.'.isblocked'=>0, EVENTS.'.isdeleted'=>0),
               array(
                   EVENTS_LANG=>EVENTS_LANG.'.event_id='.EVENTS.'.id AND ' . EVENTS_LANG . '.language_id=' . $selected_lang,
                   MEDIA=>MEDIA.'.id='.EVENTS.'.media_id'),
			   $search = '', $order = EVENTS . '.created_on', $by = 'desc', 0, 1, $group_by = '', $having = '', $start = 0, $end = ''
		);
		$data['events'] = $events[0];
		//print_r($data['events']); exit;

		$news = $this->Custom_model->fetch_data(NEWS,
               array(
                   NEWS.'.id',
                   NEWS.'.news_date',
                   NEWS_LANG.'.title',
                   MEDIA.'.url',
                   MEDIA.'.media_name',
                   MEDIA.'.extension',
                   MEDIA.'.raw_name'
                   ),
               array(NEWS.'.isblocked'=>0, NEWS.'.isdeleted'=>0),
               array(
                   NEWS_LANG=>NEWS_LANG.'.news_id='.NEWS.'.id AND ' . NEWS_LANG . '.language_id=' . $selected_lang,
                   MEDIA=>MEDIA.'.id='.NEWS.'.media_id'),
			   $search = '', $order = NEWS . '.created_on', $by = 'desc', 0, 1, $group_by = '', $having = '', $start = 0, $end = ''
		);
		$data['news'] = $news[0];
		//print_r($data['news']); exit;

        $partials = array('content' => 'home_content', 'banner'=>'home_banner', 'menu'=>'menu', 'footer'=>'footer');
        $this->template->load('home_template', $partials, $data);
    }

	function set_language(){
        $language =  $this->input->post('language');        
        $this->session->set_userdata('site_language', $language);
        echo 1;
        exit;        
    }
    
}
