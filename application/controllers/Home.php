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
			$email 	           = $this->input->post('EmailContact');
			$phone 	           = $this->input->post('PhoneContact');
			$message           = $this->input->post('MessageContact');
			$fecha             = date('Y-m-d');
			$insertUserContact = array('name'     => $name,
									   'email'    => $email,
									   'phone'    => $phone,
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

	function registerReserved(){
		$data['error'] = EXIT_ERROR;
      	$data['msj']   = null;
		try {
			$product            = $this->input->post('Product');
			$firstname          = $this->input->post('FirstName');
			$lastname 		    = $this->input->post('LastName');
			$email 		        = $this->input->post('Email');
			$phone 		        = $this->input->post('Phone');
			$fecha              = date('Y-m-d');
			$insertUserReserved = array('firstname' => $firstname,
									  	'lastname'  => $lastname,
									  	'email' 	=> $email,
									  	'phone'     => $phone,
									  	'date'      => $fecha);
			$datoInsert  = $this->M_Datos->insertarContact($insertUserReserved,'reserved');
			$this->sendConfirmation($product,$firstname,$lastname,$email,$phone);
			$data['msj']   = $datoInsert['msj'];
			$data['error'] = $datoInsert['error'];
		} catch(Exception $ex) {
			$data['msj'] = $ex->getMessage();
		}
      	echo json_encode($data);
	}

	function sendConfirmation($product,$firstname,$lastname,$email,$phone){
		$data['error'] = EXIT_ERROR;
		$data['msj']   = null;
		try {  
			$this->load->library("email");
			$configGmail = array('protocol'  => 'smtp',
			                     'smtp_host' => 'mail.iradianty.com',
			                     'smtp_port' => 587,
			                     'smtp_user' => 'info@iradianty.com',
			                     'smtp_pass' => 'EduardoBenavides2019!',
			                     'mailtype'  => 'html',
			                     'charset'   => 'utf-8',
			                     'newline'   => "\r\n");    
			$this->email->initialize($configGmail);
			$this->email->from('info@iradianty.com');
			$this->email->to('time@benitan.com');
			// $this->email->to('jose.minayac15@gmail.com');
			$this->email->subject('Nueva Reserva - '.$product.'');
			$texto = '<!DOCTYPE html>
			                <html>
			                    <body>
			                        <table width="500" cellpadding="0" cellspacing="0" align="center" style="border: solid 1px #ccc;">
			                            <tr>
			                                <td>
			                                    <table width="400" cellspacing="0" cellpadding="0" border="0" align="center" style="padding: 30px 10px">
			                                        <tr>
			                                            <td style="text-align: center;padding: 0;margin: 0;padding-bottom: 10px"><font style="font-family: arial;color: #000000;font-size: 18px;font-weight: 600">Nueva reserva - '.$product.'</font></td>
													</tr>
													<tr>
														<td>First Name: '.$firstname.'</td>
													</tr>
													<tr>
														<td>Last Name: '.$lastname.'</td>
													</tr>
													<tr>
														<td>Email Address: '.$email.'</td>
													</tr>
													<tr>
														<td>Phone: '.$phone.'</td>
													</tr>
			                                    </table>
			                                </td>
			                            </tr>
			                        </table>
			                    </body>
			                </html>';
			$this->email->message($texto);
			$this->email->send();
			$data['error'] = EXIT_SUCCESS;
		}catch (Exception $e){
			$data['msj'] = $e->getMessage();
		}
		return json_encode(array_map('utf8_encode', $data));
	}
}