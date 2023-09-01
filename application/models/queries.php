<?php
class queries extends CI_Model
{
	public function insertContact($data)
	{
		return $this->db->insert('contacts', $data);
	}

	public function getContacts()
	{
		$contacts = $this->db->get('contacts');
		return $contacts->result();
	}
	
	public function editContact($id)
	{
		$this->db->where(['contacts.id'=>$id]);
		$contact = $this->db->get('contacts');
		return $contact->row();
	}

	public function updateContact($data, $id){
		return $this->db->where('id', $id)->update('contacts', $data);
	}

	public function deleteContact($id){
		return $this->db->delete('contacts', ['id'=> $id]);
	}
}
?>
