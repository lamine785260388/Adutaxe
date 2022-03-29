 
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
              <h1 class="card-title text-center">EVALUATION</h1>

              
             
              <!-- Active Table -->
              <table  class="table table-striped">
                <thead>
                
                  

                  <tr style="background-color: #154360; color: white;">
                        <th scope="col">#</th>
                  
                       <th scope="col">Ninea gerant</th>
                       <th scope="col">Code agent</th>
                       <th scope="col">Idinfranstructure</th>
                       
                   
                    <th scope="col">Date evaluation</th>
                

                    <th scope="col">etat</th>
                    <th scope="col">rapport</th>

                    
                    
                    
                  
                   
                    
                     
                  </tr>
                 
                </thead>
                <form name ="form" class="row g-3 needs-validation" method="POST" action="<?= site_url('demande/demandeDepaiement');?>"> 
                  

                <tbody> 

                    
                  <?php $num=1; foreach ($listevaluaton->result() as $row) { ?>
                   
               
                  <tr>
                   

                   <td><?php echo $num; $num++;?></td>
                    <td><?= $row->id_user;?></td>
                    <td><?= $row->idagent;?></td>
                    <td><?= $row->idinfrastructure;?></td>
                    <td><?= $row->dateEvaluation;?></td>
                    <td><?= $row->etat;?></td>
                    <td> <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?php echo 'basicModal'.$row->idEvaluation;?>">
                rapport
              </button></td>
                   

                   </tr>
                    <div class="row">
        <div class="col-lg-6">

          
              
              

              <!-- Basic Modal -->
             
              <div class="modal fade" id="<?php echo 'basicModal'.$row->idEvaluation;?>" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Rapport</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <img src="<?php echo base_url('upload/').$row->rapport;?>">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                 
              </div>
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

  </main><!-- End #main -->

  <?php $this->load->view('base/footer');  ?>


