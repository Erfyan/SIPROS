<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    /* ===== REGISTER ===== */
    public function register()
    {
        if ($this->input->post()) {

            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

            if ($this->form_validation->run()) {

                $data = [
                    'nama'     => $this->input->post('nama'),
                    'email'    => $this->input->post('email'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
                ];

                $this->User_model->insert($data);
                $this->session->set_flashdata('success', 'Akun berhasil dibuat');

                redirect('auth/login');
            }
        }

        $this->load->view('auth/register');
    }

    /* ===== LOGIN ===== */
public function login()
{
    if ($this->input->post()) {

        $user = $this->User_model->getByEmail(
            $this->input->post('email')
        );

        if ($user && password_verify($this->input->post('password'), $user->password)) {

            $this->session->set_userdata([
                'user_id' => $user->id,
                'nama'    => $user->nama,
                'login'   => TRUE
            ]);

            // ⬇⬇ INI YANG WAJIB ⬇⬇
            redirect('index.php/dashboard');
        }

        $this->session->set_flashdata('error', 'Email atau password salah');
    }

    $this->load->view('auth/login');
}

    /* ===== LOGOUT ===== */
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('index.php');
    }
}