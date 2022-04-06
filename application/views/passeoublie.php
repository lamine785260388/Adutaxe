<?php
$this->load->view('base/header'); ?>

  <main>

    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
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
                  
                  </div>

                  <form method="POST" action="<?php echo site_url('auth/forgot_password');?>" class="row g-3 needs-validation" novalidate>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Votre email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="identity" class="form-control" id="identity" placeholder="votre email" required>
                        <div class="invalid-feedback">donner votre email svp!</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <button name="submit" class="btn btn-primary w-100" type="submit">valider</button>
                    </div>

                 
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

 <?php $this->load->view("base/linkjs") ;?>

</body>

</html>