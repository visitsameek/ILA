<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Custom_model');

		$this->lang->load('menu', $this->session->userdata('site_language'));
    }

    
    function index()
    {	        
		$site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

        $partials = array('content' => 'home_content', 'banner'=>'home_banner', 'menu'=>'menu', 'footer'=>'footer');
        $this->template->load('home_template', $partials, $data);
    }

	function set_language(){
        $language =  $this->input->post('language');        
        $this->session->set_userdata('site_language', $language);
        echo 1;
        exit;        
    }
    
}
