<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        session_start();
        if(!isset($_SESSION['user'])) {
            redirect(base_url('index.php/connection/login/'));
        }
    }
    
    public function index() {
        redirect($_SESSION['user']->is_admin ? base_url('index.php/page/admin/home') : base_url('index.php/page/client/home'));
    }
    
    
    public function admin($content = 'home') {
        $data = array();
        $data['all_unknown_product'] = $this->product->all_unknown_product();
        $data['all_category'] = $this->category->get_all_category();
        $data['all_user'] = $this->client->get_all_client();
        $data['all_exchange'] = $this->exchange->get_all_exchange();
           
        $this->load->view('admin-area/admin', $data);
        $this->load->view('admin-area/content/'.$content);
    }
    
    public function client($content = 'home') {
        
        $data = array();
        $data['all_proposition'] = $this->product->get_all_proposition($_SESSION['user']->client_id); 
        $data['all_category'] = $this->category->get_all_category();
        if($this->input->post('motif') != null && $this->input->post('category') != null) {
            $data['all_result_found'] = $this->product->get_product($_SESSION['user']->client_id, $this->input->post('motif'), $this->input->post('category'));
        }
        $data['all_user_product'] = $this->client->get_user_product($_SESSION['user']->client_id);
        
        
        $this->load->view('client-area/client', $data);
        $this->load->view('client-area/content/'.$content);
        $this->load->view('client-area/footer');
    }
    
    public function add_category() {
        $this->category->create($this->input->post('category'));
        redirect(base_url("index.php/page/admin/"));
    }
    
    public function add_product() {
        $category_id = $this->input->post('category');
        $client_id = $_SESSION['user']->client_id;
        $name = $this->input->post('name');
        $description = $this->input->post('description');
        $estimated_price = $this->input->post('estimated_price');
        
        $new_product_id = $this->product->create($category_id, $client_id, $name, $description, $estimated_price);
        
        $file_count = count($_FILES['file']['name']);

        $img_string = "";

        for ($i = 0; $i < $file_count; $i++) {
            $filename = $_FILES['file']['name'][$i];
            if (in_array(strchr($filename, "."), array('.png', '.jpg', '.jpeg', '.PNG', '.JPG', '.JPEG'))) {
                move_uploaded_file($_FILES['file']['tmp_name'][$i], base_url('aassets/img/client/'.$filename));
                $this->image->create($new_product_id, $filename);
                $img_string .= $filename;

                if ($i < $file_count - 1) {
                    $img_string .= ",";
                }
            }
        }
        
        redirect(basename("index.php/page/client/profil"));
    }
    
    public function delete_category($id) {
        $this->category->delete($id);
        redirect(base_url("index.php/page/admin/"));
    }
    
    public function deconnection() {
        session_destroy();
        redirect(base_url('index.php/connection/login/'));
    }
}