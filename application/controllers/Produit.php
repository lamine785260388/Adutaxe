<?php
/**
* 
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Produit extends My_controller
{
	public function __construct(){
		parent::__construct();
	 if ($this->ion_auth->logged_in() === FALSE) { 
			$this->load->view('login'); }
				
			

		
	}
	public function listproduit($id=null){
		
		
     if($id==null){
		$data["user"]=$this->ion_auth->user()->row();
		$group2="gerant";$group="agent";
		if ($this->ion_auth->in_group($group2))
		{
	  $data['produit']=$this->md->selectproAtax();
		$data["titre"]="gérant";
		$data["groupe"]="gérant";
		
		$users=$this->ion_auth->user()->row();
		$data["listinfrastructure"]=$this->md->selectcon("infrastructuremarchande","id",$users->id);
		$this->load->view("gerant/DeclarationProduit",$data);
	}
}
elseif ($id=="Tabac") {

	$data["user"]=$this->ion_auth->user()->row();
		$group2="gerant";
		if ($this->ion_auth->in_group($group2))
		{
	  $data['produit']=$this->md->selectproTtax();
		$data["titre"]="gérant";
		$data["groupe"]="gérant";
		
		$users=$this->ion_auth->user()->row();
		$data["listinfrastructure"]=$this->md->selectcon("infrastructuremarchande","id",$users->id);
		$this->load->view("gerant/DeclarationProduitTabac",$data);
	}
	
}
elseif($id=="alcool") {
	$data["user"]=$this->ion_auth->user()->row();
		$group2="gerant";
		if ($this->ion_auth->in_group($group2))
		{
	  $data['produit']=$this->md->selectproAlctax();
		$data["titre"]="gérant";
		$data["groupe"]="gérant";
		
		$users=$this->ion_auth->user()->row();
		$data["listinfrastructure"]=$this->md->selectcon("infrastructuremarchande","id",$users->id);
		$this->load->view("gerant/DeclarationProduitAlcool",$data);
}
	
}
}

public function calcultva(){
$prod=$this->md->selectproAtax();
$c=0;
 foreach ($prod->result() as $row ) {
 	
 	$codeCategorie=$this->input->post($row->codeCategorie);
 	echo $codeCategorie;

}
}
public function insertProduit(){
	
	$verif=0;$declaration=0;
	$id = $this->input->post('infrastructure');
	$type=$this->input->post('valider');
	$a=$this->md->selectdernieridDec();
foreach($a->result() as $row){
	$iddeclaration=$row->idDeclaration;}
	$iddeclaration=$iddeclaration+1;
	if($type=="Alimentaires"){
		 $Date = date('d-Y');  
		$prod=$this->md->selectproAtax();
	$dateinsert=$this->md->selectdatinsertAlimentaire($id);
	 foreach ($dateinsert->result() as $row ) {
$dateinsert=explode("-", $row->date);
$DateAndTime = date('Y-m');
$lam=$DateAndTime;
$iv=explode("-", $lam);
if($iv[0]==$dateinsert[0] and $iv[1]==$dateinsert[1]){
$declaration=1;
}
  

	
	 }
	 if ($declaration==0){
	 	$montantfacture=0;
 foreach ($prod->result() as $row ) {
 	$prix=$this->input->post('prix'.$row->codeCategorie);
 	$quantite=$this->input->post('quantite'.$row->codeCategorie);
 	$codeCategorie=$row->codeCategorie;
 	if($quantite>0 && $prix>0){
 		$this->md->insertProduit($id,$prix,$quantite,$codeCategorie,$type,$iddeclaration);
 		$selectfacture=$this->md->selectMontantfacture($id,$type);
 		foreach($selectfacture->result() as $fact){
             $montantfacture=$montantfacture+$fact->prixUnitaire*$fact->quantiteStock*$fact->tva;  
 		}
 		$verif=1;
 	}


}
}
else{
	echo "vous avez déja fait une déclaration de produit Alimentaire pour cette infrastructure dans ce mois<a href=".site_url('produit/listproduit')."> cliquez pour revenire à la page précédente</a>";
}
if($verif==1){
	$this->md->insertFacture($id,$montantfacture,$iddeclaration);
	$Date= date('Y-m-d'); 
redirect('Produit/facturation/'.$id.'/gerant/'.$Date.'/'.$type);
}
}
elseif ($type=="Tabac") {
		$prod=$this->md->selectproTtax();
	$infras=$this->md->selectcatTabac($id);
	 foreach ($infras->result() as $row ) {
	 	$dateinsert=explode("-", $row->date);
$DateAndTime = date('Y-m');
$lam=$DateAndTime;
$iv=explode("-", $lam);
if($iv[0]==$dateinsert[0] and $iv[1]==$dateinsert[1]){
$declaration=1;
}
	 }
	 if ($declaration!=1){
 foreach ($prod->result() as $row ) {
 	$prix=$this->input->post('prix'.$row->codeCategorie);
 	$quantite=$this->input->post('quantite'.$row->codeCategorie);
 	$codeCategorie=$row->codeCategorie;
 	if($quantite>0 && $prix>0){
 	
 		$this->md->insertProduit($id,$prix,$quantite,$codeCategorie,$type,$iddeclaration);
 		$selectfacture=$this->md->selectMontantfacture($id,$type);
 		foreach($selectfacture->result() as $fact){
             $montantfacture=$montantfacture+$fact->prixUnitaire*$fact->quantiteStock*$fact->tva;  
 		}
 		$verif=1;

 	}


}
}
else{
	echo "vous avez déja fait une déclaration de produit Tabagisme pour cette infrastructure <a href=".site_url('produit/listproduit').">cliquez pour revenire à la page précédente</a>";
}
if($verif==1){
	$this->md->insertFacture($id,$montantfacture,$iddeclaration);
	$Date = date('Y-m-d'); 
redirect('Produit/facturation/'.$id.'/gerant/'.$Date.'/'.$type);
}
	
}
elseif ($type=="alcool") {
 $Date = date('d-Y');  
		$prod=$this->md->selectproAlctax();
	$dateinsert=$this->md->selectdatinsertalcool($id);
	 foreach ($dateinsert->result() as $row ) {
$dateinsert=explode("-", $row->date);
$DateAndTime = date('Y-m');
$lam=$DateAndTime;
$iv=explode("-", $lam);
if($iv[0]==$dateinsert[0] and $iv[1]==$dateinsert[1]){
$declaration=1;
}
  

	
	 }
	 if ($declaration!=1){
 foreach ($prod->result() as $row ) {
 	$prix=$this->input->post('prix'.$row->codeCategorie);
 	$quantite=$this->input->post('quantite'.$row->codeCategorie);
 	$codeCategorie=$row->codeCategorie;
 	if($quantite>0 && $prix>0 ){
 		$this->md->insertProduit($id,$prix,$quantite,$codeCategorie,$type,$iddeclaration);
 		$selectfacture=$this->md->selectMontantfactureAlcool($id,$type);

 		foreach($selectfacture->result() as $fact){
             $montantfacture=$montantfacture+($fact->prixUnitaire*$fact->quantiteStock*$fact->tva)+($fact->quantiteStock*$fact->tarif_litre);  
 		}
 		$verif=1;
 	}


}
}
else{
	echo "vous avez déja fait une déclaration de produit Alcoolique pour ce mois-ci infrastructure dans ce mois<a href=".site_url('produit/listproduit')."> cliquez pour revenire à la page précédente</a>";
}
if($verif==1){
	$Date = date('Y-m-d'); 
	$this->md->insertFacture($id,$montantfacture,$iddeclaration);
redirect('Produit/facturation/'.$id.'/gerant/'.$Date.'/'.$type);
}
}
}
public function facturation($idinf,$users,$date,$type){

	$verification="true";$verifalcool=0;
	$alcool=$this->md->verifAlcool($idinf,$date);

	
	foreach ($alcool->result() as $row ) {
		if($row->idInfrastructure==$idinf){
      $verifalcool=1;
		}
	}
	if($verifalcool==1){
		$verifali=$this->md->verifalimentaire($idinf,$date);
		foreach ($verifali->result() as $row ) {
		if($row->idInfrastructure==$idinf){
      $verifalcool=2; 

		}

	}
}

	if($type=="Alimentaires"){  

	if($idinf!=null and $users=="gerant"){
		$verif3=0;
		$verif=$this->ion_auth->user()->row();
		$inf=$this->md->selectcon("infrastructuremarchande","id",$verif->id);
		foreach ($inf->result() as $row ) {
			if($row->idInfrastructure==$idinf){
				$verification="false";$verif3=1;
		$data["user"]=$this->ion_auth->user()->row();
		$data["groupe"]="gérant";
		$data["facture"]=$this->md->selectFacture($idinf,$date,$type);
        $data["NumFacture"]=$this->md->factureInf($idinf,$type);
        $this->load->view('gerant/facture',$data);
	}
	else {
		
	}
	
	}
}
	
	elseif ($users=="agent" || $users=="admin"){
                 
		$group="agent"; if ( $this->ion_auth->in_group($group) || $this->ion_auth->is_admin() ){



			$data["user"]=$this->ion_auth->user()->row();
		$data["groupe"]="agent";
		$data["facture"]=$this->md->selectFacture($idinf,$date,$type);
		$infras=$this->md->selectPro($idinf); $verif=0;
		foreach ($infras->result() as $row) {
      if ($idinf==$row->idInfrastructure){
      	$verif=1;
      }
		}
		if($verif==1){
			 $data["NumFacture"]=$this->md->factureInf($idinf,$type);
		$this->load->view('gerant/facture',$data);
			}
	else{
		echo "cette infrastructure n'a pas encore fait de déclaration";}
       
		}
		else{
			echo "erreur de connexion ou vous n'avez pas une l'autorisation néccessaire d'acceder a cette ressources ";
		}
	
}
	elseif ($users=="admin") {
		if($this->ion_auth->is_admin()){
			$group="admin"; if ($this->ion_auth->in_group($group)){
			$data["user"]=$this->ion_auth->user()->row();
		$data["groupe"]="agent";
		$data["facture"]=$this->md->selectFacture($idinf,$date,$type);
		 $data["NumFacture"]=$this->md->factureInf($idinf,$type);
		$this->load->view('gerant/facture',$data);
		}
		else{
			echo "erreur de connexion ou vous n'avez pas une l'autorisation néccessaire d'acceder a cette ressources ";
		}
	}


}
else{
	echo "erreur de connexion ou vous n'avez pas une l'autorisation néccessaire ";}

}
elseif ($verifalcool==2) {
	// code por calculer la facture d'une infrastructure qui a de l'alcool
		if($idinf!=null and $users=="gerant"){
		$verif=$this->ion_auth->user()->row();
		$inf=$this->md->selectcon("infrastructuremarchande","id",$verif->id);
		foreach ($inf->result() as $row ) {
			if($row->idInfrastructure==$idinf){
				$verification="false";
		$data["user"]=$this->ion_auth->user()->row();
		$data["groupe"]="gérant";
		$facture=$this->md->selectFacture($idinf,$date,$type);
		
		$data["facturealcool"]=$this->md->selectFactureAlcool($idinf,$date);
		$this->load->view('gerant/factureInfAlcool',$data);
	}
	
	
	}
}
elseif ($users=="agent" || $users=="admin"){
                 
		$group="agent"; if ( $this->ion_auth->in_group($group) || $this->ion_auth->is_admin() ){



			$data["user"]=$this->ion_auth->user()->row();
		$data["facture"]=$this->md->selectFacture($idinf,$date,$type);
		$infras=$this->md->selectPro($idinf); $verif=0;
		foreach ($infras->result() as $row) {
      if ($idinf==$row->idInfrastructure){
      	$verif=1;
      }
		}
		if($verif==1){
		$data["groupe"]="agent";
		$data["facture"]=$this->md->selectFacture($idinf,$date,$type);
		$data["facturealcool"]=$this->md->selectFactureAlcool($idinf,$date);
		$data["NumFacture"]=$this->md->factureInf($idinf,$type);
		$this->load->view('gerant/factureInfAlcool',$data);}
	else{
		echo "cette infrastructure n'a pas encore fait de déclaration";}
       
		}
		else{
			echo "erreur de connexion ou vous n'avez pas une l'autorisation néccessaire d'acceder a cette ressources ";
		}
	
}

}
if($type=="alcool"){
	if($idinf!=null and $users=="gerant"){
		$verif=$this->ion_auth->user()->row();
		$inf=$this->md->selectcon("infrastructuremarchande","id",$verif->id);
		foreach ($inf->result() as $row ) {
			if($row->idInfrastructure==$idinf){
				$verification="false";
		$data["user"]=$this->ion_auth->user()->row();
		$data["groupe"]="gérant";
		$data["facturealcool"]=$this->md->selectFactureAlcool($idinf,$date);
		 $data["NumFacture"]=$this->md->factureInf($idinf,$type);
		$this->load->view('gerant/facturealcoolsimple',$data);
	}
	
	}
}
elseif ($users=="agent" || $users=="admin"){
                 
		$group="agent"; if ( $this->ion_auth->in_group($group) || $this->ion_auth->is_admin() ){



			$data["user"]=$this->ion_auth->user()->row();
		$data["facture"]=$this->md->selectFacture($idinf,$date,$type);
		$infras=$this->md->selectPro($idinf); $verif=0;
		foreach ($infras->result() as $row) {
      if ($idinf==$row->idInfrastructure){
      	$verif=1;
      }
		}
		if($verif==1){
		$data["groupe"]="agent";
		$data["facturealcool"]=$this->md->selectFactureAlcool($idinf,$date);
		$data["NumFacture"]=$this->md->factureInf($idinf,$type);
		$this->load->view('gerant/facturealcoolsimple',$data);}
	else{
		echo "cette infrastructure n'a pas encore fait de déclaration";}
       
		}
		else{
			echo "erreur de connexion ou vous n'avez pas une l'autorisation néccessaire d'acceder a cette ressources ";
		}
	
}


}
elseif($type=="Tabac"){
	if($idinf!=null and $users=="gerant"){
		$verif3=0;
		$verif=$this->ion_auth->user()->row();
		$inf=$this->md->selectcon("infrastructuremarchande","id",$verif->id);
		foreach ($inf->result() as $row ) {
			if($row->idInfrastructure==$idinf){
				$verification="false";$verif3=1;
		$data["user"]=$this->ion_auth->user()->row();
		$data["groupe"]="gérant";
		$data["facture"]=$this->md->selectFacture($idinf,$date,$type);
 $data["NumFacture"]=$this->md->factureInf($idinf,$type);
		$this->load->view('gerant/facture',$data);
	}
	else {
		
	}
	
	}
}
	
	elseif ($users=="agent" || $users=="admin"){
                 
		$group="agent"; if ( $this->ion_auth->in_group($group) || $this->ion_auth->is_admin() ){



			$data["user"]=$this->ion_auth->user()->row();
		$data["groupe"]="agent";
		$data["facture"]=$this->md->selectFacture($idinf,$date,$type);
		$infras=$this->md->selectPro($idinf); $verif=0;
		foreach ($infras->result() as $row) {
      if ($idinf==$row->idInfrastructure){
      	$verif=1;
      }
		}
		if($verif==1){
			 $data["NumFacture"]=$this->md->factureInf($idinf,$type);

		$this->load->view('gerant/facture',$data);
			}

	else{
		echo "cette infrastructure n'a pas encore fait de déclaration";}
       
		}
		else{
			echo "erreur de connexion ou vous n'avez pas une l'autorisation néccessaire d'acceder a cette ressources ";
		}
	
}
	elseif ($users=="admin") {
		if($this->ion_auth->is_admin()){
			$group="admin"; if ($this->ion_auth->in_group($group)){
			$data["user"]=$this->ion_auth->user()->row();
		$data["groupe"]="agent";
		$data["facture"]=$this->md->selectFacture($idinf,$date,$type);
		 $data["NumFacture"]=$this->md->factureInf($idinf,$type);
		$this->load->view('gerant/facture',$data);
		}
		else{
			echo "erreur de connexion ou vous n'avez pas une l'autorisation néccessaire d'acceder a cette ressources ";
		}
	}


}
else{
	echo "erreur de connexion ou vous n'avez pas une l'autorisation néccessaire ";}
	
}


}


}