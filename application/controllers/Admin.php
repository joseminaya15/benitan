<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('M_reporte');
        $this->load->helper("url");//BORRAR CACHÉ DE LA PÁGINA
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
    }
	public function index(){
        $datos = $this->M_reporte->getDatosContact();
        $datos2 = $this->M_reporte->getDatosShared();
        $html  = '';
        $html2  = '';
        if(count($datos) == 0) {
            $html = '';
        }else {
            foreach ($datos as $key){
                $html .= '<tr class="tr-cursor-pointer">
                            <td class="text-left">'.$key->name.'</td>
                            <td class="text-left">'.$key->reach.'</td>
                            <td class="text-left">'.$key->message.'</td>
                            <td class="text-center">'.$key->fecha.'</td>
                        </tr>';
            }
        }
        if(count($datos2) == 0) {
            $html2 = '';
        }else {
            foreach ($datos2 as $key){
                $html2 .= '<tr class="tr-cursor-pointer">
                            <td class="text-left">'.$key->name.'</td>
                            <td class="text-left">'.$key->location.'</td>
                            <td class="text-left">'.$key->social.'</td>
                            <td class="text-left">'.$key->message.'</td>
                            <td class="text-center">'.$key->fecha.'</td>
                        </tr>';
            }
        }
        $data['html'] = $html;
        $data['html2'] = $html2;
		$this->load->view('v_admin', $data);
	}
    function cerrarCesion(){
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $this->session->unset_userdata('usuario');
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }
}