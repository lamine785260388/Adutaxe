 
<?php $this->load->view('base/header');
$this->load->view('base/navbar');
$this->load->view('base/sidebar'); ?>

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
             <h1 class="card-title text-center">MES FACTURES</h1>

              
             
              <!-- Active Table -->
              <table  class="table table-striped">
                <thead>
                
                  

                  <tr style="background-color: #154360; color: white;">
                        <th scope="col">Numéro Facture</th>
                  
                       <th scope="col">Nom infrastructure</th>
                   
                    <th scope="col">date</th>
                
                          <th scope="col">Montant</th>
                    <th scope="col">action</th>
                    
                    
                    
                  
                   
                    
                     
                  </tr>
                 
                </thead>
                <form name ="form" class="row g-3 needs-validation" method="POST" action="<?= site_url('demande/demandeDepaiement');?>"> 
                  

                <tbody> 

                    
   <?php 

   foreach ($MesFactures->result() as $row){ ?>

                  <tr>
                   <td><?= $row->id;?></td>
                   <td><?= $row->nomInfrastructure;?></td>
                   <td><?= $row->date;?></td>
                    <td><?= $row->Montant;?></td>

                   <td><a class =" btn btn-success" href="<?= site_url('gerant/paie').'/'.$row->id;?>"><i title=" payer" class="bi bi-cart3"></i></i></a></td>

                   </tr>
                 <?php };?>
                 
                 

                </tbody>
                    <tr>
                  <td></td>
               
                    </td> <td colspan="4"> <a class="btn btn-primary  w-50" href="<?= site_url('users/tableaudeboard')?>">imprimer</a></td></tr>

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


