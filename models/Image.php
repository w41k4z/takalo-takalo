<?php
class Image extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function create($product_id, $name) {
        $request = sprintf("INSERT INTO product_image VALUES(NULL, %s, '%s')", $product_id, $name);
        $this->db->query($request);
        return $this->db->query("SELECT MAX(image_id) AS image_id FROM product_image")->row()->image_id;
    }
}
?>