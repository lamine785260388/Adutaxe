<?php
/**
* 
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class notify extends My_controller
{
	public function __construct(){
		parent::__construct();
	 				
			

		
	}
	public function notification(){
		$this->load->view("notification/notification");
	}
	public function notify(){
		$user=$this->ion_auth->user()->row();
		$this->db->where('idusers', $user->id);
$this->db->from('messagerie');

echo $this->db->count_all_results();
					
                   

			$query=$this->db->get_where("messagerie", array("idusers" => $user->id));
			if ($this->db->count_all_results("messagerie") > 0) {
    // output data of each row
				foreach($query->result() as $row){
					 $row->message;
				}
 
} else {
    
}


	}
	public function message(){
		$user=$this->ion_auth->user()->row();
		$this->db->where('idusers', $user->id);
$this->db->from('messagerie');
$num=1;
if( $this->db->count_all_results()>0){
	$query=$this->db->get_where("messagerie", array("idusers" => $user->id));
	foreach($query->result() as $row){
		echo '<p>'.$num.' : '.$row->message.' Date : '.$row->Date.'</p>';$num++;
	}

};

	}

}