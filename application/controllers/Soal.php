<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Soal extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("soal_model");
        $this->load->library('form_validation');
        $this->title = 'Uji Logika';
    }

    public function index() {
		$data['title'] = $this->title;
        $this->load->view("templates/header", $data);
        $data["dataSoal"] = $this->soal_model->getList();
        $this->load->view("soal/list", $data);
        $this->load->view("templates/footer");
    }

    public function detail($id=null) {
		$data['title'] = $this->title;
        $this->load->view("templates/header", $data);
        $data["dataSoal"] = $this->soal_model->getDetail($id);
        $this->load->view("soal/detail", $data);
        $this->load->view("templates/footer");
    }

    public function insert() {
        $soal = $this->soal_model;
        $validation = $this->form_validation;
        $validation->set_rules($soal->rules());

        if ($validation->run()) {
            $soal->save();
            $this->session->set_flashdata('flash', 'Ditambahkan');
			redirect(site_url('soal'));
        }
        

		$data['title'] = $this->title;
		$this->load->view("templates/header", $data);
		
		$list_kategori = ['' => '&#8212;'];
        $this->db->select('kat.*');
        $this->db->from('tbl_kategori AS kat');
        $_kategori_option     = $this->db->get();
        $kategoriOption = [];
        if ($_kategori_option->num_rows() > 0) {
            $kategoriOption = $_kategori_option->result();
            foreach ($kategoriOption as $key => $value_kategori) {
                $list_kategori[$value_kategori->id] = ! empty($value_kategori->name) ? $value_kategori->name : '';
            }
        }

		$list_subkategori = ['' => '&#8212;'];
        $this->db->select('skat.*');
        $this->db->from('tbl_sub_kategori AS skat');
        $_subkategori_option     = $this->db->get();
        $subkategoriOption = [];
        if ($_subkategori_option->num_rows() > 0) {
            $subkategoriOption = $_subkategori_option->result();
            foreach ($subkategoriOption as $subkey => $value_subkategori) {
                $list_subkategori[$value_subkategori->id] = ! empty($value_subkategori->name) ? $value_subkategori->name : '';
            }
        }

		$data = [
			'list_kategori' => $list_kategori,
			'list_subkategori' => $list_subkategori
		];

        $this->load->view("soal/form_add", $data);
        $this->load->view("templates/footer");
    }

    public function update($id = null)
    {
        if (!isset($id)) redirect('soal');
        
        $soal = $this->soal_model;
        $validation = $this->form_validation;
        $validation->set_rules($soal->rules());
        
        if ($validation->run()) {
            $soal->update();
            $this->session->set_flashdata('flash', 'Diubah');
			redirect(site_url('soal'));
        }

        $data["soal"] = $soal->getById($id);
        if ( ! $data["soal"]) show_404();
        
        $data['title'] = $this->title;
		$this->load->view("templates/header", $data);

        $list_kategori = ['' => '&#8212;'];
        $this->db->select('kat.*');
        $this->db->from('tbl_kategori AS kat');
        $_kategori_option     = $this->db->get();
        $kategoriOption = [];
        if ($_kategori_option->num_rows() > 0) {
            $kategoriOption = $_kategori_option->result();
            foreach ($kategoriOption as $key => $value_kategori) {
                $list_kategori[$value_kategori->id] = ! empty($value_kategori->name) ? $value_kategori->name : '';
            }
        }

        $list_subkategori = ['' => '&#8212;'];
        $this->db->select('skat.*');
        $this->db->from('tbl_sub_kategori AS skat');
        $_subkategori_option     = $this->db->get();
        $subkategoriOption = [];
        if ($_subkategori_option->num_rows() > 0) {
            $subkategoriOption = $_subkategori_option->result();
            foreach ($subkategoriOption as $subkey => $value_subkategori) {
                $list_subkategori[$value_subkategori->id] = ! empty($value_subkategori->name) ? $value_subkategori->name : '';
            }
        }

		$data = [
			'list_kategori' => $list_kategori,
			'list_subkategori' => $list_subkategori
		];

        $this->load->view("soal/form_edit", $data);
        $this->load->view("templates/footer");
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->soal_model->delete($id)) {
            $this->session->set_flashdata('flash', 'Dihapus');
            redirect(site_url('soal'));
        }
    }
}