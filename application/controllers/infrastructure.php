<?php
/**
* 
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class infrastructure extends My_controller
{
	public function __construct(){
		parent::__construct();
		$group="agent";
	 if (!$this->ion_auth->is_admin() && !$this->ion_auth->in_group($group) ) { 
			redirect('redirect/login'); }
			
			
			

		
	}
		public function listdesinfras(){
				
		
		$group="agent";$group2="gerant";
		if ($this->ion_auth->in_group($group))
		{
			$data["groupe"]="agent";
		}
		
		 else if ($this->ion_auth->is_admin()){
		 	$data["groupe"]="administrateur";
		 }
		 else{
		 	$data["groupe"]="gerant";
		 }
		$data["user"]=$this->ion_auth->user()->row();
		$data["infras"]=$this->Mymodel_models->select("infrastructuremarchande");
		$this->load->view("base/navbar",$data,true);
		$this->load->view('tableau1');
		
	}
	



	public function dateDeclaration($idinf){
			
		
		$data["date"]=$this->md->dateDeclarationPro($idinf);
		$verification=$this->md->dateDeclarationPro($idinf);
		$verif=0;
		foreach($verification->result() as $row){
			if($row->date!=null){
				$verif=1;
			}
		}
		if($verif==1){
		$data["infras"]=$this->md->selectcon("infrastructuremarchande","idInfrastructure",$idinf);
	
		$this->load->view("agent/dateDeclaration",$data);}
		else
			echo "cette infrastructure n'a pas fait de déclaration";
	}
	public function facture(){
			
		
		$idinf = $this->input->post('idinf');
		$date=$this->input->post('date');
		redirect('produit/facturation/'.$idinf.'/agent/'.$date);
	}
	public function edit($id = null,$type= null){
			
		
		if(is_null($type) && $id!=null){
			$data["infras"]=$this->md->selectcon("infrastructuremarchande","idInfrastructure",$id);
			$data["id"]=$id;
			$this->load->view("infrastructure/modifier",$data);
		}
		else{
		$data["id"]=$id;
			$this->load->view("infrastructure/ajouter",$data);
		}
		}
		public function delete($id){
				
		
			if (!$this->ion_auth->is_admin()){
				echo "vous n'avez pas l'autorisation de supprimer";
			}
			else{
			$this->session->set_flashdata('message','suppression faite avec succés') ;
		$this->md->delete("infrastructuremarchande",$id);

		redirect('infrastructure/listdesinfras');}
		}
		public function update($id){
				
		
			if (!$this->ion_auth->is_admin()){
				echo "vous n'avez pas l'autorisation de modifier";
			}
			else{
			$nom = $this->input->post('nom');
			 $add = $this->input->post('adresse');
			 $genre = $this->input->post('genre');
			 $etat = $this->input->post('etat');
			 $this->md->updateInf($nom,$add,$genre,$etat,$id);
			 redirect('infrastructure/listdesinfras');}
		}
		public function listeDemandePaiement(){

				
		

			if (!$this->ion_auth->is_admin()){
				echo "vous n'avez pas une autorisation nécéssaire pour accéder a cette page";
			}
			else{
				$data["demandepaiement"]=$this->md->selectcon("paiement","etat","impaye");
				$demande=$this->md->select("demandepaiement");
					$data["titre"]="admis";
		$data["b"]="lamine";
		$data["groupe"]="admin";
		$data["nombreinf"]=0;
		$data["user"]=$this->ion_auth->user()->row();
		 $this->load->view('base/main',$data,true);
				
				$this->load->view("infrastructure/listDemandeDepaiement");
			}

		}
		
		public function test(){

			$id = $_POST['idinfrastructure'];
			$infos = array(
				"nom" => 'fall',
				"prenom" => 'ali'
			);
			echo json_encode($infos);
		}
	
	public function do_upload(){
			
		
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
				$nom = $this->input->post('nom');
			 $add = $this->input->post('adresse');
			 $genre = $this->input->post('genre');
			 $etat = $this->input->post('etat');
			 $this->session->set_flashdata('message','modification faite avec succés') ;
			 $this->md->updateinf($id,$nom,$add,$genre,$etat,$doc);
			 if ($this->ion_auth->is_admin()){
			 	redirect("infrastructure/listdesinfras");
			 }
			 else{
			 redirect('users/acceuil');}

                
}        }

    public function voirdeclarationInf($inf){
    		
		
   
        	$data["user"]=$this->ion_auth->user()->row();
        	
        	if($this->ion_auth->in_group("agent")|| $this->ion_auth->is_admin()){

        		$data["titre"]="agent";
		$data["groupe"]="agent";
		$data["nombreinf"]=0;
		 $this->load->view('base/main',$data,true);
		 $data["Alimentaires"]=$this->md->voirDeclarationinf($inf);//pour voir la déclarartion
		 $data["declarationcelvl"]=$this->md->voirDeclarationcelvl($inf);
		
		 $this->load->view("infrastructure/voirDeclaration",$data);

		 
        	
        }
   }
   public function facturecelvl($idinf,$date){
   		
		
	$data["user"]=$this->ion_auth->user()->row();
	$users=$this->ion_auth->user()->row();
		$group2="gerant";$group="agent";
		
	  $data['produit']=$this->md->selectproAtax();
		$data["titre"]="gérant";
		$data["groupe"]="gérant";
		
		$users=$this->ion_auth->user()->row();
		$data["listinfrastructure"]=$this->md->selectcon("infrastructuremarchande","id",$users->id);
		$data["infrastructure"]=$this->md->selectcon("infrastructuremarchande","idInfrastructure",$idinf);
		$data["facture"]=$this->md->voirFacturecelvl($idinf,$date);
		$data["listedec"]=$this->md->select('listedéclarationselvl');

		
		
        	$this->load->view('gerant/facturecelvl',$data);
}   
public function tests(){

	$idinf = $_POST['idinf'];

	$info = $this->md->selectcon('infrastructuremarchande','idInfrastructure',$idinf)->row();

	echo json_encode($info);
}
 public function evaluation()
{
	echo "suis la";
}

}
?>