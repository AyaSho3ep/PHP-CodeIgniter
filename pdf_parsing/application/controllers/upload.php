<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class upload extends CI_Controller {

	public function index()
	{
		$this->load->view("uploadForm");
	}

	public function uploadFiles(){
		$config['upload_path'] = './uploads/';
		// $config['upload_path'] = base_url() . "uploads/";
        $config['allowed_types'] = 'pdf';
        $config['max_size']    = '10240';

        $this->load->library('upload', $config);
        
        $upload_error = array();
        
        for($i=0; $i<count($_FILES['usr_files']['name']); $i++)
        {
            $_FILES['userfile']['name']= $_FILES['usr_files']['name'][$i];
            $_FILES['userfile']['type']= $_FILES['usr_files']['type'][$i];
            $_FILES['userfile']['tmp_name']= $_FILES['usr_files']['tmp_name'][$i];
            $_FILES['userfile']['error']= $_FILES['usr_files']['error'][$i];
            $_FILES['userfile']['size']= $_FILES['usr_files']['size'][$i];
            
            if (!$this->upload->do_upload('usr_files'))
            {
                // fail
                $upload_error = array('error' => $this->upload->display_errors());
                $this->load->view('uploadForm', $upload_error);
                break;
            }
        }
        
        // success
        if ($upload_error == NULL)
        {
			$upload_data = $this->upload->data();
			$pdf_path = $upload_data['full_path'];
	
			$this->load->library('smalot/pdfParser/parser');
			$text = $this->parser->parseFile($pdf_path);
	
			$emails = $this->extractEmails($text);

			foreach ($emails as $email) {
				list($first_name, $last_name) = $this->extractNamesFromEmail($email);
				
				echo "Email: " . $email . "<br>";
				echo "First Name: " . $first_name . "<br>";
				echo "Last Name: " . $last_name . "<br>";
				echo "<br>";
			}

        }
	}	

	private function extractEmails($text) {
        $pattern = '/[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}/';
        preg_match_all($pattern, $text, $matches);
        return $matches[0];
    }

	private function extractNamesFromEmail($email) {

		$parts = explode('@', $email);
	
		if (count($parts) == 2) {

			return array($parts[0], $parts[1]);
		} else {

			return array($parts[0], null);
		}
	}


}
