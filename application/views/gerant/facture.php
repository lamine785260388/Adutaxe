 
<?php $this->load->view('base/header');
$this->load->view('base/navbar');
$this->load->view('base/sidebar'); 
  foreach ($NumFacture->result() as $row){
                $numfac=$row->id;
                $montantfacture=$row->Montant;
               }
?>

  <main id="main" class="main">

    <div class="pagetitle ne_pas_imprimer">
      
      
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
       

     
          <div class="card" id="imprimer">
            
              <table><br>
             
                 <tr>   
         <td>         
      <img height='188px' width='530px'src="<?= base_url('assets/img/logo-adu.jpg');?>" class="rounded float-left" alt="..."></td><td></td>
      
</td>
</tr></table>
            <div class="card-body">
              <h5 class="card-title text-center">Facture N°<strong><?= $numfac ;?></h5>

               <?php
             
               $group="gerant"; if ($this->ion_auth->in_group($group)){
                echo "<span class='text-success'>Vos Informations personnelle</span></br>";
               } else{
               
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
                    <span>Date facture:<?= $datefact;?></span><br>
                    <br>
                        
             
              <!-- Active Table -->
              <table  class="table table-striped">
                <thead>
                
                  

                  <tr style="background-color: #154360; color: white;">
                  
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
                  <tr>
                    <td>Total:</td>
                   <td colspan="4" style="text-align: right;" class="text-success width-100 ">Total Des ventes:</td><td><strong><?= $totalvente;?></strong></td>
                   <td class="text-success">Taxes à payer</td>
                   <td><strong><?= $total;?></strong></td> 
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

  <?php $this->load->view('base/footer');  ?>s


