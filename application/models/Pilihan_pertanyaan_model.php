<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pilihan_pertanyaan_model extends CI_Model {
    private $_table = "tbl_pilihan_pertanyaan";

    public $id;
    public $soal_id;
    public $is_right;
    public $pilihan;

    public function rules() {
        return [
            ['field' => 'soal_id',
            'label' => 'Soal ID',
            'rules' => 'required'],

            ['field' => 'is_right',
            'label' => 'IS Right',
            'rules' => 'required'],

            ['field' => 'pilihan',
            'label' => 'Pilihan',
            'rules' => 'required']
        ];
    }

    public function getBySoalID($id) {
        $tes = $this->db->get_where($this->_table, ["soal_id" => $id])->result();

        return $tes;
    }

    public function save() {
        $post = $this->input->post();
        
        $this->soal_id = $post["soal_id"];
        $this->is_right = $post["is_right"];
        $this->pilihan = $post["pilihan"];
        return $this->db->insert($this->_table, $this);
    }

}