<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_products extends CI_Model
{
    private $_table = "products";

    public $product_id;
    public $name;
    public $price;
    public $image = "default.jpg";
    public $description;

    public function rules()
    {
        return [
            ['field' => 'name',
            'label' => 'Name',
            'rules' => 'required'],

            ['field' => 'price',
            'label' => 'Price',
            'rules' => 'numeric'],
            
            ['field' => 'description',
            'label' => 'Description',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
    $this->load->library('pagination'); // Load libraripaginationnya
    $query = "SELECT * FROM products"; // Query untuk menampilkansemua data siswa
    $config['base_url'] = base_url("index.php/admin/products");
    $config['total_rows'] = $this->db->query($query)->num_rows();
    $config['per_page'] = 3;
    $config['uri_segment'] = 3;
    $config['num_links'] = 3;
    // Style Pagination
    // Agar bisa mengganti stylenya sesuai class2 yg ada dibootstrap
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        // End style pagination
    
    $this->pagination->initialize($config); // Set konfigurasipaginationnya
    $page = ($this->uri->segment($config['uri_segment'])) ?$this->uri->segment($config['uri_segment']) : 0;
    $query .= " LIMIT ".$page.", ".$config['per_page'];
    $data['limit'] = $config['per_page'];
    $data['total_rows'] = $config['total_rows'];
    $data['pagination'] = $this->pagination->create_links(); //Generate link pagination nyasesuai config diatas
    $data['products'] = $this->db->query($query)->result();
    return $data;
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["product_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->product_id = uniqid();
        $this->name = $post["name"];
        $this->price = $post["price"];
        $this->image = $this->_uploadImage();
        $this->description = $post["description"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->product_id = $post["id"];
        $this->name = $post["name"];
        $this->price = $post["price"];
        if(!empty($_FILES["image"]["name"])){
            $this->image = $this->_uploadImage();
        }else{
            $this->image = $post["old_image"];
        }
        $this->description = $post["description"];
        return $this->db->update($this->_table, $this, array('product_id' => $post['id']));
    }

    public function delete($id)
    {
        
        return $this->db->delete($this->_table, array("product_id" => $id));
    }

    private function _uploadImage(){
        $config['upload_path']          = './gambar/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->product_id;
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
    
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }
        
        return "default.jpg";
    }

   
}