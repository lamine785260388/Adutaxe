<?php
/**
* 
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Messagerie extends My_controller
{
	public function __construct(){
		parent::__construct();
		$group="gerant";
	 if (!$this->ion_auth->is_admin()) { 
			redirect("redirect/login"); }
			}
			public function messagerie($id,$Numfact){
				$this->md->updatePaiementApresValidation($Numfact);
				$this->md->messageValiadation($id,$Numfact);
				$this->md->updatefacture($Numfact);
			}
}