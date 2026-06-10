<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notes extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login')) {
            redirect('index.php/auth/login');
        }

        $this->load->model('Note_model');
    }

    /* ===== LIST & TAMBAH ===== */
    public function index()
    {
        $user_id = $this->session->userdata('user_id');

        if ($this->input->post()) {
            $data = [
                'user_id'     => $user_id,
                'fase'        => $this->input->post('fase'),
                'isi_catatan' => $this->input->post('isi_catatan')
            ];

            $this->Note_model->insert($data);
            $this->session->set_flashdata('success', 'Catatan berhasil ditambahkan');
            redirect('index.php/notes');
        }

        $data['notes'] = $this->Note_model->getByUser($user_id);
        $this->load->view('notes/index', $data);
    }

    /* ===== EDIT ===== */
    public function edit($id)
    {
        $user_id = $this->session->userdata('user_id');

        if ($this->input->post()) {
            $data = [
                'fase'        => $this->input->post('fase'),
                'isi_catatan' => $this->input->post('isi_catatan')
            ];

            $this->Note_model->update($id, $user_id, $data);
            $this->session->set_flashdata('success', 'Catatan berhasil diperbarui');
            redirect('index.php/notes');
        }

        $data['note'] = $this->Note_model->getById($id, $user_id);
        $this->load->view('notes/edit', $data);
    }

    /* ===== HAPUS ===== */
    public function delete($id)
    {
        $user_id = $this->session->userdata('user_id');

        $this->Note_model->delete($id, $user_id);
        $this->session->set_flashdata('success', 'Catatan berhasil dihapus');
        redirect('index.php/notes');
    }
}