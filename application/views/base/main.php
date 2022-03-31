
<main id="main" class="main">
  <?php $group="gerant";
    if ($this->ion_auth->in_group($group))
    {
     
    ?>
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <h5 class="alert-heading">Tout taxe doivent étre payer sur ce numéro <strong class="text-danger">785260388 </strong>  tout taxes payer sur un autre numéro sera classé sans suite et le paiement s'effectue avant le 15 de chaque mois </h5>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">x </span>
    </button>
    
</div>
<?php };?> 
<?php if($this->session->message){;?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <h5 class="alert-heading"><?= $this->session->message;?> </h5>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">x </span>
    </button>
 <?php  };?>
    
</div>
    <div class="pagetitle">
      <h1 ><?= $titre ;?></h1>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card" >
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="<?php echo base_url('assets/img/avatar.png');?>" alt="Profile" class="rounded-circle">
              <h2><?php echo $user->first_name." ".$user->last_name; ?> </h2>
              <h3><?= $titre ;?> </h3>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">
              

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Modifier Profile</button>
                </li>

                

                <li class="nav-item">

                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Changer mot de Passe</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  
                  <h5 class="card-title">Details du Profile </h5>
                  

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">prenom</div>
                    <div class="col-lg-9 col-md-8"><?php echo $user->first_name ;?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">nom</div>
                    <div class="col-lg-9 col-md-8"><?= $user->last_name ;?></div>
                  </div>

                 

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Travail</div>
                    <div class="col-lg-9 col-md-8"><?= $titre ;?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Pays</div>
                    <div class="col-lg-9 col-md-8">Senegal</div>
                  </div>

                 

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Telephone</div>
                    <div class="col-lg-9 col-md-8"><?= $user->phone ;?></div>
                  </div>
                  

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?= $user->email ;?></div>
                  </div>

                  
                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="POST" action="<?= site_url('users/modifierprofile');?>">
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="<?php echo base_url('assets/img/avatar.png');?>" alt="Profile">
                        
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="prenom" class="col-md-4 col-lg-3 col-form-label">prenom </label>
                      <div class="col-md-8 col-lg-9">
                        <input name="prenom" type="text" class="form-control" id="prenom" value="<?= $user->first_name ;?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">nom</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="nom" type="text" class="form-control" id="Job" value="<?= $user->last_name ;?>">
                      </div>
                    </div>

                    
                    

                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Pays</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="pays" type="text" class="form-control" id="Country" value="Senegal">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="address" type="text" class="form-control" id="Address" value="<?= $user->company;?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="telephone" type="text" class="form-control" id="Phone" value="<?= $user->phone ;?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" value="<?= $user->email ;?>">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Enregistrer changement</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                  <!-- Settings Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="changesMade" checked>
                          <label class="form-check-label" for="changesMade">
                            Changes made to your account
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="newProducts" disabled>
                          <label class="form-check-label" for="newProducts">
                            Information on new products and services
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="proOffers" disabled>
                          <label class="form-check-label" for="proOffers">
                            Marketing and promo offers
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="securityNotify" disabled>
                          <label class="form-check-label" for="securityNotify">
                        alerte de Sécurité
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End settings Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form method="POST" action="<?= site_url('connexion/changepasse');?>">

                    <div class="row mb-3">
                      <label for="passeact" class="col-md-4 col-lg-3 col-form-label">mot de passe actuel</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="passeact" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="passe" class="col-md-4 col-lg-3 col-form-label">Nouveau mot de passe</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="passe" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="confirmation" class="col-md-4 col-lg-3 col-form-label">Confirmation mot de passe</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="confirmation" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <label class="text-danger" > une fois valider le changement sera automatique et vous serez rediriger<br> a la page de connexion</label><br>
                      <button type="submit" class="btn btn-primary">changer mot de passe</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->