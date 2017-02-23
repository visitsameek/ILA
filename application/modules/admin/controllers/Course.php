<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends MY_Controller {

    function __construct() {

        parent::__construct();
        $this->load->model('Custom_model');

        if (!$this->session->userdata('user_data')) {
            redirect(base_url() . 'admin/login');
        }

    }

    //************ course ****************//

    function list_courses() {
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;

        /* Pagination Code Start */
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/course/list_courses/';
        /* Row Count Code */
        $config['total_rows'] = $this->Custom_model->row_count(COURSES, array(COURSES . '.id'), array());

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


        $data['courses'] = $this->Custom_model->fetch_data(COURSES, array(
            COURSES . '.*'
                ), array(), array(), $search = '', $order = COURSES . '.id', $by = 'desc', $page_number, $config['per_page'], $group_by = '', $having = '', $start = $page_number, $end = ''
        );

        $partials = array('content' => 'courses/list_courses', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    function add_course() {
        $data = array();
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;

		$data['category_list'] = $this->Custom_model->fetch_data(COURSE_CATEGORIES, array('id', 'category'), array(), array());

        if ($this->input->post('submit')) {

            if ($this->input->post('title') == "") {
                $this->session->set_flashdata('error_message', 'Please enter course title');
                redirect(base_url() . 'admin/course/add_course');
            } else if ($this->input->post('course_category_id') == "") {
                $this->session->set_flashdata('error_message', 'Please select course category');
                redirect(base_url() . 'admin/course/add_course');
            } else {

                $ins_data['title'] = $this->input->post('title');
				$ins_data['course_category_id'] = $this->input->post('course_category_id');
				$ins_data['age_from'] = $this->input->post('age_from');
				$ins_data['age_to'] = $this->input->post('age_to');

                $res = $this->Custom_model->insert_data($ins_data, COURSES);

                if ($res != FALSE) {                    
					$this->session->set_flashdata('success_message', 'Course added successfully.');
					redirect(base_url() . 'admin/course/list_courses');
                    
                } else {
                    $this->session->set_flashdata('error_message', 'Error occurred! Please try again.');
                    redirect(base_url() . 'admin/course/add_course');
                }
            }
        }
        $partials = array('content' => 'courses/add_course', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }	

    function edit_course($id = NULL) {
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;

		$data['category_list'] = $this->Custom_model->fetch_data(COURSE_CATEGORIES, array('id', 'category'), array(), array());

        $course_id = decode_url($id);
        $chk_course = $this->Custom_model->row_present_check(COURSES, array('id' => $course_id));
        if ($chk_course == false) {
            redirect(base_url() . 'admin/course/list_courses');
        }

        $course_details = $this->Custom_model->fetch_data(COURSES, array(COURSES . '.*'), array(COURSES . '.id' => $course_id), array());

        $data['course_details'] = $course_details[0];

        if ($this->input->post('submit')) {
            if ($this->input->post('title') == "") {
                $this->session->set_flashdata('error_message', 'Please enter course title');
                redirect(base_url() . 'admin/course/edit_course');
            } else if ($this->input->post('course_category_id') == "") {
                $this->session->set_flashdata('error_message', 'Please select course category');
                redirect(base_url() . 'admin/course/edit_course');
            } else {

				$ins_type['title'] = $this->input->post('title');
				$ins_type['course_category_id'] = $this->input->post('course_category_id');
				$ins_type['age_from'] = $this->input->post('age_from');
				$ins_type['age_to'] = $this->input->post('age_to');

                $this->Custom_model->edit_data($ins_type, array('id' => $course_id), COURSES);                

                $this->session->set_flashdata('success_message', 'Course updated successfully.');
                redirect(base_url() . 'admin/course/list_courses');
            }
        }
        $partials = array('content' => 'courses/edit_course', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    //*********** end course ************//

	

}
