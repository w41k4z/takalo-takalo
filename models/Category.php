<?php
class Category extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function create($category) {
        $request = sprintf("INSERT INTO category VALUES(NULL, '%s')", $category);
        $this->db->query($request);
        return $this->db->query("SELECT MAX(category_id) AS category_id FROM category")->row()->category_id;
    }
    
    public function get_all_category() {
        $resultset = $this->db->query("SELECT * FROM category");
        $result = $resultset->result();
        $resultset->next_result();
        $resultset->free_result();
        return $result;
    }
    
    public function delete($id) {
        $this->db->query("DELETE FROM product WHERE category_id = ".$id);
        $this->db->query("DELETE FROM category WHERE category_id = ".$id);
    }
}
?>