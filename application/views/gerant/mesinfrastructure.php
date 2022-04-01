<?php 
$this->load->view('base/header');
$this->load->view('base/navbar');
$this->load->view('base/sidebar');?>

  <main id="main" class="main">


    <div class="pagetitle">
      <h1>listes des infrastructures</h1>
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
              <h5 class="card-title">mes infrastructures</h5>
             
              <!-- Active Table -->
              <table  class="table table-bordered">
                <thead>
                 
    
                  <tr style="background-color: #154360; color: white; text-align: center;">
                    <th scope="col">#</th>
                  
                  
                    <th scope="col">nom</th>
                    <th scope="col">adresse</th>
                    <th scope="col">genre</th>
                   
                  </tr>
                 
                </thead>
                <tbody id="lessonList">
                  <?php $num=1;  foreach ($infras->result() as $row ) {
     ?>
                  <tr class="col-12">
                    <td> <?php echo $num;$num++; ?></</td>
                   
                    <td><?php echo $row->nomInfrastructure ?></td>
                    <td><?php echo $row->adresse ?></td>
                    <td><?php echo $row->genre ?></td>
                   
                    
       
                      
                  </tr>
                  <?php } ;?> 
                </tbody>
              </table>
              <!-- End Active Table -->

            </div>
          </div>


         

        </div>

      

          

        </div>
      </div>
    </section>
<div class="modal fade" id="basicModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-1 fs-0"><i class="bi bi-bank2"></i>
            </a>Modifier infrastructure</h5>
                    
                  </div>
                     
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     
                     <form class="row g-3 needs-validation" method="POST" action="<?php echo site_url('gerant/do_upload'); ?>"
                  enctype="multipart/form-data" novalidate>
     
                     <div class="col-xs-6 col-sm-6 col-md-6">
                      <label for="nom" class="form-label"><strong> nomInfrastructure</strong></label>
                      <input type="text" name="nom" class="form-control" id="yourName" value="<?php echo set_value("nom");?>" required>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <label for="adresse" class="form-label"><strong>adresse</strong></label>
                      <input type="text" name="adresse" class="form-control" id="prenom" value="" required>
                    </div>
                    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <label for="genre" class="form-label"><strong>genre</strong></label>
                      <select class="form-select" name="genre">
                        <option value="boutique">Boutique</option>
                        <option value="supermarche">supermarche</option>
                      </select>
                    </div>
    
                
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <label for="adresse" class="form-label"><strong>Document administrative</strong></label>
                      <input type="file" name="userfile" size="20" class="form-control"   required>
                    </div>

                    
                      <input type="hidden" name="id" id="nom">
                    
                    
                    
                   



                     <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                      <button class="btn btn-success " type="submit" value="upload">valider</button>
                    </div>
                  <div class="modal fade" id="basicModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-1 fs-0"><i class="bi bi-bank2"></i>
            </a>Ajout d'une infrastructure</h5>
                    
                  </div>
                     
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     
                     <form class="row g-3 needs-validation" method="POST" action="<?php echo site_url('gerant/do_upload'); ?>"
                  enctype="multipart/form-data" novalidate>
     
                     <div class="col-xs-6 col-sm-6 col-md-6">
                      <label for="nom" class="form-label"><strong> nomInfrastructure</strong></label>
                      <input type="text" name="nom" class="form-control" id="yourName" value="<?php echo set_value("nom");?>" required>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <label for="adresse" class="form-label"><strong>adresse</strong></label>
                      <input type="text" name="adresse" class="form-control" id="prenom" value="" required>
                    </div>
                    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <label for="genre" class="form-label"><strong>genre</strong></label>
                      <select class="form-select" name="genre">
                        <option value="boutique">Boutique</option>
                        <option value="supermarche">supermarche</option>
                      </select>
                    </div>
    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <label for="etat" class="form-label"><strong>etat</strong></label>
                      <select name="etat" class="form-select">
                        <option value="actif">Actif</option>
                        <option value="inactif">Inactif</option> 
                      </select>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <label for="adresse" class="form-label"><strong>Document administrative</strong></label>
                      <input type="file" name="userfile" size="20" class="form-control"   required>
                    </div>

                    
                    
                  </form>
                    </div>
                   
                  </div>
                </div>
              </div><!-- End Basic Modal-->
              <div class="modal fade" id="modifModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-1 fs-0"><i class="bi bi-bank2"></i>
            </a>Modification infrastructure</h5>
                   
                  </div>
                     
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     
                     <form class="row g-3 needs-validation" method="POST" action="<?php echo site_url('infrastructure/do_upload'); ?>"
                  enctype="multipart/form-data" novalidate>
     
                     <div class="col-xs-6 col-sm-6 col-md-6">
                      <label for="nom" class="form-label"><strong> nomInfrastructure</strong></label>
                      <input type="text" name="nom" class="form-control" id="updatenom"  required>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <label for="adresse" class="form-label"><strong>adresse</strong></label>
                      <input type="text" name="adresse" class="form-control" id="updateadresse" value="" required>
                    </div>
                    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <label for="genre" class="form-label"><strong>genre</strong></label>
                      <select class="form-select" name="genre" id="genre">
                        <option value="boutique">Boutique</option>
                        <option value="supermarche">supermarche</option>
                      </select>
                    </div>
    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <label for="etat" class="form-label"><strong>etat</strong></label>
                      <select name="etat" class="form-select">
                        <option value="actif">Actif</option>
                        <option value="inactif">Inactif</option> 
                      </select>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <label for="adresse" class="form-label"><strong>Document administrative</strong></label>
                      <input type="file" name="userfile" size="20" class="form-control"   required>
                    </div>

                    
                      <input type="hidden" name="id" id="hiddenData">
                    
                    
                    
                   



                     <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                      <button class="btn btn-success " type="submit" value="upload">valider</button>
                    </div>
                  
                    
                    
                  </form>
                    </div>
                   
                  </div>
                </div>
              </div><!-- End modif Modal-->
              
  </main><!-- End #main -->

 <?php $this->load->view('base/footer'); ?> 


<script type="text/javascript">
  $(document).ready(function(){
    $('.mod').on('click',function(){
      $('#nom').val($(this).attr('data-infrastructure'));
    });
  });
</script>
             <script>
                    
function confirmation() {
return confirm("voulez vous supprimer");
    
};
function update(id){
  alert(id);
$.ajax({
Url:"<?php echo site_url('infrastructure/detailinf');?>",
Type:'Post',
Data:{
updateid:id

},
Success : function(data,status){
console.log(status);//vérfication
var userid=JSON.parse(data);
alert(userid.idInfrastructure)
}
})
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