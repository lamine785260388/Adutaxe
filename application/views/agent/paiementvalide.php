 
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
              <h1 class="card-title text-center">PAIEMENTS VALIDES</h1>

              
             
              <!-- Active Table -->
              <table  class="table table-striped">
                <thead>
                
                  

                  <tr style="background-color: #154360; color: white;">
                        <th scope="col">Numéro Facture</th>
                  
                       <th scope="col">Numéro Infrastructure</th>
                   
                    <th scope="col">Date</th>
                    <th scope="col">Mode de paiement</th>

                
                          <th scope="col">Montant</th>
                    <th scope="col">Paiement</th>
                    
                    
                    
                  
                   
                    
                     
                  </tr>
                 
                </thead>
                <form name ="form" class="row g-3 needs-validation" method="POST" action="<?= site_url('demande/demandeDepaiement');?>"> 
                  

                <tbody id="lessonList"> 

                    
   <?php 

   foreach ($MesPaiement->result() as $row){ ?>

                  <tr class="col-12">
                   <td><?= $row->NumFacture;?></td>
                   <td><?= $row->idinfrastructure;?></td>
                   <td><?= $row->datePaiement;?></td>
                   <td><?= $row->typePaiement;?></td>
                    <td><?= $row->Montant;?></td>

                   <td><a class =" btn btn-success" ><i title=" payer" class="bi bi-check2"></i></i></a></td>

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

  </main><!-- End #main -->
  <script type="text/javascript">
  
  $(document).ready(function(){
     $("#searchInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#lessonList .col-12").filter(function() {
           $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
     });
  }); 
  </script>

  <?php $this->load->view('base/footer');  ?>


