 
<?php $this->load->view('base/header');
$this->load->view('base/navbar');
$this->load->view('base/sidebar'); ?>

  <main id="main" class="main">


    <div class="pagetitle">
      <h1>Facture de taxes</h1>
      
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
       

     
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Suite à votre déclaration voici le montant de votre taxe à payer et les détails</h5>
               <?php
               $group="gerant"; if ($this->ion_auth->in_group($group)){ 
                echo "<span class='text-success'>Vos Informations personnelle</span></br>";
               } else{
                echo "<span class='text-success'>les informations du gérant et de son infrastructure</span>";
               } 
                foreach ($facture->result() as $row){
                  $prenom=$row->first_name;
                  $nom=$row->last_name;
                  $nominf=$row->nomInfrastructure;
                  $add=$row->adresse;
                  $id=$row->idInfrastructure;
                  $datefact=$row->Date;
                 }
                  ?>
                  <span> Prenom gérant:<?= $prenom."   " ;?></span><br>
                   <span>Nom Gérant:<?= $nom;?></span><br>
                   <span>Nom Infrastructure:<?= $nominf;?></span><br>
                   <span>AddresseInfrastructure:<?= $add;?></span><br>
                    <span>Date facture:<?= $datefact;?></span>
             
              <!-- Active Table -->
              <table  class="table table-striped">
                <thead>
                
                  

                  <tr>
                  
                    <th scope="col">Nature des Produits vendu</th>
                       <th scope="col">code</th>
                   
                    <th scope="col">quantité</th>

                    <th scope="col">UM</th>
                    <th scope="col">prixUnitaireMoyenne</th>
                    <th scope="col">Total des ventes</th>
                    <th scope="col">Taux de taxes</th>
                    <th scope="col">taxes à payer</th>
                    
                  
                   
                    
                     
                  </tr>

                 
                </thead>
                <form name ="form" class="row g-3 needs-validation" method="POST" action="<?= site_url('demande/demandeDepaiement');?>"> 
                  

                <tbody> 

                    
   <?php $total=0;$totalvente=0;

   foreach ($facture->result() as $row){ ?>

                  <tr>
                   <td><?php echo $row->natureProduit ?>  </td>
                    
                    <td><?php echo $row->codeCategorie ?></td>
                    <td><?php echo $row->quantiteStock ?></td>
                    <td><?php echo $row->uniteDeMesure ?></td>
                    <td><?php echo $row->prixUnitaire ?></td>
                    <td><?php $totalvente=$totalvente+$row->quantiteStock*$row->prixUnitaire; echo $row->quantiteStock*$row->prixUnitaire; ?></td>
                    <td><?php echo $row->tva ?></td>
                    <td><?php $total=$total+$row->tva*$row->quantiteStock*$row->prixUnitaire; echo $row->tva*$row->quantiteStock*$row->prixUnitaire; ?></td>
                   

                 
                               
                  </tr>
                   <?php } ;?>
                 

                </tbody>
                 <input type="hidden" name="idinf" value="<?= $id;?>">

                  <input type="hidden" name="montant" value="<?= $total;?>">
                  <input type="hidden" name="date" value=<?= $datefact ;?>>

              </form>
              </table>
             <h1>Alcool</h1>
               <table  class="table table-striped">
                <thead>
                
                  

                  <tr>
                  
                    <th scope="col">Nature des Produits vendu</th>
                       <th scope="col">code</th>
                   
                    <th scope="col">quantité(litre)</th>

                    <th scope="col">UM(litre)</th>
                    <th scope="col">prixparlitre</th>
                    <th scope="col">Total des ventes</th>
                     <th scope="col">tarif_litre</th>
                    <th scope="col">Taux de taxes</th>
                    <th scope="col">taxes à payer</th>
                    
                  
                   
                    
                     
                  </tr>
                 
                </thead>
                <form name ="form" class="row g-3 needs-validation" method="POST" action="<?= site_url('profile/demandeDepaiement/$id');?>"> 
                  

                <tbody> 

                    
   <?php $total1=$total;$totalvente1=$totalvente;

   foreach ($facturealcool->result() as $row){ ?>

                  <tr>
                   <td><?php echo $row->natureProduit ?>  </td>
                    
                    <td><?php echo $row->codeCategorie ?></td>
                    <td><?php echo $row->quantiteStock ?></td>
                    <td><?php echo $row->uniteDeMesure ?></td>
                    <td><?php echo $row->prixUnitaire ?></td>
                    <td><?php $totalvente1=$totalvente1+$row->quantiteStock*$row->prixUnitaire; echo $row->quantiteStock*$row->prixUnitaire; ?></td>
                    <td><?php $row->tarif_litre ;?>
                    <td><?php echo $row->tva ?></td>
                    <td><?php $total1=$total1+($row->tva*$row->quantiteStock*$row->prixUnitaire)+($row->quantiteStock*$row->tarif_litre); echo ($row->tva*$row->quantiteStock*$row->prixUnitaire)+($row->quantiteStock*$row->tarif_litre); ?></td>
                   

                 
                               
                  </tr>
                   <?php } ;?>
                  <tr>
                    <td>Total:</td>
                   <td colspan="4" style="text-align: right;" class="text-success width-100 ">Total Des ventes:</td><td><strong><?= $totalvente1;?></strong></td>
                   <td class="text-success">Taxes à payer</td>
                   <td><strong><?= $total1;?></strong></td> 
                 </tr>

                </tbody>
                <input type="hidden" name="idinf" value="<?= $id;?>">

                  <input type="hidden" name="montant" value="<?= $total;?>">
                  <tr>
                  <td></td>
                  <?php $group="gerant" ; if ($this->ion_auth->in_group($group))
    { ?>
                    <td colspan="5">  <button href="<?= site_url('demande/demandeDepaiement');?>" id="valider" class="btn btn-primary w-75" type="submit" name="insert">Paiement</button><?php };?>
                    </td> <td colspan="4"> <a class="btn btn-danger w-75" href="<?= site_url('users/tableaudeboard')?>">Acceuil</a></td></tr>

              </form>
              </table>

              <div class="container">
                <div class="row">
              <table>
                
              </table>
              </div>
              </div>
              <!-- End Active Table -->

            </div>
          </div>


         

        </div>

      

          

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <?php $this->load->view('base/footer');  ?>s


