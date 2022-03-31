<?php
/**
* 
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends My_controller
{
	public function __construct(){
		parent::__construct();
	 if ($this->ion_auth->logged_in() === FALSE) { 
	 	$data["erreur"]="";
		return redirect("redirect/login"); }
			$this->load->library("session");
		 $this->load->library('form_validation');

		
	}
	
		
	
	public function acceuil()
	{
		
			$mes=$this->ion_auth->user()->row();
		

		$data["user"]=$this->ion_auth->user()->row();
	 $group="agent";$group2="gerant";
		if ($this->ion_auth->in_group($group))
		{
		$data["titre"]="agent";
		$data["b"]="lamine";
		$data["groupe"]="agent";
		$data["nombreinf"]=0;
		 $this->load->view('base/main',$data,true);
       $this->load->view('agent/pageAgent',$data);
      }
    else if ($this->ion_auth->in_group($group2))
		{
		$data["titre"]="gerant";
		$data["b"]="lamine";
		$data["groupe"]="gerant";
		$data["nombreinf"]=0;
		 $this->load->view('base/main',$data,true);
		
       $this->load->view('agent/pageAgent',$data); 
     }
     else if ($this->ion_auth->is_admin()){
     	$data["titre"]="admis";
		$data["b"]="lamine";
		$data["groupe"]="admin";
		$data["nombreinf"]=0;
		 $this->load->view('base/main',$data,true);
		 
       $this->load->view('agent/pageAgent',$data);

     }
     
		
     }  
  
public function listeagent(){
		$mes=$this->ion_auth->user()->row();
		
  if ($this->ion_auth->is_admin()){
  $data["listagent"] = $this->ion_auth->users(4)->result();
  $data["user"]=$this->ion_auth->user()->row();
  $data["groupe"]="admin";
  $this->load->view('utilisateur/listagent',$data);
}
else
{ 
  echo "vous n'avez pas accés à cette méthode";
}

}
     public function listegerant(){
     		$mes=$this->ion_auth->user()->row();
		
     	if($this->ion_auth->is_admin()|| $this->ion_auth->in_group("agent")){
     	$data["groupe"]="admis";
     	$data["user"]=$this->ion_auth->user()->row();
     	$data["users"]=$this->ion_auth->users(5)->result();

	$this->load->view("utilisateur/listegerant",$data);
} else{
	echo "vous n'avez pas accés a cette méthode";
}
       
     }
     public function tableaudeboard(){
     	$mes=$this->ion_auth->user()->row();
		
     	if ($this->ion_auth->is_admin()){
     		$data["user"]=$this->ion_auth->user()->row();
     		$data["titre"]="admis";
		$data["b"]="lamine";
		$data["groupe"]="admin";
		$data["nombreinf"]=$this->md->nombreInfrastructure();
		$data["montant_taxe"]=$this->md->montant_taxe("paye")->row()->Montant;
		$data["montant_taxeNonRegle"]=$this->md->montant_taxe("impaye")->row()->Montant;

	
			
		
		$data["nombreDemandePaiement"]=$this->md->nombreDemandePaiement();
		$gerant = $this->ion_auth->users(5)->result(); $data["nombregerant"]=0;
		foreach($gerant as $row){
			$data["nombregerant"]++;
		}
		$agent = $this->ion_auth->users(4)->result(); $data["nombreagent"]=0;
		foreach($agent as $row){
			$data["nombreagent"]++;
		}

		 $this->load->view('base/main',$data,true);
     	$this->load->view('tableaudeboard',$data);
     }
     elseif($this->ion_auth->in_group("gerant")){
     $data["user"]=$this->ion_auth->user()->row();
     $users=$this->ion_auth->user()->row();
     		$data["titre"]="gerant";
		$users=$this->ion_auth->user()->row();
		$data["groupe"]="gerant";
		$nombreDeclarationselv=$this->md->nombredeDeccel($users->id);
		$nombreDeclarationsel=0;
foreach($nombreDeclarationselv->result() as $row){
$nombreDeclarationsel++;
}
		$nombreDeclaration=$this->md->nombredeDec($users->id);
			$data["nombreDeclaration"]=$nombreDeclarationsel;
foreach($nombreDeclaration->result() as $row){
	$data["nombreDeclaration"]++;
}
		$data["nombreinf"]=$this->md->nombreInfrastructuregerant($users->id);
		$data["nombreDemandePaiement"]=$this->md->nombreDemandePaiement();
		 $this->load->view('base/navbar',$data,true);
		 $data["MontantTaxesgerant"]=$this->md->MontantTaxesgerant($users->id)->row();
		
		 $this->load->view('base/main',$data,true);
     	$this->load->view('gerant/tableauDeBoard',$data);
     }
     elseif($this->ion_auth->in_group("agent")){
 	$data["user"]=$this->ion_auth->user()->row();
     		$data["titre"]="agent";
		$data["b"]="lamine";
		$data["groupe"]="agent";
		$data["nombreinf"]=$this->md->nombreInfrastructure();
	
			
		
		$data["nombreDemandePaiement"]=$this->md->nombreDemandePaiement();
		$gerant = $this->ion_auth->users(5)->result(); $data["nombregerant"]=0;
		foreach($gerant as $row){
			$data["nombregerant"]++;
		}
		$agent = $this->ion_auth->users(4)->result(); $data["nombreagent"]=0;
		foreach($agent as $row){
			$data["nombreagent"]++;
		}

		 $this->load->view('base/main',$data,true);
     	$this->load->view('agent/tableaudeboard',$data);
     }
     
   }
     public function delete($id,$infos,$red=null){
     	if($this->ion_auth->is_admin()){

			
			if($infos=="desactive"){
				$data = array(
					'active' => 0
					
					 );
		$this->ion_auth->update($id, $data);
		$this->session->set_flashdata('message','compte d_utilisateur desactiver avec succès') ;}
		else{
			$data = array(
					'active' => 1
					
					 );
				$this->ion_auth->update($id, $data);
			$this->session->set_flashdata('message','compte d_utilisateur activer avec succès') ;

		} if($red==null){
		redirect("users/listegerant");}
		else{
    redirect("users/listeagent");
		}
	}
		else{
			$data["erreur"]="vous n'avez pas l'autorisation néccessaire pour cette action";
			$this->load->view("erreur/erreur",$data);
		}
     	
     }
     public function modifierprofile(){
     	$user=$this->ion_auth->user()->row();
      $prenom=$this->input->post("prenom");
      $nom=$this->input->post("nom");
      $add=$this->input->post("address");
      $tel=$this->input->post("telephone");
      $email=$this->input->post("email");
		$data = array(
					'first_name' => $prenom,
					'last_name' => $nom,
					'company' => $add,
					'phone' => $tel,
					'email' => $email

					 );
		$this->ion_auth->update($user->id, $data);
		$this->session->set_flashdata('message','modification de profile réussi') ;
		redirect("users/acceuil");
     }
    
public function test(){
	$this->load->view("newlog2");
}


}