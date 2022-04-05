<?php
/**
* 
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class gerant extends My_controller
{
	public function __construct(){
		parent::__construct();
		$group="gerant";
	 if ($this->ion_auth->logged_in() === FALSE) { 
			redirect("redirect/login"); }
			

		
	}
	public function listinfgerant(){

			$user=$this->ion_auth->user()->row();
			$data["infras"]=$this->md->selectcon("infrastructuremarchande","id",$user->id);
			$data["date"]=$this->md->dateDeclaration($user->id);
			$this->load->view("gerant/listInfrastructure",$data);


		}
		public function facture(){
			$inf = $this->input->post('infrastucture');
		  $verif=0;
		  $date=$this->input->post('date');
		  $infras=$this->md->selectPro($inf);
		  foreach($infras->result() as $row){
		  	if($inf==$row->idInfrastructure){
		  		$verif=1;
		  	}
		  }
		  if($verif==1){
           		redirect("Produit/facturation/".$inf."/gerant/".$date);	}
			else{
				echo "vous devez faire une déclaration avant de d'avoir une facture<a href=".site_url('produit/listproduit').">veuillez ici pour faire une déclaration</a>";
				
			}
			

		}
		public function choixdeclaration(){
			
		
			$data["user"]=$this->ion_auth->user()->row();
			$data["titre"]="gerant";
		$data["b"]="lamine";
		$data["groupe"]="gerant";
		 $this->load->view('base/main',$data,true);
			$this->load->view("gerant/choixdeclaration",$data);
		}
		public function edit($id = null,$type= null){

	
	        $user=$this->ion_auth->user()->row();
	        if($this->ion_auth->in_group("gerant")){
	        	if($user->id==$id){
		$data["id"]=$user->id;
			$this->load->view("infrastructure/ajouter",$data);
		}
		else{
			$data["erreur"]="vous n'avez pas accés a cette page";
			$this->load->view("erreur/erreur",$data);
		}
		}

		}
		public function viewajout(){
			$data["user"]=$this->ion_auth->user()->row();
			$data["titre"]="gerant";
		$data["b"]="lamine";
		$data["groupe"]="gerant";
		 $this->load->view('base/main',$data,true);
		 $this->load->view("infrastructure/ajouter");
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
			 $type = $this->input->post('type');

			  if($this->ion_auth->is_admin()|| $this->ion_auth->in_group('agent')){
                                  if($type=="ajout"){
			  
			
			 	$this->md->insertinf($id,$nom,$add,$genre,$etat,$doc);
			 	$this->session->set_flashdata('message','ajout infrastructure faite avec succés') ;
			 	
			 	} else{
			 		$idinf = $this->input->post('idinf');
			 		
			             $this->session->set_flashdata('message','modification faite avec succés') ;
                                 $this->md->updateinf($idinf,$nom,$add,$genre,$etat,$doc);
                          }
                  }
			 if ($this->ion_auth->is_admin()){
			 	redirect("infrastructure/listdesinfras");
			 }
			 else{
			 	$this->md->insertinf($id,$nom,$add,$genre,$etat,$doc);
			 	 $this->session->set_flashdata('message','Ajout infrastructure faite avec succés') ;
			 redirect('users/acceuil');
			 	}

                }
        }
        public function message($object=null){
        	
		
        	$data["object"]=$object;
        	$data["user"]=$this->ion_auth->user()->row();
			if ($this->ion_auth->in_group("gerant")){
				$data["groupe"]="gerant";
        	$data["titre"]="gerant";}
			if($this->ion_auth->in_group("agent") || $this->ion_auth->is_admin()){
				$data["titre"]="agent";	$data["groupe"]="agent";
			}
		$data["b"]="lamine";
		
		$data["nombreinf"]=0;
		$data["object"]=$object;
        	$this->load->view("gerant/message",$data);
        }
        public function choixdeclarationtypedeclaration(){
        	
		
        	$data["user"]=$this->ion_auth->user()->row();
			$data["titre"]="gerant";
		$data["b"]="lamine";
		$data["groupe"]="gerant";
		 $this->load->view('base/main',$data,true);
			$this->load->view("gerant/choixdeclarationtypedec",$data);
        }
        public function declarationselvl(){
        	
		
        	$data["user"]=$this->ion_auth->user()->row();
		$group2="gerant";$group="agent";
		
	  $data['produit']=$this->md->selectproAtax();
		$data["titre"]="gérant";
		$data["groupe"]="gérant";
		
		$users=$this->ion_auth->user()->row();
		$data["listinfrastructure"]=$this->md->selectcon("infrastructuremarchande","id",$users->id);
		 $this->session->set_flashdata('message','veuillez renseigner la ligne 45 et 50') ;
		$data["listedec"]=$this->md->select('listedéclarationselvl');

		
		
        	$this->load->view('gerant/Declarationcelvl',$data);
        }
        public function insertdeclarationcelva(){
        	$user=$this->ion_auth->user()->row();
        	$inf=$this->input->post('infrastructure');
                $ninea=$user->id;  
        	$liste=$this->md->select("listedéclarationselvl");
        	$declaration=0;
        	$dateinsert=$this->md->dateInserstsel($inf);
	 foreach ($dateinsert->result() as $row ) {
$dateinsert=explode("-", $row->date);
$DateAndTime = date('Y-m');
$lam=$DateAndTime;
$iv=explode("-", $lam);
if($iv[0]==$dateinsert[0] and $iv[1]==$dateinsert[1]){
$declaration=1;
}
  

	
	 }
	 $a=$this->md->selectdernieridDeccelvl(); 
	 $iddeclaration=0;
foreach($a->result() as $row){
	$iddeclaration=$row->idDeclaration;}
	$iddeclaration=$iddeclaration+1;$i=0;$montant1=0;$montant2=0;
	
	 if($declaration==0){
		foreach($liste->result() as $row){
			$idliste=$row->idliste;
        		$montant=$this->input->post($idliste);
		if(!empty($montant)){
			if($idliste==50){
		   $this->fv->set_rules($idliste, 'Montant ligne 50', 'greater_than_equal_to[100]',
		   array('greater_than_equal_to' => 'veuillez renseigner le champs  %s correctement le Montant doit être supérieur ou égale à 100')
   );}
  
	$this->fv->set_rules($idliste, 'Montant', 'greater_than_equal_to[1]',
	array('greater_than_equal_to' => 'veuillez renseigner les champs  %s correctement le Montant doit être supérieur ou égale à 1' )
);
	   
 
  
		}
	}
		 if($this->fv->run()){
        	foreach($liste->result() as $row){
        		$idliste=$row->idliste;
        		$montant=$this->input->post($idliste);
  
        		

        		if($montant>0){
            if(!empty($montant)){
        			      		 if($i==0){
                  $montant1=$montant;$i++;
          }else{
          	$montant3=$montant;
         $montant2=(($montant+$montant1)*0.5)*0.15;
 }
 $this->session->set_flashdata('message','Déclaration faite avec succés pour plus de détail aller sur Déclaration puis Mes déclarations') ;
        			
        			$this->md->insertcel($inf,$ninea,$montant,$idliste,$iddeclaration);
}
        			
        		}

        	}
		}
		else{
			$data["user"]=$this->ion_auth->user()->row();
			$group2="gerant";$group="agent";
			
		  $data['produit']=$this->md->selectproAtax();
			$data["titre"]="gérant";
			$data["groupe"]="gérant";
			
			$users=$this->ion_auth->user()->row();
			$data["listinfrastructure"]=$this->md->selectcon("infrastructuremarchande","id",$users->id);
		
			$data["listedec"]=$this->md->select('listedéclarationselvl');
	
			
			$this->session->set_flashdata('message','Une des Montants au minimum doit être supérieur à 0') ;

				$this->load->view('gerant/Declarationcelvl',$data);

		}
        	if($montant2>0){
				$this->session->set_flashdata('message','Déclaration faite avec succés pour plus de détail aller sur Déclaration puis Mes déclarations') ;
        		$montantfacture=$montant2+(($montant1+$montant3)*0.15);
        		$this->md->insertFacture($inf,$montantfacture,$iddeclaration);
				redirect("users/acceuil");
        	}
			

        }
        else{
        	$data["erreur"]="<h6 class='text-primary'>vous avez déja fait une déclaration de cel vl pour cette infrastructure </h6><br><span class='alert-info'>veuillez cliquez le bouton en bas pour une redirection vers la page </span><br> <a class='btn btn-primary' href=".site_url('gerant/declarationselvl').">précédente</a></br>  ";
        	$this->load->view("erreur/erreur",$data);        }

        }
        public function Mesdeclaration(){
        	
		

        	$data["user"]=$this->ion_auth->user()->row();
        	$iduser=$this->ion_auth->user()->row();
        	$id=$iduser->id;
        	if($this->ion_auth->in_group("gerant")){

        		$data["titre"]="gerant";
		$data["groupe"]="gerant";
		$data["nombreinf"]=0;
		 $this->load->view('base/main',$data,true);
		 $data["Alimentaires"]=$this->md->Mesdeclaration($id);
		 $data["declarationcelvl"]=$this->md->celvl($id);
		 $this->load->view("gerant/MesDeclaration",$data);

        	
        }
        }
        public function MesFactures(){
        	
		
        	$data["user"]=$this->ion_auth->user()->row();
        	$iduser=$this->ion_auth->user()->row();
        	$id=$iduser->id;
        	if($this->ion_auth->in_group("gerant")){

        		$data["titre"]="gerant";
		$data["groupe"]="gerant";
		$data["nombreinf"]=0;
		 $this->load->view('base/main',$data,true);
		 $data["MesFactures"]=$this->md->factureGerant($id);
		
        	$this->load->view("gerant/MesFactures",$data);
        }
}
public function MesPaiement(){

		
        	$data["user"]=$this->ion_auth->user()->row();
        	$iduser=$this->ion_auth->user()->row();
        	$id=$iduser->id;
        	if($this->ion_auth->in_group("gerant")){

        		$data["titre"]="gerant";
		$data["groupe"]="gerant";
		$data["nombreinf"]=0;
		 $this->load->view('base/main',$data,true);
		 $data["MesPaiement"]=$this->md->MesPaiement($id);
		
        	$this->load->view("gerant/MesPaiement",$data);}
			else{
				$data["erreur"]="vous n'avez pas accés a cette page c'est pour les gérants";
			$this->load->view("erreur/erreur",$data);
			}
}
public function paie($numfact){
	$infofact=$this->md->selectcon("facture","id",$numfact);

	foreach($infofact->result() as $row){
	$data["montant_taxe"]=$row->Montantfact;
	$data["inf"]=$row->idInfrastructure;
	$data["datedemande"]=$row->date;
	$data["numerofacture"]=$row->id;

	}

	
		$user=$this->ion_auth->user()->row();
		$data["phone"]=$user->phone;
			$data["infras"]=$this->md->selectcon("infrastructuremarchande","id",$user->id);
			$data["date"]=$this->md->dateDeclaration($user->id);
		
       $data["info"]=$this->md->selectcon("infrastructuremarchande","id",$user->id);
       
 $this->load->view('gerant/demandeDepaiement',$data);
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
		$data["facture"]=$this->md->selectFacturecelvl($idinf,$date,$users->id);
		$data["listedec"]=$this->md->select('listedéclarationselvl');

		
		
        	$this->load->view('gerant/facturecelvlgerant',$data);
}
public function mesinfrastructures(){
$data["groupe"]="agent";
		$user=$this->ion_auth->user()->row();
		$data["user"]=$this->ion_auth->user()->row();
		$data["infras"]=$this->Mymodel_models->selectcon("infrastructuremarchande","id",$user->id);
		        	$this->load->view('gerant/mesinfrastructure',$data);



		}
		public function envoiemail(){
			$user=$this->ion_auth->user()->row();
			$message = $_POST['message'];
			$objet = $_POST['objet'];
			
			 $config = [
                                            'protocol' => 'smtp',
                                            'smtp_host' => 'ssl://smtp.googlemail.com',
                                            'smtp_port' => 465,
                                            'smtp_user' => 'adutax12@gmail.com',
                                            'smtp_pass' => 'aaaaaaaa@',
                                            'mailtype' => 'html'
                                        ];
                                         $this->load->library('email');
                            $this->email->initialize($config);
                            $this->load->helpers('url');
                            $this->email->set_newline("\r\n");
                                 $identity = $this->input->post($user->email);
                            $this->email->from($user->email);
                            $this->email->to("lamine785260388@gmail.com");
                            $this->email->subject($objet);
                           
                            $this->email->message($message);

                            if ($this->email->send()) {

                                $this->session->set_flashdata('success','Email Send sucessfully');
                               // return redirect('users/acceuil');
                            } 
		}
      
	}