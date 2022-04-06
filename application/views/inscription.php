<?php
$this->load->view('base/header'); ?>

  <main>



    
    <div class="pagetitle">
    <?php if($this->session->message){;?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <h5 class="alert-heading"><?= $this->session->message;?> </h5>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">x </span>
    </button>
  </div>
 <?php  };?>
      
              <?php if(validation_errors()){;?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <h5 class="alert-heading"><?= validation_errors();?> </h5>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">x </span>
    </button>
 <?php  };?>
      
    </div></div>
    <div class="container-fluide">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4 ">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="<?= site_url("users/acceuil")?>" class="logo d-flex align-items-center w-auto" style="text-decoration: none;">
                  <img src="<?php echo base_url('assets/assets/img/Lokg.png');?>" width="40" height="30" alt="logo">
                  <span class="d-none d-lg-block">adutax</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">


                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Créer votre compte</h5>
                    <p class="text-center small">Entrer vos informations personnelles</p>
                  </div>

                  <form class="row g-3 needs-validation" method="POST" action="<?php echo site_url('connexion/inscription');?>" novalidate>
                    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <label for="yourName" class="form-label">nom</label>
                      <input type="text" name="nom" class="form-control" id="yourName" value="<?= set_value('nom')?>" required>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <label for="prenom" class="form-label">Prenom</label>
                      <input type="text" name="prenom" class="form-control" id="prenom" value="<?= set_value('nom')?>" required>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <label for="nomUtilisateur" class="form-label">Adresse</label>
                      <input type="text" name="nomUtilisateur" class="form-control" id="nomuser" value="<?= set_value('nomUtilisateur')?>" required>
                    </div>
    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <label for="numero" class="form-label">votre numéro</label>
                      <input type="number" name="numero" class="form-control" id="numero" value="<?= set_value('numero')?>" required>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <label for="Nom d'utilisateur" class="form-label">votre email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" name="email" class="form-control" id="yourUsername" value="<?= set_value('email')?>" required>
                      
                      </div>
                      
                    </div><br>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <label for="passe" class="form-label">mot de passe</label>
                      <input type="password" name="passe" class="form-control" id="yourPassword" value="<?= set_value('passe')?>" required>
                    </div>


                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <label for="confirmation" class="form-label">confirmation de mot de passe</label>
                      <input type="password" name="confirmation" class="form-control" id="confirmation" value="" required>
                    </div>

                   
                    
                    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <p class="small mb-0 text-danger">vous avez déja un compte? <a href="<?= site_url('redirect/login');?>">Se connecter</a></p>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <button class="btn btn-primary w-100" type="submit">valider</button>
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