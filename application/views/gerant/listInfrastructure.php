<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Register - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url('assets/assets/img/favicon.png'); ?>" rel="icon">
  <link href="<?php echo base_url('assets/assets/img/apple-touch-icon.png');?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url('assets/assets/vendor/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/assets/vendor/bootstrap-icons/bootstrap-icons.css');?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/assets/vendor/boxicons/css/boxicons.min.css');?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/assets/vendor/quill/quill.snow.css');?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/assets/vendor/quill/quill.bubble.css');?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/assets/vendor/remixicon/remixicon.css')?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/assets/vendor/simple-datatables/style.css');?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url('assets/assets/css/style.css')?>" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="<?php echo base_url('assets/assets/img/arriere.png');?>" width="40" height="30" alt="logo alt="">
                  <span class="d-none d-lg-block text-success">Adutaxe</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Choisir infrastructure</h5>
                    <p class="text-center small">Pour voir son facture!
                      
                    </p>
                  </div>

                  <form class="row g-3 needs-validation" novalidate method="POST" action="<?php echo site_url('gerant/facture');?>">
                   
                    <div class="col-xs-12 col-sm-12 col-md-12">

                      <label for="identification" class="form-label text-success">Veuillez Choisir Votre Infrastructure </label>
                      <select class="form-select" name="infrastucture">
                      <?php foreach($infras->result() as $row){ ?>
                        <option value="<?= $row->idInfrastructure;?>"><?php echo "Nom: ".$row->nomInfrastructure."Adresse".$row->adresse ?></option>
                      <?php };?>
                      </select>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">

                      <label for="identification" class="form-label text-success">Veuillez Choisir la date de déclaration</label>
                      <select class="form-select" name="date">
                      <?php foreach($date->result() as $row){ ?>
                        <option value="<?= $row->date;?>"><?php echo $row->date ?></option>
                      <?php };?>
                      </select>
                    </div>
                   
                   
      

                    
                    
                    
      
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <button style="background-color:#154360;" class="btn btn-primary w-100" type="submit">Valider</button>

                    </div>
                    
                  </form>

                </div>
              </div>

             

            </div>
          </div>
        </div>

      </section>

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