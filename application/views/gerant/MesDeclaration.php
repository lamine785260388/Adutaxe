 
<?php $this->load->view('base/header');
$this->load->view('base/navbar');
$this->load->view('base/sidebar'); ?>

  <main id="main" class="main">

    <div class="pagetitle">
      
      
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
       

     
          <div class="card">
          
            <div class="card-body">
              <h1 class="card-title text-center">MES DECLARATIONS</h1>

              
             
              <!-- Active Table -->
              <table  class="table table-striped">
                <thead>
                
                  

                  <tr style="background-color: #154360; color: white;">
                        <th scope="col">type de declaration</th>
                  
                       <th scope="col">nom infrastructure</th>
                   
                    <th scope="col">date</th>
                

                    <th scope="col">action</th>
                    
                    
                    
                  
                   
                    
                     
                  </tr>
                 
                </thead>
                <form name ="form" class="row g-3 needs-validation" method="POST" action="<?= site_url('demande/demandeDepaiement');?>"> 
                  

                <tbody> 

                    
   <?php 

   foreach ($Alimentaires->result() as $row){ ?>

                  <tr>
                   <td>TVA:<?= " ".$row->type;?></td>
                   <td><?= $row->nomInfrastructure;?></td>
                   <td><?= $row->Date;?></td>

                   <td><a title="Consultation" href="<?= site_url('produit/facturation/').$row->idInfrastructure.'/gerant/'.$row->Date."/".$row->type;?>"><i class="bi bi-eye btn btn-primary"></i></a></td>

                   </tr>
                 <?php };?>
                  <?php 

   foreach ($declarationcelvl->result() as $row){ ?>
    <tr>
                 <td>CEL_VL</td>
                   <td><?= $row->nomInfrastructure;?></td>
                   <td><?= $row->Date;?></td>
                  <td><a title="Consultation" href="<?= site_url('gerant/facturecelvl/'.$row->idInfrastructure.'/'.$row->Date)?>"><i class="bi bi-eye btn btn-primary"></i></a></td></tr>
<?php };?>
                </tbody>
                    <tr>
                  <td></td>
               
                    </td> </tr>

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

  <?php $this->load->view('base/footer');  ?>


