<?php
/**
* 
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class My_controller extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->helper("url");
		$this->load->helper("form");
		$this->load->library("ion_auth");
		$this->load->model("Mymodel_models");
		
	}
}