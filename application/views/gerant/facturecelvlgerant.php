<?php 
$this->load->view('base/header');
$this->load->view('base/navbar');
$this->load->view('base/sidebar');?>
<?php
if($this->ion_auth->in_group("gerant")){
  $prenom=$user->first_name;
  $nom=$user->last_name;
  $tel=$user->phone;
  $email=$user->email;
  }$montant1=0;
  $montant2=0;$i=0;
                 foreach ($facture->result() as $row ) {

 if($i==0){
  $montant1=$row->Montant;$i++;
 }else{
  $montant2=$row->Montant;
 }

                 }
                 if($this->ion_auth->is_admin() || $this->ion_auth->in_group("agent")){
                  foreach($facture->result() as $row){
                    $Ninea=$row->id;
  $idinf=$row->idInfrastructure;
  

                  }
                 }
                 foreach ($facture->result() as $row){
                
                
                  $numerofact=$row->id;
                
                 
                 }
     
   ?>

  <main id="main" class="main">

    <div class="pagetitle">
      
      <span>  <?php if($this->session->message){;?>
   

       
<div class="alert alert-success alert-dismissible fade show" role="alert">
               <?= $this->session->message;?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>    
 <?php  };?></span>
      
 </div><!-- End Page Title -->

   


<section class="section">
  <div class="row">
   
     <div class="card" id="imprimer">
        <div class="card-body">
      
     <table> 
       <tr>   
     <td>         
  <img height="400px" width="500px"  src="<?= base_url('assets/img/logo-adu1.jpg');?>" class="rounded float-left img-fluid" alt="..."><td></td>
  </td>
        <h4 class="rounded float-right m-3 ">DGID-Ministere des Finances </br>et du budget</h4>


</tr>
<tr class="h-100 align-items-center"><th></th> <th class="h-100 align-items-center" ><h5 class="text-center card-title"> </h5><h5 ><strong class="text-center "></strong></h5></th></tr>
<tr>
     <tr>   
   <td>         
 


</tr>
<tr class="h-100 align-items-center"><th></th> <th class="" ><h5 class="text-center card-title">CEL SUR LA VALEUR LOCATIVE </h5>
         <h5 ><strong >Les informations personnelles du gérant</strong></h5><br>
         <h4>-----------------------------------<h4>
          <h3> N°&nbsp;facture&nbsp;<?= $numerofact;?><h3>
</tr>
    </table>
           <?php
           
           $group="gerant"; if ($this->ion_auth->in_group($group)){
              ;
               } else{
               
               } 
                foreach ($facture->result() as $row){
                
                  $nominf=$row->nomInfrastructure;
                  $add=$row->adresse;
                  $id=$row->idInfrastructure;
                  $datefact=$row->Date;
                  $numerofact=$row->id;
                
                 
                 }
                  ?>
                  <table  class="table table-borderless py-1">

<tr>
  <td><span> <strong>Prenom gérant</strong>:<?= $prenom."   " ;?></span></td>
  <td><span class="rounded float-right"><strong>Nom de l'infrastructure</strong>:<?= $nominf;?></span></td>
</tr>
<tr>

  <td><span ><strong>Nom gérant</strong>:<?= $nom;?></span></td>
  <td><span class="rounded float-right"><strong>adresse de l'nfrastructure</strong>:<?= $add;?></span></td><br>



</tr>
<tr>
<td><span class=""><strong>Email:</strong><?= $email ;?></span></td>
  <td><span class="rounded float-right"><strong>Date facture</strong>:<?= $datefact;?></span></td>
  <tr><td></td> <td colspan="3" > <h6>J'atteste que toutes les informations fournies dans ce formulaire et ses annexes, <br>le cas échéant, sont complétes et éxactes </h6></td></tr>

</tr>
         </table>

             
              <!-- Active Table -->
              <table  class="table table-borderless">
                <thead>
                 
    
                  <tr>
                  
                    <th scope="col">Annexe fiscale</th>
                   
                   

                    
                    <th scope="col">ligne</th>
                    <th>Montant</th>
                    
                  
                   
                    
                     
                  </tr>
                 
                </thead>
                <form name ="form" class="row g-3 needs-validation" method="POST" action="<?= site_url('gerant/insertdeclarationcelva');?>">
                  

                <tbody> 
                  <?php   foreach ($listedec->result() as $row ) {
     ?>
                  <tr>
                   <td><?php echo $row->libelle ?></td>
                    <td><?php echo  $row->idliste;?> </td>
                  
                    <?php if($row->idliste==45){?>
                      <td> <?= $montant2 ?></td>
                    <?php };?>
                     <?php if($row->idliste==50){?>
                      <td> <?= $montant1 ?></td>
                    <?php };?>
                     <?php  if($row->idliste==65){?>
                      <td> <?php $total1=(($montant1+$montant2)*0.5)*0.15; echo (($montant1+$montant2)*0.5)*0.15; ?></td>
                    <?php };?>
                     <?php if($row->idliste==85){?>
                      <td> <?php $total2=(($montant1+$montant2)*1)*0.15; echo (($montant1+$montant2)*1)*0.15; ?></td>
                    <?php };?>
        
                  <?php if($row->idliste==95){?>
                      <td> <strong> <?php echo $total1+$total2; ?></strong></td>

                    <?php };?>
                    <?php if($row->idliste==90){?>
                      <td>  <?php echo 12;?></td>
                      
                    <?php };?>
                    
                    
                       <?php }; ?>
                               
                  </tr>
                 
                    

                 
                </tbody>

              </form>
              </table>
              <!-- End Active Table -->
                <script type="text/javascript">
                      document.getElementsByClassName('desactiver').disabled = true; 
                     
function confirmation() {
 return confirm("toutes les informations entrer ci_dessous sont t'elles correctes");
    
};
                    </script>

            </div>
          </div>

<button id="valider" class="btn btn-primary w-50"   onclick="imprimer('imprimer');">Imprimer</button>
         

        </div>

      

          

        
    </section>


  </main><!-- End #main -->
   <script>
function imprimer(divName) {
      var printContents = document.getElementById(divName).innerHTML;    
   var originalContents = document.body.innerHTML;      
   document.body.innerHTML = printContents;     
   window.print();     
   document.body.innerHTML = originalContents;
   }
</script>

 <?php $this->load->view('base/footer'); ?> 


