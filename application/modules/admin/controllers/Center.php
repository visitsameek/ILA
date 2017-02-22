<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Center extends MY_Controller {

    function __construct() {

        parent::__construct();
        $this->load->model('Custom_model');

        if (!$this->session->userdata('user_data')) {
            redirect(base_url() . 'admin/login');
        }

    }

    //************ center ****************//

    function list_centers() {
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;

        /* Pagination Code Start */
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/master/list_centers/';
        /* Row Count Code */
        $config['total_rows'] = $this->Custom_model->row_count(TRAINING_CENTERS, array(TRAINING_CENTERS . '.id'), array());

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


        $data['centers'] = $this->Custom_model->fetch_data(TRAINING_CENTERS, array(
            TRAINING_CENTERS . '.*',
            TRAINING_CENTERS_LANG . '.center_id',
            TRAINING_CENTERS_LANG . '.title',
			TRAINING_CENTERS_LANG . '.address',
            TRAINING_CENTERS_LANG . '.language_id'
                ), array(), array(TRAINING_CENTERS_LANG => TRAINING_CENTERS_LANG . '.center_id=' . TRAINING_CENTERS . '.id AND ' . TRAINING_CENTERS_LANG . '.language_id=' . $selected_lang), $search = '', $order = TRAINING_CENTERS . '.id', $by = 'desc', $page_number, $config['per_page'], $group_by = '', $having = '', $start = $page_number, $end = ''
        );

        $partials = array('content' => 'centers/list_centers', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    function add_center() {
        $data = array();
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;

		$data['city_list'] = $this->Custom_model->fetch_data(CITIES, array('id', 'city'), array(), array());

        if ($this->input->post('submit')) {

            if ($this->input->post('center') == "") {
                $this->session->set_flashdata('error_message', 'Please enter center');
                redirect(base_url() . 'admin/center/add_center');
            } else if ($this->input->post('title') == "") {
                $this->session->set_flashdata('error_message', 'Please enter center title');
                redirect(base_url() . 'admin/center/add_center');
            } else if ($this->input->post('city_id') == "") {
                $this->session->set_flashdata('error_message', 'Please select city');
                redirect(base_url() . 'admin/center/add_center');
            } else if ($this->input->post('district_id') == "") {
                $this->session->set_flashdata('error_message', 'Please select district');
                redirect(base_url() . 'admin/center/add_center');
            } else if ($this->input->post('address') == "") {
                $this->session->set_flashdata('error_message', 'Please enter address');
                redirect(base_url() . 'admin/center/add_center');
            } else if ($this->input->post('phone') == "") {
                $this->session->set_flashdata('error_message', 'Please enter phone');
                redirect(base_url() . 'admin/center/add_center');
            } else if ($this->input->post('email_id') == "") {
                $this->session->set_flashdata('error_message', 'Please enter email address');
                redirect(base_url() . 'admin/center/add_center');
            } else {

                $ins_data['center'] = $this->input->post('center');
				$ins_data['city_id'] = $this->input->post('city_id');
				$ins_data['district_id'] = $this->input->post('district_id');
				$ins_data['phone'] = $this->input->post('phone');
				$ins_data['email_id'] = $this->input->post('email_id');
				$ins_data['media_id'] = $this->input->post('media_id');

                $res = $this->Custom_model->insert_data($ins_data, TRAINING_CENTERS);

                if ($res != FALSE) {
                    $ins_inner['language_id'] = $selected_lang;
                    $ins_inner['center_id'] = $res;
                    $ins_inner['title'] = $this->input->post('title');
					$ins_inner['address'] = $this->input->post('address');

                    $inner = $this->Custom_model->insert_data($ins_inner, TRAINING_CENTERS_LANG);

                    if ($inner != FALSE) {
                        $this->session->set_flashdata('success_message', 'Training center added successfully.');
                        redirect(base_url() . 'admin/center/list_centers');
                    } else {
                        $this->Custom_model->delete_row(TRAINING_CENTERS, array('id' => $res));
                        $this->session->set_flashdata('error_message', 'Error occurred! Please try again.');
                        redirect(base_url() . 'admin/center/add_center');
                    }
                } else {
                    $this->session->set_flashdata('error_message', 'Error occurred! Please try again.');
                    redirect(base_url() . 'admin/center/add_center');
                }
            }
        }
        $partials = array('content' => 'centers/add_center', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

	function get_district_list($city_id) {

		$district_list = '<option value="">Select District</option>';

		$district_arr = $this->Custom_model->fetch_data(DISTRICTS, array('id', 'district'), array(DISTRICTS.'.city_id' => $city_id), array());
		if(!empty($district_arr))
		{
			for($i=0;$i<sizeof($district_arr);$i++)
			{
				$district_list .= '<option value="'.$district_arr[$i]->id.'">'.$district_arr[$i]->district.'</option>';
			}
		}
		echo $district_list;
		exit;
	}

	function get_district_select_list($city_id, $district_id) {

		$district_list = '<option value="">Select District</option>';

		$district_arr = $this->Custom_model->fetch_data(DISTRICTS, array('id', 'district'), array(DISTRICTS.'.city_id' => $city_id), array());
		if(!empty($district_arr))
		{
			for($i=0;$i<sizeof($district_arr);$i++)
			{
				$selected = $district_arr[$i]->id == $district_id ? 'selected' : '';
				$district_list .= '<option value="'.$district_arr[$i]->id.'" '.$selected.'>'.$district_arr[$i]->district.'</option>';
			}
		}
		echo $district_list;
		exit;
	}

    function edit_center($id = NULL) {
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;

		$data['city_list'] = $this->Custom_model->fetch_data(CITIES, array('id', 'city'), array(), array());

        $center_id = decode_url($id);
        $chk_center = $this->Custom_model->row_present_check(TRAINING_CENTERS, array('id' => $center_id));
        if ($chk_center == false) {
            redirect(base_url() . 'admin/center/list_centers');
        }

        $center_details = $this->Custom_model->fetch_data(TRAINING_CENTERS, array(
            TRAINING_CENTERS . '.*',
            TRAINING_CENTERS_LANG . '.language_id',
            TRAINING_CENTERS_LANG . '.center_id',
            TRAINING_CENTERS_LANG . '.title',
			TRAINING_CENTERS_LANG . '.address'
                ), array(TRAINING_CENTERS . '.id' => $center_id), array(TRAINING_CENTERS_LANG => TRAINING_CENTERS . '.id=' . TRAINING_CENTERS_LANG . '.center_id AND ' . TRAINING_CENTERS_LANG . '.language_id=' . $selected_lang . '|left')
        );

        $data['center_details'] = $center_details[0];

        if ($this->input->post('submit')) {
            if ($this->input->post('center') == "") {
                $this->session->set_flashdata('error_message', 'Please enter center');
                redirect(base_url() . 'admin/center/edit_center');
            } else if ($this->input->post('title') == "") {
                $this->session->set_flashdata('error_message', 'Please enter center title');
                redirect(base_url() . 'admin/center/edit_center');
            } else if ($this->input->post('city_id') == "") {
                $this->session->set_flashdata('error_message', 'Please select city');
                redirect(base_url() . 'admin/center/edit_center');
            } else if ($this->input->post('district_id') == "") {
                $this->session->set_flashdata('error_message', 'Please select district');
                redirect(base_url() . 'admin/center/edit_center');
            } else if ($this->input->post('address') == "") {
                $this->session->set_flashdata('error_message', 'Please enter address');
                redirect(base_url() . 'admin/center/edit_center');
            } else if ($this->input->post('phone') == "") {
                $this->session->set_flashdata('error_message', 'Please enter phone');
                redirect(base_url() . 'admin/center/edit_center');
            } else if ($this->input->post('email_id') == "") {
                $this->session->set_flashdata('error_message', 'Please enter email address');
                redirect(base_url() . 'admin/center/edit_center');
            } else {

                $ins_type['center'] = $this->input->post('center');
				$ins_type['city_id'] = $this->input->post('city_id');
				$ins_type['district_id'] = $this->input->post('district_id');
				$ins_type['phone'] = $this->input->post('phone');
				$ins_type['email_id'] = $this->input->post('email_id');
				$ins_type['media_id'] = $this->input->post('media_id');

                $this->Custom_model->edit_data($ins_type, array('id' => $center_id), TRAINING_CENTERS);

                $chk_row = $this->Custom_model->row_present_check(TRAINING_CENTERS_LANG, array('center_id' => $center_id, 'language_id' => $selected_lang));

                if ($chk_row == FALSE) {
                    $ins_inner['language_id'] = $selected_lang;
                    $ins_inner['center_id'] = $center_id;
                    $ins_inner['title'] = $this->input->post('title');
					$ins_inner['address'] = $this->input->post('address');

                    $inner = $this->Custom_model->insert_data($ins_inner, TRAINING_CENTERS_LANG);

                    $this->session->set_flashdata('success_message', 'Training center updated successfully.');
                    redirect(base_url() . 'admin/center/list_centers');
                } else {
                    $ins_data['title'] = $this->input->post('title');
					$ins_data['address'] = $this->input->post('address');

                    $res = $this->Custom_model->edit_data($ins_data, array('center_id' => $center_id, 'language_id' => $selected_lang), TRAINING_CENTERS_LANG);

                    $this->session->set_flashdata('success_message', 'District updated successfully.');
                    redirect(base_url() . 'admin/center/list_centers');
                }
            }
        }
        $partials = array('content' => 'centers/edit_center', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    //*********** end center ************//

	

}
