<?php
$this->load->view('base/header');
$this->load->view('base/navbar');
$this->load->view('base/sidebar');
?>

  <main id="main" class="main">

<div class="container">
  <div class="row">
    <div class="col-4">
      <div class="card">
          
          <div class="card-body">
                            <h5 class="card-title border-right ">Nombre d'infrastructures</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i style="font-size: 30px;" class="bi bi-bank2 border-right"></i>
                    </div>
                    <div class="ps-3">
                      
                      <span style="font-size: 25px;" class="text-success small pt-1 fw-bold border-right"><?= $nombreinf;?></span> 

                    </div>
                  </div>
                </div>

              </div>
          </div>
    <div class="col-4">
      <div class="card">
          
          <div class="card-body">
                            <h5 class="card-title">Nombre de gérant</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i style="font-size: 30px;" class="bi bi-people-fill"></i>
                    </div>
                    <div class="ps-3">
                      
                      <span style="font-size: 25px;" class="text-success small pt-1 fw-bold"><?= $nombregerant;?></span> 

                    </div>
                  </div>
                </div>

              </div>
          </div>
   <div class="col-4">
      <div class="card">
          
          <div class="card-body ">

                            <h5 class="card-title byline">nombre d'agent</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i style="font-size: 30px;" class="bi bi-people-fill"></i>
                    </div>
                    <div class="ps-3">
                     
                      <span style="font-size:25px;" class="text-success small pt-1 fw-bold"><?= $nombreagent;?></span> 

                    </div>
                  </div>
                </div>

              </div>
          </div>
  </div>
  <div class="row">
    <div class="col-4">
     <div class="card">
          
          <div class="card-body">
                            <h5 class="card-title">Total des taxes payés</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i style="font-size:25px;" class="bi bi-circle-fill"></i>
                    </div>
                    <div class="ps-3">
                     
                      <span style="font-size:25px;" class="text-success small pt-1 fw-bold"><?= $montant_taxe;?>Fcfa</span> 

                    </div>
                  </div>
                </div>

              </div>
    </div>
     <div class="col-4">
     <div class="card">
          
          <div class="card-body">
                            <h5 class="card-title">Total taxes non réglé</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i style="font-size:25px;" class="bi bi-circle-fill"></i>
                    </div>
                    <div class="ps-3">
                     
                      <span style="font-size:25px;" class="text-success small pt-1 fw-bold"><?= $montant_taxeNonRegle;?>Fcfa</span> 

                    </div>
                  </div>
                </div>

              </div>
    </div>
     
     
      </div>
   
    </div>
  </div>
  
</div>
   

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>MMTSSMD</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="#">MMTSSMD</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url('assets/assets/vendor/apexcharts/apexcharts.min.js');?>"></script>
  <script src="<?= base_url('assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
  <script src="<?= base_url('assets/assets/vendor/chart.js/chart.min.js');?>"></script>
  <script src="<?= base_url('assets/assets/vendor/echarts/echarts.min.js');?>"></script>
  <script src="<?= base_url('assets/assets/vendor/quill/quill.min.js');?>"></script>
  <script src="<?= base_url('assets/assets/vendor/simple-datatables/simple-datatables.js');?>"></script>
  <script src="<?= base_url('assets/assets/vendor/tinymce/tinymce.min.js');?>"></script>
  <script src="<?= base_url('assetsassets/vendor/php-email-form/validate.js');?>"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url('assets/assets/js/main.js');?>"></script>

</body>

</html>