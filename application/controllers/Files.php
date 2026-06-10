<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Files extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login')) {
            redirect('index.php/auth/login');
        }

        $this->load->model('File_model');
        $this->load->library('upload');
    }

    public function upload()
    {
        $config['upload_path']   = './uploads/skripsi/';
        $config['allowed_types'] = '*'; // Allow all file types
        $config['encrypt_name']  = TRUE;
        // No max_size limit - allow files of any size

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('file_skripsi')) {

            $this->session->set_flashdata(
                'error',
                $this->upload->display_errors()
            );

        } else {

            $file = $this->upload->data();

            $data = [
                'user_id'   => $this->session->userdata('user_id'),
                'fase'      => $this->input->post('fase'),
                'nama_file' => $file['orig_name'],
                'file_path' => 'uploads/skripsi/' . $file['file_name']
            ];

            $this->File_model->insert($data);
            $this->session->set_flashdata('success', 'File berhasil diupload');
        }

        redirect('index.php/dashboard');
    }
}