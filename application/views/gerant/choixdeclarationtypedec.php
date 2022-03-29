<?php
$this->load->view('base/header');
$this->load->view('base/navbar');
$this->load->view('base/sidebar');

?>

  <main id="main" class="main">
    <div class="container">

      <div class="container-fluide" >
        <div class="container">
        
           

              

              <div  class="container-fluide">

                <div class="row">

                  <div >
                    <h5 class="card-title text-center pb-0 fs-0">  Veuillez choisir la declaration à faire</h5>
                    <p class="text-center small">
                      
                    </p>
                  </div>

                 
                   <div>
                    <div class=" row text-center pb-0 fs-4">

                     
                    <a class="btn btn-success" href="<?= site_url('gerant/declarationselvl');?>">  <i style="font-size:22px;" class="bi bi-file-earmark-text-fill"></i><span style="font-size:22px;">Déclaration de cel-Vl</span></a>

                    </div><br>
                    </div>

                    <div>
                    <div class="row text-center pb-0 fs-4 ">

                      
                      <a class="btn btn-warning" href="<?= site_url('gerant/choixdeclaration');?>"> <i style="font-size:22px;" class="bi bi-file-earmark-text-fill"></i><span style="font-size: 22px;" >Déclaration de TVA</span></a>
                      
                    </div><br></div>
                    <div>
                    
                    </div>

                   
                   
      

                    
                    
                    
      
                    
                    
                  

                </div>
              </div>

             

           
         
        </div>

      </div>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url('assets/assets/vendor/apexcharts/apexcharts.min.js')?>"></script>
  <script src="<?php echo base_url('assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
  <script src="<?php echo base_url('assets/assets/vendor/chart.js/chart.min.js');?>"></script>
  <script src="<?php echo base_url('assets/assets/vendor/echarts/echarts.min.js');?>"></script>
  <script src="<?php echo base_url('assets/assets/vendor/quill/quill.min.js');?>"></script>
  <script src="<?php echo base_url('assets/assets/vendor/simple-datatables/simple-datatables.js');?>"></script>
  <script src="<?php echo base_url('assets/assets/vendor/tinymce/tinymce.min.js');?>"></script>
  <script src="<?php echo base_url('assets/assets/vendor/php-email-form/validate.js');?>"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url('assets/assets/js/main.js');?>"></script>

</body>

</html>