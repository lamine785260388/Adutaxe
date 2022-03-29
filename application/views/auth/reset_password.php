<?php
$this->load->view('base/header'); ?>

  <main>

    

   
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="<?= site_url('users/acceuil');?>" class="logo d-flex align-items-center w-auto">
                   <img src="<?= base_url('assets/assets/img/arriere.png');?>" width="40" height="30" alt="logo alt=""><span class="d-none d-lg-block">ADUTAXE!</span>
                </a>
              </div><!-- End Logo -->
               <div class="container">
   

              <div class="card mb-5">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Modification mot de passe</h5>
                   
                  </div>
                             


<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open('auth/reset_password/' . $code);?>

	<p class="form-group">
		<label for="new_password"><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length);?></label> <br />
		<?php echo form_input($new_password);?>
	</p>

	<p>
		<?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm');?> <br />
		<?php echo form_input($new_password_confirm);?>
	</p>

	<?php echo form_input($user_id);?>
	<?php echo form_hidden($csrf); ?>

	<p ><?php echo form_submit('submit', lang('reset_password_submit_btn'));?></p>

<?php echo form_close();?>
</div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="#">Serigne Saliou Mbacké Diome et Mohamadou Moustapha Traore </a>
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