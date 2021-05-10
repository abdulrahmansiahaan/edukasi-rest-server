<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Soal extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('soal_model_api');

        $this->methods['index_get']['limit'] = 100; //limit key api 100 x show per jam
        $this->methods['index_delete']['limit'] = 100; //limit key api 100 x show per jam
        $this->methods['index_post']['limit'] = 100; //limit key api 100 x show per jam
        $this->methods['index_put']['limit'] = 100; //limit key api 100 x show per jam
    }

    public function index_get() {
        $id = $this->get('id');
        if ($id === null) {
            $soal = $this->soal_model_api->getSoal();
        } else {
            $soal = $this->soal_model_api->getSoal($id);
        }
        
        if ($soal) {
            $this->response([
                'status'    => TRUE,
                'data'      => $soal
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status'    => FALSE,
                'message'   => 'No data were found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_delete() {
        $id = $this->delete('id');

        if ($id === null) {
            $this->response([
                'status'    => FALSE,
                'massage'   => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->soal_model_api->deleteSoal($id) > 0) {
                $this->response([
                    'status'    => TRUE,
                    'id'        => $id,
                    'massage'   => 'deleted.'
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status'    => FALSE,
                    'massage'   => 'id not found'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function index_post() {
        $data = [
            'id' => $this->post('id'),
            'soal' => $this->post('soal'),
            'is_active' => $this->post('is_active')
        ];

        if ($this->soal_model_api->createSoal($data) > 0) {
            $this->response([
                'status'    => TRUE,
                'massage'   => 'new soal has been created'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status'    => FALSE,
                'massage'   => 'failed to create new data'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function index_put() {
        $id = $this->put('id');
        $data = [
            'soal' => $this->put('soal'),
            'is_active' => $this->put('is_active')
        ];

        if ($this->soal_model_api->updateSoal($data, $id) > 0) {
            $this->response([
                'status'    => TRUE,
                'massage'   => 'data soal has been updated'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status'    => FALSE,
                'massage'   => 'failed to update data'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}