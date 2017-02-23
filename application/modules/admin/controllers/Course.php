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

	function view_course($id = NULL) {
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;
        
        $course_id = decode_url($id);

        $chk_course = $this->Custom_model->row_present_check(COURSES, array('id' => $course_id));
        if ($chk_course == false) {
            redirect(base_url() . 'admin/course/list_courses');
        }

        //fetch course details
		$course_details = $this->Custom_model->fetch_data(COURSES, array(COURSES . '.*', COURSE_CATEGORIES . '.category'), array(COURSES . '.id' => $course_id), array(COURSE_CATEGORIES=>COURSE_CATEGORIES.'.id='.COURSES.'.course_category_id'));

		$data['course_details'] = $course_details[0];

		//fetch levels
		$data['levels'] =  $this->Custom_model->fetch_data(COURSE_LEVELS,
                array(COURSE_LEVELS.'.*',COURSE_LEVEL_LANG.'.title', COURSE_LEVEL_LANG.'.language_id'),
                array(COURSE_LEVELS.'.course_id'=>$course_id),
                array(COURSE_LEVEL_LANG=>COURSE_LEVEL_LANG.'.course_level_id='.COURSE_LEVELS.'.id AND '.COURSE_LEVEL_LANG.'.language_id='.$selected_lang)
                );

		//fetch schedules
		$data['schedules'] =  $this->Custom_model->fetch_data(COURSE_SCHEDULES,
                array(COURSE_SCHEDULES.'.*',COURSE_LEVEL_LANG.'.title AS course_level_title', COURSE_LEVEL_LANG.'.language_id', TRAINING_CENTERS_LANG.'.title AS center_title'),
                array(COURSE_SCHEDULES.'.course_id'=>$course_id),
                array(COURSE_LEVEL_LANG=>COURSE_LEVEL_LANG.'.course_level_id='.COURSE_SCHEDULES.'.level_id AND '.COURSE_LEVEL_LANG.'.language_id='.$selected_lang, TRAINING_CENTERS_LANG=>TRAINING_CENTERS_LANG.'.center_id='.COURSE_SCHEDULES.'.center_id AND '.TRAINING_CENTERS_LANG.'.language_id='.$selected_lang)
                );

        $partials = array('content' => 'courses/view_course', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    //*********** end course ************//

	//*********** course level ************//
	
	function add_course_level($course_id = NULL) {
        $data = array();
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;

		$data['course_id'] = decode_url($course_id);

        if ($this->input->post('submit')) {

            if ($this->input->post('course_level') == "") {
                $this->session->set_flashdata('error_message', 'Please enter course level');
                redirect(base_url() . 'admin/course/add_course_level/'.encode_url($course_id));
            } else if ($this->input->post('title') == "") {
                $this->session->set_flashdata('error_message', 'Please enter course level');
                redirect(base_url() . 'admin/course/add_course_level/'.encode_url($course_id));
            } else if ($this->input->post('duration_hours') == "") {
                $this->session->set_flashdata('error_message', 'Please enter duration in hours');
                redirect(base_url() . 'admin/course/add_course_level/'.encode_url($course_id));
            } else if ($this->input->post('duration_months') == "") {
                $this->session->set_flashdata('error_message', 'Please enter duration in months');
                redirect(base_url() . 'admin/course/add_course_level/'.encode_url($course_id));
            } else {

                $ins_data['course_id'] = $this->input->post('hid_course_id');
				$ins_data['course_level'] = $this->input->post('course_level');
				$ins_data['level_name'] = $this->input->post('level_name');
				$ins_data['duration_hours'] = $this->input->post('duration_hours');
				$ins_data['duration_months'] = $this->input->post('duration_months');
				$ins_data['age_from'] = $this->input->post('age_from');
				$ins_data['age_to'] = $this->input->post('age_to');
				$ins_data['video_link'] = $this->input->post('video_link');
				$ins_data['cefr'] = $this->input->post('cefr');
				$ins_data['cambridge_exam'] = $this->input->post('cambridge_exam');
				$ins_data['ielts'] = $this->input->post('ielts');
				$ins_data['toefl_ibt'] = $this->input->post('toefl_ibt');
				$ins_data['toeic_reading'] = $this->input->post('toeic_reading');
				$ins_data['toeic_writing'] = $this->input->post('toeic_writing');

                $res = $this->Custom_model->insert_data($ins_data, COURSE_LEVELS);

                if ($res != FALSE) {
                    $ins_inner['language_id'] = $selected_lang;
                    $ins_inner['course_level_id'] = $res;
                    $ins_inner['title'] = $this->input->post('title');

                    $inner = $this->Custom_model->insert_data($ins_inner, COURSE_LEVEL_LANG);

                    if ($inner != FALSE) {
                        $this->session->set_flashdata('success_message', 'Course level added successfully.');
                        redirect(base_url() . 'admin/course/view_course/'.encode_url($this->input->post('hid_course_id')));
                    } else {
                        $this->Custom_model->delete_row(COURSE_LEVELS, array('id' => $res));
                        $this->session->set_flashdata('error_message', 'Error occurred! Please try again.');
                        redirect(base_url() . 'admin/course/add_course_level/'.encode_url($course_id));
                    }
                } else {
                    $this->session->set_flashdata('error_message', 'Error occurred! Please try again.');
                    redirect(base_url() . 'admin/course/add_course_level/'.encode_url($course_id));
                }
            }
        }
        $partials = array('content' => 'courses/add_course_level', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

	function edit_course_level($course_id = NULL, $course_level_id = NULL) {
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;

        $course_id = decode_url($course_id);
		$course_level_id = decode_url($course_level_id);

        $chk_course_level = $this->Custom_model->row_present_check(COURSE_LEVELS, array('id' => $course_level_id));
        if ($chk_course_level == false) {
            redirect(base_url() . 'admin/course/view_course/'.encode_url($course_id));
        }

        $course_level_details = $this->Custom_model->fetch_data(COURSE_LEVELS, array(
            COURSE_LEVELS . '.*',
            COURSE_LEVEL_LANG . '.language_id',
            COURSE_LEVEL_LANG . '.course_level_id',
            COURSE_LEVEL_LANG . '.title'
                ), array(COURSE_LEVELS . '.id' => $course_level_id), array(COURSE_LEVEL_LANG => COURSE_LEVELS . '.id=' . COURSE_LEVEL_LANG . '.course_level_id AND ' . COURSE_LEVEL_LANG . '.language_id=' . $selected_lang . '|left')
        );

        $data['course_level_details'] = $course_level_details[0];
		$data['course_id'] = $course_id;
		$data['course_level_id'] = $course_level_id;

        if ($this->input->post('submit')) {
            if ($this->input->post('course_level') == "") {
                $this->session->set_flashdata('error_message', 'Please enter course level');
                redirect(base_url() . 'admin/course/edit_course_level/'.encode_url($course_id).'/'.encode_url($course_level_id));
            } else if ($this->input->post('title') == "") {
                $this->session->set_flashdata('error_message', 'Please enter course level');
                redirect(base_url() . 'admin/course/edit_course_level/'.encode_url($course_id).'/'.encode_url($course_level_id));
            } else if ($this->input->post('duration_hours') == "") {
                $this->session->set_flashdata('error_message', 'Please enter duration in hours');
                redirect(base_url() . 'admin/course/edit_course_level/'.encode_url($course_id).'/'.encode_url($course_level_id));
            } else if ($this->input->post('duration_months') == "") {
                $this->session->set_flashdata('error_message', 'Please enter duration in months');
                redirect(base_url() . 'admin/course/edit_course_level/'.encode_url($course_id).'/'.encode_url($course_level_id));
            } else {

                $ins_type['course_id'] = $this->input->post('hid_course_id');
				$ins_type['course_level'] = $this->input->post('course_level');
				$ins_type['level_name'] = $this->input->post('level_name');
				$ins_type['duration_hours'] = $this->input->post('duration_hours');
				$ins_type['duration_months'] = $this->input->post('duration_months');
				$ins_type['age_from'] = $this->input->post('age_from');
				$ins_type['age_to'] = $this->input->post('age_to');
				$ins_type['video_link'] = $this->input->post('video_link');
				$ins_type['cefr'] = $this->input->post('cefr');
				$ins_type['cambridge_exam'] = $this->input->post('cambridge_exam');
				$ins_type['ielts'] = $this->input->post('ielts');
				$ins_type['toefl_ibt'] = $this->input->post('toefl_ibt');
				$ins_type['toeic_reading'] = $this->input->post('toeic_reading');
				$ins_type['toeic_writing'] = $this->input->post('toeic_writing');

                $this->Custom_model->edit_data($ins_type, array('id' => $course_level_id), COURSE_LEVELS);

                $chk_row = $this->Custom_model->row_present_check(COURSE_LEVEL_LANG, array('course_level_id' => $course_level_id, 'language_id' => $selected_lang));

                if ($chk_row == FALSE) {
                    $ins_inner['language_id'] = $selected_lang;
                    $ins_inner['course_level_id'] = $course_level_id;
                    $ins_inner['title'] = $this->input->post('title');

                    $inner = $this->Custom_model->insert_data($ins_inner, COURSE_LEVEL_LANG);

                    $this->session->set_flashdata('success_message', 'Course level updated successfully.');
                    redirect(base_url() . 'admin/course/view_course/'.encode_url($course_id));
                } else {
                    $ins_data['title'] = $this->input->post('title');

                    $res = $this->Custom_model->edit_data($ins_data, array('course_level_id' => $course_level_id, 'language_id' => $selected_lang), COURSE_LEVEL_LANG);

                    $this->session->set_flashdata('success_message', 'Course level updated successfully.');
                    redirect(base_url() . 'admin/course/view_course/'.encode_url($course_id));
                }
            }
        }
        $partials = array('content' => 'courses/edit_course_level', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

	//*********** end course level ************//

}
