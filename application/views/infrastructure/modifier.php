<?php
$this->load->view('base/header'); ?>
<?= validation_errors() ?> 
  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="<?php echo base_url('assets/assets/img/arriere.png');?>" width="40" height="30" alt="logo alt="">
                  <span class="d-none d-lg-block">ADUTAXE!</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-1 fs-0"><i class="bi bi-bank2"></i>
            </a>modification Infrastructure</h5>
                    <p class="text-center small"><strong>Veuillez saisir les informations de votre infrastructure</strong></p>
                  </div>

                  <form class="row g-3 needs-validation" method="POST" action="<?php echo site_url('infrastructure/do_upload'); ?>"
                  enctype="multipart/form-data" novalidate>
                  <?php foreach($infras->result() as $row){ ?>
     
                     <div class="col-xs-6 col-sm-6 col-md-6">
                      <label for="nom" class="form-label"><strong> nomInfrastructure</strong></label>
                      <input type="text" name="nom" class="form-control" id="yourName" value="<?php echo $row->nomInfrastructure;?>" required>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <label for="adresse" class="form-label"><strong>adresse</strong></label>
                      <input type="text" name="adresse" class="form-control" id="prenom" value="<?php echo $row->adresse;?>" required>
                    </div>
                    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <label for="genre" class="form-label"><strong>genre</strong></label>
                      <select class="form-select" name="genre">
                        <option value="boutique" <?php if ($row->genre=="boutique"){ echo "selected";} ?>>Boutique</option>
                        <option value="supermarche" <?php if ($row->genre=="supermarche"){ echo "selected";} ?>>supermarche</option>
                      </select>
                    </div>
    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <label for="etat" class="form-label"><strong>etat</strong></label>
                      <select name="etat" class="form-select">
                        <option value="actif"<?php if ($row->etat=="actif"){ echo "selected";} ?>>Actif</option>
                        <option value="inactif"<?php if ($row->etat=="inactif"){ echo "selected";} ?>>Inactif</option> 
                      </select>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <label for="adresse" class="form-label"><strong>Document administrative</strong></label>
                      <input type="file" name="userfile" size="20" class="form-control"   required>
                    </div>

                    <?php };?>                      <input type="hidden" name="id" class="form-control" id="yourName" value="<?php echo $id;?>" required>
                    
                    
                    
                   



                    
                    <div class="col-xs-6 col-sm-6 col-md-6 container w-100">
                      <button class="btn btn-primary w-100" type="submit" value="upload">valider</button>
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


  <?php $this->load->view('base/footer');?>