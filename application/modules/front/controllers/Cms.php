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
		$this->lang->load('site', $this->session->userdata('site_language'));
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

	function stories()
    {        
        $site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		$data['parent_story_list'] = $this->Custom_model->fetch_data(STORIES,
               array(
                   STORIES.'.id',
				   STORIES_LANG.'.title',
                   STORIES_LANG.'.short_desc'
                   ),
               array(STORIES.'.story_type'=>1, STORIES.'.course_id'=>0, STORIES.'.isblocked'=>0, STORIES.'.isdeleted'=>0),
               array(
                   STORIES_LANG=>STORIES_LANG.'.story_id='.STORIES.'.id AND ' . STORIES_LANG . '.language_id=' . $selected_lang)
		);

		$data['student_story_list'] = $this->Custom_model->fetch_data(STORIES,
               array(
                   STORIES.'.id',
				   STORIES_LANG.'.title',
                   STORIES_LANG.'.short_desc'
                   ),
               array(STORIES.'.story_type'=>2, STORIES.'.course_id'=>0, STORIES.'.isblocked'=>0, STORIES.'.isdeleted'=>0),
               array(
                   STORIES_LANG=>STORIES_LANG.'.story_id='.STORIES.'.id AND ' . STORIES_LANG . '.language_id=' . $selected_lang)
		);

        $partials = array('content' => 'cms/story_content', 'banner'=>'cms/story_banner', 'menu'=>'menu', 'footer'=>'footer');
        $this->template->load('home_template', $partials, $data);
    }

	function story_details($story_id=null)
    {        
        $site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		$story_details = $this->Custom_model->fetch_data(STORIES,
               array(
                   STORIES.'.id',
                   STORIES_LANG.'.title',
				   STORIES_LANG.'.long_desc',
                   MEDIA.'.url',
                   MEDIA.'.media_name',
                   MEDIA.'.extension',
                   MEDIA.'.raw_name'
                   ),
               array(STORIES.'.id'=>$story_id),
               array(
                   STORIES_LANG=>STORIES_LANG.'.story_id='.STORIES.'.id AND ' . STORIES_LANG . '.language_id=' . $selected_lang,
                   MEDIA=>MEDIA.'.id='.STORIES.'.media_id')
		);
		$data['story_details'] = $story_details[0];

        $partials = array('content' => 'cms/story_details_content', 'banner'=>'cms/story_details_banner', 'menu'=>'menu', 'footer'=>'footer');
        $this->template->load('home_template', $partials, $data);
    }

	function community_network()
    {        
        $site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		$data['network_list'] = $this->Custom_model->fetch_data(COMMUNITY_NETWORKS,
               array(
                   COMMUNITY_NETWORKS.'.id',
				   COMMUNITY_NETWORKS_LANG.'.title',
                   COMMUNITY_NETWORKS_LANG.'.content'
                   ),
               array(COMMUNITY_NETWORKS.'.isblocked'=>0, COMMUNITY_NETWORKS.'.isdeleted'=>0),
               array(
                   COMMUNITY_NETWORKS_LANG=>COMMUNITY_NETWORKS_LANG.'.community_network_id='.COMMUNITY_NETWORKS.'.id AND ' . COMMUNITY_NETWORKS_LANG . '.language_id=' . $selected_lang)
		);

        $partials = array('content' => 'cms/community_network_content', 'banner'=>'cms/community_network_banner', 'menu'=>'menu', 'footer'=>'footer');
        $this->template->load('home_template', $partials, $data);
    }

	function news()
    {        
        $site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		$data['news_list'] = $this->Custom_model->fetch_data(NEWS,
               array(
                   NEWS.'.id',
                   NEWS.'.news_date',
                   NEWS_LANG.'.title',
				   NEWS_LANG.'.short_desc',
                   MEDIA.'.url',
                   MEDIA.'.media_name',
                   MEDIA.'.extension',
                   MEDIA.'.raw_name'
                   ),
               array(NEWS.'.isblocked'=>0, NEWS.'.isdeleted'=>0),
               array(
                   NEWS_LANG=>NEWS_LANG.'.news_id='.NEWS.'.id AND ' . NEWS_LANG . '.language_id=' . $selected_lang,
                   MEDIA=>MEDIA.'.id='.NEWS.'.media_id'),
			   $search = '', $order = NEWS . '.created_on', $by = 'desc'
		);
		//print_r($data['values']); exit;

        $partials = array('content' => 'cms/news_content', 'banner'=>'cms/news_banner', 'menu'=>'menu', 'footer'=>'footer');
        $this->template->load('home_template', $partials, $data);
    }

	function news_details($news_id=null)
    {        
        $site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		$news_details = $this->Custom_model->fetch_data(NEWS,
               array(
                   NEWS.'.id',
                   NEWS.'.news_date',
                   NEWS_LANG.'.title',
				   NEWS_LANG.'.content',
                   MEDIA.'.url',
                   MEDIA.'.media_name',
                   MEDIA.'.extension',
                   MEDIA.'.raw_name'
                   ),
               array(NEWS.'.id'=>$news_id),
               array(
                   NEWS_LANG=>NEWS_LANG.'.news_id='.NEWS.'.id AND ' . NEWS_LANG . '.language_id=' . $selected_lang,
                   MEDIA=>MEDIA.'.id='.NEWS.'.media_id')
		);
		$data['news_details'] = $news_details[0];

        $partials = array('content' => 'cms/news_details_content', 'banner'=>'cms/news_details_banner', 'menu'=>'menu', 'footer'=>'footer');
        $this->template->load('home_template', $partials, $data);
    }

	function events()
    {        
        $site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		$data['event_list'] = $this->Custom_model->fetch_data(EVENTS,
               array(
                   EVENTS.'.id',
                   EVENTS.'.event_date',
                   EVENTS.'.event_time',
                   EVENTS_LANG.'.title',
				   EVENTS_LANG.'.event_place',
				   EVENTS_LANG.'.short_desc',
                   MEDIA.'.url',
                   MEDIA.'.media_name',
                   MEDIA.'.extension',
                   MEDIA.'.raw_name'
                   ),
               array(EVENTS.'.isblocked'=>0, EVENTS.'.isdeleted'=>0),
               array(
                   EVENTS_LANG=>EVENTS_LANG.'.event_id='.EVENTS.'.id AND ' . EVENTS_LANG . '.language_id=' . $selected_lang,
                   MEDIA=>MEDIA.'.id='.EVENTS.'.media_id'),
			   $search = '', $order = EVENTS . '.created_on', $by = 'desc'
		);
		//print_r($data['values']); exit;

        $partials = array('content' => 'cms/event_content', 'banner'=>'cms/event_banner', 'menu'=>'menu', 'footer'=>'footer');
        $this->template->load('home_template', $partials, $data);
    }

	function event_details($event_id=null)
    {        
        $site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		$event_details = $this->Custom_model->fetch_data(EVENTS,
               array(
                   EVENTS.'.id',
                   EVENTS.'.event_date',
                   EVENTS.'.event_time',
                   EVENTS_LANG.'.title',
				   EVENTS_LANG.'.event_place',
				   EVENTS_LANG.'.content',
                   MEDIA.'.url',
                   MEDIA.'.media_name',
                   MEDIA.'.extension',
                   MEDIA.'.raw_name'
                   ),
               array(EVENTS.'.id'=>$event_id),
               array(
                   EVENTS_LANG=>EVENTS_LANG.'.event_id='.EVENTS.'.id AND ' . EVENTS_LANG . '.language_id=' . $selected_lang,
                   MEDIA=>MEDIA.'.id='.EVENTS.'.media_id'),
			   $search = '', $order = EVENTS . '.created_on', $by = 'desc'
		);
		$data['event_details'] = $event_details[0];

        $partials = array('content' => 'cms/event_details_content', 'banner'=>'cms/event_details_banner', 'menu'=>'menu', 'footer'=>'footer');
        $this->template->load('home_template', $partials, $data);
    }
    
}
