<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_aktifitas extends CI_Model
{
    private $_table = "produk_hapus";

    public $product_id;
    public $name;
    public $price;
    public $image = "default.jpg";
    public $description;
    public $tgl_hapus;
    public $user;

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
            'rules' => 'required'],

            ['field' => 'tgl_hapus',
            'label' => 'Tanggal',
            'rules' => 'date(format)'],

            ['field' => 'user',
            'label' => 'User',
            'rules' => 'user']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["product_id" => $id])->row();
    }

   

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("product_id" => $id));
    }
   private function _deleteImage($id){
        $aktifitas = $this->getById($id);
        if ($aktifitas->image != "default.jpg") {
            $filename = explode(".", $aktifitas->image)[0];
            return array_map('unlink', glob(FCPATH."gambar/$filename.*"));
        }
    }
}