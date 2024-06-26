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
      <h1></h1>
      <?php if(validation_errors()){;?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <h5 class="alert-heading"><?= validation_errors();?> </h5>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">x </span>
    </button>
 <?php  };?>
      
    </div><!-- End Page Title -->


    <section class="section">
      <div class="row">
       


          <div class="card">
            <div class="card-body">
            <table> 
         <tr>   
<tr>   
         <td>         
      <img height="400px" width="500x"  src="<?= base_url('assets/img/logo-adu1.jpg');?>" class="rounded float-left img-fluid" alt="...">
      </td>
            <h4 class="rounded float-right m-3">DGID-Ministere des Finances </br>et du budget</h4>


</tr>
<tr class="h-100 align-items-center"><th></th> <th class="h-100 align-items-center" ><h5 class="text-center card-title">Déclaration de tva de produit alcoolique </h5><h5 ><strong class="text-center p-1">Les informations personnelles du gérant</strong></h5></th></tr>
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
              
             
              <!-- Active Table -->
              <table  class="table table-bordered">
                <thead>
                 
    
                  <tr>
                  
                    <th scope="col">Nature des Produits vendu</th>
                   
                    <th scope="col">quantité(litre)</th>

                    <th scope="col">UM</th>
                    <th scope="col">prix(litre)</th>
                    
                  
                   
                    
                     
                  </tr>
                 
                </thead>
                <form name ="form" class="row g-3 needs-validation" method="POST" action="<?= site_url('produit/insertProduit');?>">
                  

                <tbody> 
                  <?php $i=1;  foreach ($produit->result() as $row ) {
                    if($i==1){
                      echo "<tr><td class='text-success' colspan='4'><strong>biére d'un titrage inférieur à 6%</strong></td></tr>";
                    }
                    if($i==5){
                      echo "<tr><td class='text-success' colspan='4'><strong>biére d'un titrage supérieur à 6%</strong></td></tr>";
                    }
                     if($i==10){
                      echo "<tr><td class='text-success' colspan='4'><strong>Vin</strong></td></tr>";
                    }
                     if($i==22){
                      echo "<tr><td class='text-success' colspan='4'><strong>Boisson alcoolisé</strong></td></tr>";
                    }
                     if($i==36){
                      echo "<tr><td class='text-success' colspan='4'><strong>Autres alcool et Boisson alcoolisé</strong></td></tr>";
                    }
     ?>
                  <tr>
                   
                   <td><?php echo $row->natureProduit ?></td>
                    
                    <td><input id="quantite<?= $row->codeCategorie;?>" class="form-control" id="quantite" type="number" name="quantite<?= $row->codeCategorie;?>" value="<?= set_value('quantite'.$row->codeCategorie);?>" step="0.001"></td>
                    <td><?php echo $row->uniteDeMesure ?></td>
                    <td><input id="prix" class="form-control" type="number" name="prix<?= $row->codeCategorie;?>" value="<?= set_value('prix'.$row->codeCategorie);?>" step="0.001"></td>
                  
                    
                    
                    
                    
                       <?php $i++;}; ?>
                               
                  </tr>
                  <tr> <td colspan="4" class="text-danger width-auto text-center">Veuillez selectionné l'infrastructure à déclaré:<select class="form-select" name="infrastructure" >
                    <?php foreach ($listinfrastructure->result() as $row) { ?>
                    <option value="<?= $row->idInfrastructure;?>"><?php echo $row->nomInfrastructure." :".$row->adresse ;?></option>
                  <?php };?>
                  </select></td> </tr><tr>
                    <td colspan="2">  <button class="btn btn-primary w-75" type="submit" name="valider" value="alcool">valider</button>
                    </td> <td colspan="2"> <a class="btn btn-danger w-75" href="<?= site_url('users/acceuil');?>">annuler</a></td></tr>
                    <script type="text/javascript">
                      var element = document.getElementById('quantite320');
element.onclick = function() {

    alert("veuillez donnez le nombre de paquet de 20 pour les trois prochaines lignes a partir de celle_ci");
};
                    </script>

                 
                </tbody>

              </form>
              </table>
              <!-- End Active Table -->

            </div>
          </div>


         

        </div>

      

          

        </div>
      </div>
    </section>


  </main><!-- End #main -->

 <?php $this->load->view('base/footer'); ?> 


