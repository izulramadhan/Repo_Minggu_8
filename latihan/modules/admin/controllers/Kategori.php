<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_kategori");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["kategori"] = $this->m_kategori->getAll();
        $this->load->view("admin/kategori/list", $data);
    }

    public function add()
    {
        $kategori = $this->m_kategori;
        $validation = $this->form_validation;
        $validation->set_rules($kategori->rules());

        if ($validation->run()) {
            $kategori->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/kategori/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/kategori');
       
        $kategori = $this->m_kategori;
        $validation = $this->form_validation;
        $validation->set_rules($kategori->rules());

        if ($validation->run()) {
            $kategori->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["kategori"] = $kategori->getById($id);
        if (!$data["kategori"]) show_404();
        
        $this->load->view("admin/kategori/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->m_kategori->delete($id)) {
            redirect(base_url('admin/kategori'));
        }
    }
}