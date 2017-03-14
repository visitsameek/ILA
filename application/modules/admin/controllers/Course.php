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
            COURSES . '.*',
            COURSES_LANG . '.course_id',
            COURSES_LANG . '.course_title',
            COURSES_LANG . '.language_id'
                ), array(), array(COURSES_LANG => COURSES_LANG . '.course_id=' . COURSES . '.id AND ' . COURSES_LANG . '.language_id=' . $selected_lang), $search = '', $order = COURSES . '.id', $by = 'desc'
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
					$ins_inner['language_id'] = $selected_lang;
                    $ins_inner['course_id'] = $res;
                    $ins_inner['course_title'] = $this->input->post('course_title');

                    $inner = $this->Custom_model->insert_data($ins_inner, COURSES_LANG);

                    if ($inner != FALSE) {
						$this->session->set_flashdata('success_message', 'Course added successfully.');
						redirect(base_url() . 'admin/course/list_courses');                    
					} else {
						$this->Custom_model->delete_row(COURSES, array('id' => $res));
						$this->session->set_flashdata('error_message', 'Error occurred! Please try again.');
						redirect(base_url() . 'admin/course/add_course');
					}
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

        $course_details = $this->Custom_model->fetch_data(COURSES, array(
            COURSES . '.*',
            COURSES_LANG . '.language_id',
            COURSES_LANG . '.course_id',
            COURSES_LANG . '.course_title'
                ), array(COURSES . '.id' => $course_id), array(COURSES_LANG => COURSES . '.id=' . COURSES_LANG . '.course_id AND ' . COURSES_LANG . '.language_id=' . $selected_lang . '|left')
        );
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

				$chk_row = $this->Custom_model->row_present_check(COURSES_LANG, array('course_id' => $course_id, 'language_id' => $selected_lang));

                if ($chk_row == FALSE) {
                    $ins_inner['language_id'] = $selected_lang;
                    $ins_inner['course_id'] = $course_id;
                    $ins_inner['course_title'] = $this->input->post('course_title');

                    $inner = $this->Custom_model->insert_data($ins_inner, COURSES_LANG);

                    $this->session->set_flashdata('success_message', 'Course updated successfully.');
                    redirect(base_url() . 'admin/course/list_courses');
                } else {
                    $ins_data['course_title'] = $this->input->post('course_title');

                    $res = $this->Custom_model->edit_data($ins_data, array('course_id' => $course_id, 'language_id' => $selected_lang), COURSES_LANG);

                    $this->session->set_flashdata('success_message', 'Course updated successfully.');
                    redirect(base_url() . 'admin/course/list_courses');
                }
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

		//fetch programs
		$data['programs'] =  $this->Custom_model->fetch_data(PROGRAMS,
                array(PROGRAMS.'.*', PROGRAMS_LANG.'.program_name', PROGRAMS_LANG.'.language_id'),
                array(PROGRAMS.'.course_id'=>$course_id),
                array(PROGRAMS_LANG=>PROGRAMS_LANG.'.program_id='.PROGRAMS.'.id AND '.PROGRAMS_LANG.'.language_id='.$selected_lang)
                );

		//fetch levels
		$data['levels'] =  $this->Custom_model->fetch_data(COURSE_LEVELS,
                array(COURSE_LEVELS.'.*', COURSE_LEVEL_LANG.'.title', COURSE_LEVEL_LANG.'.language_id'),
                array(COURSE_LEVELS.'.course_id'=>$course_id),
                array(COURSE_LEVEL_LANG=>COURSE_LEVEL_LANG.'.course_level_id='.COURSE_LEVELS.'.id AND '.COURSE_LEVEL_LANG.'.language_id='.$selected_lang)
                );

		//fetch schedules
		$data['schedules'] =  $this->Custom_model->fetch_data(COURSE_SCHEDULES,
                array(COURSE_SCHEDULES.'.*', COURSE_LEVEL_LANG.'.title AS course_level_title', COURSE_LEVEL_LANG.'.language_id', TRAINING_CENTERS_LANG.'.title AS center_title'),
                array(COURSE_SCHEDULES.'.course_id'=>$course_id),
                array(COURSE_LEVEL_LANG=>COURSE_LEVEL_LANG.'.course_level_id='.COURSE_SCHEDULES.'.level_id AND '.COURSE_LEVEL_LANG.'.language_id='.$selected_lang, TRAINING_CENTERS_LANG=>TRAINING_CENTERS_LANG.'.center_id='.COURSE_SCHEDULES.'.center_id AND '.TRAINING_CENTERS_LANG.'.language_id='.$selected_lang)
                );

        $partials = array('content' => 'courses/view_course', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    //*********** end course ************//

	//*********** course program ************//
	
	function add_course_program($course_id = NULL) {
        $data = array();
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;

		$data['course_id'] = decode_url($course_id);

        if ($this->input->post('submit')) {

            if ($this->input->post('program') == "") {
                $this->session->set_flashdata('error_message', 'Please enter course program');
                redirect(base_url() . 'admin/course/add_course_program/'.encode_url($this->input->post('hid_course_id')));
            } else if ($this->input->post('program_name') == "") {
                $this->session->set_flashdata('error_message', 'Please enter course level');
                redirect(base_url() . 'admin/course/add_course_program/'.encode_url($this->input->post('hid_course_id')));
            } else {

                $ins_data['course_id'] = $this->input->post('hid_course_id');
				$ins_data['program'] = $this->input->post('program');

                $res = $this->Custom_model->insert_data($ins_data, PROGRAMS);

                if ($res != FALSE) {
                    $ins_inner['language_id'] = $selected_lang;
                    $ins_inner['program_id'] = $res;
                    $ins_inner['program_name'] = $this->input->post('program_name');

                    $inner = $this->Custom_model->insert_data($ins_inner, PROGRAMS_LANG);

                    if ($inner != FALSE) {
                        $this->session->set_flashdata('success_message', 'Course program added successfully.');
                        redirect(base_url() . 'admin/course/view_course/'.encode_url($this->input->post('hid_course_id')));
                    } else {
                        $this->Custom_model->delete_row(PROGRAMS, array('id' => $res));
                        $this->session->set_flashdata('error_message', 'Error occurred! Please try again.');
                        redirect(base_url() . 'admin/course/add_course_program/'.encode_url($this->input->post('hid_course_id')));
                    }
                } else {
                    $this->session->set_flashdata('error_message', 'Error occurred! Please try again.');
                    redirect(base_url() . 'admin/course/add_course_program/'.encode_url($this->input->post('hid_course_id')));
                }
            }
        }
        $partials = array('content' => 'courses/add_course_program', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

	function edit_course_program($course_id = NULL, $course_program_id = NULL) {
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;

        $course_id = decode_url($course_id);
		$course_program_id = decode_url($course_program_id);

        $chk_course_level = $this->Custom_model->row_present_check(PROGRAMS, array('id' => $course_program_id));
        if ($chk_course_level == false) {
            redirect(base_url() . 'admin/course/view_course/'.encode_url($course_id));
        }

        $course_program_details = $this->Custom_model->fetch_data(PROGRAMS, array(
            PROGRAMS . '.*',
            PROGRAMS_LANG . '.language_id',
            PROGRAMS_LANG . '.program_id',
            PROGRAMS_LANG . '.program_name'
                ), array(PROGRAMS . '.id' => $course_program_id), array(PROGRAMS_LANG => PROGRAMS . '.id=' . PROGRAMS_LANG . '.program_id AND ' . PROGRAMS_LANG . '.language_id=' . $selected_lang . '|left')
        );

        $data['course_program_details'] = $course_program_details[0];
		$data['course_id'] = $course_id;
		$data['course_program_id'] = $course_program_id;

        if ($this->input->post('submit')) {
            if ($this->input->post('program') == "") {
                $this->session->set_flashdata('error_message', 'Please enter course program');
                redirect(base_url() . 'admin/course/edit_course_program/'.encode_url($course_id).'/'.encode_url($course_program_id));
            } else if ($this->input->post('program_name') == "") {
                $this->session->set_flashdata('error_message', 'Please enter course program');
                redirect(base_url() . 'admin/course/edit_course_program/'.encode_url($course_id).'/'.encode_url($course_program_id));
            } else {

                $ins_type['course_id'] = $this->input->post('hid_course_id');
				$ins_type['program'] = $this->input->post('program');

                $this->Custom_model->edit_data($ins_type, array('id' => $course_program_id), PROGRAMS);

                $chk_row = $this->Custom_model->row_present_check(PROGRAMS_LANG, array('program_id' => $course_program_id, 'language_id' => $selected_lang));

                if ($chk_row == FALSE) {
                    $ins_inner['language_id'] = $selected_lang;
                    $ins_inner['program_id'] = $course_program_id;
                    $ins_inner['program_name'] = $this->input->post('program_name');

                    $inner = $this->Custom_model->insert_data($ins_inner, PROGRAMS_LANG);

                    $this->session->set_flashdata('success_message', 'Course program updated successfully.');
                    redirect(base_url() . 'admin/course/view_course/'.encode_url($course_id));
                } else {
                    $ins_data['program_name'] = $this->input->post('program_name');

                    $res = $this->Custom_model->edit_data($ins_data, array('program_id' => $course_program_id, 'language_id' => $selected_lang), PROGRAMS_LANG);

                    $this->session->set_flashdata('success_message', 'Course program updated successfully.');
                    redirect(base_url() . 'admin/course/view_course/'.encode_url($course_id));
                }
            }
        }
        $partials = array('content' => 'courses/edit_course_program', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

	//*********** end course program ************//

	//*********** course level ************//
	
	function add_course_level($course_id = NULL) {
        $data = array();
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;

		$data['course_id'] = decode_url($course_id);
		$data['program_list'] = $this->Custom_model->fetch_data(PROGRAMS, array('id', 'program'), array('course_id' => $data['course_id']), array());

        if ($this->input->post('submit')) {

            if ($this->input->post('course_level') == "") {
                $this->session->set_flashdata('error_message', 'Please enter course level');
                redirect(base_url() . 'admin/course/add_course_level/'.encode_url($this->input->post('hid_course_id')));
            } else if ($this->input->post('title') == "") {
                $this->session->set_flashdata('error_message', 'Please enter course level');
                redirect(base_url() . 'admin/course/add_course_level/'.encode_url($this->input->post('hid_course_id')));
            } else if ($this->input->post('duration_hours') == "") {
                $this->session->set_flashdata('error_message', 'Please enter duration in hours');
                redirect(base_url() . 'admin/course/add_course_level/'.encode_url($this->input->post('hid_course_id')));
            } else if ($this->input->post('duration_months') == "") {
                $this->session->set_flashdata('error_message', 'Please enter duration in months');
                redirect(base_url() . 'admin/course/add_course_level/'.encode_url($this->input->post('hid_course_id')));
            } else {

                $ins_data['course_id'] = $this->input->post('hid_course_id');
				$ins_data['course_level'] = $this->input->post('course_level');
				$ins_data['program_id'] = $this->input->post('program_id');
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
                        redirect(base_url() . 'admin/course/add_course_level/'.encode_url($this->input->post('hid_course_id')));
                    }
                } else {
                    $this->session->set_flashdata('error_message', 'Error occurred! Please try again.');
                    redirect(base_url() . 'admin/course/add_course_level/'.encode_url($this->input->post('hid_course_id')));
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

		$data['program_list'] = $this->Custom_model->fetch_data(PROGRAMS, array('id', 'program'), array('course_id' => $course_id), array());

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
				$ins_type['program_id'] = $this->input->post('program_id');
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

	//*********** start course schedule ************//

	function add_course_schedule($course_id = NULL) {
        $data = array();
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;

		$data['course_id'] = decode_url($course_id);

		$data['course_level_list'] = $this->Custom_model->fetch_data(COURSE_LEVELS, array('id', 'course_level'), array('course_id' => $data['course_id']), array());
		$data['center_list'] = $this->Custom_model->fetch_data(TRAINING_CENTERS, array('id', 'center'), array(), array());

        if ($this->input->post('submit')) {

            if ($this->input->post('level_id') == "") {
                $this->session->set_flashdata('error_message', 'Please select course level');
                redirect(base_url() . 'admin/course/add_course_schedule/'.encode_url($this->input->post('hid_course_id')));
            } else if ($this->input->post('center_id') == "") {
                $this->session->set_flashdata('error_message', 'Please select training center');
                redirect(base_url() . 'admin/course/add_course_schedule/'.encode_url($this->input->post('hid_course_id')));
            } else if ($this->input->post('class_code') == "") {
                $this->session->set_flashdata('error_message', 'Please enter class code');
                redirect(base_url() . 'admin/course/add_course_schedule/'.encode_url($this->input->post('hid_course_id')));
            } else if ($this->input->post('weeks') == "") {
                $this->session->set_flashdata('error_message', 'Please enter weeks');
                redirect(base_url() . 'admin/course/add_course_schedule/'.encode_url($this->input->post('hid_course_id')));
            } else if ($this->input->post('hours') == "") {
                $this->session->set_flashdata('error_message', 'Please enter hours');
                redirect(base_url() . 'admin/course/add_course_schedule/'.encode_url($this->input->post('hid_course_id')));
            } else if ($this->input->post('days') == "") {
                $this->session->set_flashdata('error_message', 'Please enter days');
                redirect(base_url() . 'admin/course/add_course_schedule/'.encode_url($this->input->post('hid_course_id')));
            } else if ($this->input->post('class_time_from') == "") {
                $this->session->set_flashdata('error_message', 'Please enter class time from');
                redirect(base_url() . 'admin/course/add_course_schedule/'.encode_url($this->input->post('hid_course_id')));
            } else if ($this->input->post('class_time_to') == "") {
                $this->session->set_flashdata('error_message', 'Please enter class time to');
                redirect(base_url() . 'admin/course/add_course_schedule/'.encode_url($this->input->post('hid_course_id')));
            } else if ($this->input->post('start_date') == "") {
                $this->session->set_flashdata('error_message', 'Please enter start date');
                redirect(base_url() . 'admin/course/add_course_schedule/'.encode_url($this->input->post('hid_course_id')));
            } else if ($this->input->post('fee') == "") {
                $this->session->set_flashdata('error_message', 'Please enter fee');
                redirect(base_url() . 'admin/course/add_course_schedule/'.encode_url($this->input->post('hid_course_id')));
            } else if ($this->input->post('status') == "") {
                $this->session->set_flashdata('error_message', 'Please select status');
                redirect(base_url() . 'admin/course/add_course_schedule/'.encode_url($this->input->post('hid_course_id')));
            } else {

				$start_date = explode('/', $this->input->post('start_date'));

                $ins_data['course_id'] = $this->input->post('hid_course_id');
				$ins_data['center_id'] = $this->input->post('center_id');
				$ins_data['level_id'] = $this->input->post('level_id');
				$ins_data['class_code'] = $this->input->post('class_code');
				$ins_data['weeks'] = $this->input->post('weeks');
				$ins_data['hours'] = $this->input->post('hours');
				$ins_data['days'] = $this->input->post('days');
				$ins_data['class_time_from'] = $this->input->post('class_time_from');
				$ins_data['class_time_to'] = $this->input->post('class_time_to');
				$ins_data['start_date'] = $start_date[2].'-'.$start_date[0].'-'.$start_date[1];
				$ins_data['fee'] = $this->input->post('fee');
				$ins_data['status'] = $this->input->post('status');

                $res = $this->Custom_model->insert_data($ins_data, COURSE_SCHEDULES);

                if ($res != FALSE) {                    
					$this->session->set_flashdata('success_message', 'Course Schedule added successfully.');
					redirect(base_url() . 'admin/course/view_course/'.encode_url($this->input->post('hid_course_id')));
                    
                } else {
                    $this->session->set_flashdata('error_message', 'Error occurred! Please try again.');
                    redirect(base_url() . 'admin/course/add_course_schedule/'.encode_url($this->input->post('hid_course_id')));
                }
            }
        }
        $partials = array('content' => 'courses/add_course_schedule', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

	function edit_course_schedule($course_id = NULL, $course_schedule_id = NULL) {
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;

		$data['course_id'] = decode_url($course_id);
		$data['course_schedule_id'] = decode_url($course_schedule_id);

		$data['course_level_list'] = $this->Custom_model->fetch_data(COURSE_LEVELS, array('id', 'course_level'), array('course_id' => $data['course_id']), array());
		$data['center_list'] = $this->Custom_model->fetch_data(TRAINING_CENTERS, array('id', 'center'), array(), array());

        $chk_course_schedule = $this->Custom_model->row_present_check(COURSE_SCHEDULES, array('id' => $data['course_schedule_id']));
        if ($chk_course_schedule == false) {
            redirect(base_url() . 'admin/course/view_course/'.encode_url($data['course_id']));
        }

        $course_schedule_details = $this->Custom_model->fetch_data(COURSE_SCHEDULES, array(COURSE_SCHEDULES . '.*'), array(COURSE_SCHEDULES . '.id' => $data['course_schedule_id']), array());
        $data['course_schedule_details'] = $course_schedule_details[0];

        if ($this->input->post('submit')) {
            if ($this->input->post('level_id') == "") {
                $this->session->set_flashdata('error_message', 'Please select course level');
                redirect(base_url() . 'admin/course/edit_course_schedule/'.encode_url($this->input->post('hid_course_id')).'/'.encode_url($this->input->post('hid_course_schedule_id')));
            } else if ($this->input->post('center_id') == "") {
                $this->session->set_flashdata('error_message', 'Please select training center');
                redirect(base_url() . 'admin/course/edit_course_schedule/'.encode_url($this->input->post('hid_course_id')).'/'.encode_url($this->input->post('hid_course_schedule_id')));
            } else if ($this->input->post('class_code') == "") {
                $this->session->set_flashdata('error_message', 'Please enter class code');
                redirect(base_url() . 'admin/course/edit_course_schedule/'.encode_url($this->input->post('hid_course_id')).'/'.encode_url($this->input->post('hid_course_schedule_id')));
            } else if ($this->input->post('weeks') == "") {
                $this->session->set_flashdata('error_message', 'Please enter weeks');
                redirect(base_url() . 'admin/course/edit_course_schedule/'.encode_url($this->input->post('hid_course_id')).'/'.encode_url($this->input->post('hid_course_schedule_id')));
            } else if ($this->input->post('hours') == "") {
                $this->session->set_flashdata('error_message', 'Please enter hours');
                redirect(base_url() . 'admin/course/edit_course_schedule/'.encode_url($this->input->post('hid_course_id')).'/'.encode_url($this->input->post('hid_course_schedule_id')));
            } else if ($this->input->post('days') == "") {
                $this->session->set_flashdata('error_message', 'Please enter days');
                redirect(base_url() . 'admin/course/edit_course_schedule/'.encode_url($this->input->post('hid_course_id')).'/'.encode_url($this->input->post('hid_course_schedule_id')));
            } else if ($this->input->post('class_time_from') == "") {
                $this->session->set_flashdata('error_message', 'Please enter class time from');
                redirect(base_url() . 'admin/course/edit_course_schedule/'.encode_url($this->input->post('hid_course_id')).'/'.encode_url($this->input->post('hid_course_schedule_id')));
            } else if ($this->input->post('class_time_to') == "") {
                $this->session->set_flashdata('error_message', 'Please enter class time to');
                redirect(base_url() . 'admin/course/edit_course_schedule/'.encode_url($this->input->post('hid_course_id')).'/'.encode_url($this->input->post('hid_course_schedule_id')));
            } else if ($this->input->post('start_date') == "") {
                $this->session->set_flashdata('error_message', 'Please enter start date');
                redirect(base_url() . 'admin/course/edit_course_schedule/'.encode_url($this->input->post('hid_course_id')).'/'.encode_url($this->input->post('hid_course_schedule_id')));
            } else if ($this->input->post('fee') == "") {
                $this->session->set_flashdata('error_message', 'Please enter fee');
                redirect(base_url() . 'admin/course/edit_course_schedule/'.encode_url($this->input->post('hid_course_id')).'/'.encode_url($this->input->post('hid_course_schedule_id')));
            } else if ($this->input->post('status') == "") {
                $this->session->set_flashdata('error_message', 'Please select status');
                redirect(base_url() . 'admin/course/edit_course_schedule/'.encode_url($this->input->post('hid_course_id')).'/'.encode_url($this->input->post('hid_course_schedule_id')));
            } else {

				$start_date = explode('/', $this->input->post('start_date'));

                $ins_type['course_id'] = $this->input->post('hid_course_id');
				$ins_type['center_id'] = $this->input->post('center_id');
				$ins_type['level_id'] = $this->input->post('level_id');
				$ins_type['class_code'] = $this->input->post('class_code');
				$ins_type['weeks'] = $this->input->post('weeks');
				$ins_type['hours'] = $this->input->post('hours');
				$ins_type['days'] = $this->input->post('days');
				$ins_type['class_time_from'] = $this->input->post('class_time_from');
				$ins_type['class_time_to'] = $this->input->post('class_time_to');
				$ins_type['start_date'] = $start_date[2].'-'.$start_date[0].'-'.$start_date[1];
				$ins_type['fee'] = $this->input->post('fee');
				$ins_type['status'] = $this->input->post('status');

                $this->Custom_model->edit_data($ins_type, array('id' => $this->input->post('hid_course_schedule_id')), COURSE_SCHEDULES);                

                $this->session->set_flashdata('success_message', 'Course Schedule updated successfully.');
                redirect(base_url() . 'admin/course/view_course/'.encode_url($this->input->post('hid_course_id')));
            }
        }
        $partials = array('content' => 'courses/edit_course_schedule', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

	//*********** end course schedule ************//

}
