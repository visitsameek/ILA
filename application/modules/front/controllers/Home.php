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

	function contact_us()
    {        
        $site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		$contact = $this->Custom_model->fetch_data(BASIC_SETTINGS,
               array(
                   BASIC_SETTINGS.'.site_email',
				   BASIC_SETTINGS.'.site_contact_no',
                   BASIC_SETTINGS_LANG.'.site_address'
                   ),
               array(BASIC_SETTINGS.'.id'=>1),
               array(
                   BASIC_SETTINGS_LANG=>BASIC_SETTINGS_LANG.'.settings_id='.BASIC_SETTINGS.'.id AND ' . BASIC_SETTINGS_LANG . '.language_id=' . $selected_lang)
		);
		$data['contact'] = $contact[0];

        $partials = array('content' => 'site/contact_us_content', 'banner'=>'site/contact_us_banner', 'menu'=>'menu', 'footer'=>'footer');
        $this->template->load('home_template', $partials, $data);
    }

	function teachers()
    {        
        $site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		$data['all_teachers'] = $this->Custom_model->fetch_data(TEACHERS,
               array(
                   TEACHERS.'.id',
				   TEACHERS.'.country',
				   TEACHERS.'.img_url',
                   TEACHERS_LANG.'.first_name',
				   TEACHERS_LANG.'.last_name',
				   TEACHERS_LANG.'.certificate_details'
                   ),
               array(TEACHERS.'.isblocked'=>0, TEACHERS.'.isdeleted'=>0),
               array(
                   TEACHERS_LANG=>TEACHERS_LANG.'.teacher_id='.TEACHERS.'.id AND ' . TEACHERS_LANG . '.language_id=' . $selected_lang),
			   $search = '', $order = TEACHERS_LANG . '.first_name', $by = 'asc'
		);
		//print_r($data['all_teachers']); exit;

		$data['teachers'] = $this->Custom_model->fetch_data(TEACHERS,
               array(
                   TEACHERS.'.id',
				   TEACHERS.'.country',
				   TEACHERS.'.img_url',
                   TEACHERS_LANG.'.first_name',
				   TEACHERS_LANG.'.last_name',
				   TEACHERS_LANG.'.certificate_details'
                   ),
               array(TEACHERS.'.isblocked'=>0, TEACHERS.'.isdeleted'=>0),
               array(
                   TEACHERS_LANG=>TEACHERS_LANG.'.teacher_id='.TEACHERS.'.id AND ' . TEACHERS_LANG . '.language_id=' . $selected_lang),
			   $search = '', $order = TEACHERS_LANG . '.first_name', $by = 'asc', 1, 5
		);

        $partials = array('content' => 'site/teacher_content', 'banner'=>'site/teacher_banner', 'menu'=>'menu', 'footer'=>'footer');
        $this->template->load('home_template', $partials, $data);
    }

	function centers($city_id=null)
    {        
        $site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		$city = $this->Custom_model->fetch_data(CITIES_LANG, array(CITIES_LANG.'.city_name'),
               array(CITIES_LANG.'.city_id'=>$city_id, CITIES_LANG.'.language_id'=>$selected_lang),
               array()
		);
		$data['city'] = $city[0];

		$data['city_id'] = $city_id;

		$data['city_list'] = $this->Custom_model->fetch_data(CITIES, array('id', 'city'), array(), array());

		$where_cond = array(TRAINING_CENTERS.'.city_id'=>$city_id);
		if(!empty($district_id))
			$where_cond = array(TRAINING_CENTERS.'.city_id'=>$city_id, TRAINING_CENTERS.'.district_id'=>$district_id);

		$data['centers'] = $this->Custom_model->fetch_data(TRAINING_CENTERS,
               array(
                   TRAINING_CENTERS.'.phone',
				   TRAINING_CENTERS.'.email_id',
                   TRAINING_CENTERS_LANG.'.title',
				   TRAINING_CENTERS_LANG.'.address',
                   MEDIA.'.url',
                   MEDIA.'.media_name',
                   MEDIA.'.extension',
                   MEDIA.'.raw_name'
                   ),
               $where_cond,
               array(
                   TRAINING_CENTERS_LANG=>TRAINING_CENTERS_LANG.'.center_id='.TRAINING_CENTERS.'.id AND ' . TRAINING_CENTERS_LANG . '.language_id=' . $selected_lang,
				   MEDIA=>MEDIA.'.id='.TRAINING_CENTERS.'.media_id')
		);

        $partials = array('content' => 'site/centers_content', 'banner'=>'site/centers_banner', 'menu'=>'menu', 'footer'=>'footer');
        $this->template->load('home_template', $partials, $data);
    }

	function get_district_list($city_id) {

		$district_list = '';

		$district_arr = $this->Custom_model->fetch_data(DISTRICTS, array('id', 'district'), array(DISTRICTS.'.city_id' => $city_id), array());
		if(!empty($district_arr))
		{
			for($i=0;$i<sizeof($district_arr);$i++)
			{
				$district_list .= '<li><a href="'.$district_arr[$i]->id.'">'.$district_arr[$i]->district.'</a></li>';
			}
		}
		echo $district_list;
		exit;
	}
    
}
