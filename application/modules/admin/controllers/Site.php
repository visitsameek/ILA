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
                array(EVENTS.'.*', EVENTS_LANG.'.title', EVENTS_LANG.'.event_id', EVENTS_LANG.'.title', EVENTS_LANG.'.short_desc', EVENTS_LANG.'.content', EVENTS_LANG.'.event_place', EVENTS_LANG.'.language_id'),
                array(),
                array(EVENTS_LANG => EVENTS_LANG.'.event_id='.EVENTS.'.id AND '.EVENTS_LANG.'.language_id='.$selected_lang. '| inner'),
                $search='',//CMS_LANG.'language_id'.$selected_lang,
                $order = EVENTS . '.id',
                $by = 'desc',
                $page_number,
                $config['per_page'],
                $group_by = '',
                $having = '',
                $start = $page_number,
                $end = ''
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
                    $inner_data['event_id']  = $res;
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
                array(NEWS.'.*', NEWS_LANG.'.title', NEWS_LANG.'.news_id', NEWS_LANG.'.title', NEWS_LANG.'.short_desc', NEWS_LANG.'.content', NEWS_LANG.'.language_id'),
                array(),
                array(NEWS_LANG => NEWS_LANG.'.news_id='.NEWS.'.id AND '.NEWS_LANG.'.language_id='.$selected_lang. '| inner'),
                $search='',//CMS_LANG.'language_id'.$selected_lang,
                $order = NEWS . '.id',
                $by = 'desc',
                $page_number,
                $config['per_page'],
                $group_by = '',
                $having = '',
                $start = $page_number,
                $end = ''
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
                    $inner_data['news_id']  = $res;
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
}
