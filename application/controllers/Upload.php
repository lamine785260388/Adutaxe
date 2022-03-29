<?php
/**
* 
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Upload extends My_controller
{
	public function __construct(){
		parent::__construct();
		
		}
		public function index(){
			$this->load->view('upload_form', array('error' => ' ' ));
		}
		public function do_upload()
        {
                $config['upload_path']          = 'upload';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 10000;
                $config['max_width']            = 10240;
                $config['max_height']           = 76800;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        $lam=$this->upload->data();

                        $this->load->view('upload_success', $data);
                }
        }
}