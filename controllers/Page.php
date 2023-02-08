<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{
	public function index()
	{
        if($this->session->has_userdata('user')) {
            $this->load->view($this->session->user_data('user')->is_admin ? 'admin-area/admin' : 'client-area/client');
        } else {
            redirect(base_url('index.php/connection/login/'));
        }
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
    
    public function add_category() {
        $this->category->create($this->input->post('category'));
        redirect(base_url("index.php/page/admin/"));
    }
    
    public function delete_category($id) {
        $this->category->delete($id);
        redirect(base_url("index.php/page/admin/"));
    }
}