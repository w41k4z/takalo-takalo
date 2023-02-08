<?php
class Account extends CI_Model {    
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function create($client_id, $password, $mail, $is_admin) {
        $request = sprintf("INSERT INTO account VALUES(NULL, '%s', '%s', '%s', '%s')", $client_id, $password, $mail, $is_admin);
        $this->db->query($request);
        return $this->db->query("SELECT MAX(account_id) AS account_id FROM account")->row()->account_id;
    }
}
?>