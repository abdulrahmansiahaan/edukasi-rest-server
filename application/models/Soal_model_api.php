<?php

class Soal_model_api extends CI_model {
    public function getSoal($id = null) {
        if ($id === null) {
            $result = [];
            // $result = $this->db->get('tbl_soal')->result_array();
            $this->db->select('tsoal.*');
            $this->db->from('tbl_soal AS tsoal');
            $_soal = $this->db->get();
            $soal = [];
            if ($_soal->num_rows() > 0) {
                $soal = $_soal->result();
                $copyArray = [];
                foreach ($soal as $key => $recSoal) {
                    $copyArray[$key] = $recSoal;
                    $recSoal->pilihanPertanyaan = [];
                    $recSoal->pilihanPertanyaan = $this->db->get_where('tbl_pilihan_pertanyaan', ['soal_id' => $recSoal->id])->result_array();
                }
            }
            $result = $copyArray;
            return $result;
        } else {
            $result = [];
            // $result = $this->db->get('tbl_soal')->result_array();
            $this->db->select('tsoal.*');
            $this->db->from('tbl_soal AS tsoal');
            $this->db->where('id', $id);
            $_soal = $this->db->get();
            $soal = [];
            if ($_soal->num_rows() > 0) {
                $soal = $_soal->result();
                $copyArray = [];
                foreach ($soal as $key => $recSoal) {
                    $copyArray[$key] = $recSoal;
                    $recSoal->pilihanPertanyaan = [];
                    $recSoal->pilihanPertanyaan = $this->db->get_where('tbl_pilihan_pertanyaan', ['soal_id' => $recSoal->id])->result_array();
                }
            }
            $result = $copyArray;
            return $result;
        }
    }

    public function deleteSoal($id) {
        $this->db->delete('tbl_soal', ['id' => $id]);
        return $this->db->affected_rows(); //-1 jika gagal,1 jika berhasil
    }

    public function createSoal($data) {
        $this->db->insert('tbl_soal', $data);
        return $this->db->affected_rows();
    }

    public function updateSoal($data, $id) {
        $this->db->update('tbl_soal', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}