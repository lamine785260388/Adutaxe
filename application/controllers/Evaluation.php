<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Evaluation extends My_controller
{
	public function __construct(){
		parent::__construct();
		$group="agent";
		if(!$this->ion_auth->is_admin() && !$this->ion_auth->in_group("agent")){
			redirect('redirect/login');
		}
	
			}
		public function do_upload ()
		
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

                    
                      $lam=$this->upload->data();
                      foreach($lam as $item => $value){
                      	if($item=="file_name"){
                      		$doc=$value;
                      	}
                      }
                      $id = $this->input->post('id');
			 $idinf = $this->input->post('idinf');
			 $etat = $this->input->post('etat');
			 $user=$this->ion_auth->user()->row();
			
			 $dateinsert=$this->md->selectdatevaluation($idinf);$declaration=0;
		
			 foreach ($dateinsert->result() as $row ) {
		$dateinsert=explode("-", $row->dateEvaluation);
		$DateAndTime = date('Y-m');
		$lam=$DateAndTime;
		$iv=explode("-", $lam);
		if($iv[0]==$dateinsert[0]){
		$declaration=1;
		}
		  }
		
			if($declaration==0){
				if($etat!="regle"){
					$message="Votre infrastructure N° ".$idinf." n'est pas en régle";
					$this->md->message($id,$message);
				}
				
			 $this->md->insertevalue($etat,$doc,$id,$idinf,$user->id);
			 
			 $this->session->set_flashdata('message','Evaluation faite avec succés') ;
			 
			 redirect("infrastructure/listdesinfras");
			}
			 elseif($declaration==1){
				$this->session->set_flashdata('message','Echec: Cet infrastructures a déja été évalué cette année') ;
				redirect("infrastructure/listdesinfras");

			 }
			

			 
                   
			 
			 
			 	
			
			 	

                }
		}
		public function Evaluation()
		{
			$id=$_POST['idinf'];
			$info=$this->md->selectcon("infrastructuremarchande","idInfrastructure",$id)->row();
			echo json_encode($info);
			
		}
		public function ListeDesinfevalue()
		{

        	$data["user"]=$this->ion_auth->user()->row();
        	
        	if($this->ion_auth->in_group("agent")|| $this->ion_auth->is_admin()){

        		$data["titre"]="agent";
		$data["groupe"]="agent";
		$data["nombreinf"]=0;
		 $this->load->view('base/main',$data,true);
		 $data["listevaluaton"]=$this->md->select("evaluation");
		 
		
	$this->load->view("infrastructure/listEvaluation",$data);
		}
}
}