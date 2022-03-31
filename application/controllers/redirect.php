<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class redirect extends My_controller
{
	public function __construct(){
		parent::__construct();
		$group="agent";
	
		if ($this->ion_auth->logged_in()) { 
		redirect("Users/acceuil"); }	

		
	}
	public function login(){
		$this->session->set_flashdata('messageinfo','Tout Taxe doit  être payer sur le 785260388, Tout taxe payé avec un autre numéro sera classé sans suite') ;
		$data["erreur"]="";
$this->load->view("login",$data);
	}
	public function essai(){
		$this->load->view("essai");
	}
	 public function newlogin(){
     	$this->load->view("newLogin");
     }
}
?>