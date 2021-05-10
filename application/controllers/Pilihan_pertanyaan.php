<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pilihan_pertanyaan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model(['pilihan_pertanyaan_model', 'soal_model']);
        $this->load->library('form_validation');
        $this->title = 'Uji Logika';
    }

    public function show($id=null) {
		$data['title'] = $this->title;
        $this->load->view("templates/header", $data);
        $data["dataSoal"] = $this->soal_model->getDetail($id);
        $data["dataPP"] = $this->pilihan_pertanyaan_model->getBySoalID($id);
        $this->load->view("pilihan_pertanyaan/index", $data);
        $this->load->view("templates/footer");
    }

    public function insert($id=null) {
        $soal = $this->pilihan_pertanyaan_model;
        $validation = $this->form_validation;
        $validation->set_rules($soal->rules());

        if ($validation->run()) {
            $soal->save();
            $this->session->set_flashdata('flash', 'Ditambahkan');
			redirect(site_url('pilihan_pertanyaan/show/'.$id));
        }
        $data['title'] = $this->title;
		$this->load->view("templates/header", $data);

        $data["dataSoal"] = $this->soal_model->getDetail($id);
        
        $this->load->view("pilihan_pertanyaan/form_add", $data);
        $this->load->view("templates/footer");
    }
}