<?php
class Exchange extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function create($client1, $client2) {
        $request = sprintf("INSERT INTO exchange VALUES(NULL, %s, %s, NOW())", $client1, $client2);
        $this->db->query($request);
        return $this->db->query("SELECT MAX(exchange_id) AS exchange_id FROM exchange")->row()->exchange_id;
    }
    
    public function get_all_exchange() {
        $resultset = $this->db->query("SELECT exchange.exchange_date, clt1.name as name1, clt2.name as name2 FROM exchange JOIN client clt1 ON clt1.client_id = exchange.client1 JOIN client clt2 ON clt2.client_id = exchange.client2");
        $result = $resultset->result();
        $resultset->next_result();
        $resultset->free_result();
        return $result;
    }
}
?>