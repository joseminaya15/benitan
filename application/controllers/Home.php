<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper("url");//BORRAR CACHÉ DE LA PÁGINA
		$this->load->model('M_Datos');
		$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
	}

	public function index()
	{
		$this->load->view('v_home');
	}

	function registerContact(){
		$data['error'] = EXIT_ERROR;
      	$data['msj']   = null;
		try {
			$name              = $this->input->post('NameContact');
			$reach 	           = $this->input->post('ReachContact');
			$message           = $this->input->post('MessageContact');
			$fecha             = date('Y-m-d');
			$insertUserContact = array('name'     => $name,
									   'reach'    => $reach,
									   'message'  => $message,
									   'date'     => $fecha);
			$datoInsert  = $this->M_Datos->insertarContact($insertUserContact,'contact');
			$data['msj']   = $datoInsert['msj'];
			$data['error'] = $datoInsert['error'];
		} catch(Exception $ex) {
			$data['msj'] = $ex->getMessage();
		}
      	echo json_encode($data);
	}

	function registerShared(){
		$data['error'] = EXIT_ERROR;
      	$data['msj']   = null;
		try {
			$name             = $this->input->post('NameShared');
			$location 		  = $this->input->post('LocationShared');
			$social 		  = $this->input->post('SocialShared');
			$message 		  = $this->input->post('MessageShared');
			$fecha            = date('Y-m-d');
			$insertUserShared = array('name'     => $name,
									  'location' => $location,
									  'social' 	 => $social,
									  'message'  => $message,
									  'fecha'    => $fecha);
			$datoInsert  = $this->M_Datos->insertarShared($insertUserShared,'shared');
			$data['msj']   = $datoInsert['msj'];
			$data['error'] = $datoInsert['error'];
		} catch(Exception $ex) {
			$data['msj'] = $ex->getMessage();
		}
      	echo json_encode($data);
	}
}