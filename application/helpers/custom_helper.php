<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function get_all_language(){
    $CI =& get_instance();
    $CI->load->model('Custom_model');
    return $language = $CI->Custom_model->fetch_data(LANGUAGE,array('*'),array());


}

function get_admin_username($id)
{
    $CI =& get_instance();
    $CI->load->model('Custom_model');
    return $user_name = $CI->Custom_model->fetch_data(ADMIN, array('name', 'user_name'), array('id' => $id));
}

    /*
    * This function is used to load ckeditor for admin use.
    * @author : Poorvi Gandhi
    * @since : Nov 2016
    * @version : 4.6.0//ckeditor
    */
    function load_editor()
    {
		$config['upload_path']   = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';

        $CI = get_instance();

		$CI->load->library('upload', $config);

        $CI->output->enable_profiler(FALSE);
    }

    /* This function is used to grab video id from youtube embeded code
     * $embeded_code : embeded YouYube code
     * @author : Poorvi Gandhi
     * @since : 09th dec 2016
     */
    function get_youtube_video_id($embeded_code)
    {
        if($embeded_code == '')
            return false;

        $pattern = '/embed\/([\w+\-+]+)[\"\?]/';
        preg_match($pattern, $embeded_code, $matches);
        return @$matches[1];
    }

    /* This function is used to get youtube video thumb from youtube embeded code
     * $embeded_code : embeded YouYube code
     * $thumb_name : type of thumb. [check list of thumb at https://www.sitepoint.com/youtube-video-thumbnail-urls/]
     * @author : Poorvi Gandhi
     * @since : 09th dec 2016
     */
    function youtube_video_thumb($embeded_code, $thumb_name='hqdefault.jpg')
    {
        $img_src = '';
        $video_id = get_youtube_video_id($embeded_code);
        if($video_id != ''){
            $video_url = "http://img.youtube.com/vi/".$video_id."/".$thumb_name;
			/*$curl = curl_init();
			curl_setopt_array($curl, array(    
				CURLOPT_URL => $video_url,
				CURLOPT_HEADER => true,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_NOBODY => true));

			$header = explode("\n", curl_exec($curl));
			curl_close($curl);
			print_r($header); exit;*/

            $check_img_exist = get_headers($video_url);
            $returned_res = '';
            if(!empty($check_img_exist)){
                $returned_res = $check_img_exist[0];
            }
            if(strpos($returned_res, '200') ){
                $img_src = $video_url;
            }
        }
        return $img_src;
    }
    
    
    function get_best_of_best(){
        $CI = get_instance();
        $awards = $CI->Custom_model->fetch_data(AWARD,
                array(
                    AWARD.'.*',
                    AWARD_PARTNER.'.award_id',
                    AWARD_PARTNER.'.partner_id'
                    ),
                array(),
                array(AWARD_PARTNER=>AWARD_PARTNER.'.award_id='.AWARD.'.id'));
        $final_arr=array();
        if(!empty($awards)){
            foreach($awards as $item){
                if(!isset($final_arr[$item->type])){
                    $final_arr[$item->type] = array();
                }
                array_push($final_arr[$item->type], $item);
            }
        }
        return $final_arr;
    }

	function get_wellness_type(){
        $CI = get_instance();
        $wellness_types = $CI->Custom_model->fetch_data(WELLNESS_TYPE,
            array(WELLNESS_TYPE.'.id', WELLNESS_TYPE_LANG.'.type_name'),
            array(),
            array(WELLNESS_TYPE_LANG => WELLNESS_TYPE_LANG.'.wellness_type_id='.WELLNESS_TYPE.'.id'),
            array(), WELLNESS_TYPE.'.id', 'ASC'
        );
        return $wellness_types;
    }

	function get_continents(){
        $CI = get_instance();
        $continents = $CI->Custom_model->fetch_data(CONTINENT,
            array(CONTINENT.'.id', CONTINENT_LANG.'.continent'),
            array(),
            array(CONTINENT_LANG => CONTINENT_LANG.'.continent_id='.CONTINENT.'.id'),
            array(), CONTINENT_LANG.'.continent', 'ASC'
        );
        return $continents;
    }

	function get_countries(){
        $CI = get_instance();
        $countries = $CI->Custom_model->fetch_data(COUNTRIES,
            array('*'),
            array(),
            array(),
            array(), COUNTRIES.'.nicename', 'ASC'
        );
        return $countries;
    }