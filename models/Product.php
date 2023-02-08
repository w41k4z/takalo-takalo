<?php
class Product extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function create($category_id, $client_id, $name, $description, $estimated_price) {
        $request = sprintf("INSERT INTO product VALUES(NULL, '%s', '%s', '%s', '%s', %s)", $category_id, $client_id, $name, $description, $estimated_price);
        $this->db->query($request);
        return $this->db->query("SELECT MAX(product_id) AS product_id FROM product")->row()->product_id;
    }
    
    public function all_unknown_product() {
        $request = "SELECT product.*, category.category FROM product JOIN category ON product.category_id = category.category_id AND category.category = 'UNKNOWN';";
        $resultset = $this->db->query($request);
        $result = $resultset->result();
        $resultset->next_result();
        $resultset->free_result();
        return $result;
    }
    
    public function get_all_proposition($client_id) {
        $request = "SELECT product.*, client.name, client.first_name, client.contact FROM product JOIN client ON product.client_id = client.client_id WHERE product.client_id != ".$client_id;
        $resultset = $this->db->query($request);
        $result = $resultset->result();
        $resultset->next_result();
        $resultset->free_result();
        return $result;
    }
    
    public function get_product($client_id, $motif, $category) {
        $where_next = $category == 'all' ? '' : ' AND product.category_id = '.$category; 
        $request = "SELECT product.*, client.name, client.first_name, client.contact FROM product JOIN client ON product.client_id = client.client_id WHERE product.client_id != ".$client_id." AND product.description LIKE '%".$motif."%'".$where_next;
        $resultset = $this->db->query($request);
        $result = $resultset->result();
        $resultset->next_result();
        $resultset->free_result();
        return $result;
    }
}
?>