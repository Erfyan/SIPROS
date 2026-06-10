<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

    private $admin_email = 'erfyantaubat@gmail.com';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Contact_model');
        $this->load->library(['form_validation', 'email']);
    }

    public function index()
    {
        if ($this->input->post()) {

            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('pesan', 'Pesan', 'required');

            if ($this->form_validation->run()) {

                $username = $this->input->post('username');
                $email    = $this->input->post('email');
                $pesan    = $this->input->post('pesan');

                /* ===== KIRIM EMAIL KE ADMIN ===== */
                $this->email->from($email, $username);
                $this->email->to($this->admin_email);
                $this->email->subject('Pesan Baru dari SIPROS');
                $this->email->message("
                    <h3>Pesan Contact SIPROS</h3>
                    <p><strong>Nama:</strong> {$username}</p>
                    <p><strong>Email:</strong> {$email}</p>
                    <p><strong>Pesan:</strong></p>
                    <p>{$pesan}</p>
                ");

                $status = 'terkirim';

                if (!$this->email->send()) {
                    $status = 'gagal';
                }

                /* ===== SIMPAN KE DATABASE ===== */
                $this->Contact_model->insert([
                    'username' => $username,
                    'email'    => $email,
                    'pesan'    => $pesan,
                    'status'   => $status
                ]);

                $this->session->set_flashdata(
                    'success',
                    'Pesan berhasil dikirim dan dicatat.'
                );

                redirect('index.php/contact');
            }
        }

        $this->load->view('contact/index');
    }
}