<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Auth Controller
 * @property UserModel $UserModel
 * 
 * @property CI_Session $session
 * 
 * @property CI_Input $input
 * 
 * @property CI_Pagination $pagination
 */


class Auth extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');

        $this->load->helper('dd');
        $this->load->library('session');
    }

	public function index()
	{

        $data = [
            


            'title' => 'Login',
        ];

        // dd($data);



		$this->load->view('login', $data);
	}

    public function login()
	{

        $data = [
            


            'title' => 'Login',
        ];

        // dd($data);



		$this->load->view('login', $data);
	}

    public function register()
	{

        $data = [
            


            'title' => 'Register',
        ];

        // dd($data);


        



		$this->load->view('register', $data);
	}

    public function actionLogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Proses autentikasi (contoh sederhana)
        $users = $this->UserModel->search('username', $username);
        if (!empty($users)) {
            $user = $users[0];
            if (password_verify($password, $user['password'])) {
                // Login berhasil
                $this->session->set_userdata('user_id', $user['id']);
                redirect('homepage');
            } else {
                // Password salah
                $this->session->set_flashdata('error', 'Invalid password.');
                redirect('login');
            }
        } else {
            // User tidak ditemukan
            $this->session->set_flashdata('error', 'User not found.');
            redirect('login');
        }
    }

    public function actionRegister()
    {
        $username = $this->input->post('username');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        
        // Proses pendaftaran
        $existing_users = $this->UserModel->search('username', $username);
        if (!empty($existing_users)) {
            // Username sudah terdaftar
            $this->session->set_flashdata('error', 'Username already exists');
            redirect('register');
        } else {
            // Simpan user baru
            $data = [
                'username' => $username,
                'name' => $name,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_BCRYPT),
                
            ];
            $this->UserModel->create($data);

            // Redirect ke halaman login setelah pendaftaran berhasil
            redirect('login');
        }                               
    }
}
