<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Custom_model');
		$this->load->helper('mailer');

		$this->lang->load('menu', $this->session->userdata('site_language'));
		$this->lang->load('home', $this->session->userdata('site_language'));
		$this->lang->load('why_choose_ila', $this->session->userdata('site_language'));
		$this->lang->load('footer', $this->session->userdata('site_language'));
    }

    
    function index()
    {	        
		$site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		$events = $this->Custom_model->fetch_data(EVENTS,
               array(
                   EVENTS.'.id',
                   EVENTS.'.event_date',
                   EVENTS.'.event_time',
                   EVENTS_LANG.'.title',
				   EVENTS_LANG.'.event_place',
                   MEDIA.'.url',
                   MEDIA.'.media_name',
                   MEDIA.'.extension',
                   MEDIA.'.raw_name'
                   ),
               array(EVENTS.'.isblocked'=>0, EVENTS.'.isdeleted'=>0),
               array(
                   EVENTS_LANG=>EVENTS_LANG.'.event_id='.EVENTS.'.id AND ' . EVENTS_LANG . '.language_id=' . $selected_lang,
                   MEDIA=>MEDIA.'.id='.EVENTS.'.media_id'),
			   $search = '', $order = EVENTS . '.created_on', $by = 'desc', 0, 1, $group_by = '', $having = '', $start = 0, $end = ''
		);
		$data['events'] = $events[0];
		//print_r($data['events']); exit;

		$news = $this->Custom_model->fetch_data(NEWS,
               array(
                   NEWS.'.id',
                   NEWS.'.news_date',
                   NEWS_LANG.'.title',
                   MEDIA.'.url',
                   MEDIA.'.media_name',
                   MEDIA.'.extension',
                   MEDIA.'.raw_name'
                   ),
               array(NEWS.'.isblocked'=>0, NEWS.'.isdeleted'=>0),
               array(
                   NEWS_LANG=>NEWS_LANG.'.news_id='.NEWS.'.id AND ' . NEWS_LANG . '.language_id=' . $selected_lang,
                   MEDIA=>MEDIA.'.id='.NEWS.'.media_id'),
			   $search = '', $order = NEWS . '.created_on', $by = 'desc', 0, 1, $group_by = '', $having = '', $start = 0, $end = ''
		);
		$data['news'] = $news[0];
		//print_r($data['news']); exit;

        $partials = array('content' => 'home_content', 'banner'=>'home_banner', 'menu'=>'menu', 'footer'=>'footer');
        $this->template->load('home_template', $partials, $data);
    }

	function set_language(){
        $language =  $this->input->post('language');        
        $this->session->set_userdata('site_language', $language);
        echo 1;
        exit;        
    }

	function contact_us()
    {        
        $site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		$contact = $this->Custom_model->fetch_data(BASIC_SETTINGS,
               array(
                   BASIC_SETTINGS.'.site_email',
				   BASIC_SETTINGS.'.site_contact_no',
                   BASIC_SETTINGS_LANG.'.site_address'
                   ),
               array(BASIC_SETTINGS.'.id'=>1),
               array(
                   BASIC_SETTINGS_LANG=>BASIC_SETTINGS_LANG.'.settings_id='.BASIC_SETTINGS.'.id AND ' . BASIC_SETTINGS_LANG . '.language_id=' . $selected_lang)
		);
		$data['contact'] = $contact[0];

        $partials = array('content' => 'site/contact_us_content', 'banner'=>'site/contact_us_banner', 'menu'=>'menu', 'footer'=>'footer');
        $this->template->load('home_template', $partials, $data);
    }

	function teachers()
    {        
        $site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		$data['all_teachers'] = $this->Custom_model->fetch_data(TEACHERS,
               array(
                   TEACHERS.'.id',
				   TEACHERS.'.country',
				   TEACHERS.'.img_url',
                   TEACHERS_LANG.'.first_name',
				   TEACHERS_LANG.'.last_name',
				   TEACHERS_LANG.'.certificate_details'
                   ),
               array(TEACHERS.'.isblocked'=>0, TEACHERS.'.isdeleted'=>0),
               array(
                   TEACHERS_LANG=>TEACHERS_LANG.'.teacher_id='.TEACHERS.'.id AND ' . TEACHERS_LANG . '.language_id=' . $selected_lang),
			   $search = '', $order = TEACHERS_LANG . '.first_name', $by = 'asc'
		);
		//print_r($data['all_teachers']); exit;

		$data['teachers'] = $this->Custom_model->fetch_data(TEACHERS,
               array(
                   TEACHERS.'.id',
				   TEACHERS.'.country',
				   TEACHERS.'.img_url',
                   TEACHERS_LANG.'.first_name',
				   TEACHERS_LANG.'.last_name',
				   TEACHERS_LANG.'.certificate_details'
                   ),
               array(TEACHERS.'.isblocked'=>0, TEACHERS.'.isdeleted'=>0),
               array(
                   TEACHERS_LANG=>TEACHERS_LANG.'.teacher_id='.TEACHERS.'.id AND ' . TEACHERS_LANG . '.language_id=' . $selected_lang),
			   $search = '', $order = TEACHERS_LANG . '.first_name', $by = 'asc', 1, 5
		);

        $partials = array('content' => 'site/teacher_content', 'banner'=>'site/teacher_banner', 'menu'=>'menu', 'footer'=>'footer');
        $this->template->load('home_template', $partials, $data);
    }

	function teacher_details($teacher_id=null)
    {        
        $site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		$teacher_details = $this->Custom_model->fetch_data(TEACHERS,
               array(
                   TEACHERS.'.id',
				   TEACHERS.'.country',
				   TEACHERS.'.img_url',
                   TEACHERS_LANG.'.first_name',
				   TEACHERS_LANG.'.last_name',
				   TEACHERS_LANG.'.certificate_details',
				   TEACHERS_LANG.'.content'
                   ),
               array(TEACHERS.'.id'=>$teacher_id),
               array(
                   TEACHERS_LANG=>TEACHERS_LANG.'.teacher_id='.TEACHERS.'.id AND ' . TEACHERS_LANG . '.language_id=' . $selected_lang)
		);
		$data['teacher_details'] = $teacher_details[0];

        $partials = array('content' => 'site/teacher_details_content', 'banner'=>'site/teacher_details_banner', 'menu'=>'menu', 'footer'=>'footer');
        $this->template->load('home_template', $partials, $data);
    }

	function centers($city_id=null)
    {        
        $site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		$city = $this->Custom_model->fetch_data(CITIES,
               array(
                   CITIES.'.lat',
				   CITIES.'.long',
                   CITIES_LANG.'.city_name'
                   ),
               array(CITIES.'.id'=>$city_id),
               array(
                   CITIES_LANG=>CITIES_LANG.'.city_id='.CITIES.'.id AND ' . CITIES_LANG . '.language_id=' . $selected_lang)
		);
		$data['city_name'] = $city[0]->city_name;
		$data['lat'] = $city[0]->lat;
		$data['long'] = $city[0]->long;

		$data['city_id'] = $city_id;

		$data['city_list'] = $this->Custom_model->fetch_data(CITIES,
               array(
				   CITIES.'.id',
                   CITIES_LANG.'.city_name'
                   ),
               array(),
               array(
                   CITIES_LANG=>CITIES_LANG.'.city_id='.CITIES.'.id AND ' . CITIES_LANG . '.language_id=' . $selected_lang)
		);

		$data['centers'] = $this->Custom_model->fetch_data(TRAINING_CENTERS,
               array(
                   TRAINING_CENTERS.'.phone',
				   TRAINING_CENTERS.'.email_id',
                   TRAINING_CENTERS_LANG.'.title',
				   TRAINING_CENTERS_LANG.'.address',
                   MEDIA.'.url',
                   MEDIA.'.media_name',
                   MEDIA.'.extension',
                   MEDIA.'.raw_name'
                   ),
               array(TRAINING_CENTERS.'.city_id'=>$city_id),
               array(
                   TRAINING_CENTERS_LANG=>TRAINING_CENTERS_LANG.'.center_id='.TRAINING_CENTERS.'.id AND ' . TRAINING_CENTERS_LANG . '.language_id=' . $selected_lang,
				   MEDIA=>MEDIA.'.id='.TRAINING_CENTERS.'.media_id')
		);

        $partials = array('content' => 'site/centers_content', 'banner'=>'site/centers_banner', 'menu'=>'menu', 'footer'=>'footer');
        $this->template->load('center_template', $partials, $data);
    }	

	function get_map_data($city_id=null)
    {
		// Start XML file, create parent node
		$dom = new DOMDocument("1.0");
		$node = $dom->createElement("markers");
		$parnode = $dom->appendChild($node);			

		$site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		if(!empty($city_id))
			$where_condn = array(TRAINING_CENTERS.'.city_id'=>$city_id, TRAINING_CENTERS.'.isblocked'=>0, TRAINING_CENTERS.'.isdeleted'=>0);
		else
			$where_condn = array(TRAINING_CENTERS.'.isblocked'=>0, TRAINING_CENTERS.'.isdeleted'=>0);

		$centers = $this->Custom_model->fetch_data(TRAINING_CENTERS,
               array(
				   TRAINING_CENTERS.'.phone',
                   TRAINING_CENTERS_LANG.'.title',
				   TRAINING_CENTERS_LANG.'.address',
                   ),
               $where_condn,
               array(
                   TRAINING_CENTERS_LANG=>TRAINING_CENTERS_LANG.'.center_id='.TRAINING_CENTERS.'.id AND ' . TRAINING_CENTERS_LANG . '.language_id=' . $selected_lang)
		);
		//print_r($centers); exit;
		
		header("Content-type: text/xml");

		// Iterate through the rows, adding XML nodes for each
		if(!empty($centers))
		{
			foreach($centers AS $rec)
			{
				  if(!empty($rec->address)) {
					  $record = $this->getLatLong($rec->address);
				  }

				  // Add to XML document node
				  $node = $dom->createElement("marker");
				  $newnode = $parnode->appendChild($node);

				  $newnode->setAttribute("name", $rec->title);
				  $newnode->setAttribute("phone", $rec->phone);
				  $newnode->setAttribute("address", $rec->address);
				  $newnode->setAttribute("lat", $record['latitude']);
				  $newnode->setAttribute("lng", $record['longitude']);
				  //$newnode->setAttribute("type", $row['type']);
			}
		}
		echo $dom->saveXML();
	}

	function getLatLong($address) {
		$record['latitude'] = 0;
		$record['longitude'] = 0;

		if(!empty($address)) {
			//Formatted address
		    $formattedAddr = str_replace(' ', '+', $address);

		    //Send request and receive json data by address
		    $json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$formattedAddr&sensor=false");
		    $json = json_decode($json);

		    if(!empty($json->{'results'}))
		    {
			    $record['latitude'] = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
			    $record['longitude'] = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
		    }
		}
		return $record;
	}	
	
	function request_callback()
    {        
        $site_language = $this->session->userdata('site_language');
        $selected_lang = isset($site_language) ? ($site_language == 'english' ? 1 : 2) : 1;
        $data['selected_lang'] = $selected_lang;

		if($this->input->post('btnSubmit')) { 
          
          if($this->input->post('first_name') == ""){
              $this->session->set_flashdata('error_message', 'Please enter First Name');
              redirect(base_url() . 'request-callback');
          }else if($this->input->post('last_name') == ""){
              $this->session->set_flashdata('error_message', 'Please enter Last Name');
              redirect(base_url() . 'request-callback');
          }else if($this->input->post('phone') == ""){
              $this->session->set_flashdata('error_message', 'Please enter Phone');
              redirect(base_url() . 'request-callback');
          }else if($this->input->post('email_id') == ""){
              $this->session->set_flashdata('error_message', 'Please enter Email Address');
              redirect(base_url() . 'request-callback');
          }else{
              $ins_data['first_name'] = $this->input->post('first_name');
              $ins_data['last_name'] = $this->input->post('last_name');
              $ins_data['preffered_call_date'] = $this->input->post('preffered_call_date');
              $ins_data['preffered_call_time'] = $this->input->post('preffered_call_time');
              $ins_data['phone'] = $this->input->post('phone');
              $ins_data['email_id'] = $this->input->post('email_id');
              $ins_data['user_type'] = 2;
              $ins_data['created_on'] = date('Y-m-d');              
              
              $res = $this->Custom_model->insert_data($ins_data, USERS);
              if($res!=FALSE){
				   $mail_temp = $this->Custom_model->fetch_data(EMAIL_TEMPLATE, array('subject', 'content', 'mailto'), array('slug'=>'callback'), array());

				  /************* mail to user *************/
				  $mailTo         = $this->input->post('email_id');
				  $mailFrom       = $mail_temp[0]->mailto;
				  $subject        = $mail_temp[0]->subject;
				  $mailcontain    = $mail_temp[0]->content;

				  send_mail($mailTo, $mailFrom, $subject, $mailcontain);

				  /************* mail to user ends *************/

				  /************* mail to admin *************/
				  $mailTo         = $mail_temp[0]->mailto;
				  $mailFrom       = MAIL_FROM;
				  $subject        = $mail_temp[0]->subject;
				  $mailcontain    = "An user with Email id: ".$this->input->post('email_id')." has just requested for a callback.";

				  send_mail($mailTo, $mailFrom, $subject, $mailcontain);

				  /************* mail to admin ends *************/

                  $this->session->set_flashdata('success_message', 'Request sent successfully.');
                  redirect(base_url() . 'request-callback');
              }else{
                  $this->session->set_flashdata('error_message', 'Error Occurred! Please try again.');
                  redirect(base_url() . 'request-callback');
              }
           }
          
        }

        $partials = array('content' => 'site/request_callback_content', 'menu'=>'menu', 'footer'=>'footer');
        $this->template->load('home_template', $partials, $data);
    }

	function newsletter_subscribe()
    {          
	  if($this->input->post('newsletter_email') == ""){
		  echo 0;
	  }else{
		  $ins_data['email_id'] = $this->input->post('newsletter_email');
		  $ins_data['created_on'] = date('Y-m-d');              
		  
		  $res = $this->Custom_model->insert_data($ins_data, NEWSLETTER_USERS);
		  if($res!=FALSE){
			  echo 1;
		  }else{
			  echo 2;
		  }
	   } 
	   exit;
    }

	function error_page()
	{
        $this->template->load('error_template');
	}
    
}
