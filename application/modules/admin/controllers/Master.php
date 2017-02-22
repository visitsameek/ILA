<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends MY_Controller {

    function __construct() {

        parent::__construct();
        $this->load->model('Custom_model');

        if (!$this->session->userdata('user_data')) {
            redirect(base_url() . 'admin/login');
        }

    }

    //************ city ****************//

    function list_cities() {
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;

        /* Pagination Code Start */
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/master/list_cities/';
        /* Row Count Code */
        $config['total_rows'] = $this->Custom_model->row_count(CITIES, array(CITIES . '.id'), array());

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


        $data['cities'] = $this->Custom_model->fetch_data(CITIES, array(
            CITIES . '.*',
            CITIES_LANG . '.city_id',
            CITIES_LANG . '.city_name',
            CITIES_LANG . '.language_id'
                ), array(), array(CITIES_LANG => CITIES_LANG . '.city_id=' . CITIES . '.id AND ' . CITIES_LANG . '.language_id=' . $selected_lang), $search = '', $order = CITIES . '.id', $by = 'desc', $page_number, $config['per_page'], $group_by = '', $having = '', $start = $page_number, $end = ''
        );

        $partials = array('content' => 'master/list_cities', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    function add_city() {
        $data = array();
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;

        if ($this->input->post('submit')) {

            if ($this->input->post('city') == "") {
                $this->session->set_flashdata('error_message', 'Please enter city');
                redirect(base_url() . 'admin/master/add_city');
            } else if ($this->input->post('city_name') == "") {
                $this->session->set_flashdata('error_message', 'Please enter city name');
                redirect(base_url() . 'admin/master/add_city');
            } else {

                $ins_data['city'] = $this->input->post('city');

                $res = $this->Custom_model->insert_data($ins_data, CITIES);

                if ($res != FALSE) {
                    $ins_inner['language_id'] = $selected_lang;
                    $ins_inner['city_id'] = $res;
                    $ins_inner['city_name'] = $this->input->post('city_name');

                    $inner = $this->Custom_model->insert_data($ins_inner, CITIES_LANG);

                    if ($inner != FALSE) {
                        $this->session->set_flashdata('success_message', 'City added successfully.');
                        redirect(base_url() . 'admin/master/list_cities');
                    } else {
                        $this->Custom_model->delete_row(CITIES, array('id' => $res));
                        $this->session->set_flashdata('error_message', 'Error occurred! Please try again.');
                        redirect(base_url() . 'admin/master/add_city');
                    }
                } else {
                    $this->session->set_flashdata('error_message', 'Error occurred! Please try again.');
                    redirect(base_url() . 'admin/master/add_city');
                }
            }
        }
        $partials = array('content' => 'master/add_city', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    function edit_city($id = NULL) {
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;

        $city_id = decode_url($id);
        $chk_city = $this->Custom_model->row_present_check(CITIES, array('id' => $city_id));
        if ($chk_city == false) {
            redirect(base_url() . 'admin/master/list_cities');
        }

        $city_details = $this->Custom_model->fetch_data(CITIES, array(
            CITIES . '.*',
            CITIES_LANG . '.language_id',
            CITIES_LANG . '.city_id',
            CITIES_LANG . '.city_name'
                ), array(CITIES . '.id' => $city_id), array(CITIES_LANG => CITIES . '.id=' . CITIES_LANG . '.city_id AND ' . CITIES_LANG . '.language_id=' . $selected_lang . '|left')
        );

        $data['city_details'] = $city_details[0];

        if ($this->input->post('submit')) {
            if ($this->input->post('city') == "") {
                $this->session->set_flashdata('error_message', 'Please enter city');
                redirect(base_url() . 'admin/master/edit_city');
            } else if ($this->input->post('city_name') == "") {
                $this->session->set_flashdata('error_message', 'Please enter city name');
                redirect(base_url() . 'admin/master/edit_city');
            } else {

                //insert image to welness type//
                $ins_type['city'] = $this->input->post('city');
                $this->Custom_model->edit_data($ins_type, array('id' => $city_id), CITIES);

                $chk_row = $this->Custom_model->row_present_check(CITIES_LANG, array('city_id' => $city_id, 'language_id' => $selected_lang));

                if ($chk_row == FALSE) {
                    $ins_inner['language_id'] = $selected_lang;
                    $ins_inner['city_id'] = $city_id;
                    $ins_inner['city_name'] = $this->input->post('city_name');

                    $inner = $this->Custom_model->insert_data($ins_inner, CITIES_LANG);

                    $this->session->set_flashdata('success_message', 'City updated successfully.');
                    redirect(base_url() . 'admin/master/list_cities');
                } else {
                    $ins_data['city_name'] = $this->input->post('city_name');
                    $res = $this->Custom_model->edit_data($ins_data, array('city_id' => $city_id, 'language_id' => $selected_lang), CITIES_LANG);

                    $this->session->set_flashdata('success_message', 'City updated successfully.');
                    redirect(base_url() . 'admin/master/list_cities');
                }
            }
        }
        $partials = array('content' => 'master/edit_city', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    //*********** end city ************//

	//************ district ****************//

    function list_districts() {
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;

        /* Pagination Code Start */
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/master/list_districts/';
        /* Row Count Code */
        $config['total_rows'] = $this->Custom_model->row_count(DISTRICTS, array(DISTRICTS . '.id'), array());

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


        $data['districts'] = $this->Custom_model->fetch_data(DISTRICTS, array(
            DISTRICTS . '.*',
            DISTRICTS_LANG . '.district_id',
            DISTRICTS_LANG . '.district_name',
            DISTRICTS_LANG . '.language_id'
                ), array(), array(DISTRICTS_LANG => DISTRICTS_LANG . '.district_id=' . DISTRICTS . '.id AND ' . DISTRICTS_LANG . '.language_id=' . $selected_lang), $search = '', $order = DISTRICTS . '.id', $by = 'desc', $page_number, $config['per_page'], $group_by = '', $having = '', $start = $page_number, $end = ''
        );

        $partials = array('content' => 'master/list_districts', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    function add_district() {
        $data = array();
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;

		$data['city_list'] = $this->Custom_model->fetch_data(CITIES, array('id', 'city'), array(), array());

        if ($this->input->post('submit')) {

            if ($this->input->post('district') == "") {
                $this->session->set_flashdata('error_message', 'Please enter district');
                redirect(base_url() . 'admin/master/add_district');
            } else if ($this->input->post('city_id') == "") {
                $this->session->set_flashdata('error_message', 'Please select city');
                redirect(base_url() . 'admin/master/add_district');
            } else if ($this->input->post('district_name') == "") {
                $this->session->set_flashdata('error_message', 'Please enter district name');
                redirect(base_url() . 'admin/master/add_district');
            } else {

                $ins_data['district'] = $this->input->post('district');
				$ins_data['city_id'] = $this->input->post('city_id');

                $res = $this->Custom_model->insert_data($ins_data, DISTRICTS);

                if ($res != FALSE) {
                    $ins_inner['language_id'] = $selected_lang;
                    $ins_inner['district_id'] = $res;
                    $ins_inner['district_name'] = $this->input->post('district_name');

                    $inner = $this->Custom_model->insert_data($ins_inner, DISTRICTS_LANG);

                    if ($inner != FALSE) {
                        $this->session->set_flashdata('success_message', 'District added successfully.');
                        redirect(base_url() . 'admin/master/list_districts');
                    } else {
                        $this->Custom_model->delete_row(DISTRICTS, array('id' => $res));
                        $this->session->set_flashdata('error_message', 'Error occurred! Please try again.');
                        redirect(base_url() . 'admin/master/add_district');
                    }
                } else {
                    $this->session->set_flashdata('error_message', 'Error occurred! Please try again.');
                    redirect(base_url() . 'admin/master/add_district');
                }
            }
        }
        $partials = array('content' => 'master/add_district', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    function edit_district($id = NULL) {
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;

		$data['city_list'] = $this->Custom_model->fetch_data(CITIES, array('id', 'city'), array(), array());

        $district_id = decode_url($id);
        $chk_district = $this->Custom_model->row_present_check(DISTRICTS, array('id' => $district_id));
        if ($chk_district == false) {
            redirect(base_url() . 'admin/master/list_districts');
        }

        $district_details = $this->Custom_model->fetch_data(DISTRICTS, array(
            DISTRICTS . '.*',
            DISTRICTS_LANG . '.language_id',
            DISTRICTS_LANG . '.district_id',
            DISTRICTS_LANG . '.district_name'
                ), array(DISTRICTS . '.id' => $district_id), array(DISTRICTS_LANG => DISTRICTS . '.id=' . DISTRICTS_LANG . '.district_id AND ' . DISTRICTS_LANG . '.language_id=' . $selected_lang . '|left')
        );

        $data['district_details'] = $district_details[0];

        if ($this->input->post('submit')) {
            if ($this->input->post('district') == "") {
                $this->session->set_flashdata('error_message', 'Please enter district');
                redirect(base_url() . 'admin/master/edit_district');
            } else if ($this->input->post('city_id') == "") {
                $this->session->set_flashdata('error_message', 'Please select city');
                redirect(base_url() . 'admin/master/edit_district');
            } else if ($this->input->post('district_name') == "") {
                $this->session->set_flashdata('error_message', 'Please enter district name');
                redirect(base_url() . 'admin/master/edit_district');
            } else {

                //insert image to welness type//
                $ins_type['district'] = $this->input->post('district');
				$ins_type['city_id'] = $this->input->post('city_id');
                $this->Custom_model->edit_data($ins_type, array('id' => $district_id), DISTRICTS);

                $chk_row = $this->Custom_model->row_present_check(DISTRICTS_LANG, array('district_id' => $district_id, 'language_id' => $selected_lang));

                if ($chk_row == FALSE) {
                    $ins_inner['language_id'] = $selected_lang;
                    $ins_inner['district_id'] = $district_id;
                    $ins_inner['district_name'] = $this->input->post('district_name');

                    $inner = $this->Custom_model->insert_data($ins_inner, DISTRICTS_LANG);

                    $this->session->set_flashdata('success_message', 'District updated successfully.');
                    redirect(base_url() . 'admin/master/list_districts');
                } else {
                    $ins_data['district_name'] = $this->input->post('district_name');
                    $res = $this->Custom_model->edit_data($ins_data, array('district_id' => $district_id, 'language_id' => $selected_lang), DISTRICTS_LANG);

                    $this->session->set_flashdata('success_message', 'District updated successfully.');
                    redirect(base_url() . 'admin/master/list_districts');
                }
            }
        }
        $partials = array('content' => 'master/edit_district', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    //*********** end district ************//

	//************ course category ****************//

    function list_course_categories() {
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;

        /* Pagination Code Start */
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/master/list_course_categories/';
        /* Row Count Code */
        $config['total_rows'] = $this->Custom_model->row_count(COURSE_CATEGORIES, array(COURSE_CATEGORIES . '.id'), array());

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


        $data['categories'] = $this->Custom_model->fetch_data(COURSE_CATEGORIES, array(
            COURSE_CATEGORIES . '.*',
            COURSE_CATEGORIES_LANG . '.course_category_id',
            COURSE_CATEGORIES_LANG . '.category_name',
            COURSE_CATEGORIES_LANG . '.language_id'
                ), array(), array(COURSE_CATEGORIES_LANG => COURSE_CATEGORIES_LANG . '.course_category_id=' . COURSE_CATEGORIES . '.id AND ' . COURSE_CATEGORIES_LANG . '.language_id=' . $selected_lang), $search = '', $order = COURSE_CATEGORIES . '.id', $by = 'desc', $page_number, $config['per_page'], $group_by = '', $having = '', $start = $page_number, $end = ''
        );

        $partials = array('content' => 'master/list_course_categories', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    function add_course_category() {
        $data = array();
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;

        if ($this->input->post('submit')) {

            if ($this->input->post('category') == "") {
                $this->session->set_flashdata('error_message', 'Please enter category');
                redirect(base_url() . 'admin/master/add_course_category');
            } else if ($this->input->post('category_name') == "") {
                $this->session->set_flashdata('error_message', 'Please enter category name');
                redirect(base_url() . 'admin/master/add_course_category');
            } else {

                $ins_data['category'] = $this->input->post('category');

                $res = $this->Custom_model->insert_data($ins_data, COURSE_CATEGORIES);

                if ($res != FALSE) {
                    $ins_inner['language_id'] = $selected_lang;
                    $ins_inner['course_category_id'] = $res;
                    $ins_inner['category_name'] = $this->input->post('category_name');

                    $inner = $this->Custom_model->insert_data($ins_inner, COURSE_CATEGORIES_LANG);

                    if ($inner != FALSE) {
                        $this->session->set_flashdata('success_message', 'Course category added successfully.');
                        redirect(base_url() . 'admin/master/list_course_categories');
                    } else {
                        $this->Custom_model->delete_row(COURSE_CATEGORIES, array('id' => $res));
                        $this->session->set_flashdata('error_message', 'Error occurred! Please try again.');
                        redirect(base_url() . 'admin/master/add_course_category');
                    }
                } else {
                    $this->session->set_flashdata('error_message', 'Error occurred! Please try again.');
                    redirect(base_url() . 'admin/master/add_course_category');
                }
            }
        }
        $partials = array('content' => 'master/add_course_category', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    function edit_course_category($id = NULL) {
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;

        $category_id = decode_url($id);
        $chk_category = $this->Custom_model->row_present_check(COURSE_CATEGORIES, array('id' => $category_id));
        if ($chk_category == false) {
            redirect(base_url() . 'admin/master/list_course_categories');
        }

        $category_details = $this->Custom_model->fetch_data(COURSE_CATEGORIES, array(
            COURSE_CATEGORIES . '.*',
            COURSE_CATEGORIES_LANG . '.language_id',
            COURSE_CATEGORIES_LANG . '.course_category_id',
            COURSE_CATEGORIES_LANG . '.category_name'
                ), array(COURSE_CATEGORIES . '.id' => $category_id), array(COURSE_CATEGORIES_LANG => COURSE_CATEGORIES . '.id=' . COURSE_CATEGORIES_LANG . '.course_category_id AND ' . COURSE_CATEGORIES_LANG . '.language_id=' . $selected_lang . '|left')
        );

        $data['category_details'] = $category_details[0];

        if ($this->input->post('submit')) {
            if ($this->input->post('category') == "") {
                $this->session->set_flashdata('error_message', 'Please enter category');
                redirect(base_url() . 'admin/master/edit_course_category');
            } else if ($this->input->post('category_name') == "") {
                $this->session->set_flashdata('error_message', 'Please enter category name');
                redirect(base_url() . 'admin/master/edit_course_category');
            } else {

                //insert image to welness type//
                $ins_type['category'] = $this->input->post('category');
                $this->Custom_model->edit_data($ins_type, array('id' => $category_id), COURSE_CATEGORIES);

                $chk_row = $this->Custom_model->row_present_check(COURSE_CATEGORIES_LANG, array('course_category_id' => $category_id, 'language_id' => $selected_lang));

                if ($chk_row == FALSE) {
                    $ins_inner['language_id'] = $selected_lang;
                    $ins_inner['course_category_id'] = $category_id;
                    $ins_inner['category_name'] = $this->input->post('category_name');

                    $inner = $this->Custom_model->insert_data($ins_inner, COURSE_CATEGORIES_LANG);

                    $this->session->set_flashdata('success_message', 'Course category updated successfully.');
                    redirect(base_url() . 'admin/master/list_course_categories');
                } else {
                    $ins_data['category_name'] = $this->input->post('category_name');
                    $res = $this->Custom_model->edit_data($ins_data, array('course_category_id' => $category_id, 'language_id' => $selected_lang), COURSE_CATEGORIES_LANG);

                    $this->session->set_flashdata('success_message', 'Course category updated successfully.');
                    redirect(base_url() . 'admin/master/list_course_categories');
                }
            }
        }
        $partials = array('content' => 'master/edit_course_category', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    //*********** end course category ************//

}
