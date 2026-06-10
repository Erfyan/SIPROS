<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login')) {
            redirect('index.php/auth/login');
        }

        // LOAD MODEL DI SINI
        $this->load->model('Progress_model');
        $this->load->model('File_model');
        $this->load->model('Note_model');
    }

    
    public function index()
    {
            $user_id = $this->session->userdata('user_id');

        $data = [
            'nama'          => $this->session->userdata('nama'),
            'progress'      => $this->Progress_model->getByUser($user_id),
            'files'         => $this->File_model->countByUser($user_id),
            'notes'         => $this->Note_model->countByUser($user_id),
            'files_grouped' => $this->File_model->getByUserGrouped($user_id),
            'file_list'     => $this->File_model->getByUser($user_id)
        ];
        $this->load->view('dashboard/index', $data);
    }
    }
