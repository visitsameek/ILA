<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

    function __construct() {

        parent::__construct();
        $this->load->model('Custom_model');

        if (!$this->session->userdata('user_data')) {
            redirect(base_url() . 'admin/login');
        }

    }

	//************ registered users ****************//

	function list_registered_users()
    {
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;

        /* Pagination Code Start */
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/user/list_registered_users/';
        /* Row Count Code */
        $config['total_rows'] = $this->Custom_model->row_count(USERS, array(), array());
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


        $data['users'] = $this->Custom_model->fetch_data(USERS, array(USERS . '.*'),
                                                                    array(USERS . '.isdeleted' => 0), array(), $search = array(), $order = USERS . '.id',
                                                                    $by = 'desc', $page_number, $config['per_page'], $group_by = '', $having = '', $start = $page_number, $end = ''
        );

        $partials = array('content' => 'users/list_registered_users', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    function view_users($id)
    {
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;

        $id = decode_url($id);
        $chk_enq = $this->Custom_model->row_present_check(USERS, array('id'=>$id));
        if($chk_enq==FALSE){
            redirect(base_url() . 'admin/user/list_registered_users');
        }

		$user_details = $this->Custom_model->fetch_data(USERS, array(
            USERS . '.*',
            CITIES . '.city',
			TRAINING_CENTERS . '.center'
                ), array(USERS . '.id' => $id), array(CITIES => USERS . '.city_id=' . CITIES . '.id |left', TRAINING_CENTERS => USERS . '.center_id=' . TRAINING_CENTERS . '.id |left')
        );

        $data['user_details'] = array();
        if(!empty($user_details))
            $data['user_details'] = $user_details[0];//echo '<pre>';print_r($data);die;

        $partials = array('content' => 'users/view_users', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

	//************ registered users ends ****************//

	//************ request callback ****************//

	function list_request_callback_users()
    {
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;

        /* Pagination Code Start */
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/user/list_request_callback_users/';
        /* Row Count Code */
        $config['total_rows'] = $this->Custom_model->row_count(REQUEST_CALLBACK_USERS, array(), array());
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


        $data['callback_users'] = $this->Custom_model->fetch_data(REQUEST_CALLBACK_USERS, array(REQUEST_CALLBACK_USERS . '.*'),
                                                                    array(), array(), $search = array(), $order = REQUEST_CALLBACK_USERS . '.id',
                                                                    $by = 'desc', $page_number, $config['per_page'], $group_by = '', $having = '', $start = $page_number, $end = ''
        );

        $partials = array('content' => 'users/list_request_callback_users', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    function view_callback_users($id)
    {
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;

        $id = decode_url($id);
        $chk_enq = $this->Custom_model->row_present_check(REQUEST_CALLBACK_USERS, array('id'=>$id));
        if($chk_enq==FALSE){
            redirect(base_url() . 'admin/user/list_request_callback_users');
        }

		$callback_user_details = $this->Custom_model->fetch_data(REQUEST_CALLBACK_USERS, array(
            REQUEST_CALLBACK_USERS . '.*',
            COUNTRIES . '.nicename'
                ), array(REQUEST_CALLBACK_USERS . '.id' => $id), array(COUNTRIES => REQUEST_CALLBACK_USERS . '.country_id=' . COUNTRIES . '.id |left')
        );

        $data['callback_user_details'] = array();
        if(!empty($callback_user_details))
            $data['callback_user_details'] = $callback_user_details[0];//echo '<pre>';print_r($data);die;

        $partials = array('content' => 'users/view_callback_users', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

	//************ request callback ends ****************//

	//************ contact users ****************//

    function list_contact_users() {
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;

        /* Pagination Code Start */
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/user/list_contact_users/';
        /* Row Count Code */
        $config['total_rows'] = $this->Custom_model->row_count(CONTACT_USERS, array(CONTACT_USERS . '.id'), array());

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


        $data['contact_users'] = $this->Custom_model->fetch_data(CONTACT_USERS, array(CONTACT_USERS . '.*'), array(CONTACT_USERS . '.isdeleted' => 0), array(), $search = '', $order = CONTACT_USERS . '.id', $by = 'desc', $page_number, $config['per_page'], $group_by = '', $having = '', $start = $page_number, $end = '');

        $partials = array('content' => 'users/list_contact_users', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    //*********** end contact users ************//

    //************ newsletter subscribers ****************//

    function list_newsletter_subscribers() {
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;

        /* Pagination Code Start */
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/user/list_newsletter_subscribers/';
        /* Row Count Code */
        $config['total_rows'] = $this->Custom_model->row_count(NEWSLETTER_USERS, array(NEWSLETTER_USERS . '.id'), array());

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


        $data['newsletter_users'] = $this->Custom_model->fetch_data(NEWSLETTER_USERS, array(NEWSLETTER_USERS . '.*'), array(NEWSLETTER_USERS . '.isdeleted' => 0), array(), $search = '', $order = NEWSLETTER_USERS . '.id', $by = 'desc', $page_number, $config['per_page'], $group_by = '', $having = '', $start = $page_number, $end = '');

        $partials = array('content' => 'users/list_newsletter_subscribers', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    //*********** end newsletter subscribers ************//

	

}
