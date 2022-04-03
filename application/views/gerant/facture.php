 
<?php $this->load->view('base/header');
$this->load->view('base/navbar');
$this->load->view('base/sidebar'); 
  foreach ($NumFacture->result() as $row){
                $numfac=$row->id;
                $montantfacture=$row->Montant;
               }
               foreach ($facture->result() as $row){
               
                $type=$row->type;
               }
?>

  <main id="main" class="main">

    <div class="pagetitle ne_pas_imprimer">
      
      
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
<tr class="h-100 align-items-center"><th></th> <th class="" ><h5 class="text-center card-title">Déclaration de Tva des produits <?php if($type=="Tabac"){ echo "Tabagiques";}else echo "Alimentaires" ;?></h5>
         <h5 ><strong >Les informations personnelles du gérant</strong></h5><br>
         <h4>-----------------------------------<h4>
          <h3> N°&nbsp;facture&nbsp;<?=$numfac;?><h3>
</tr>
    </table>
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
                  $email=$row->email;
                  $type=$row->type;
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
<td><span class=""><strong>Email</strong>:<?= $email;?></span></td>
  <td><span class="rounded float-right"><strong>Date facture</strong>:<?= $datefact;?></span></td>
  <tr><td></td> <td colspan="3" > <h6>J'atteste que toutes les informations fournies dans ce formulaire et ses annexes, <br>le cas échéant, sont complétes et éxactes </h6></td></tr>

</tr>
         </table>

             
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


