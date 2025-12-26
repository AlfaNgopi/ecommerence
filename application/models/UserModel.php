<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    private $table = 'users'; // Nama tabel di database

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

        

    public function fetchAll()
    {
        return $this->db->get($this->table)->result_array();
    }

    

    public function fetchById($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row_array();
    }

    public function search($by, $keyword)
    {
        $this->db->like($by, $keyword);
        return $this->db->get($this->table)->result_array();
    }

    public function create($data)
    {
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        return $this->db->insert($this->table, $data);
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
