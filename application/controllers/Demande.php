<?php
/**
* 
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Demande extends My_controller
{
	public function __construct(){
		parent::__construct();
		 if ($this->ion_auth->logged_in() === FALSE) { 
			$this->load->view('login'); }
				
		
	}
	public function form(){
		$group="agent";
       $this->load->view('inscription',[],false);
   
  
}

	
	public function demandeDepaiement(){
	$data["montant_taxe"]=$this->input->post("montant");
	$data["inf"]=$this->input->post("idinf");

	
		$user=$this->ion_auth->user()->row();
			$data["infras"]=$this->md->selectcon("infrastructuremarchande","id",$user->id);
			$data["date"]=$this->md->dateDeclaration($user->id);
		$user=$this->ion_auth->user()->row();
       $data["info"]=$this->md->selectcon("infrastructuremarchande","id",$user->id);
       $data["datedemande"]=$this->input->post("date");
 $this->load->view('gerant/demandeDepaiement',$data);
	}
	public function demanderevaluation(){

 $this->load->view('gerant/demandedeReevaluation');
	}
	public function InsertDemandePaiement()
	{
		$NumFacture=$this->input->post("numfact");
         
		$inf = $this->input->post('infrastucture');
		$declaration=0;
	
		
	$verificationDemande=$this->md->verifdeamandepaiement($NumFacture);
	if(!$verificationDemande==0){
		$declaration=1;

	}

	
$user=$this->ion_auth->user()->row();
		
		$numeroP = $this->input->post('numeroP');
		$type = $this->input->post('operateur');
		$date = $this->input->post('date');
		$datepaiement= date('Y-m-d'); 
		$montant = $this->input->post('montant');



	
	if($declaration==0){
		$verif=1;
		$this->md->DemandePaiement($inf,$user->id,$numeroP,$type,$datepaiement,$montant,$NumFacture);
$this->session->set_flashdata('message',' Succés: vous devez payer sur ce numéro: 785260388') ;

			redirect("gerant/MesFactures");}

if($declaration==1){
	$this->session->set_flashdata('message',' Echec: vous avez déja fait une demande pour cette infrastructure') ;
	redirect("gerant/MesFactures");
	echo "vous avez déja fait une demande de paiement pour cette infrastructure";
}
		
		
		
	}
}

