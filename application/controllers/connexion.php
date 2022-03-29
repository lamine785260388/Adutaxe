<?php
/**
* 
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class connexion extends My_controller
{
	public function __construct(){
		parent::__construct();
			
		
	}
	public function connexion(){
		$identity= $this->input->get_post('identifiant');
     	$password=$this->input->get_post('passe');
     	$souvernir=$this->input->get_post('souvenir');
     
		$remember = FALSE; // remember the user
	
	
		$this->ion_auth->login($identity, $password, $remember);
		 if ($this->ion_auth->logged_in()){
		 redirect('users/tableaudeboard');
		 }
		 else{
		 	$data["erreur"]="connexion echoué veuillez vérifier vos identifiants";
		 	$this->load->view("login",$data);
		 }
	}


	
	public function inscription(){

		
$config = array(
        array(
                'field' => 'nom',
                'label' => 'nom',
                'rules' => 'required|alpha',
                'errors' => array(
                        'required' => 'Le %s est obligatoire .',
                        'alpha' => 'Le %s ne doit pas contenir de caractére ni de chiffre .'

                ),
        ),
        array(
                'field' => 'prenom',
                'label' => 'prenom',
                'rules' => 'required|alpha',
                'errors' => array(
                        'required' => 'Le %s est obligatoire .',
                        'alpha' => 'Le %s ne doit pas contenir de caractere .'
                ),
        ),
         array(
                'field' => 'passe',
                'label' => 'passe',
                'rules' => 'required',
                'errors' => array(
                        'required' => 'Le %s est obligatoire .',
                ),
        ),
          array(
                'field' => 'confirmation',
                'label' => 'confirmation',
                'rules' => 'required|matches[passe]',
                'errors' => array(
                        'required' => 'Le %s est obligatoire .',
                        'matches' => 'Votre confirmation de mot de passe doit étre identique au mot de passe .'

                ),
        ),
           array(
                'field' => 'numero',
                'label' => 'numero',
                'rules' => 'required',
                'errors' => array(
                        'required' => 'Le %s est obligatoire .',

                        

                ),
        ),

    
      
        array(
                'field' => 'email',
                'label' => 'email',
                'rules' => 'required|valid_email',
                 'errors' => array(
                        'required' => 'Le %s est obligatoire .',
                ),
        )
);

$this->fv->set_rules($config);








				//$this->fv->set_rules('passe','passe','required|min_length[8]');
		//$this->fv->set_rules('confirmation','confirmation','required|min_length[8]|matches[passe]');
		if($this->fv->run()){
		
			$nom = $this->input->post('nom');
			$prenom = $this->input->post('prenom');
			
			$email = $this->input->post('email');
		$password = $this->input->post('passe');
		$username = $this->input->post('nomUtilisateur');
		$address = $this->input->post('address');
		$datenaiss = $this->input->post('datenaissance');
		$numero=$this->input->post('numero');
		$additional_data = array(
								'first_name' => $prenom,
								'last_name' => $nom,
								'company' => $username,
								'phone' => $numero,
								);
	if (!$this->ion_auth->email_check($email))
		{
			
			if ($this->ion_auth->is_admin()){
          $select=$this->input->post('groupe');
          if($select=="agent")
          	$group=array('4');
          elseif ($select=="admis")
          $group=array('1');
          else
          $group=array('5') ;

			}
			else{

			$group = array('5');}
			$this->ion_auth->register($email, $password, $email, $additional_data, $group);
			 	$this->session->set_flashdata('message','Inscription faite avec succés') ;
			 	$data["erreur"]="inscription faite avec succés";
 	$this->load->view("login",$data);
		}
 else{
 	$this->session->set_flashdata('message','cette email a déja été enregistré') ;
 	$this->load->view("inscription");
 }
	
}
else{
	
	 $this->load->view("inscription");
}

}
public function changepasse(){
			$this->fv->set_rules('passe','passe','required|min_length[8]');
		$this->fv->set_rules('confirmation','confirmation','required|min_length[8]|matches[passe]');
		if($this->fv->run()){
	$users=$this->ion_auth->user()->row();
	$email=$users->email;
	$passact = $this->input->post('passeact');
	$remember = TRUE; // remember the user
		if($this->ion_auth->login($email, $passact, $remember)){
    $passe = $this->input->post('passe');
    $confirmation = $this->input->post('confirmation');
$id = $users->id;
		$data = array(
					'first_name' => $users->first_name,
					'last_name' => $users->last_name,
					'password' => $passe,
					 );
		if($this->ion_auth->update($id, $data)){
		$this->session->set_flashdata('message','mot de passe changer avec succés'); ;

		redirect('users/acceuil');
				
			
		}

		}
		else{
			echo "<script> alert('votre mot de passe actuel est incorrect')</script>";
			
		}
	}
	else{
		$this->session->set_flashdata('message','vos mot de passe doivent avoir 8 caracteres et correspondre') ;

	}
}
public function oublie(){
			$this->load->view("passeoublie");
		}
		public function inscriptionview(){
			$this->load->view("inscription");
		}
		public function inscrireAgent(){
				$this->fv->set_rules('passe','passe','required|min_length[8]');
		$this->fv->set_rules('confirmation','confirmation','required|min_length[8]|matches[passe]');
		if($this->fv->run()){
		
			$nom = $this->input->post('nom');
			$prenom = $this->input->post('prenom');
			$nominf = $this->input->post('nominf');
			$email = $this->input->post('email');
		$password = $this->input->post('passe');
		$username = $this->input->post('nomUtilisateur');
		$address = $this->input->post('address');
		$datenaiss = $this->input->post('datenaissance');
		$numero=$this->input->post('numero');
		$additional_data = array(
								'first_name' => $prenom,
								'last_name' => $nom,
								'company' => $nominf,
								'phone' => $numero,
								);
	if (!$this->ion_auth->email_check($email))
		{
			
		
		$group=array("4");

			if($this->ion_auth->register($username, $password, $email, $additional_data, $group)){
				$this->session->set_flashdata('message','ajout réussi') ;
				redirect("users/listeagent");
		}
 else{
 	$this->session->set_flashdata('message','cette email a déja été enregistré') ;
 	 	redirect("users/listeagent");
 }
	
}
else{
	$this->session->set_flashdata('message','le mot de passe doit contenir plus de 8 caracteres') ;
	 redirect("users/listeagent");
}
	}


}
}