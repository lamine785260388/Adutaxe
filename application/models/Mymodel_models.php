<?php
/**
* 
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Mymodel_models extends CI_Model
{
public function lam(){
	return "lamine";
}
public function DemandePaiement($inf,$id,$numeroP,$type,$datepaiement,$montant,$numfact){
	
	$data = array(
        'idPaiement' => '.',
        'idinfrastructure' => $inf,
         'id' => $id,
        'numeroPaiement' => $numeroP,
         'typePaiement' => $type,
         'datePaiement' => $datepaiement,
         'Montant' => $montant,
         'NumFacture' => $numfact,
         'etat' => 'impaye'
);

$this->db->insert('paiement', $data);

}
public function select($a){
	
	return $this->db->get($a);
}
public function delete($nomtable,$id){
	$this->db->delete($nomtable, array('idInfrastructure' => $id));
}
public function selectcon($nomtable,$nomcolonne,$id){
	 return $this->db->get_where($nomtable, array($nomcolonne => $id));
}

public function insertInf($id,$nom,$add,$genre,$etat,$doc){
	$data = array(
		'idInfrastructure'=>".",
		 'id'=>$id,
         'nomInfrastructure' => $nom,
        'adresse' => $add,
        'genre' => $genre,
        'etat' => $etat,
        'DocumentAdministrative'=>$doc
);

$this->db->insert('infrastructuremarchande', $data);

}

public function listgerant(){

}
public function selectproA(){
	 return $this->db->get_where('produit', array('idInfrastructure' => '0','genre'=>'Alimentaire'));
}
public function selectproAtax(){
	return $query = $this->db->query(" select *from categorie,taxes where categorie.codeCategorie=taxes.codeCategorie and genre='Alimentaire' ");
}
public function insertProduit($idinf,$prix,$quantite,$codecat,$type,$iddec){
	$DateAndTime = date('Y-m-d');  
	$data = array(
        'idproduit' => NULL,
        'idInfrastructure' => $idinf,
        'prixUnitaire' => $prix,
        'quantiteStock' => $quantite,
        'codeCategorie'=>$codecat,
        'date'=>$DateAndTime,
        'type'=>$type,
        'idDeclaration'=>$iddec



);

$this->db->insert('produit', $data);}

public function selectFacture($id,$date,$type){
	$this -> db -> select ( '*' ); 
$this -> db -> from ( 'produit' ); 
$this -> db -> join ( 'infrastructuremarchande' ,  'produit.idInfrastructure=infrastructuremarchande.idInfrastructure' ); 
$this -> db -> join ( 'users' ,  'infrastructuremarchande.id=users.id' );
$this -> db -> join ( 'categorie' ,  'produit.codeCategorie=categorie.codeCategorie' );
$this -> db -> join ( 'taxes' ,  'produit.codeCategorie=taxes.codeCategorie ' ); 
$this -> db -> where ( 'Produit.date' ,  $date );
$this -> db -> where ( 'Produit.type' ,  $type );
return $query  =  $this -> db -> get ();
  

	
}

public function selectFactureAlcool($id,$date){

$this -> db -> select ( '*' ); 
$this -> db -> from ( 'produit' ); 
$this -> db -> join ( 'infrastructuremarchande' ,  'produit.idInfrastructure=infrastructuremarchande.idInfrastructure' ); 
$this -> db -> join ( 'users' ,  'infrastructuremarchande.id=users.id' );
$this -> db -> join ( 'categorie' ,  'produit.codeCategorie=categorie.codeCategorie' );
$this -> db -> join ( 'taxes' ,  'produit.codeCategorie=taxes.codeCategorie ' ); 
$this -> db -> where ( 'Produit.date' ,  $date );
$where = "(categorie.genre='alcool')";
$this -> db -> where ( $where);
return $query  =  $this -> db -> get ();
}



public function selectPro($id){
return $this->db->query("SELECT *from produit where idInfrastructure=".$id);
}
public function selectcatAlimentaire($inf){
	return $this->db->query("select *from produit,categorie where categorie.codeCategorie=produit.codeCategorie and categorie.genre='Alimentaire' and produit.idInfrastructure=".$inf);
}
public function selectproTtax(){
	return $query = $this->db->query(" select *from categorie,taxes where categorie.codeCategorie=taxes.codeCategorie and genre='Tabac' ");
}
public function selectcatTabac($inf){
	return  $this->db->query("SELECT date FROM produit,categorie where produit.codeCategorie=categorie.codeCategorie and genre='Tabac' and produit.idInfrastructure=".$inf." LIMIT 0,1");
}
public function verifAlcool($inf,$date){
	$this -> db -> select ( '*' ); 
$this -> db -> from ( 'produit' ); 
$this -> db -> join ( 'categorie' ,  'produit.codeCategorie=categorie.codeCategorie' );
$this -> db -> where ( 'Produit.date' ,  $date );
$this -> db -> where ( 'Produit.idInfrastructure' ,  $inf );
$where = "(categorie.genre='alcool')";
$this -> db -> where ( $where);
return $query  =  $this -> db -> get ();
//return $query=$this->db->query("SELECT * FROM produit,categorie where categorie.codeCategorie=produit.codeCategorie and genre='alcool' and produit.idInfrastructure=".$inf);
}
public function selectproAlctax(){
	return $query = $this->db->query(" select *from categorie,taxes where categorie.codeCategorie=taxes.codeCategorie and genre='alcool' ");

}
public function selectdatinsertAlimentaire($inf){
	return  $this->db->query("SELECT DISTINCT date FROM produit,categorie where produit.codeCategorie=categorie.codeCategorie and genre='Alimentaire' and produit.idInfrastructure=".$inf);
}
public function selectdatinsertalcool($inf){
	return  $this->db->query("SELECT date FROM produit,categorie where produit.codeCategorie=categorie.codeCategorie and genre='alcool' and produit.idInfrastructure=".$inf." LIMIT 0,1");
}
public function dateDeclaration($id){
	return $this->db->query("select distinct date from produit,infrastructuremarchande where produit.idInfrastructure=infrastructuremarchande.idInfrastructure and infrastructuremarchande.id=".$id);
}
public function dateDeclarationPro($id){
	return $this->db->query("select distinct date from produit,infrastructuremarchande where produit.idInfrastructure=infrastructuremarchande.idInfrastructure and Produit.idInfrastructure=".$id);
}
public function verifalimentaire($inf,$date){
	$this -> db -> select ( '*' ); 
$this -> db -> from ( 'produit' ); 
$this -> db -> join ( 'categorie' ,  'produit.codeCategorie=categorie.codeCategorie' );
$this -> db -> where ( 'Produit.date' ,  $date );
$where = "(categorie.genre='Alimentaire' and categorie.genre='tabac')";
$this -> db -> where ( $where);
return $query  =  $this -> db -> get ();
}
public function nombreInfrastructure(){
	$this->db->query("select * from infrastructuremarchande");
return $this->db->affected_rows();
}
public function nombreDemandePaiement(){
	$this->db->query("select * from demandepaiement");
return $this->db->affected_rows();
}
public function nombreInfrastructuregerant($id){
	$this->db->query("select * from infrastructuremarchande where id=".$id);
return $this->db->affected_rows();
}
public function insertcel($idinf,$ninea,$montant,$idliste,$iddec){
	$date = date('Y-m-d');
	$data = array(
		'id'=>".",
		 'idInfrastructure'=>$idinf,
         'date' => $date,
        'Montant' => $montant,
        'ninea' => $ninea,
        'id_listedeclaration' => $idliste,
         'idDeclaration' => $iddec
        
);

$this->db->insert('declarationselvl', $data);

}
public function dateInserstsel($inf){
	return $this->db->query("SELECT DISTINCT date from declarationselvl where idinfrastructure=".$inf);
}
public function updateInf($idinf,$nom,$address,$genre,$etat,$doc){
	$data = array(
        'nomInfrastructure' => $nom,
        'adresse'  => $address,
        'genre'  => $genre,
        'etat'  => $etat,
        'DocumentAdministrative'  => $doc
);
	$this->db->where('idInfrastructure', $idinf);

$this->db->update('infrastructuremarchande', $data);
}
public function selectdatepaiemen($inf){
	return $this->db->query("select datePaiement from paiement where etat='impaye' and idInfrastructure=".$inf);
}
public function updatePaiement($idinf,$montant,$type){
	$data = array(
        'montant' => $montant,
        'typePaiement'=>$type
        
);

$this->db->where('idinfrastructure', $idinf);
$this->db->update('paiement', $data);
}
public function selectMontantfacture($inf,$type){
	$date = date('Y-m-d');
		$this -> db -> select ( '*' ); 
$this -> db -> from ( 'produit' ); 
$this -> db -> join ( 'taxes' ,  'produit.codeCategorie=taxes.codeCategorie' );
$this -> db -> where ( 'Produit.date' ,  $date );
$this -> db -> where ( 'Produit.idInfrastructure' ,  $inf );
$this -> db -> where ( 'Produit.type' ,  $type);
$this->db->order_by('idproduit', 'DESC');
$this->db->limit(1);
return $query  =  $this -> db -> get ();

}
public function insertFacture($inf,$montant,$iddec){
	$date = date('Y-m-d');
	$data = array(
		'id'=>".",
		 'date'=>$date,
        'Montantfact' => $montant,
        'idInfrastructure' => $inf,
        'idDeclaration' => $iddec,
        'status' => "impaye"
       
        
);

$this->db->insert('facture', $data);

}
public function selectMontantfactureAlcool($inf,$type){
	$date = date('Y-m-d');
		$this -> db -> select ( '*' ); 
$this -> db -> from ( 'produit' ); 
$this -> db -> join ( 'taxes' ,  'produit.codeCategorie=taxes.codeCategorie' );
$this -> db -> join ( 'categorie' ,  'produit.codeCategorie=categorie.codeCategorie' );
$this -> db -> where ( 'Produit.date' ,  $date );
$this -> db -> where ( 'Produit.idInfrastructure' ,  $inf );
$this -> db -> where ( 'Produit.type' ,  $type);
$this->db->order_by('idproduit', 'DESC');
$this->db->limit(1);
return $query  =  $this -> db -> get ();

}
public function Mesdeclaration($id){
	
		$this -> db -> select ( '*' ); 
$this -> db -> from ( 'produit' ); 
$this -> db -> join ( 'infrastructuremarchande' ,  'produit.idinfrastructure=infrastructuremarchande.idinfrastructure' );
$this->db->where("id",$id);
$this->db->group_by("type","date");
return $query  =  $this -> db -> get ();

}
public function selectdernieridDec(){

		$this -> db -> select ( 'idDeclaration' ); 
$this -> db -> from ( 'produit' ); 
$this -> db -> join ( 'infrastructuremarchande' ,  'produit.idinfrastructure=infrastructuremarchande.idinfrastructure' );
$this->db->order_by('idDeclaration', 'DESC');
$this->db->limit(1);
return $query  =  $this -> db -> get ();

}
public function voirDeclarationinf($idinf){
	
		$this -> db -> select ( '*' ); 
$this -> db -> from ( 'produit' ); 
$this -> db -> join ( 'infrastructuremarchande' ,  'produit.idinfrastructure=infrastructuremarchande.idinfrastructure' );
$this->db->where("produit.idInfrastructure",$idinf);
$this->db->group_by("type","date");
return $query  =  $this -> db -> get ();

}

public function nombredeDec($id){
			$this -> db -> select ( '*' ); 
$this -> db -> from ( 'infrastructuremarchande' ); 
$this -> db -> join ( 'produit' ,  'produit.idinfrastructure=infrastructuremarchande.idinfrastructure' );
$this -> db -> join ( 'users' ,  'users.id=infrastructuremarchande.id' );
$this->db->where("users.id",$id);
$this->db->group_by("type","Date");
return $query= $this->db->get();

//select *from infrastructuremarchande,produit,users where infrastructuremarchande.id=users.id and produit.idInfrastructure=infrastructuremarchande.idInfrastructure GROUP by type
}
public function factureInf($inf,$type){
		$this -> db -> select ( '*' ); 
$this -> db -> from ( 'produit' ); 
$this -> db -> join ( 'facture' ,  'produit.idDeclaration=facture.idDeclaration' );
$this -> db ->where ( 'type' ,  $type );
$this->db->where("produit.idInfrastructure",$inf);
$this->db->group_by("type","Date");
return $query= $this->db->get();

//SELECT *from produit,facture where  type="Alimentaires" and produit.idDeclaration=facture.idDeclaration group by type
}
public function factureGerant($id){
	$this -> db -> select ( '*' ); 
$this -> db -> from ( 'infrastructuremarchande' ); 
$this -> db -> join ( 'facture' ,  'facture.idInfrastructure=infrastructuremarchande.idInfrastructure' );

$this -> db ->where ( 'facture.status' ,  "impaye" );
$this -> db ->where ( 'infrastructuremarchande.id' ,  $id );

return $query= $this->db->get();
//SELECT *from paiement,facture where (paiement.NumFacture=facture.id or paiement.NumFacture!=facture.id) and etat="impaye"

}
public function celvl($id){
	$this -> db -> select ( '*' ); 
$this -> db -> from ( 'infrastructuremarchande' ); 
$this -> db -> join ( 'declarationselvl' ,  'declarationselvl.idInfrastructure=infrastructuremarchande.idInfrastructure' );
$this -> db ->where ( 'infrastructuremarchande.id' ,  $id );
$this->db->group_by("idDeclaration");
return $query= $this->db->get();


}
public function selectdernieridDeccelvl(){

		$this -> db -> select ( 'idDeclaration' ); 
$this -> db -> from ( 'declarationselvl' ); 

$this->db->order_by('idDeclaration', 'DESC');
$this->db->limit(1);
return $query  =  $this -> db -> get ();

}
public function selectFacturecelvl($idinf,$date,$iduser){

		$this -> db -> select ( '*' ); 
$this -> db -> from ( 'infrastructuremarchande' ); 
$this -> db -> join ( 'declarationselvl' ,  'declarationselvl.idInfrastructure=infrastructuremarchande.idInfrastructure' );
$this -> db -> join('facture','facture.idDeclaration=declarationselvl.idDeclaration');
$this -> db ->where ( 'infrastructuremarchande.id' ,  $iduser );
$this -> db ->where ( 'declarationselvl.idInfrastructure' ,  $idinf );
$this -> db ->where ( 'declarationselvl.Date' ,  $date);

return $query  =  $this -> db -> get ();

}
public function voirDeclarationcelvl($idinf){
	
		$this -> db -> select ( '*' ); 
$this -> db -> from ( 'declarationselvl' ); 
$this -> db -> join ( 'infrastructuremarchande' ,  'declarationselvl.idinfrastructure=infrastructuremarchande.idinfrastructure' );
$this->db->where("declarationselvl.idInfrastructure",$idinf);
$this->db->group_by("date");
return $query  =  $this -> db -> get ();

}
public function voirFacturecelvl($idinf,$date){

		$this -> db -> select ( '*' ); 
$this -> db -> from ( 'infrastructuremarchande' ); 
$this -> db -> join ( 'declarationselvl' ,  'declarationselvl.idInfrastructure=infrastructuremarchande.idInfrastructure' );

$this -> db ->where ( 'declarationselvl.idInfrastructure' ,  $idinf );
$this -> db ->where ( 'declarationselvl.Date' ,  $date);

return $query  =  $this -> db -> get ();

}
public function updatePaiementApresValidation($id){
	$data = array(
        'etat' => "paye"
        
);
	$this->db->where('NumFacture', $id);

$this->db->update('paiement', $data);

}
public function messageValiadation($id,$Numfact){
	$Date = date('Y-m-d'); 
	$message="votre facture N°".$Numfact." a été validé";
	$data = array(
        'idusers' => $id,
        'message' => $message,
        'Date' => $Date
         
);

$this->db->insert('messagerie', $data);

}
public function updatefacture($id){
	$data = array(
        'status' => "paye"
        
);
	$this->db->where('id', $id);

$this->db->update('facture', $data);

}

public function MesPaiement($id){
		$this -> db -> select ( '*' ); 
$this -> db -> from ( 'paiement' );
$this->db->join("infrastructuremarchande","paiement.idinfrastructure=infrastructuremarchande.idinfrastructure") ;

$this -> db ->where ( 'paiement.id' ,  $id );


return $query  =  $this -> db -> get ();

}
public function insertevalue($etat,$doc,$id,$idinf,$idagent){
	$Date = date('Y-m-d'); 

	$data = array(
        'idEvaluation' => '.',
        'dateEvaluation' => $Date,
         'etat' => $etat,
        'rapport' => $doc,
         'id_user' => $id,
         'idInfrastructure' => $idinf,
         'idagent' => $idagent
);

$this->db->insert('evaluation', $data);

}
public function message($id,$Message){
	$Date = date('Y-m-d'); 
	
	$data = array(
        'idusers' => $id,
        'message' => $Message,
        'Date' => $Date
         
);

$this->db->insert('messagerie', $data);

}
public function montant_taxe($etat){
	$this->db->select_sum('Montantfact');
	$this -> db ->where ( 'status' ,  $etat );
 return $query = $this->db->get('facture'); 
}
public function nombredeDeccel($id){
	$this -> db -> select ( '*' ); 
$this -> db -> from ( 'infrastructuremarchande' ); 
$this -> db -> join ( 'declarationselvl' ,  'declarationselvl.idinfrastructure=infrastructuremarchande.idInfrastructure' );
$this -> db -> join ( 'users' ,  'users.id=infrastructuremarchande.id' );
$this->db->where("users.id",$id);
$this->db->group_by("Date");
return $query= $this->db->get();

//select *from infrastructuremarchande,produit,users where infrastructuremarchande.id=users.id and produit.idInfrastructure=infrastructuremarchande.idInfrastructure GROUP by type
}
public function MontantTaxesgerant($id){
	$this->db->select_sum('Montantfact');
	$this->db->from('facture');
	$this->db->join("infrastructuremarchande","facture.idinfrastructure=infrastructuremarchande.idinfrastructure") ;
	$this -> db ->where ( 'status' ,  "paye" );
	$this -> db ->where ( 'infrastructuremarchande.id' ,  $id );

 return $query = $this->db->get(); 

	//SELECT SUM(Montant) FROM facture WHERE status="paye" and facture.id=890516
}
public function selectdatevaluation($idinf){
	$this -> db -> select ( 'dateEvaluation' ); 
$this -> db -> from ( 'evaluation' ); 
$this -> db ->where ( 'idinfrastructure' ,  $idinf);

$this->db->order_by('idEvaluation', 'DESC');
$this->db->limit(1);
return $query  =  $this -> db -> get ();


	//SELECT * FROM `evaluation` where idinfrastructure=48 ORDER by  idEvaluation desc LIMIT 1
}
public function verifdeamandepaiement($NumFacture){
	$this->db->query("select * from paiement where NumFacture=".$NumFacture);
return $this->db->affected_rows();

}

}
?>