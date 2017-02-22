<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

	function do_upload()
    {

        // If it is a upload POST request
        if($this->input->server('REQUEST_METHOD') == 'POST') {

            // Attempt upload
            if ( ! $this->upload->do_upload('nicImage')) {

                // Return any errors
                $data = $this->nic_output(array('error' => $this->upload->display_errors()));

            } else {

                // Upload success
                $upload = array('upload_data' => $this->upload->data());

                $status['done']  = 1;
                $status['width'] = $upload['upload_data']['image_width'];
                $status['url']   = base_url().'uploads/'.$upload['upload_data']['file_name'];

                // Return upload info to nicEdit
                $data = $this->nic_output($status);

            }

        // Else if it is a check for progress GET request, return 'no progress'
        } else if(isset($_GET['check'])) {

            $status['noprogress'] = true;
            $data = $this->nic_output($status);

        }

        return $this->output->set_output($data);

    }

    // Send message back to nicUpload
    function nic_output($status) {

        $script = 'try {'.(($this->input->server('REQUEST_METHOD') == 'POST') ? 'top.' : '').'nicUploadButton.statusCb('.json_encode($status).');} catch(e) { alert(e.message); }';
        
        if($this->input->server('REQUEST_METHOD') == 'POST') {

            return '<script>'.$script.'</script>';

        } else {

            return $script;

        }

    }