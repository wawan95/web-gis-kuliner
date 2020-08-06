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

   
    function index_get() {

        $id_kuliner  = $this->get('id_kuliner');
        $id_kategori = $this->get('id_kategori');
        $nama_kuliner = $this->get('nama_kuliner');

        if ($id_kuliner != null || $id_kuliner = '') {
         $kuliner = $this->db->get_where('tbl_kuliner',array('id_kuliner' => $id_kuliner))->result();  
         $this->response(array('kuliner'=>$kuliner),200); 
        } 
        elseif ($id_kategori != null || $id_kategori = '') {
        $this->db->like('id_kategori',$id_kategori);
        $kuliner = $this->db->get('tbl_kuliner')->result();
        $this->response(array('kuliner'=>$kuliner),200);
        }
        elseif ($nama_kuliner != null || $nama_kuliner ='') { //untuk search berdasarkan nama kuliner
        $kategori =  $this->post('nama_kuliner');
        $this->db->like('nama_kuliner',$nama_kuliner);
        $kuliner = $this->db->get('tbl_kuliner')->result();
        $this->response(array('kuliner'=>$kuliner),200);
        
        }
        else{
        // $kuliner= $this->db->join('tbl_kuliner', 'tbl_kuliner.id_kategori = tbl_kategori.id_kategori', 'left');
        
        // $this->db->join('tbl_kategori','tbl_kategori.id_kategori=tbl_kuliner.id_kategori','right'); //menmpilkan nama kategori
             $this->db->join('tbl_kategori','tbl_kategori.id_kategori=tbl_kuliner.id_kategori');
        // $query = $this->db->get();
         $kuliner = $this->db->get('tbl_kuliner')->result();
        $this->response(array('kuliner'=>$kuliner),200);
        }
    }
   

    
    //Masukan function selanjutnya disini
        function kategori_get() { //menampilkan kategori
    
        $kategori =  $this->db->get('tbl_kategori')->result();
        $this->response(array('kategori'=>$kategori),200);
        }


        function kategori_post() { //
        $kategori =  $this->post('id_kategori');
        $this->db->like('id_kategori',$kategori);
        $kuliner = $this->db->get('tbl_kuliner')->result();
        $this->response(array('kuliner'=>$kuliner),200); 
        }



// $this->db->select('*');
// $this->db->from('blogs');
// $this->db->join('comments', 'comments.id = blogs.id');
// $query = $this->db->get();

        function yolo_get(){
            $id_kategori = $this->get('id_kategori');
            $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_kuliner.id_kategori', 'left');
            $id_kategori = $this->db->get('tbl_kuliner')->result();
            $this->response(array('kuliner'=>$id_kategori),200);           
        }

    }
?>
