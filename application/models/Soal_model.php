<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Soal_model extends CI_Model {
    private $_table = "tbl_soal";

    public $id;
    public $kategori_id;
    public $sub_kategori_id;
    public $type_soal;
    public $soal;
    public $is_active;
    public $gambar = "default.jpg";

    public function rules() {
        return [
            ['field' => 'kategori_id',
            'label' => 'Kategori ID',
            'rules' => 'required'],

            ['field' => 'sub_kategori_id',
            'label' => 'Sub Kategori ID',
            'rules' => 'required'],

            ['field' => 'type_soal',
            'label' => 'Type Soal',
            'rules' => 'required'],

            ['field' => 'soal',
            'label' => 'Soal',
            'rules' => 'required'],

            ['field' => 'is_active',
            'label' => 'Is_Active',
            'rules' => 'required']
        ];
    }

    public function getAll() {
        return $this->db->get($this->_table)->result();
    }

    public function getList() {
        $this->db->select('tsoal.*, tkat.name as katname, tskat.name as skatname');
        $this->db->from('tbl_soal as tsoal');
        $this->db->join('tbl_kategori as tkat', 'tsoal.kategori_id = tkat.id', 'LEFT');
        $this->db->join('tbl_sub_kategori as tskat', 'tsoal.sub_kategori_id = tskat.id', 'LEFT');
        $this->db->order_by('created_at', 'DESC');
        // $this->db->limit(15);
        $_dataList = $this->db->get();
        $dataList = '';
        if ($_dataList->num_rows() > 0) {
            return $dataList = $_dataList->result();
        }
    }

    public function getDetail($id) {
        $this->db->select('tsoal.*, tkat.name as katname, tskat.name as skatname');
        $this->db->from('tbl_soal as tsoal');
        $this->db->join('tbl_kategori as tkat', 'tsoal.kategori_id = tkat.id', 'LEFT');
        $this->db->join('tbl_sub_kategori as tskat', 'tsoal.sub_kategori_id = tskat.id', 'LEFT');
        $this->db->where('tsoal.id', $id);
        // $this->db->limit(15);
        $_data = $this->db->get();
        $data = '';
        if ($_data->num_rows() > 0) {
            return $data = $_data->row();
        }
    }
    
    public function getById($id) {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function save() {
        $post = $this->input->post();
        
        $this->kategori_id = $post["kategori_id"];
        $this->sub_kategori_id = $post["sub_kategori_id"];
        $this->type_soal = $post["type_soal"];
        $this->soal = $post["soal"];
        $this->is_active = $post["is_active"];
        $this->gambar = $this->_uploadgambar();
        return $this->db->insert($this->_table, $this);
    }

    public function update() {
        $post = $this->input->post();
        $this->id = $post["id"];        
        $this->kategori_id = $post["kategori_id"];
        $this->sub_kategori_id = $post["sub_kategori_id"];
        $this->type_soal = $post["type_soal"];
        $this->soal = $post["soal"];
        if ( ! empty($_FILES["gambar"]["name"])) {
            $this->gambar = $this->_uploadgambar();
        } else {
            $this->gambar = $post["old_gambar"];
        }
        $this->is_active = $post["is_active"];
        return $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id) {
        $this->_deletegambar($id);
        return $this->db->delete($this->_table, array("id" => $id));
    }

    private function _uploadgambar() {
        $config['upload_path']          = './assets/images/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->id;
        $config['overwrite']			= true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data("file_name");
        }
        
        // print_r($this->upload->display_errors());
        return "default.jpg";
    }

    private function _deletegambar($id) {
        $product = $this->getById($id);
        if ($product->gambar != "default.jpg") {
            $filename = explode(".", $product->gambar)[0];
            return array_map('unlink', glob(FCPATH."assets/gambars/$filename.*"));
        }
    }
}