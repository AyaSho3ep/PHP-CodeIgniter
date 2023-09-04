<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContactController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->model('queries');
		$contacts = $this->queries->getContacts();
		$this->load->view('contacts', ['contacts'=>$contacts]);
	}

	public function add(){
		$this->load->view('addContact');
	}

	public function createContact(){
		$this->form_validation->set_rules('f_name','First name', 'required');
		$this->form_validation->set_rules('l_name', 'Last name', 'required');
		$this->form_validation->set_rules('email', 'Email','required');
		$this->form_validation->set_rules('phone', 'Phone','required');
		$this->form_validation->set_rules('remarks', 'Remarks','required');
		$this->form_validation->set_rules('status', 'Status','required');
		
		$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

		if($this->form_validation->run()){
			$data = $this->input->post();
			// echo '<pre>';
			// print_r($data);
			// echo '</pre>';
			$this->load->model('queries');
			if($this->queries->insertContact($data)){
				$this->session->set_flashdata('message', 'Contact Added Successfully');				
			}else{
				$this->session->set_flashdata('message', 'Something went wrong, try again!');
			}
			return redirect("contacts");
		}else{
			$this->add();
		}
	}

	public function edit($id){
		$this->load->view('editContact');
	}
	
	public function editContact($id){
		$this->load->model('queries');
		$contactData = $this->queries->editContact($id);
		$this->load->view('editContact', ['contactData'=>$contactData]);
	}

	public function updateContact($id)
	{
		$this->form_validation->set_rules('f_name','First name', 'required');
		$this->form_validation->set_rules('l_name', 'Last name', 'required');
		$this->form_validation->set_rules('email', 'Email','required');
		$this->form_validation->set_rules('phone', 'Phone','required');
		$this->form_validation->set_rules('remarks', 'Remarks','required');
		$this->form_validation->set_rules('status', 'Status','required');
		
		$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

		if($this->form_validation->run()){
			$data = $this->input->post();
			$this->load->model('queries');
			if($this->queries->updateContact($data, $id)){
				$this->session->set_flashdata('message', 'Contact Updated Successfully');				
			}else{
				$this->session->set_flashdata('message', 'Something went wrong, try again!');
			}
			return redirect("contacts");
		}else{
			$this->editContact($id);
		}

	}

	public function deleteContact($id) {
		$this->load->model('queries');
		if($this->queries->deleteContact($id)){
			return redirect('contacts');
		}
	}
}
