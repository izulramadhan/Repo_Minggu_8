<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model
{
    private $_table = "kategori";

    public $kategori_id;
    public $name;

    public function rules()
    {
        return [
            ['field' => 'name',
            'label' => 'Name',
            'rules' => 'required'],
        ];

    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["kategori_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->kategori_id = uniqid();
        $this->name = $post["name"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->kategori_id = $post["id"];
        $this->name = $post["name"];
        return $this->db->update($this->_table, $this, array('kategori_id' => $post['id']));
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("kategori_id" => $id));
    }

}