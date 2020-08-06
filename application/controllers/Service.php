<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Service extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        $this->load->helper('url');
    }

    //Menampilkan data kontak
    function index_get() {
        $id_kuliner = $this->get('id_kuliner');
        if ($id_kuliner == '') {
            $kuliner = $this->db->get('tbl_kuliner')->result();
        } else {
            $this->db->where('id_kuliner', $id_kuliner);
            $kuliner = $this->db->get('tbl_kuliner')->result();
        }
        $this->response($kuliner, 200);
    }


    //Masukan function selanjutnya disini


}
?>