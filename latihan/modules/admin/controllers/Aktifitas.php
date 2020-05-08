<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Aktifitas extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_aktifitas");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["aktifitas"] = $this->m_aktifitas->getAll();
        $this->load->view("admin/aktifitas/list", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->m_aktifitas->delete($id)) {
            redirect(base_url('admin/aktifitas'));
        }
    }
}