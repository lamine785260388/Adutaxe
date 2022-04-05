<?php 
$this->load->view('base/header');
$this->load->view('base/navbar');
$this->load->view('base/sidebar');?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>listes des demande de paiement</h1>
     
                  <?php if($this->session->message){;?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <h5 class="alert-heading"><?= $this->session->message;?> </h5>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">x </span>
    </button>
 <?php  };?>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
       


          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Voici la liste</h5>
             
              <!-- Active Table -->
              <table  class="table table-bordered">
                <thead>
                 
    
                  <tr style="background-color: #154360; color: white;" >
                  
                    <th scope="col">#</th>
                    <th scope="col">Ninéa</th>
                    <th scope="col">Numero Facture</th>
                    <th scope="col">Numéro paiement</th>
                    <th scope="col">Mode de Paiement</th>
                    <th scope="col">Action</th>
                     
                  </tr>
                 
                </thead>
                <tbody id="lessonList">
                  <?php $num=1;   foreach ($demandepaiement->result() as $row ) {
     ?>
                  <tr class="col-12">
                   <td> <?php echo $num;$num++; ?></</td>
                    <td> <?php echo $row->id ?></</td>
                    <td><?php echo $row->NumFacture ?></td>
                    <td><?php echo $row->numeroPaiement ?></td>
                  
                    <td><?php echo $row->typePaiement ?></td>
                    <td> 

                     
                      
                    <a href="<?= site_url('Messagerie/messagerie/'.$row->id.'/'.$row->NumFacture);?>" title="valider paiement" class="btn btn-success"><i class="bi bi-check2-square"></i>&nbsp;valider</a> <?php }; ?></td>

 
                      
                  </tr>
              
                </tbody>
              </table>
              <!-- End Active Table -->

            </div>
          </div>


         

        </div>

      

          

        </div>
      </div>
    </section>
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

  </main><!-- End #main -->

 <?php $this->load->view('base/footer'); ?> 


