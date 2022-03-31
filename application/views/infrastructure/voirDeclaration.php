 
<?php $this->load->view('base/header');
$this->load->view('base/navbar');
$this->load->view('base/sidebar');
foreach($document->result() as $row){
  $doc=$row->DocumentAdministrative;
} 
?>

  <main id="main" class="main">

    <div class="pagetitle">
      
      
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
       

     
          <div class="card">
          
            <div class="card-body">
              <h1 class="card-title text-center">MES DECLARATIONS</h1>
 <div class="container my-3">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fullscreenModal">
                Declaration administrative
              </button>
            </div>
             
              <!-- Active Table -->
              <table  class="table table-striped">
                <thead>
                
                  

                  <tr style="background-color: #154360; color: white;">
                        <th scope="col">type Declaration</th>
                  
                       <th scope="col">Nom infrastructure</th>
                   
                    <th scope="col">date</th>
                

                    <th scope="col">action</th>
                    
                    
                    
                  
                   
                    
                     
                  </tr>
                 
                </thead>
                <form name ="form" class="row g-3 needs-validation" method="POST" action="<?= site_url('demande/demandeDepaiement');?>"> 
                  

                <tbody> 
                 
    
   <?php $total=0;$totalvente=0;

   foreach ($Alimentaires->result() as $row){ ?>

                  <tr>
                   <td>TVA:<?= " ".$row->type;?></td>
                   <td><?= $row->nomInfrastructure;?></td>
                   <td><?= $row->Date;?></td>

                   <td><a title="Consultation" href="<?= site_url('produit/facturation/').$row->idInfrastructure.'/agent/'.$row->Date."/".$row->type;?>">consulter</a></td>

                   </tr>
                 <?php };?>
                  <?php $total=0;$totalvente=0;

   foreach ($declarationcelvl->result() as $row){ ?>

                  <tr>
                   <td>CElVL</td>
                   <td><?= $row->nomInfrastructure;?></td>
                   <td><?= $row->Date;?></td>

                   <td><a title="Consultation" href="<?= site_url('infrastructure/facturecelvl/'.$row->idInfrastructure.'/'.$row->Date)?>">consulter</a></td>

                   </tr>
                 <?php };?>
                 
                 

                </tbody>
                   

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

               <div class="modal fade" id="fullscreenModal" tabindex="-1">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Document Administrative</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="container-fluide ">
                      <div class="container-fluide">
    <div class="container-fluide row">
        <div class="container-fluide col-4 mx-auto">
                     <img class=" " src="<?= base_url("upload/").$doc;?>">
                   </div></div></div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    
                    </div>
                  </div>
                </div>
              </div>
              

  </main><!-- End #main -->

  <?php $this->load->view('base/footer');  ?>


