
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets/newlog/fonts/icomoon/style.css');?>">

    <link rel="stylesheet" href="<?= base_url('assets/newlog/css/owl.carousel.min.css')?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/newlog/css/bootstrap.min.css');?>">
    
    <!-- Style -->
    <link rel="stylesheet" href="<?= base_url('assets/newlog/css/style.css');?>">

    <title>ADUTAXE</title>
  </head>
  <body>
  

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('<?= base_url('assets/img/backgroundnew.jpg');?>');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
              <?php if($erreur!=""){ ?>

       
<div class="alert alert-danger alert-dismissible fade show" role="alert">
               <?= $erreur ;?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>    <?php };?> 
              
<div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="<?php echo base_url('assets/assets/img/lokg.png');?>" width="100px" height="100px" alt="logo">

                </a>

              </div>
            <h3 class=" text-center"> <strong class="text-primary ">ADUTAXE</strong></h3>
            <p class="mb-4"></p>
            <form method="POST" action="<?php echo site_url('connexion/connexion');?>"  novalidate>
              <div class="form-group first">
                <label for="username">Username</label>
              <input type="text" name="identifiant" class="form-control" id="yourUsername" placeholder=" email" required>
               <div class="invalid-feedback">donner votre email svp!</div>
              </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
               <input type="password" name="passe" class="form-control" id="yourPassword" placeholder="mot de passe" required>
                      <div class="invalid-feedback">votre mot de passe svp!</div>
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">souvenir</span>
                  <input name="souvenir" value="true" type="checkbox" />
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a  href="<?php echo site_url('connexion/oublie');?>"> mot de passe oublie</a></span> <br>

              </div>

              <input type="submit" value="valider" class="btn btn-block btn-primary"><br>
               <a class="text-primary" href="<?php echo site_url('connexion/inscriptionview');?>"> s'inscrire</a>

            </form>
          </div>
        </div>
      </div>
    </div>

    
  </div>
    
    

    <script src="<?= base_url('assets/newlog/js/jquery-3.3.1.min.js');?>"></script>
    <script src="<?= base_url('assets/newlog/js/popper.min.js');?>"></script>
    <script src="<?= base_url('assets/newlog/js/bootstrap.min.js');?>"></script>
    <script src="<?= base_url('assets/newlog/js/main.js');?>"></script>
     <?php $this->load->view("base/linkjs") ;?>
  </body>
</html>