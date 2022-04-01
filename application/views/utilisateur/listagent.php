<?php 
$this->load->view('base/header');
$this->load->view('base/navbar');
$this->load->view('base/sidebar');?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1 class="text-center">La liste des agents</h1>
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
              <h5 class="card-title"></h5>
              <div class="container my-3">
                <button type="button" class="btn btn-success mod" data-bs-toggle="modal" data-bs-target="#basicModal"
                       data-infrastructure="">
               <i class="bi bi-plus-lg">ajouter agent</i>
              </button>
            </div>
             
              <!-- Active Table -->
              <table  class="table table-bordered">
                <thead>
                 
    
                  <tr class="text-center" style="background-color: #154360; color: white">
                    <th scope="col">#</th>
                    <th scope="col">nom</th>
                    <th scope="col">prenom</th>
                    <th scope="col">email</th>
                    <th scope="col">phone</th>
                     <th scope="col">Status</th>
                    <th scope="col">Action</th>
                     
                  </tr>
                 
                </thead>
                <tbody id="lessonList">
                  <?php  $i=1; foreach ($listagent as $row ) {
     ?>
                  <tr class="col-12">
                   <td> <?php echo $i++ ?>
                    <td> <?php echo $row->first_name?></</td>
                    <td><?php echo $row->last_name ?></td>
                    <td><?php echo $row->email?></td>
                    <td><?php echo $row->phone ?></td>
                    <td><?php if($row->active==1){ echo "active"; } else{ echo "desactive";} ?></td>
                          <?php  if ($this->ion_auth->is_admin()){ ?>
                   
                      <td><a onclick=" return confirmation();" href="<?= site_url('users/delete/'.$row->id.'/desactive/agent');?>" class="btn btn-danger"><i style="font-size:15px;" class="bi bi-x-octagon-fill"></i>&nbsp;desactiver</a>
                        <a class="btn btn-warning" href="<?= site_url('users/delete/'.$row->id.'/active/agent');?>"><i style="font-size:15px;" class="bi bi-check-lg"></i>&nbsp;activer</a></td>
                   
                  </tr>
                  <?php } ;?> 
                    
                    <?php };?>

                     
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
    function confirmation(){
      return confirm("voulez vous désactiver cette compte");
    }
    $(document).ready(function(){
       $("#searchInput").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $("#lessonList .col-12").filter(function() {
             $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
       });
    }); 
    </script>

      
                   <div class="modal fade" id="basicModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-1 fs-0"><i class="bi bi-bank2"></i>
            </a>Inscrire Agent</h5>
                    
                  </div>
                     
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     
                     <form class="row g-3 needs-validation" method="POST" action="<?php echo site_url('connexion/inscrireAgent'); ?>"
                  enctype="multipart/form-data" novalidate>
     <form class="row g-3 needs-validation" method="POST" action="<?php echo site_url('connexion/inscription');?>" novalidate>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <label for="yourName" class="form-label">votre nom</label>
                      <input type="text" name="nom" class="form-control" id="yourName" value="<?= set_value('nom')?>" required>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <label for="prenom" class="form-label">Prenom</label>
                      <input type="text" name="prenom" class="form-control" id="prenom" value="<?= set_value('nom')?>" required>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <label for="nomUtilisateur" class="form-label">nom d'utilisateur</label>
                      <input type="text" name="nomUtilisateur" class="form-control" id="nomuser" value="<?= set_value('nom')?>" required>
                    </div>
    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <label for="numero" class="form-label">votre numero</label>
                      <input type="number" name="numero" class="form-control" id="numero" value="<?= set_value('nom')?>" required>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <label for="Nom d'utilisateur" class="form-label">votre email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" name="email" class="form-control" id="yourUsername" value="<?= set_value('nom')?>" required>
                      
                      </div>
                      
                    </div><br>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <label for="yourPassword" class="form-label">mot de passe</label>
                      <input type="password" name="passe" class="form-control" id="yourPassword" value="<?= set_value('nom')?>" required>
                    </div>


                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <label for="confirmation" class="form-label">confirmation de mot de passe</label>
                      <input type="password" name="confirmation" class="form-control" id="confirmation" value="<?= set_value('nom')?>" required>
                    </div>

    
                   
                 <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                      <button class="btn btn-success " type="submit" value="upload">valider</button>
                    </div>
                    
                    
                  </form>
                    </div>
                   
                  </div>
                </div>
              </div><!-- End Basic Modal-->

  </main><!-- End #main -->

 <?php $this->load->view('base/footer'); ?>