<?php 
$this->load->view('base/header');
$this->load->view('base/navbar');
$this->load->view('base/sidebar');?>
<?php
  $prenom=$user->first_name;
  $nom=$user->last_name;
  $tel=$user->phone;
  $email=$user->email;
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
       


          <div class="card">
            <div class="card-body">
              <h5 class="card-title">veuillez remplir le formulaire</h5>
              
          
         <table> 
         <tr>   
<tr>   
         <td>         
      <img height="400px" width="500x"  src="<?= base_url('assets/img/logo-adu1.jpg');?>" class="rounded float-left img-fluid" alt="...">
      </td>
            <h4 class="rounded float-right m-3">DGID-Ministere des Finances </br>et du budget</h4>


</tr>
<tr class="h-100 align-items-center"><th></th> <th class="h-100 align-items-center" ><h5 class="text-center card-title">Contribution Economique Locale sur La valeur Locative </h5><h5 ><strong class="text-center p-1">Les informations personnelles du gérant</strong></h5></th></tr>
<tr>
   <td> Prenom:<strong><?php echo " ".$prenom;?></strong></td>
   
   
   </tr>
  <tr>
    <td>Nom:<strong><?php echo $nom;?></strong>  </td>
  

  
    </tr>
    <tr><td>Email:<strong><?php echo " ".$email;?></strong></td></tr>
    <tr>  <td class="align-item:right;">telephone:<strong><?php echo " ".$tel;?></strong> </td></tr>
    <tr><td></td> <td colspan="3" > <h6>J'atteste que tous les informations fournies dans ce formulaire et ses annexes, le cas échéant, sont complétes et éxactes </h6></td></tr>
<tr><td></td></tr>

       </table>
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
                    <?php if(($row->idliste==20) || ($row->idliste==35)  || ($row->idliste==25 )  || ($row->idliste==40) ||  ($row->idliste==60) || ($row->idliste==65) || ($row->idliste==80) || ($row->idliste==85) || ($row->idliste==95) || ($row->idliste==5)|| ($row->idliste==10) || ($row->idliste==15)|| ($row->idliste==55)|| ($row->idliste==70)|| ($row->idliste==75)|| ($row->idliste==90) ){ ?>
                      <td><input   class="form-control" type="number"  name="<?= $row->idliste;?>" disabled="disabled"></td>
                    <?php } else{?>
                    
                    <td><input  class="form-control" type="number" name="<?= $row->idliste;?>"></td>
 <?php };?>                  
                    
                  
                    
                    
                       <?php }; ?>
                               
                  </tr>
                  <tr> <td colspan="4" class="text-danger width-auto text-center">Veuillez selectionné l'infrastructure à déclaré:<select class="form-select" name="infrastructure" >
                    <?php foreach ($listinfrastructure->result() as $row) { ?>
                    <option value="<?= $row->idInfrastructure;?>"><?php echo $row->nomInfrastructure." :".$row->adresse ;?></option>
                  <?php };?>
                  </select></td> </tr><tr>
                    <td colspan="2">  <button onclick=" return confirmation();" class="btn btn-primary w-75" type="submit" name="valider" value="Alimentaires">valider</button>
                    </td> <td colspan="2"> <a class="btn btn-danger w-75" href="<?= site_url('users/acceuil');?>">annuler</a></td></tr>
                    

                 
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


         

        </div>

      

          

        </div>
      </div>
    </section>


  </main><!-- End #main -->

 <?php $this->load->view('base/footer'); ?> 


