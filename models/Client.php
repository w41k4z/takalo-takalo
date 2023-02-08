<?php
class Client extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function get_user_by_id($id) {
        $resultset = $this->db->query("SELECT * FROM client WHERE client_id = " . $id);
        return $resultset->num_rows() == 1 ? $resultset->row() : null;
    }
    
    public function logIn($password, $mail) {
        $request = sprintf("SELECT *, account.is_admin FROM client JOIN account ON client.client_id = account.client_id WHERE account.password = '%s' AND account.mail = '%s' LIMIT 1", $password, $mail);
        $resultset = $this->db->query($request);
        return $resultset->num_rows() == 1 ? $resultset->row() : null; 
    }
    
    public function create($name, $first_name, $contact) {
        $request = sprintf("INSERT INTO client VALUES(NULL, '%s', '%s', '%s')", $name, $first_name, $contact);
        $this->db->query($request);
        return $this->db->query("SELECT MAX(client_id) AS client_id FROM client")->row()->client_id;
    }
    
    public function get_all_client() {
        $resultset = $this->db->query("SELECT client.*, account.is_admin FROM client JOIN account ON account.client_id = client.client_id WHERE account.is_admin = FALSE");
        $result = $resultset->result();
        $resultset->next_result();
        $resultset->free_result();
        return $result;
    }
}
?>