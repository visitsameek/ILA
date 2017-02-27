<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends MY_Controller {

    function __construct() {

        parent::__construct();
        $this->load->model('Custom_model');
		$this->load->helper('niceditor');

        if (!$this->session->userdata('user_data')) {
            redirect(base_url() . 'admin/login');
        }

    }    

    /* This function used to set some basic(global) settings for the site. */
    function general_settings()
    {
        $selected_lang = ($this->session->userdata('language'))?$this->session->userdata('language'):1;
        $data['selected_lang'] = $selected_lang;

        $basic_settings = $this->Custom_model->fetch_data(BASIC_SETTINGS,
            array('*' , BASIC_SETTINGS_LANG.'.*'),
            array(),
            array(BASIC_SETTINGS_LANG => BASIC_SETTINGS_LANG.'.settings_id='.BASIC_SETTINGS.'.id  AND '.BASIC_SETTINGS.'.id =1 AND '. BASIC_SETTINGS_LANG.'.language_id='.$selected_lang . '|left')
        );

        $data['settings'] = $basic_settings[0];//echo '<pre>';print_r($data['settings']);die;

        //$this->load->helper('custom_helper');
		//load_editor();//load niceditor

        //save data
        if($this->input->post('submit')){
            if ($this->input->post('site_address') == "") {
                $this->session->set_flashdata('error_message', 'Address should not be an empty.');
                redirect(base_url() . 'admin/settings/general_settings');
            }elseif ($this->input->post('site_email') == "") {
                $this->session->set_flashdata('error_message', 'Email should not be an empty.');
                redirect(base_url() . 'admin/settings/general_settings');
            }elseif ($this->input->post('site_contact_no') == "") {
                $this->session->set_flashdata('error_message', 'Contact No. should not be an empty.');
                redirect(base_url() . 'admin/settings/general_settings');
            }  else {
                $master_data = $details_data = array();
                $master_data['site_email'] = $this->input->post('site_email');
                $master_data['site_contact_no'] = $this->input->post('site_contact_no');
				$master_data['business_hours_weekdays'] = $this->input->post('business_hours_weekdays');
                $master_data['business_hours_saturday'] = $this->input->post('business_hours_saturday');
                $master_data['created_on'] = date('Y-m-d H:i:s');

                $details_data['site_address'] = $this->input->post('site_address');
                $details_data['content'] = $this->input->post('content');
                // save modified data to table
                $res = $this->Custom_model->edit_data($master_data, array('id'=>1), BASIC_SETTINGS);
                $res1 = $this->Custom_model->edit_data($details_data, array('id'=>$selected_lang, 'language_id' => $selected_lang), BASIC_SETTINGS_LANG);
                if ($res != FALSE && $res1 != FALSE) {
                    $this->session->set_flashdata('success_message', 'Settings updated successfully.');
                } else {
                    $this->session->set_flashdata('error_message', 'Error occurred! Please Try Again.');
                }
                redirect(base_url() . 'admin/settings/general_settings');
            }
        }

        $partials = array('content' => 'settings/general_settings', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

}
