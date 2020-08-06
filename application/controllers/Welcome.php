<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	function __construct()
	{ 
		parent::__construct();
		
		/* Standard Libraries */
        $this->load->model('Kuliner_model');
		$this->load->helper('url');
		/* ------------------ */	
		$this->load->library('googlemaps');

		
	}

	public function index()
	{
			is_login();
			
			$this->load->library('googlemaps');
			$config['center'] = '-6.806428778495534,110.84213197231293';
			$config['zoom'] = '13';
			$config['scaleControlPosition'] = 'BOTTOM_RIGHT';
			// $config['places'] = TRUE;

			$this->googlemaps->initialize($config);
			$lokasi = $this->Kuliner_model->get_coordinates();
			  foreach ($lokasi as $coordinate) { 
			             $marker = array();
			             $marker['position'] = $coordinate->lat.','.$coordinate->lng;
			             $marker['infowindow_content'] =  '<h5><b>'.$coordinate->nama_kuliner.'</b></h5></br>' .'<img class="img-thumbnail" src='.base_url().'/assets/foto/'.$coordinate->images.' width="304" height="236">';
	
			             // 'http://localhost/CodeIgniter-3.1/assets/foto/'.$coordinate->images
			             $this->googlemaps->add_marker($marker);
			         }
			 // $data = array(); 
			 $data = array(
            'admin' => $this->db->get('admin'),
            'kategori' => $this->db->get('tbl_kategori'),
            'kuliner' => $this->db->get('tbl_kuliner'),
        	);
			 $data['map'] = $this->googlemaps->create_map();
        // Load our view, passing through the map data       

 
// tambahan
			

		 	$this->load->view('template/header');
            $this->load->view('template/slidebar');
            $this->load->view('welcome_message',$data);
            $this->load->view('template/footer');
	}
}
