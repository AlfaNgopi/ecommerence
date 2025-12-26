<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Homepage Controller
 * @property ProductModel $ProductModel
 * @property ProductVariantModel $ProductVariantModel
 * @property UserModel $UserModel
 * 
 * @property CI_Session $session
 * 
 * @property CI_Input $input
 * 
 * @property CI_Pagination $pagination
 */


class Homepage extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProductModel');
        $this->load->model('ProductVariantModel');
        $this->load->model('UserModel');

        $this->load->helper('dd');
        $this->load->library('session');
    }

	public function index()
	{

        // get product from database
        $products = $this->ProductModel->fetchRandom(10);
        foreach ($products as &$product) {
            $product['variants'] = $this->ProductVariantModel->fetchByProductId($product['id']);
        }


        // get user from session
        $user_id = $this->session->userdata('user_id');
        $user = $this->UserModel->fetchById($user_id);

        $data = [
            'products' => $products,

            'user_id' => $user_id,
            'user' => $user,
            'title' => 'Homepage',
        ];

        // dd($data);



		$this->load->view('homepage', $data);
	}
}
