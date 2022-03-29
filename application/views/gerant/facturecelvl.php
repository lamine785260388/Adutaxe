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
      <img height='188px' width='530px'src="<?= base_url('assets/img/logo-adu.jpg');?>" class="rounded float-left" alt="..."></td><td></td>
      <h4 class="rounded float-right">DGID-Ministere  des Finances </br>et du budget</h4>
</td>
</tr>
<tr class="h-90 align-items-center">

<td></td>
<td></td>
<td></td>


  <th class=" text-center" ><h5><strong>CEL SUR LA VALEUR LOCATIVE</strong></h5></th></tr>
<tr> 
  <?php if($this->ion_auth->in_group("gerant")){?>
   <td> Prenom:<strong><?php echo " ".$prenom;?></strong></td>
   
   
   </tr>
  <tr>
    <td>Nom:<strong><?php echo $nom;?></strong>  </td>
  

  
    </tr>
    <tr><td>Email:<strong><?php echo " ".$email;?></strong></td></tr>
    <tr>  <td class="align-item:right;">telephone:<strong><?php echo " ".$tel;?></strong> </td></tr>
  <?php };?><tr>
  </tr>
    <tr><td></td> <td colspan="3" > <h6>J'atteste que tous les informations fournies dans ce formulaire et ses annexes, le cas échéant, sont complétes et éxactes </h6></td></tr>
  
<tr><td></td></tr>

       </table>
         <?php
               
               $group="gerant"; if ($this->ion_auth->in_group($group)){
                echo "<span class='text-success'>Vos Informations personnelle</span></br>";
               } else{
                
               } 
                foreach ($infrastructure->result() as $row){
                  $ninea=$row->id;
                 
                  $nominf=$row->nomInfrastructure;
                  $add=$row->adresse;
                  $id=$row->idInfrastructure;
                 
                 }
                  ?>
                 
                  <span><strong>Ninea:<?= $ninea;?></strong></span><br>
                   <span><strong>Nom Infrastructure:<?= $nominf;?></strong></span><br>
                   <span><strong>AddresseInfrastructure:<?= $add;?></strong></span><br>
                    <br><br><br>
       <div>
         
       </div>
  
             
             
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
                  
                    
                    
                       <?php }; ?>
                               
                  </tr>
                
                    

                 
                </tbody>

              </form>
              </table>
              <!-- End Active Table -->
               

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
 <script type="text/javascript">
                      document.getElementsByClassName('desactiver').disabled = true; 
                     
function confirmation() {
 return confirm("toutes les informations entrer ci_dessous sont t'elles correctes");
    
};
                    </script>

 <?php $this->load->view('base/footer'); ?> 


