<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kuliner extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Kuliner_model');
        $this->load->library('form_validation');
        $this->load->library('googlemaps');
        $this->load->helper('url');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'kuliner/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kuliner/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kuliner/index';
            $config['first_url'] = base_url() . 'kuliner/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kuliner_model->total_rows($q);
        $kuliner = $this->Kuliner_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);
         $list_file=array();
        $dir = "./assets/foto/";

        // buka directory, dan baca isinya
        if (is_dir($dir)){
          if ($dh = opendir($dir)){
            while (($file = readdir($dh)) !== false){
                $list_file[]=$file;
            }
            closedir($dh);
          }
        }

        $data['daftar_file']=$list_file;

        $data = array(
            'kuliner_data' => $kuliner,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('template/header');
        $this->load->view('template/slidebar');
        $this->load->view('kuliner/tbl_kuliner_list', $data);
        $this->load->view('template/footer');
    }

  //   public function read($id) 
  //   {
  //       $row = $this->Kuliner_model->get_by_id($id);
  //       if ($row) {
  //           $data = array(
		// 'id_kuliner' => $row->id_kuliner,
		// 'nama_kuliner' => $row->nama_kuliner,
		// 'id_kategori' => $row->id_kategori,
		// 'images' => $row->images,
		// 'keterangan' => $row->keterangan,
		// 'lat' => $row->lat,
		// 'lng' => $row->lng,
	 //    );
  //           $this->load->view('template/header');
  //           $this->load->view('template/slidebar');
  //           $this->load->view('kuliner/tbl_kuliner_read', $data);
  //           $this->load->view('template/footer');
  //       } else {
  //           $this->session->set_flashdata('message', 'Record Not Found');
  //           redirect(site_url('kuliner'));
  //       }
  //   }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kuliner/create_action'),
	    'id_kuliner' => set_value('id_kuliner'),
	    'nama_kuliner' => set_value('nama_kuliner'),
	    'id_kategori' => set_value('id_kategori'),
        'alamat' => set_value('alamat'),
	    'images' => set_value('images'),
	    'keterangan' => set_value('keterangan'),
	    'lat' => set_value('lat'),
	    'lng' => set_value('lng'),
	);

            $this->load->library('googlemaps');
            $config['center'] = '-6.806428778495534,110.84213197231293';
            $config['zoom'] = '14';
            $this->googlemaps->initialize($config);

        $marker=array(
        'position'      =>'-6.806428778495534,110.84213197231293', // Tandakan pada lokasi pusat
        'draggable'     =>TRUE, //Fitur drag diaktifkan
        'title'         =>'Set Locaton', //Judul di atas tanda marker
        'ondragend'     =>"document.getElementById('lat').value = event.latLng.lat(); 
                            document.getElementById('lng').value = event.latLng.lng();", //Aksi disaat marker di drag nilai latitude dan longitude disimpan pada div id lat dan lng
        );   
            $this->googlemaps->add_marker($marker);
            $data['map'] = $this->googlemaps->create_map();
           
        $this->load->view('template/header');
        $this->load->view('template/slidebar');
        $this->load->view('kuliner/tbl_kuliner_form', $data);
        $this->load->view('template/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();
         $foto = $this->upload_foto();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_kuliner' => $this->input->post('nama_kuliner',TRUE),
		'id_kategori' => $this->input->post('id_kategori',TRUE),
        'alamat' => $this->input->post('alamat',TRUE),
		'images' => $foto['file_name'],
		'keterangan' => $this->input->post('keterangan',TRUE),
		'lat' => $this->input->post('lat',TRUE),
		'lng' => $this->input->post('lng',TRUE),
	    );

            $this->Kuliner_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kuliner'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kuliner_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kuliner/update_action'),
        		'id_kuliner' => set_value('id_kuliner', $row->id_kuliner),
        		'nama_kuliner' => set_value('nama_kuliner', $row->nama_kuliner),
        		'id_kategori' => set_value('id_kategori', $row->id_kategori),
                'alamat' => set_value('alamat', $row->alamat),
        		'images' => set_value('images', $row->images),
        		'keterangan' => set_value('keterangan', $row->keterangan),
        		'lat' => set_value('lat', $row->lat),
        		'lng' => set_value('lng', $row->lng),
        	    );

             $this->load->library('googlemaps');
            $config['center'] = '-6.806428778495534,110.84213197231293';
            $config['zoom'] = 'auto';
            $this->googlemaps->initialize($config);

           
        $marker=array(

        'position'      => $row->lat.','.$row->lng, // Tandakan pada lokasi pusat
        'draggable'     =>TRUE, //Fitur drag diaktifkan
        'title'         =>'Coba diDrag', //Judul di atas tanda marker
        'ondragend'     =>"document.getElementById('lat').value = event.latLng.lat(); 
                            document.getElementById('lng').value = event.latLng.lng();", //Aksi disaat marker di drag nilai latitude dan longitude disimpan pada div id lat dan lng
        );   
            $this->googlemaps->add_marker($marker);
            $data['map'] = $this->googlemaps->create_map();
            $this->load->view('template/header');
            $this->load->view('template/slidebar');
            $this->load->view('kuliner/tbl_kuliner_form', $data);
            $this->load->view('template/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kuliner'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
        $foto = $this->upload_foto();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kuliner', TRUE));
        } else {
            if($foto['file_name']==''){
                $data = array(
		'nama_kuliner' => $this->input->post('nama_kuliner',TRUE),
		'id_kategori' => $this->input->post('id_kategori',TRUE),
        'alamat' => $this->input->post('alamat',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'lat' => $this->input->post('lat',TRUE),
		'lng' => $this->input->post('lng',TRUE),
	    );
        }else{

          $data = array(
        'nama_kuliner' => $this->input->post('nama_kuliner',TRUE),
        'id_kategori' => $this->input->post('id_kategori',TRUE),
        'alamat' => $this->input->post('alamat',TRUE),
        'images' => $foto['file_name'],
        'keterangan' => $this->input->post('keterangan',TRUE),
        'lat' => $this->input->post('lat',TRUE),
        'lng' => $this->input->post('lng',TRUE));

          $this->session->set_userdata('images',$foto['file_name']); 
        }

            $this->Kuliner_model->update($this->input->post('id_kuliner', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kuliner'));
        }
    }
       function upload_foto(){
        $config['upload_path']          = './assets/foto';
        $config['allowed_types']        = 'gif|jpg|png';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('images');
        return $this->upload->data();
    }
    
    public function delete($id) 
    {
         
        $row = $this->Kuliner_model->get_by_id($id);
        if ($row) {
            unlink('assets/foto/'.$row->images);
            $this->Kuliner_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kuliner'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kuliner'));
        }
    }

    public function _rules() 
    {
    	$this->form_validation->set_rules('nama_kuliner', 'nama kuliner', 'trim|required');
    	$this->form_validation->set_rules('id_kategori', 'id kategori', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim');
    	// $this->form_validation->set_rules('images', 'images', 'trim|required');
    	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
    	$this->form_validation->set_rules('lat', 'lat', 'trim|required|numeric');
    	$this->form_validation->set_rules('lng', 'lng', 'trim|required|numeric');

    	$this->form_validation->set_rules('id_kuliner', 'id_kuliner', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Kuliner.php */
/* Location: ./application/controllers/Kuliner.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-08-07 16:56:47 */
/* http://harviacode.com */