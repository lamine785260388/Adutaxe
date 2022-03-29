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
      <h1>Déclaration de Tva de produits Alimentaires</h1>
      
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
       


          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Déclaration de Tva de produits Alimentaires</h5>
              
          
         <table> 
         <tr>   
         <td>         
      <img src="<?= base_url('assets/img/ddi.jpg');?>" class="rounded float-left" alt="..."></td><td></td>
<img height="188px" width="268px" src="<?= base_url('assets/assets/img/arriere.png');?>" class="rounded float-right" alt="..."></td>
</tr>
<tr class="h-100 align-items-center"><th></th> <th class="h-100 align-items-center" ><h5 >Les informations personnels du gérant</h5></th></tr>
<tr>
   <td> Prenom:<strong><?php echo " ".$prenom;?></strong></td>
   
   
   </tr>
  <tr>
    <td>Nom:<strong><?php echo $nom;?></strong>  </td>
  

  
    </tr>
    <tr><td>Email:<strong><?php echo " ".$email;?></strong></td></tr>
    <tr>  <td class="align-item:right;">telephone:<strong><?php echo " ".$tel;?></strong> </td></tr>
    <tr><td></td> <td colspan="3" > <h6>J'atteste que tous les informations fournis dans ce formulaire et ses annexes, le cas échéan, sont complétent et éxactes </h6></td></tr>
<tr><td></td></tr>

       </table>
       <div>
         
       </div>
  
             
             
              <!-- Active Table -->
              <table  class="table table-borderless">
                <thead>
                 
    
                  <tr>
                  
                    <th scope="col">Nature des Produits vendu</th>
                   
                    <th scope="col">quantité</th>

                    <th scope="col">UM</th>
                    <th scope="col">prixUnitaireMoyenne</th>
                    
                  
                   
                    
                     
                  </tr>
                 
                </thead>
                <form name ="form" class="row g-3 needs-validation" method="POST" action="<?= site_url('produit/insertProduit');?>">
                  

                <tbody> 
                  <?php   foreach ($produit->result() as $row ) {
     ?>
                  <tr>
                   <td><?php echo $row->natureProduit ?></td>
                    
                    <td><input class="form-control" id="quantite" type="number" name="quantite<?= $row->codeCategorie;?>" value="<?= set_value('quantite'.$row->codeCategorie);?>"></td>
                    <td><?php echo $row->uniteDeMesure ?></td>
                    <td><input id="prix" class="form-control" type="number" name="prix<?= $row->codeCategorie;?>" value="<?= set_value('prix'.$row->codeCategorie);?>"></td>
                  
                    
                    
                    
                    
                       <?php }; ?>
                               
                  </tr>
                  <tr> <td colspan="4" class="text-danger width-auto text-center">Veuillez selectionner l'infrastructure à déclarer:<select class="form-select" name="infrastructure" >
                    <?php foreach ($listinfrastructure->result() as $row) { ?>
                    <option value="<?= $row->idInfrastructure;?>"><?php echo $row->nomInfrastructure." :".$row->adresse ;?></option>
                  <?php };?>
                  </select></td> </tr><tr>
                    <td colspan="2">  <button class="btn btn-primary w-75" type="submit" name="valider" value="Alimentaires">valider</button>
                    </td> <td colspan="2"> <a class="btn btn-danger w-75" href="<?= site_url('users/acceuil');?>">annuler</a></td></tr>
                    <script type="text/javascript">
                      var element = document.getElementById('');
element.onclick = function() {
var res = confirm("Êtes-vous sûr de vouloir supprimer?");
    if(res){
      alert("suis la");
      alert(chemin);
      return window.location.href=('delete?id='+chemin);

    }
    else{
      alert ("vous avez annulé la requéte pour supprimer");
    }
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


