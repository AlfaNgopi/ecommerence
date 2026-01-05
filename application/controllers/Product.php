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


class Product extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProductModel');
        $this->load->model('ProductVariantModel');
        $this->load->model('UserModel');

        $this->load->helper('dd');
        $this->load->library('session');
    }

	public function index($link_name)
	{

        // get user from session
        $user_id = $this->session->userdata('user_id');
        $user = $this->UserModel->fetchById($user_id);

        // get product from database
        $product = $this->ProductModel->fetchByLinkName($link_name);
        if ($product) {
            // get variants
            $variants = $this->ProductVariantModel->fetchByProductId($product['id']);
            $product['variants'] = $variants;
        } else {
            show_404();
        }


        

        $data = [
            'product' => $product,

            'user_id' => $user_id,
            'user' => $user,
            'title' => 'Product Detail - ' . $product['name'],
        ];

        // dd($data);



		$this->load->view('product', $data);
	}
}
