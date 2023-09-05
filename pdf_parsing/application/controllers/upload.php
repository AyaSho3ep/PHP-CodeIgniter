<?php

defined('BASEPATH') or exit('No direct script access allowed');
class upload extends CI_Controller
{

	public function index()
	{
		$this->load->view("uploadForm");
	}

	public function uploadFiles()
	{

		$data = [];
		$upload_error = array();

		$count = count($_FILES['files']['name']);

		for ($i = 0; $i < $count; $i++) {

			if (!empty($_FILES['files']['name'][$i])) {

				$_FILES['file']['name'] = $_FILES['files']['name'][$i];
				$_FILES['file']['type'] = $_FILES['files']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
				$_FILES['file']['error'] = $_FILES['files']['error'][$i];
				$_FILES['file']['size'] = $_FILES['files']['size'][$i];

				$config['upload_path'] = 'uploads/';
				$config['allowed_types'] = 'pdf';
				$config['max_size'] = '1024';
				$config['file_name'] = $_FILES['files']['name'][$i];

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('file')) {
					$upload_error = array('error' => $this->upload->display_errors());
					$this->load->view('uploadForm', $upload_error);
					break;
				}

				if ($upload_error == NULL && $this->upload->do_upload('file')) {
					$uploadData = $this->upload->data();

					$filename = $uploadData['file_name'];

					$data['totalFiles'][] = $filename;

					$pdf_path = $uploadData['full_path'];

					$this->load->library('pdfparser');

					$text = $this->pdfparser->parsePdf($pdf_path)->getText();
					$emails = $this->extractEmails($text);

					echo '
					<div class= "container my-5 bg-dark text-center">

					<table class="table table-dark">
					<thead>
					  <tr>
						<th scope="col">File Name</th>
						<th scope="col">Email</th>
						<th scope="col">First name</th>
						<th scope="col">Last name</th>
					  </tr>
					</thead>
					<tbody>';
					foreach ($emails as $email) {
						list($first_name, $last_name) = $this->extractNamesFromEmail($email);
						echo '
						<tr>
							<td>' . $filename . '</td>
							<td>' . $email . '</td>
							<td>' . $first_name . '</td>
							<td>' . $last_name . '</td>
						</tr>';
					}
					echo '
						</tbody>
					  </table></div>
					';
				}
			}
		}
		$this->load->view('UploadForm');
	}



	private function extractEmails($text)
	{
		$pattern = '/[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}/';
		preg_match_all($pattern, $text, $matches);
		return $matches[0];
	}

	private function extractNamesFromEmail($email)
	{

		$pattern = '/^(\w+)\.(\w+)@/';

		if (preg_match($pattern, $email, $matches)) {
			$firstName = ucfirst($matches[1]);
			$lastName = isset($matches[2]) ? ucfirst($matches[2]) : null;

			return array($firstName, $lastName);
		} else {
			return array('error' => 'Invalid email format');
		}
	}
}
