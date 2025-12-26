<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductModel extends CI_Model {

    private $table = 'products'; // Nama tabel di database

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

        

    public function fetchAll()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function fetchRandom($count = 10)
    {
        $this->db->order_by('id', 'RANDOM');
        return $this->db->get($this->table, $count)->result_array();
    }

    public function fetchById($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row_array();
    }

    public function fetchByLinkName($link_name)
    {
        return $this->db->get_where($this->table, ['link_name' => $link_name])->row_array();
    }

    public function search($by, $keyword)
    {
        $this->db->like($by, $keyword);
        return $this->db->get($this->table)->result_array();
    }

    public function update($data)
    {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id', $data['id']);
        return $this->db->update($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, ['id' => $id]);
    }
}
