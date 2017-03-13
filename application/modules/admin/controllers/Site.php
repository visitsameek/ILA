<?php
/*
 * Content Management System[CMS]
 * This controller is created for add,edit and list CMS Pages for Admin users.
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends MY_Controller {

    function __construct() {

        parent::__construct();
        $this->load->model('Custom_model');

        if (!$this->session->userdata('user_data')) {
            redirect(base_url() . 'admin/login');
        }
    }
    
    /* event starts */
    
    function list_events()
    {        
        $selected_lang = ($this->session->userdata('language'))?$this->session->userdata('language'):1;
        $data['selected_lang'] = $selected_lang;

        /* Pagination Code Start */
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/site/list_events/';
        /* Row Count Code */
        $config['total_rows'] = $this->Custom_model->row_count(EVENTS, array(EVENTS . '.id'), array() );
        $config['use_page_numbers'] = TRUE;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '<li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '<li>';
        $config['per_page'] = 20;
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="disabled"><a href="javascript:void(0)">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        //print_r($config);die;
        $this->pagination->initialize($config);
        $data['page_link'] = $this->pagination->create_links();
        $page_number = $this->uri->segment(4) ? $this->uri->segment(4) : 0;
        $page_number = ($page_number != 0) ? $page_number - 1 : $page_number;
        /* Pagination Code End */

        $data['event_list'] = $this->Custom_model->fetch_data(EVENTS,
                array(EVENTS.'.*', EVENTS_LANG.'.event_id', EVENTS_LANG.'.title', EVENTS_LANG.'.short_desc', EVENTS_LANG.'.content', EVENTS_LANG.'.event_place', EVENTS_LANG.'.language_id'),
                array(),
                array(EVENTS_LANG => EVENTS_LANG.'.event_id='.EVENTS.'.id AND '.EVENTS_LANG.'.language_id='.$selected_lang. '| inner'),
                $search='',//CMS_LANG.'language_id'.$selected_lang,
                $order = EVENTS . '.id',
                $by = 'desc'
        );//echo '<pre>';print_r($data['cms_list']);

        $partials = array('content' => 'sites/list_events', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    function add_event()
    {
        $selected_lang = ($this->session->userdata('language'))?$this->session->userdata('language'):1;
        $data['selected_lang'] = $selected_lang;

        $data['city_list'] = $this->Custom_model->fetch_data(CITIES, array('id', 'city'), array(), array());

        //$this->load->helper('custom_helper');
		//load_editor();//to load niceditor.
        
        if($this->input->post('submit')){
            if ($this->input->post('event') == "") {
                $this->session->set_flashdata('error_message', 'Please enter event');
                redirect(base_url() . 'admin/site/add_event');
			} elseif ($this->input->post('title') == "") {
                $this->session->set_flashdata('error_message', 'Please enter event title');
                redirect(base_url() . 'admin/site/add_event');
            } elseif ($this->input->post('event_date') == "") {
                $this->session->set_flashdata('error_message', 'Please enter event date');
                redirect(base_url() . 'admin/site/add_event');
            } elseif ($this->input->post('event_time') == "") {
                $this->session->set_flashdata('error_message', 'Please enter event time');
                redirect(base_url() . 'admin/site/add_event');
            } elseif ($this->input->post('city_id') == "") {
                $this->session->set_flashdata('error_message', 'Please select city');
                redirect(base_url() . 'admin/site/add_event');
            } elseif ($this->input->post('event_place') == "") {
                $this->session->set_flashdata('error_message', 'Please enter event place');
                redirect(base_url() . 'admin/site/add_event');
            } elseif ($this->input->post('short_desc') == "") {
                $this->session->set_flashdata('error_message', 'Please enter short description');
                redirect(base_url() . 'admin/site/add_event');
            } else {
                $event_date = explode('/', $this->input->post('event_date'));

                $ins_data['event']   = $this->input->post('event');
                $ins_data['event_date'] = $event_date[2].'-'.$event_date[0].'-'.$event_date[1];
				$ins_data['event_year'] = $event_date[2];
                $ins_data['event_time'] = $this->input->post('event_time');
                $ins_data['city_id']   = $this->input->post('city_id');
                $ins_data['media_id']   = $this->input->post('media_id');
				$ins_data['created_on']   = date('Y-m-d');

                // add data to cms table
                $res = $this->Custom_model->insert_data($ins_data, EVENTS);

                if ($res != FALSE) {
                    $ins_inner['event_id']  = $res;
                    $ins_inner['title']   = $this->input->post('title');
					$ins_inner['short_desc'] = $this->input->post('short_desc');
                    $ins_inner['content'] = $this->input->post('content');
					$ins_inner['event_place'] = $this->input->post('event_place');
                    $ins_inner['language_id'] = $selected_lang;

                    $inner = $this->Custom_model->insert_data($ins_inner, EVENTS_LANG);

                    if($inner!=FALSE){
                        $this->session->set_flashdata('success_message', 'Event added successfully.');
                        redirect(base_url() . 'admin/site/list_events');
                    }else{
                        $this->Custom_model->delete_row(EVENTS, array('id'=>$res));
                        $this->session->set_flashdata('error_message', 'Error occurred! Please try again.');
                        redirect(base_url() . 'admin/site/add_event');
                    }
                } else {
                    $this->session->set_flashdata('error_message', 'Error occurred! Please try again.');
                    redirect(base_url() . 'admin/site/add_event');
                }
            }
        }
        $partials = array('content' => 'sites/add_event', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    function edit_event($id)
    {
        $selected_lang = ($this->session->userdata('language'))?$this->session->userdata('language'):1;
        $data['selected_lang'] = $selected_lang;        

        //check page is exist or not.
        $event_id = decode_url($id);
        $chk_event_exist = $this->Custom_model->row_present_check(EVENTS, array('id'=>$event_id));
        if($chk_event_exist==false){
            redirect(base_url() . 'admin/site/list_events');
        }

		$data['city_list'] = $this->Custom_model->fetch_data(CITIES, array('id', 'city'), array(), array());

        $event_details = $this->Custom_model->fetch_data(EVENTS, array(
            EVENTS . '.*',
            EVENTS_LANG . '.language_id',
            EVENTS_LANG . '.event_id',
            EVENTS_LANG . '.title',
            EVENTS_LANG . '.short_desc',
            EVENTS_LANG . '.content',
            EVENTS_LANG . '.event_place'
                ), array(EVENTS . '.id' => $event_id), array(EVENTS_LANG => EVENTS . '.id=' . EVENTS_LANG . '.event_id AND ' . EVENTS_LANG . '.language_id=' . $selected_lang . '|left')
        );

        $data['event_details'] = $event_details[0];

        //$this->load->helper('custom_helper');
		//load_editor();//to load ckeditor.

        if($this->input->post('submit')){
            if ($this->input->post('event') == "") {
                $this->session->set_flashdata('error_message', 'Please enter event');
                redirect(base_url() . 'admin/site/edit_event/'.encode_url($event_id));
			} elseif ($this->input->post('title') == "") {
                $this->session->set_flashdata('error_message', 'Please enter event title');
                redirect(base_url() . 'admin/site/edit_event/'.encode_url($event_id));
            } elseif ($this->input->post('event_date') == "") {
                $this->session->set_flashdata('error_message', 'Please enter event date');
                redirect(base_url() . 'admin/site/edit_event/'.encode_url($event_id));
            } elseif ($this->input->post('event_time') == "") {
                $this->session->set_flashdata('error_message', 'Please enter event time');
                redirect(base_url() . 'admin/site/edit_event/'.encode_url($event_id));
            } elseif ($this->input->post('city_id') == "") {
                $this->session->set_flashdata('error_message', 'Please select city');
                redirect(base_url() . 'admin/site/edit_event/'.encode_url($event_id));
            } elseif ($this->input->post('event_place') == "") {
                $this->session->set_flashdata('error_message', 'Please enter event place');
                redirect(base_url() . 'admin/site/edit_event/'.encode_url($event_id));
            } elseif ($this->input->post('short_desc') == "") {
                $this->session->set_flashdata('error_message', 'Please enter short description');
                redirect(base_url() . 'admin/site/edit_event/'.encode_url($event_id));
            } else {
                $event_date = explode('/', $this->input->post('event_date'));

                $ins_data['event']   = $this->input->post('event');
                $ins_data['event_date'] = $event_date[2].'-'.$event_date[0].'-'.$event_date[1];
				$ins_data['event_year'] = $event_date[2];
                $ins_data['event_time'] = $this->input->post('event_time');
                $ins_data['city_id']   = $this->input->post('city_id');
                $ins_data['media_id']   = $this->input->post('media_id');
				$ins_data['modified_on']   = date('Y-m-d');

                $res = $this->Custom_model->edit_data($ins_data, array('id'=>$event_id), EVENTS);

                $chk_row = $this->Custom_model->row_present_check(EVENTS_LANG, array('event_id' => $event_id, 'language_id' => $selected_lang));

                if ($chk_row == FALSE) {
                    $inner_data['event_id']  = $event_id;
                    $inner_data['title']   = $this->input->post('title');
					$inner_data['short_desc'] = $this->input->post('short_desc');
                    $inner_data['content'] = $this->input->post('content');
					$inner_data['event_place'] = $this->input->post('event_place');
                    $inner_data['language_id'] = $selected_lang;

                    //add new row for different lang.
                    $res1 = $this->Custom_model->insert_data($inner_data, EVENTS_LANG);

                    $this->session->set_flashdata('success_message', 'Event updated successfully.');
                    redirect(base_url() . 'admin/site/list_events');
                } else {
                    $inner_data['title'] = $this->input->post('title');
					$inner_data['short_desc'] = $this->input->post('short_desc');
                    $inner_data['content'] = $this->input->post('content');
					$inner_data['event_place'] = $this->input->post('event_place');

                    //save modified data to details table.
                    $res1 = $this->Custom_model->edit_data($inner_data, array('event_id' => $event_id, 'language_id' => $selected_lang), EVENTS_LANG);

                    $this->session->set_flashdata('success_message', 'Event updated successfully.');
                    redirect(base_url() . 'admin/site/list_events');
                }
            }
        }
        $partials = array('content' => 'sites/edit_event', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

	/* event ends */

	/* news starts */
    
    function list_news()
    {        
        $selected_lang = ($this->session->userdata('language'))?$this->session->userdata('language'):1;
        $data['selected_lang'] = $selected_lang;

        /* Pagination Code Start */
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/site/list_news/';
        /* Row Count Code */
        $config['total_rows'] = $this->Custom_model->row_count(NEWS, array(NEWS . '.id'), array() );
        $config['use_page_numbers'] = TRUE;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '<li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '<li>';
        $config['per_page'] = 20;
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="disabled"><a href="javascript:void(0)">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        //print_r($config);die;
        $this->pagination->initialize($config);
        $data['page_link'] = $this->pagination->create_links();
        $page_number = $this->uri->segment(4) ? $this->uri->segment(4) : 0;
        $page_number = ($page_number != 0) ? $page_number - 1 : $page_number;
        /* Pagination Code End */

        $data['news_list'] = $this->Custom_model->fetch_data(NEWS,
                array(NEWS.'.*', NEWS_LANG.'.news_id', NEWS_LANG.'.title', NEWS_LANG.'.short_desc', NEWS_LANG.'.content', NEWS_LANG.'.language_id'),
                array(),
                array(NEWS_LANG => NEWS_LANG.'.news_id='.NEWS.'.id AND '.NEWS_LANG.'.language_id='.$selected_lang. '| inner'),
                $search='',//CMS_LANG.'language_id'.$selected_lang,
                $order = NEWS . '.id',
                $by = 'desc'
        );//echo '<pre>';print_r($data['cms_list']);

        $partials = array('content' => 'sites/list_news', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    function add_news()
    {
        $selected_lang = ($this->session->userdata('language'))?$this->session->userdata('language'):1;
        $data['selected_lang'] = $selected_lang;

        //$this->load->helper('custom_helper');
		//load_editor();//to load niceditor.
        
        if($this->input->post('submit')){
            if ($this->input->post('news') == "") {
                $this->session->set_flashdata('error_message', 'Please enter news');
                redirect(base_url() . 'admin/site/add_news');
			} elseif ($this->input->post('title') == "") {
                $this->session->set_flashdata('error_message', 'Please enter news title');
                redirect(base_url() . 'admin/site/add_news');
            } elseif ($this->input->post('news_date') == "") {
                $this->session->set_flashdata('error_message', 'Please enter news date');
                redirect(base_url() . 'admin/site/add_news');
            } elseif ($this->input->post('short_desc') == "") {
                $this->session->set_flashdata('error_message', 'Please enter short description');
                redirect(base_url() . 'admin/site/add_news');
            } else {
                $news_date = explode('/', $this->input->post('news_date'));

                $ins_data['news']   = $this->input->post('news');
                $ins_data['news_date'] = $news_date[2].'-'.$news_date[0].'-'.$news_date[1];
				$ins_data['news_year'] = $news_date[2];
                $ins_data['media_id']   = $this->input->post('media_id');
				$ins_data['created_on']   = date('Y-m-d');

                // add data to cms table
                $res = $this->Custom_model->insert_data($ins_data, NEWS);

                if ($res != FALSE) {
                    $ins_inner['news_id']  = $res;
                    $ins_inner['title']   = $this->input->post('title');
					$ins_inner['short_desc'] = $this->input->post('short_desc');
                    $ins_inner['content'] = $this->input->post('content');
                    $ins_inner['language_id'] = $selected_lang;

                    $inner = $this->Custom_model->insert_data($ins_inner, NEWS_LANG);

                    if($inner!=FALSE){
                        $this->session->set_flashdata('success_message', 'News added successfully.');
                        redirect(base_url() . 'admin/site/list_news');
                    }else{
                        $this->Custom_model->delete_row(NEWS, array('id'=>$res));
                        $this->session->set_flashdata('error_message', 'Error occurred! Please try again.');
                        redirect(base_url() . 'admin/site/add_news');
                    }
                } else {
                    $this->session->set_flashdata('error_message', 'Error occurred! Please try again.');
                    redirect(base_url() . 'admin/site/add_news');
                }
            }
        }
        $partials = array('content' => 'sites/add_news', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    function edit_news($id)
    {
        $selected_lang = ($this->session->userdata('language'))?$this->session->userdata('language'):1;
        $data['selected_lang'] = $selected_lang;        

        //check page is exist or not.
        $news_id = decode_url($id);
        $chk_news_exist = $this->Custom_model->row_present_check(NEWS, array('id'=>$news_id));
        if($chk_news_exist==false){
            redirect(base_url() . 'admin/site/list_news');
        }

        $news_details = $this->Custom_model->fetch_data(NEWS, array(
            NEWS . '.*',
            NEWS_LANG . '.language_id',
            NEWS_LANG . '.news_id',
            NEWS_LANG . '.title',
            NEWS_LANG . '.short_desc',
            NEWS_LANG . '.content'
                ), array(NEWS . '.id' => $news_id), array(NEWS_LANG => NEWS . '.id=' . NEWS_LANG . '.news_id AND ' . NEWS_LANG . '.language_id=' . $selected_lang . '|left')
        );

        $data['news_details'] = $news_details[0];

        //$this->load->helper('custom_helper');
		//load_editor();//to load ckeditor.

        if($this->input->post('submit')){
            if ($this->input->post('news') == "") {
                $this->session->set_flashdata('error_message', 'Please enter news');
                redirect(base_url() . 'admin/site/edit_news/'.encode_url($news_id));
			} elseif ($this->input->post('title') == "") {
                $this->session->set_flashdata('error_message', 'Please enter news title');
                redirect(base_url() . 'admin/site/edit_news/'.encode_url($news_id));
            } elseif ($this->input->post('news_date') == "") {
                $this->session->set_flashdata('error_message', 'Please enter news date');
                redirect(base_url() . 'admin/site/edit_news/'.encode_url($news_id));
            } elseif ($this->input->post('short_desc') == "") {
                $this->session->set_flashdata('error_message', 'Please enter short description');
                redirect(base_url() . 'admin/site/edit_news/'.encode_url($news_id));
            } else {
                $news_date = explode('/', $this->input->post('news_date'));

                $ins_data['news']   = $this->input->post('news');
                $ins_data['news_date'] = $news_date[2].'-'.$news_date[0].'-'.$news_date[1];
				$ins_data['news_year'] = $news_date[2];
                $ins_data['media_id']   = $this->input->post('media_id');
				$ins_data['modified_on']   = date('Y-m-d');

                $res = $this->Custom_model->edit_data($ins_data, array('id'=>$news_id), NEWS);

                $chk_row = $this->Custom_model->row_present_check(NEWS_LANG, array('news_id' => $news_id, 'language_id' => $selected_lang));

                if ($chk_row == FALSE) {
                    $inner_data['news_id']  = $news_id;
                    $inner_data['title']   = $this->input->post('title');
					$inner_data['short_desc'] = $this->input->post('short_desc');
                    $inner_data['content'] = $this->input->post('content');
                    $inner_data['language_id'] = $selected_lang;

                    //add new row for different lang.
                    $res1 = $this->Custom_model->insert_data($inner_data, NEWS_LANG);

                    $this->session->set_flashdata('success_message', 'News updated successfully.');
                    redirect(base_url() . 'admin/site/list_news');
                } else {
                    $inner_data['title'] = $this->input->post('title');
					$inner_data['short_desc'] = $this->input->post('short_desc');
                    $inner_data['content'] = $this->input->post('content');

                    //save modified data to details table.
                    $res1 = $this->Custom_model->edit_data($inner_data, array('news_id' => $news_id, 'language_id' => $selected_lang), NEWS_LANG);

                    $this->session->set_flashdata('success_message', 'News updated successfully.');
                    redirect(base_url() . 'admin/site/list_news');
                }
            }
        }
        $partials = array('content' => 'sites/edit_news', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

	/* news ends */

	/* vision, mission & core values starts */
    
    function list_core_values()
    {        
        $selected_lang = ($this->session->userdata('language'))?$this->session->userdata('language'):1;
        $data['selected_lang'] = $selected_lang;

        /* Pagination Code Start */
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/site/list_core_values/';
        /* Row Count Code */
        $config['total_rows'] = $this->Custom_model->row_count(CORE_VALUES, array(CORE_VALUES . '.id'), array() );
        $config['use_page_numbers'] = TRUE;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '<li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '<li>';
        $config['per_page'] = 20;
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="disabled"><a href="javascript:void(0)">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        //print_r($config);die;
        $this->pagination->initialize($config);
        $data['page_link'] = $this->pagination->create_links();
        $page_number = $this->uri->segment(4) ? $this->uri->segment(4) : 0;
        $page_number = ($page_number != 0) ? $page_number - 1 : $page_number;
        /* Pagination Code End */

        $data['core_values_list'] = $this->Custom_model->fetch_data(CORE_VALUES,
                array(CORE_VALUES.'.*', CORE_VALUES_LANG.'.core_value_id', CORE_VALUES_LANG.'.title', CORE_VALUES_LANG.'.content', CORE_VALUES_LANG.'.language_id'),
                array(),
                array(CORE_VALUES_LANG => CORE_VALUES_LANG.'.core_value_id='.CORE_VALUES.'.id AND '.CORE_VALUES_LANG.'.language_id='.$selected_lang. '| inner'),
                $search='',//CMS_LANG.'language_id'.$selected_lang,
                $order = CORE_VALUES . '.id',
                $by = 'desc'
        );//echo '<pre>';print_r($data['cms_list']);

        $partials = array('content' => 'sites/list_core_values', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    function add_core_values()
    {
        $selected_lang = ($this->session->userdata('language'))?$this->session->userdata('language'):1;
        $data['selected_lang'] = $selected_lang;

        //$this->load->helper('custom_helper');
		//load_editor();//to load niceditor.
        
        if($this->input->post('submit')){
            if ($this->input->post('core_value') == "") {
                $this->session->set_flashdata('error_message', 'Please enter title');
                redirect(base_url() . 'admin/site/add_core_values');
			} elseif ($this->input->post('title') == "") {
                $this->session->set_flashdata('error_message', 'Please enter title');
                redirect(base_url() . 'admin/site/add_core_values');
            } elseif ($this->input->post('content') == "") {
                $this->session->set_flashdata('error_message', 'Please enter content');
                redirect(base_url() . 'admin/site/add_core_values');
            } else {
                $ins_data['core_value']   = $this->input->post('core_value');
                $ins_data['media_id']   = $this->input->post('media_id');

                // add data to cms table
                $res = $this->Custom_model->insert_data($ins_data, CORE_VALUES);

                if ($res != FALSE) {
                    $ins_inner['core_value_id']  = $res;
                    $ins_inner['title']   = $this->input->post('title');
                    $ins_inner['content'] = $this->input->post('content');
                    $ins_inner['language_id'] = $selected_lang;

                    $inner = $this->Custom_model->insert_data($ins_inner, CORE_VALUES_LANG);

                    if($inner!=FALSE){
                        $this->session->set_flashdata('success_message', 'Core values added successfully.');
                        redirect(base_url() . 'admin/site/list_core_values');
                    }else{
                        $this->Custom_model->delete_row(CORE_VALUES, array('id'=>$res));
                        $this->session->set_flashdata('error_message', 'Error occurred! Please try again.');
                        redirect(base_url() . 'admin/site/add_core_values');
                    }
                } else {
                    $this->session->set_flashdata('error_message', 'Error occurred! Please try again.');
                    redirect(base_url() . 'admin/site/add_core_values');
                }
            }
        }
        $partials = array('content' => 'sites/add_core_values', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    function edit_core_values($id)
    {
        $selected_lang = ($this->session->userdata('language'))?$this->session->userdata('language'):1;
        $data['selected_lang'] = $selected_lang;        

        //check page is exist or not.
        $core_values_id = decode_url($id);
        $chk_core_values_exist = $this->Custom_model->row_present_check(CORE_VALUES, array('id'=>$core_values_id));
        if($chk_core_values_exist==false){
            redirect(base_url() . 'admin/site/list_core_values');
        }

        $core_values_details = $this->Custom_model->fetch_data(CORE_VALUES, array(
            CORE_VALUES . '.*',
            CORE_VALUES_LANG . '.language_id',
            CORE_VALUES_LANG . '.core_value_id',
            CORE_VALUES_LANG . '.title',
            CORE_VALUES_LANG . '.content'
                ), array(CORE_VALUES . '.id' => $core_values_id), array(CORE_VALUES_LANG => CORE_VALUES . '.id=' . CORE_VALUES_LANG . '.core_value_id AND ' . CORE_VALUES_LANG . '.language_id=' . $selected_lang . '|left')
        );

        $data['core_values_details'] = $core_values_details[0];

        //$this->load->helper('custom_helper');
		//load_editor();//to load ckeditor.

        if($this->input->post('submit')){
            if ($this->input->post('core_value') == "") {
                $this->session->set_flashdata('error_message', 'Please enter title');
                redirect(base_url() . 'admin/site/edit_core_values/'.encode_url($core_values_id));
			} elseif ($this->input->post('title') == "") {
                $this->session->set_flashdata('error_message', 'Please enter title');
                redirect(base_url() . 'admin/site/edit_core_values/'.encode_url($core_values_id));
            } elseif ($this->input->post('content') == "") {
                $this->session->set_flashdata('error_message', 'Please enter content');
                redirect(base_url() . 'admin/site/edit_core_values/'.encode_url($core_values_id));
            } else {

                $ins_data['core_value']   = $this->input->post('core_value');
                $ins_data['media_id']   = $this->input->post('media_id');

                $res = $this->Custom_model->edit_data($ins_data, array('id'=>$core_values_id), CORE_VALUES);

                $chk_row = $this->Custom_model->row_present_check(CORE_VALUES_LANG, array('core_value_id' => $core_values_id, 'language_id' => $selected_lang));

                if ($chk_row == FALSE) {
                    $inner_data['core_value_id']  = $core_values_id;
                    $inner_data['title']   = $this->input->post('title');
                    $inner_data['content'] = $this->input->post('content');
                    $inner_data['language_id'] = $selected_lang;

                    //add new row for different lang.
                    $res1 = $this->Custom_model->insert_data($inner_data, CORE_VALUES_LANG);

                    $this->session->set_flashdata('success_message', 'Core values updated successfully.');
                    redirect(base_url() . 'admin/site/list_core_values');
                } else {
                    $inner_data['title'] = $this->input->post('title');
                    $inner_data['content'] = $this->input->post('content');

                    //save modified data to details table.
                    $res1 = $this->Custom_model->edit_data($inner_data, array('core_value_id' => $core_values_id, 'language_id' => $selected_lang), CORE_VALUES_LANG);

                    $this->session->set_flashdata('success_message', 'Core values updated successfully.');
                    redirect(base_url() . 'admin/site/list_core_values');
                }
            }
        }
        $partials = array('content' => 'sites/edit_core_values', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

	/* vision, mission & core values ends */

	/* awards starts */
    
    function list_awards()
    {        
        $selected_lang = ($this->session->userdata('language'))?$this->session->userdata('language'):1;
        $data['selected_lang'] = $selected_lang;

        /* Pagination Code Start */
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/site/list_awards/';
        /* Row Count Code */
        $config['total_rows'] = $this->Custom_model->row_count(AWARDS, array(AWARDS . '.id'), array() );
        $config['use_page_numbers'] = TRUE;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '<li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '<li>';
        $config['per_page'] = 20;
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="disabled"><a href="javascript:void(0)">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        //print_r($config);die;
        $this->pagination->initialize($config);
        $data['page_link'] = $this->pagination->create_links();
        $page_number = $this->uri->segment(4) ? $this->uri->segment(4) : 0;
        $page_number = ($page_number != 0) ? $page_number - 1 : $page_number;
        /* Pagination Code End */

        $data['award_list'] = $this->Custom_model->fetch_data(AWARDS,
                array(AWARDS.'.*', AWARDS_LANG.'.award_id', AWARDS_LANG.'.title', AWARDS_LANG.'.content', AWARDS_LANG.'.language_id'),
                array(),
                array(AWARDS_LANG => AWARDS_LANG.'.award_id='.AWARDS.'.id AND '.AWARDS_LANG.'.language_id='.$selected_lang. '| inner'),
                $search='',//CMS_LANG.'language_id'.$selected_lang,
                $order = AWARDS . '.id',
                $by = 'desc'
        );//echo '<pre>';print_r($data['cms_list']);

        $partials = array('content' => 'sites/list_awards', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    function add_award()
    {
        $selected_lang = ($this->session->userdata('language'))?$this->session->userdata('language'):1;
        $data['selected_lang'] = $selected_lang;

        //$this->load->helper('custom_helper');
		//load_editor();//to load niceditor.
        
        if($this->input->post('submit')){
            if ($this->input->post('award') == "") {
                $this->session->set_flashdata('error_message', 'Please enter award');
                redirect(base_url() . 'admin/site/add_award');
			} elseif ($this->input->post('title') == "") {
                $this->session->set_flashdata('error_message', 'Please enter title');
                redirect(base_url() . 'admin/site/add_award');
            } else {
                $ins_data['award']   = $this->input->post('award');
                $ins_data['media_id']   = $this->input->post('media_id');

                // add data to cms table
                $res = $this->Custom_model->insert_data($ins_data, AWARDS);

                if ($res != FALSE) {
                    $ins_inner['award_id']  = $res;
                    $ins_inner['title']   = $this->input->post('title');
                    $ins_inner['content'] = $this->input->post('content');
                    $ins_inner['language_id'] = $selected_lang;

                    $inner = $this->Custom_model->insert_data($ins_inner, AWARDS_LANG);

                    if($inner!=FALSE){
                        $this->session->set_flashdata('success_message', 'Award added successfully.');
                        redirect(base_url() . 'admin/site/list_awards');
                    }else{
                        $this->Custom_model->delete_row(AWARDS, array('id'=>$res));
                        $this->session->set_flashdata('error_message', 'Error occurred! Please try again.');
                        redirect(base_url() . 'admin/site/add_award');
                    }
                } else {
                    $this->session->set_flashdata('error_message', 'Error occurred! Please try again.');
                    redirect(base_url() . 'admin/site/add_award');
                }
            }
        }
        $partials = array('content' => 'sites/add_award', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    function edit_award($id)
    {
        $selected_lang = ($this->session->userdata('language'))?$this->session->userdata('language'):1;
        $data['selected_lang'] = $selected_lang;        

        //check page is exist or not.
        $award_id = decode_url($id);
        $chk_award_exist = $this->Custom_model->row_present_check(AWARDS, array('id'=>$award_id));
        if($chk_award_exist==false){
            redirect(base_url() . 'admin/site/list_awards');
        }

        $award_details = $this->Custom_model->fetch_data(AWARDS, array(
            AWARDS . '.*',
            AWARDS_LANG . '.language_id',
            AWARDS_LANG . '.award_id',
            AWARDS_LANG . '.title',
            AWARDS_LANG . '.content'
                ), array(AWARDS . '.id' => $award_id), array(AWARDS_LANG => AWARDS . '.id=' . AWARDS_LANG . '.award_id AND ' . AWARDS_LANG . '.language_id=' . $selected_lang . '|left')
        );

        $data['award_details'] = $award_details[0];

        //$this->load->helper('custom_helper');
		//load_editor();//to load ckeditor.

        if($this->input->post('submit')){
            if ($this->input->post('award') == "") {
                $this->session->set_flashdata('error_message', 'Please enter award');
                redirect(base_url() . 'admin/site/edit_award/'.encode_url($award_id));
			} elseif ($this->input->post('title') == "") {
                $this->session->set_flashdata('error_message', 'Please enter title');
                redirect(base_url() . 'admin/site/edit_award/'.encode_url($award_id));
            } else {

                $ins_data['award']   = $this->input->post('award');
                $ins_data['media_id']   = $this->input->post('media_id');

                $res = $this->Custom_model->edit_data($ins_data, array('id'=>$award_id), AWARDS);

                $chk_row = $this->Custom_model->row_present_check(AWARDS_LANG, array('award_id' => $award_id, 'language_id' => $selected_lang));

                if ($chk_row == FALSE) {
                    $inner_data['award_id']  = $award_id;
                    $inner_data['title']   = $this->input->post('title');
                    $inner_data['content'] = $this->input->post('content');
                    $inner_data['language_id'] = $selected_lang;

                    //add new row for different lang.
                    $res1 = $this->Custom_model->insert_data($inner_data, AWARDS_LANG);

                    $this->session->set_flashdata('success_message', 'Award updated successfully.');
                    redirect(base_url() . 'admin/site/list_awards');
                } else {
                    $inner_data['title'] = $this->input->post('title');
                    $inner_data['content'] = $this->input->post('content');

                    //save modified data to details table.
                    $res1 = $this->Custom_model->edit_data($inner_data, array('award_id' => $award_id, 'language_id' => $selected_lang), AWARDS_LANG);

                    $this->session->set_flashdata('success_message', 'Award updated successfully.');
                    redirect(base_url() . 'admin/site/list_awards');
                }
            }
        }
        $partials = array('content' => 'sites/edit_award', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

	/* awards ends */

	/* stories starts */
    
    function list_stories()
    {        
        $selected_lang = ($this->session->userdata('language'))?$this->session->userdata('language'):1;
        $data['selected_lang'] = $selected_lang;

        /* Pagination Code Start */
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/site/list_stories/';
        /* Row Count Code */
        $config['total_rows'] = $this->Custom_model->row_count(STORIES, array(STORIES . '.id'), array() );
        $config['use_page_numbers'] = TRUE;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '<li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '<li>';
        $config['per_page'] = 20;
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="disabled"><a href="javascript:void(0)">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        //print_r($config);die;
        $this->pagination->initialize($config);
        $data['page_link'] = $this->pagination->create_links();
        $page_number = $this->uri->segment(4) ? $this->uri->segment(4) : 0;
        $page_number = ($page_number != 0) ? $page_number - 1 : $page_number;
        /* Pagination Code End */

        $data['story_list'] = $this->Custom_model->fetch_data(STORIES,
                array(STORIES.'.*', STORIES_LANG.'.story_id', STORIES_LANG.'.title', STORIES_LANG.'.short_desc', STORIES_LANG.'.long_desc', STORIES_LANG.'.language_id'),
                array(),
                array(STORIES_LANG => STORIES_LANG.'.story_id='.STORIES.'.id AND '.STORIES_LANG.'.language_id='.$selected_lang. '| inner'),
                $search='',//CMS_LANG.'language_id'.$selected_lang,
                $order = STORIES . '.id',
                $by = 'desc'
        );//echo '<pre>';print_r($data['cms_list']);

        $partials = array('content' => 'sites/list_stories', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    function add_story()
    {
        $selected_lang = ($this->session->userdata('language'))?$this->session->userdata('language'):1;
        $data['selected_lang'] = $selected_lang;

        //$this->load->helper('custom_helper');
		//load_editor();//to load niceditor.
        
        if($this->input->post('submit')){
            if ($this->input->post('story') == "") {
                $this->session->set_flashdata('error_message', 'Please enter story');
                redirect(base_url() . 'admin/site/add_story');
			} elseif ($this->input->post('title') == "") {
                $this->session->set_flashdata('error_message', 'Please enter story title');
                redirect(base_url() . 'admin/site/add_story');
            } elseif ($this->input->post('short_desc') == "") {
                $this->session->set_flashdata('error_message', 'Please enter short description');
                redirect(base_url() . 'admin/site/add_story');
            } else {
                $ins_data['story']   = $this->input->post('story');
				$ins_data['video_link'] = $this->input->post('video_link');
                $ins_data['media_id']   = $this->input->post('media_id');
				$ins_data['created_on'] = date('Y-m-d');

                // add data to cms table
                $res = $this->Custom_model->insert_data($ins_data, STORIES);

                if ($res != FALSE) {
                    $ins_inner['story_id']  = $res;
                    $ins_inner['title']   = $this->input->post('title');
					$ins_inner['short_desc'] = $this->input->post('short_desc');
                    $ins_inner['long_desc'] = $this->input->post('long_desc');
                    $ins_inner['language_id'] = $selected_lang;

                    $inner = $this->Custom_model->insert_data($ins_inner, STORIES_LANG);

                    if($inner!=FALSE){
                        $this->session->set_flashdata('success_message', 'Story added successfully.');
                        redirect(base_url() . 'admin/site/list_stories');
                    }else{
                        $this->Custom_model->delete_row(STORIES, array('id'=>$res));
                        $this->session->set_flashdata('error_message', 'Error occurred! Please try again.');
                        redirect(base_url() . 'admin/site/add_story');
                    }
                } else {
                    $this->session->set_flashdata('error_message', 'Error occurred! Please try again.');
                    redirect(base_url() . 'admin/site/add_story');
                }
            }
        }
        $partials = array('content' => 'sites/add_story', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    function edit_story($id)
    {
        $selected_lang = ($this->session->userdata('language'))?$this->session->userdata('language'):1;
        $data['selected_lang'] = $selected_lang;        

        //check page is exist or not.
        $story_id = decode_url($id);
        $chk_story_exist = $this->Custom_model->row_present_check(STORIES, array('id'=>$story_id));
        if($chk_story_exist==false){
            redirect(base_url() . 'admin/site/list_stories');
        }

        $story_details = $this->Custom_model->fetch_data(STORIES, array(
            STORIES . '.*',
            STORIES_LANG . '.language_id',
            STORIES_LANG . '.story_id',
            STORIES_LANG . '.title',
            STORIES_LANG . '.short_desc',
            STORIES_LANG . '.long_desc'
                ), array(STORIES . '.id' => $story_id), array(STORIES_LANG => STORIES . '.id=' . STORIES_LANG . '.story_id AND ' . STORIES_LANG . '.language_id=' . $selected_lang . '|left')
        );

        $data['story_details'] = $story_details[0];

        //$this->load->helper('custom_helper');
		//load_editor();//to load ckeditor.

        if($this->input->post('submit')){
            if ($this->input->post('story') == "") {
                $this->session->set_flashdata('error_message', 'Please enter story');
                redirect(base_url() . 'admin/site/edit_story/'.encode_url($story_id));
			} elseif ($this->input->post('title') == "") {
                $this->session->set_flashdata('error_message', 'Please enter story title');
                redirect(base_url() . 'admin/site/edit_story/'.encode_url($story_id));
            } elseif ($this->input->post('short_desc') == "") {
                $this->session->set_flashdata('error_message', 'Please enter short description');
                redirect(base_url() . 'admin/site/edit_story/'.encode_url($story_id));
            } else {
                $ins_data['story']   = $this->input->post('story');
				$ins_data['video_link'] = $this->input->post('video_link');
                $ins_data['media_id']   = $this->input->post('media_id');
				$ins_data['modified_on'] = date('Y-m-d');

                $res = $this->Custom_model->edit_data($ins_data, array('id'=>$story_id), STORIES);

                $chk_row = $this->Custom_model->row_present_check(STORIES_LANG, array('story_id' => $story_id, 'language_id' => $selected_lang));

                if ($chk_row == FALSE) {
                    $inner_data['story_id']  = $story_id;
                    $inner_data['title']   = $this->input->post('title');
					$inner_data['short_desc'] = $this->input->post('short_desc');
                    $inner_data['long_desc'] = $this->input->post('long_desc');
                    $inner_data['language_id'] = $selected_lang;

                    //add new row for different lang.
                    $res1 = $this->Custom_model->insert_data($inner_data, STORIES_LANG);

                    $this->session->set_flashdata('success_message', 'Story updated successfully.');
                    redirect(base_url() . 'admin/site/list_stories');
                } else {
                    $inner_data['title'] = $this->input->post('title');
					$inner_data['short_desc'] = $this->input->post('short_desc');
                    $inner_data['long_desc'] = $this->input->post('long_desc');

                    //save modified data to details table.
                    $res1 = $this->Custom_model->edit_data($inner_data, array('story_id' => $story_id, 'language_id' => $selected_lang), STORIES_LANG);

                    $this->session->set_flashdata('success_message', 'Story updated successfully.');
                    redirect(base_url() . 'admin/site/list_stories');
                }
            }
        }
        $partials = array('content' => 'sites/edit_story', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

	/* stories ends */

	/* teacher starts */
    
    function list_teachers()
    {        
        $selected_lang = ($this->session->userdata('language'))?$this->session->userdata('language'):1;
        $data['selected_lang'] = $selected_lang;

        /* Pagination Code Start */
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/site/list_teachers/';
        /* Row Count Code */
        $config['total_rows'] = $this->Custom_model->row_count(TEACHERS, array(TEACHERS . '.id'), array() );
        $config['use_page_numbers'] = TRUE;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '<li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '<li>';
        $config['per_page'] = 20;
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="disabled"><a href="javascript:void(0)">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        //print_r($config);die;
        $this->pagination->initialize($config);
        $data['page_link'] = $this->pagination->create_links();
        $page_number = $this->uri->segment(4) ? $this->uri->segment(4) : 0;
        $page_number = ($page_number != 0) ? $page_number - 1 : $page_number;
        /* Pagination Code End */

        $data['teacher_list'] = $this->Custom_model->fetch_data(TEACHERS,
                array(TEACHERS.'.*', TEACHERS_LANG.'.teacher_id', TEACHERS_LANG.'.first_name', TEACHERS_LANG.'.last_name', TEACHERS_LANG.'.language_id'),
                array(),
                array(TEACHERS_LANG => TEACHERS_LANG.'.teacher_id='.TEACHERS.'.id AND '.TEACHERS_LANG.'.language_id='.$selected_lang. '| inner'),
                $search='',//CMS_LANG.'language_id'.$selected_lang,
                $order = TEACHERS . '.id',
                $by = 'desc'
        );//echo '<pre>';print_r($data['cms_list']);

        $partials = array('content' => 'sites/list_teachers', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    function add_teacher()
    {
        $selected_lang = ($this->session->userdata('language'))?$this->session->userdata('language'):1;
        $data['selected_lang'] = $selected_lang;

		$data['country_list'] = $this->Custom_model->fetch_data(COUNTRIES, array('id', 'nicename'), array(), array());

        //$this->load->helper('custom_helper');
		//load_editor();//to load niceditor.
        
        if($this->input->post('submit')){
            if ($this->input->post('teacher_name') == "") {
                $this->session->set_flashdata('error_message', 'Please enter teacher name');
                redirect(base_url() . 'admin/site/add_teacher');
			} elseif ($this->input->post('first_name') == "") {
                $this->session->set_flashdata('error_message', 'Please enter first name');
                redirect(base_url() . 'admin/site/add_teacher');
            } elseif ($this->input->post('last_name') == "") {
                $this->session->set_flashdata('error_message', 'Please enter last name');
                redirect(base_url() . 'admin/site/add_teacher');
            } elseif ($this->input->post('country_id') == "") {
                $this->session->set_flashdata('error_message', 'Please select country');
                redirect(base_url() . 'admin/site/add_teacher');
            } elseif ($this->input->post('certificate_details') == "") {
                $this->session->set_flashdata('error_message', 'Please enter certificate details');
                redirect(base_url() . 'admin/site/add_teacher');
            } else {
                $ins_data['teacher_name']   = $this->input->post('teacher_name');
				$ins_data['country_id'] = $this->input->post('country_id');
                $ins_data['media_id']   = $this->input->post('media_id');

                // add data to cms table
                $res = $this->Custom_model->insert_data($ins_data, TEACHERS);

                if ($res != FALSE) {
                    $ins_inner['teacher_id']  = $res;
                    $ins_inner['first_name']   = $this->input->post('first_name');
					$ins_inner['last_name'] = $this->input->post('last_name');
                    $ins_inner['certificate_details'] = $this->input->post('certificate_details');
					$ins_inner['content'] = $this->input->post('content');
                    $ins_inner['language_id'] = $selected_lang;

                    $inner = $this->Custom_model->insert_data($ins_inner, TEACHERS_LANG);

                    if($inner!=FALSE){
                        $this->session->set_flashdata('success_message', 'Teacher added successfully.');
                        redirect(base_url() . 'admin/site/list_teachers');
                    }else{
                        $this->Custom_model->delete_row(TEACHERS, array('id'=>$res));
                        $this->session->set_flashdata('error_message', 'Error occurred! Please try again.');
                        redirect(base_url() . 'admin/site/add_teacher');
                    }
                } else {
                    $this->session->set_flashdata('error_message', 'Error occurred! Please try again.');
                    redirect(base_url() . 'admin/site/add_teacher');
                }
            }
        }
        $partials = array('content' => 'sites/add_teacher', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    function edit_teacher($id)
    {
        $selected_lang = ($this->session->userdata('language'))?$this->session->userdata('language'):1;
        $data['selected_lang'] = $selected_lang;        

        //check page is exist or not.
        $teacher_id = decode_url($id);
        $chk_teacher_exist = $this->Custom_model->row_present_check(TEACHERS, array('id'=>$teacher_id));
        if($chk_teacher_exist==false){
            redirect(base_url() . 'admin/site/list_teachers');
        }

		$data['country_list'] = $this->Custom_model->fetch_data(COUNTRIES, array('id', 'nicename'), array(), array());

        $teacher_details = $this->Custom_model->fetch_data(TEACHERS, array(
            TEACHERS . '.*',
            TEACHERS_LANG . '.language_id',
            TEACHERS_LANG . '.teacher_id',
            TEACHERS_LANG . '.first_name',
            TEACHERS_LANG . '.last_name',
			TEACHERS_LANG . '.content',
            TEACHERS_LANG . '.certificate_details'
                ), array(TEACHERS . '.id' => $teacher_id), array(TEACHERS_LANG => TEACHERS . '.id=' . TEACHERS_LANG . '.teacher_id AND ' . TEACHERS_LANG . '.language_id=' . $selected_lang . '|left')
        );

        $data['teacher_details'] = $teacher_details[0];

        //$this->load->helper('custom_helper');
		//load_editor();//to load ckeditor.

        if($this->input->post('submit')){
            if ($this->input->post('teacher_name') == "") {
                $this->session->set_flashdata('error_message', 'Please enter teacher name');
                redirect(base_url() . 'admin/site/edit_teacher/'.encode_url($teacher_id));
			} elseif ($this->input->post('first_name') == "") {
                $this->session->set_flashdata('error_message', 'Please enter first name');
                redirect(base_url() . 'admin/site/edit_teacher/'.encode_url($teacher_id));
            } elseif ($this->input->post('last_name') == "") {
                $this->session->set_flashdata('error_message', 'Please enter last name');
                redirect(base_url() . 'admin/site/edit_teacher/'.encode_url($teacher_id));
            } elseif ($this->input->post('country_id') == "") {
                $this->session->set_flashdata('error_message', 'Please select country');
                redirect(base_url() . 'admin/site/edit_teacher/'.encode_url($teacher_id));
            } elseif ($this->input->post('certificate_details') == "") {
                $this->session->set_flashdata('error_message', 'Please enter certificate details');
                redirect(base_url() . 'admin/site/edit_teacher/'.encode_url($teacher_id));
            } else {
                $ins_data['teacher_name']   = $this->input->post('teacher_name');
				$ins_data['country_id'] = $this->input->post('country_id');
                $ins_data['media_id']   = $this->input->post('media_id');

                $res = $this->Custom_model->edit_data($ins_data, array('id'=>$teacher_id), TEACHERS);

                $chk_row = $this->Custom_model->row_present_check(TEACHERS_LANG, array('teacher_id' => $teacher_id, 'language_id' => $selected_lang));

                if ($chk_row == FALSE) {
					$inner_data['teacher_id']  = $teacher_id;
                    $inner_data['first_name']   = $this->input->post('first_name');
					$inner_data['last_name'] = $this->input->post('last_name');
                    $inner_data['certificate_details'] = $this->input->post('certificate_details');
					$inner_data['content'] = $this->input->post('content');
                    $inner_data['language_id'] = $selected_lang;

                    //add new row for different lang.
                    $res1 = $this->Custom_model->insert_data($inner_data, TEACHERS_LANG);

                    $this->session->set_flashdata('success_message', 'Teacher updated successfully.');
                    redirect(base_url() . 'admin/site/list_teachers');
                } else {
                    $inner_data['first_name']   = $this->input->post('first_name');
					$inner_data['last_name'] = $this->input->post('last_name');
                    $inner_data['certificate_details'] = $this->input->post('certificate_details');
					$inner_data['content'] = $this->input->post('content');

                    //save modified data to details table.
                    $res1 = $this->Custom_model->edit_data($inner_data, array('teacher_id' => $teacher_id, 'language_id' => $selected_lang), TEACHERS_LANG);

                    $this->session->set_flashdata('success_message', 'Teacher updated successfully.');
                    redirect(base_url() . 'admin/site/list_teachers');
                }
            }
        }
        $partials = array('content' => 'sites/edit_teacher', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

	/* teacher ends */

	/* community network starts */
    
    function list_networks()
    {        
        $selected_lang = ($this->session->userdata('language'))?$this->session->userdata('language'):1;
        $data['selected_lang'] = $selected_lang;

        /* Pagination Code Start */
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/site/list_networks/';
        /* Row Count Code */
        $config['total_rows'] = $this->Custom_model->row_count(COMMUNITY_NETWORKS, array(COMMUNITY_NETWORKS . '.id'), array() );
        $config['use_page_numbers'] = TRUE;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '<li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '<li>';
        $config['per_page'] = 20;
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="disabled"><a href="javascript:void(0)">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        //print_r($config);die;
        $this->pagination->initialize($config);
        $data['page_link'] = $this->pagination->create_links();
        $page_number = $this->uri->segment(4) ? $this->uri->segment(4) : 0;
        $page_number = ($page_number != 0) ? $page_number - 1 : $page_number;
        /* Pagination Code End */

        $data['network_list'] = $this->Custom_model->fetch_data(COMMUNITY_NETWORKS,
                array(COMMUNITY_NETWORKS.'.*', COMMUNITY_NETWORKS_LANG.'.community_network_id', COMMUNITY_NETWORKS_LANG.'.title', COMMUNITY_NETWORKS_LANG.'.content', COMMUNITY_NETWORKS_LANG.'.language_id'),
                array(),
                array(COMMUNITY_NETWORKS_LANG => COMMUNITY_NETWORKS_LANG.'.community_network_id='.COMMUNITY_NETWORKS.'.id AND '.COMMUNITY_NETWORKS_LANG.'.language_id='.$selected_lang. '| inner'),
                $search='',//CMS_LANG.'language_id'.$selected_lang,
                $order = COMMUNITY_NETWORKS . '.id',
                $by = 'desc'
        );//echo '<pre>';print_r($data['cms_list']);

        $partials = array('content' => 'sites/list_networks', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    function add_network()
    {
        $selected_lang = ($this->session->userdata('language'))?$this->session->userdata('language'):1;
        $data['selected_lang'] = $selected_lang;

        //$this->load->helper('custom_helper');
		//load_editor();//to load niceditor.
        
        if($this->input->post('submit')){
            if ($this->input->post('community') == "") {
                $this->session->set_flashdata('error_message', 'Please enter community network');
                redirect(base_url() . 'admin/site/add_network');
			} elseif ($this->input->post('title') == "") {
                $this->session->set_flashdata('error_message', 'Please enter title');
                redirect(base_url() . 'admin/site/add_network');
            } else {
                $ins_data['community']   = $this->input->post('community');

                // add data to cms table
                $res = $this->Custom_model->insert_data($ins_data, COMMUNITY_NETWORKS);

                if ($res != FALSE) {
                    $ins_inner['community_network_id']  = $res;
                    $ins_inner['title']   = $this->input->post('title');
                    $ins_inner['content'] = $this->input->post('content');
                    $ins_inner['language_id'] = $selected_lang;

                    $inner = $this->Custom_model->insert_data($ins_inner, COMMUNITY_NETWORKS_LANG);

                    if($inner!=FALSE){
                        $this->session->set_flashdata('success_message', 'Community Network added successfully.');
                        redirect(base_url() . 'admin/site/list_networks');
                    }else{
                        $this->Custom_model->delete_row(COMMUNITY_NETWORKS, array('id'=>$res));
                        $this->session->set_flashdata('error_message', 'Error occurred! Please try again.');
                        redirect(base_url() . 'admin/site/add_network');
                    }
                } else {
                    $this->session->set_flashdata('error_message', 'Error occurred! Please try again.');
                    redirect(base_url() . 'admin/site/add_network');
                }
            }
        }
        $partials = array('content' => 'sites/add_network', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    function edit_network($id)
    {
        $selected_lang = ($this->session->userdata('language'))?$this->session->userdata('language'):1;
        $data['selected_lang'] = $selected_lang;        

        //check page is exist or not.
        $network_id = decode_url($id);
        $chk_network_exist = $this->Custom_model->row_present_check(COMMUNITY_NETWORKS, array('id'=>$network_id));
        if($chk_network_exist==false){
            redirect(base_url() . 'admin/site/list_networks');
        }

        $network_details = $this->Custom_model->fetch_data(COMMUNITY_NETWORKS, array(
            COMMUNITY_NETWORKS . '.*',
            COMMUNITY_NETWORKS_LANG . '.language_id',
            COMMUNITY_NETWORKS_LANG . '.community_network_id',
            COMMUNITY_NETWORKS_LANG . '.title',
            COMMUNITY_NETWORKS_LANG . '.content'
                ), array(COMMUNITY_NETWORKS . '.id' => $network_id), array(COMMUNITY_NETWORKS_LANG => COMMUNITY_NETWORKS . '.id=' . COMMUNITY_NETWORKS_LANG . '.community_network_id AND ' . COMMUNITY_NETWORKS_LANG . '.language_id=' . $selected_lang . '|left')
        );

        $data['network_details'] = $network_details[0];

        //$this->load->helper('custom_helper');
		//load_editor();//to load ckeditor.

        if($this->input->post('submit')){
            if ($this->input->post('community') == "") {
                $this->session->set_flashdata('error_message', 'Please enter community network');
                redirect(base_url() . 'admin/site/edit_network/'.encode_url($network_id));
			} elseif ($this->input->post('title') == "") {
                $this->session->set_flashdata('error_message', 'Please enter title');
                redirect(base_url() . 'admin/site/edit_network/'.encode_url($network_id));
            } else {
                $ins_data['community']   = $this->input->post('community');

                $res = $this->Custom_model->edit_data($ins_data, array('id'=>$network_id), COMMUNITY_NETWORKS);

                $chk_row = $this->Custom_model->row_present_check(COMMUNITY_NETWORKS_LANG, array('community_network_id' => $network_id, 'language_id' => $selected_lang));

                if ($chk_row == FALSE) {
                    $inner_data['community_network_id']  = $network_id;
                    $inner_data['title']   = $this->input->post('title');
                    $inner_data['content'] = $this->input->post('content');
                    $inner_data['language_id'] = $selected_lang;

                    //add new row for different lang.
                    $res1 = $this->Custom_model->insert_data($inner_data, COMMUNITY_NETWORKS_LANG);

                    $this->session->set_flashdata('success_message', 'Community Network updated successfully.');
                    redirect(base_url() . 'admin/site/list_networks');
                } else {
                    $inner_data['title'] = $this->input->post('title');
                    $inner_data['content'] = $this->input->post('content');

                    //save modified data to details table.
                    $res1 = $this->Custom_model->edit_data($inner_data, array('community_network_id' => $network_id, 'language_id' => $selected_lang), COMMUNITY_NETWORKS_LANG);

                    $this->session->set_flashdata('success_message', 'Community Network updated successfully.');
                    redirect(base_url() . 'admin/site/list_networks');
                }
            }
        }
        $partials = array('content' => 'sites/edit_network', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

	/* community network ends */
}
