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
              <h5 class="card-title">listes des infrastructures</h5>
             
              <!-- Active Table -->
              <table  class="table table-bordered">
                <thead>
                 
    
                  <tr style="background-color: #154360; color: white; text-align: center;">
                    <th scope="col">#</th>
                  
                    <th scope="col">code gérant</th>
                    <th scope="col">nom</th>
                    <th scope="col">adresse</th>
                    <th scope="col">genre</th>
                    <th scope="col">etat</th>
                     <th scope="col">Action</th>
                  </tr>
                 
                </thead>
                <tbody id="lessonList">
                  <?php $num=1;  foreach ($infras->result() as $row ) {
     ?>
                  <tr class="col-12">
                    <td> <?php echo $num;$num++; ?></</td>
                    <td> <?php echo $row->id ?></</td>
                    <td><?php echo $row->nomInfrastructure ?></td>
                    <td><?php echo $row->adresse ?></td>
                    <td><?php echo $row->genre ?></td>
                    <td><?php echo $row->etat ?></td>
                    <td>
                       <button type="button" class="btn btn-success mod" data-bs-toggle="modal" data-bs-target="#basicModal"
                       data-infrastructure="<?= $row->id ; ?>">
               <i title="ajouter infrastructure" class="bi bi-plus-lg"></i>
              </button>
              <?php if($this->ion_auth->in_group("agent")){;?>
               
              <button class="Evaluation" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal123" data-evaluation="<?= $row->idInfrastructure ; ?>" style="background-color:grey; color:white;">
              <i class="bi bi-pencil"></i> Evaluation
              </button>
               <?php };?>
              <button type="button" class="btn btn-warning modification" data-bs-toggle="modal" data-bs-target="#basicModal"
                       data-inf="<?= $row->idInfrastructure ; ?>" id="modification">
               <i title="modifier infrastructure" class="bi bi-pencil-square"></i>
              </button><?php if ($this->ion_auth->in_group("agent")){ ?>
              <?php };?>
                   
                      
                      <?php  if ($this->ion_auth->is_admin()){ ?>
                      
                      
                    <a class="btn btn-danger" href="<?= site_url('infrastructure/delete/'.$row->idInfrastructure);?>"  onclick="return confirmation();"><i title="supprimer infrastructure" class="bi bi-trash-fill"></i></a> <?php }; ?>
                   

                    <a class="btn btn-primary" href="<?= site_url('infrastructure/voirdeclarationInf/'.$row->idInfrastructure)?>"><i title="Voir déclaration" class="bi bi-eye" ></i></a>
                  </td>

       
                      
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
                    <h5 class="card-title text-center pb-1 fs-0" id="titreModal" >
                    <i class='bi bi-shop'></i>
                      
           </h5>
                    
                  </div>
                     
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     
                     <form class="row g-3 needs-validation" method="POST" action="<?php echo site_url('gerant/do_upload'); ?>"
                  enctype="multipart/form-data" novalidate>
     
                     <div class="col-xs-6 col-sm-6 col-md-6">
                      <label for="nom" class="form-label"><strong> nomInfrastructure</strong></label>
                      <input type="text" name="nom" class="form-control" id="yourName"  required>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <label for="adresse" class="form-label"><strong>adresse</strong></label>
                      <input type="text" name="adresse" class="form-control" value="" id="adress" required>
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
                      <label for="adresse" class="form-label"><strong>Document administratif</strong></label>
                      <input type="file" name="userfile" size="20" class="form-control"   required>
                    </div>

                    
                      <input type="hidden" name="id" id="nom">
                    
                     <input type="hidden" name="type" id="type">
                     <input type="hidden" name="idinf" id="idinf">
                    
                   



                     <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                      <button class="btn btn-success " type="submit" value="upload">valider</button>
                    </div>
                  </form></div></div></div></div></div>


              <!-- Modification -->
              
              <div class="modal fade" id="basicModal123" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Evaluation</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                   <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-1 fs-0"><i class="bi bi-pencil"></i>
            </a>Evaluation</h5>
                    <p class="text-center small"><strong>Veuillez saisir les informations pour evaluer</strong></p>
                  </div>

                  <form class="row g-3 needs-validation" method="POST" action="<?php echo site_url('Evaluation/do_upload'); ?>"
                  enctype="multipart/form-data" novalidate>
     
                     <div class="col-xs-6 col-sm-6 col-md-6">
                      <label for="nom" class="form-label"><strong> nomInfrastructure</strong></label>
                      <input type="text" name="nom" class="form-control" id="nomevalue" value="" required>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <label for="adresse" class="form-label"><strong>adresse</strong></label>
                      <input type="text" name="adresse" class="form-control" id="adressevalue" value="" required>
                    </div>
                    
                    <input type="hidden" name="id" id="iduser">
                    <input type="hidden" name="idinf" id="idinfevalue"> 
    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <label for="etat" class="form-label"><strong>etat</strong></label>
                      <select name="etat" class="form-select">
                        <option value="regle">en régle</option>
                        <option value="pas en regle">pas en régle</option> 
                      </select>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <label for="adresse" class="form-label"><strong>Document administratif</strong></label>
                      <input type="file" name="userfile" size="20" class="form-control"   required>
                    </div>

                    
                    
                    
                    
                    
                   



                    
                  
                    
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                      <button type="submit" class="btn btn-primary">Valider</button>
                    </div>
                  </form>

                </div>
              </div>

             

            </div>
          </div>
        </div>
                    </div>
                    
                  </div>
                </div>
              </div>
                  <div class="modal fade" id="basicModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-1 fs-0"><i class="bi bi-shop"></i>
            </a>Ajout d'une gg</h5>
                    
                  </div>
                     
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     
                     <form class="row g-3 needs-validation" method="POST" action="<?php echo site_url('gerant/do_upload'); ?>"
                  enctype="multipart/form-data" novalidate>
     
                     <div class="col-xs-6 col-sm-6 col-md-6">
                      <label for="nom" class="form-label"><strong> nomInfrastructure</strong></label>
                      <input type="text" name="nom" class="form-control" id="yourName"  required>
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
                      <label for="adresse" class="form-label"><strong>Document administratif</strong></label>
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
                      <label for="adresse" class="form-label"><strong>Document administratif</strong></label>
                      <input type="file" name="userfile" size="20" class="form-control"   required>
                    </div>

                    
                      
                    
                    
                    
                   



                     <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>

                      <button class="btn btn-success " type="submit" value="upload">valider</button>
                    </div>
                  
                    
                    
                  </form>
                    </div>
                   
                  </div>
                </div>
              </div><!-- End modif Modal-->
              <div class="modal fade" id="evaluer" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-1 fs-0"><i class="bi bi-bank2"></i>
           </h5>
                    
                  </div>
                     
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     
                     <form class="row g-3 needs-validation" method="POST" action="<?php echo site_url('gerant/do_upload'); ?>"
                  enctype="multipart/form-data" novalidate>
     
                     <div class="col-xs-6 col-sm-6 col-md-6">
                      <label for="nom" class="form-label"><strong> nomInfrastructure</strong></label>
                      <input type="text" name="nom" class="form-control" id="yourName"  required>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <label for="adresse" class="form-label"><strong>adresse</strong></label>
                      <input type="text" name="adresse" class="form-control" value="" id="adress" required>
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

                    
                      <input type="hidden" name="id" id="nom">
                    
                     <input type="hidden" name="type" id="type">
                     <input type="hidden" name="idinf" id="idinf">
                    
                   



                     <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                      <button class="btn btn-success " type="submit" value="upload">valider</button>
                    </div>
                  </form>

  </main><!-- End #main -->

 <?php $this->load->view('base/footer'); ?> 


<script type="text/javascript">
  $(document).ready(function(){
    $('.mod').on('click',function(){
      
      document.getElementById("titreModal").innerHTML="<h5 class='text-center'><i class='bi bi-shop'></i>Ajout Infrastructure </h5>";
      $('#nom').val($(this).attr('data-infrastructure'));
      document.getElementById('yourName').value = '';
       document.getElementById('adress').value = '';
        document.getElementById('genre').value = '';
        document.getElementById('type').value = 'ajout';
        
       

    });

    $('.modification').on('click',function(){

      document.getElementById('type').value = '';
      document.getElementById('titreModal').value='Modification Inf';
      document.getElementById("titreModal").innerHTML="<h5 class='text-center'><i class='bi bi-shop'></i>Modification Infrastructure </h5>";

      var idinf = $(this).attr('data-inf');
      $.ajax({
        url:'<?php echo site_url('infrastructure/tests');  ?>',
        type:'POST',
        dataType:'json',
        data:{idinf:idinf},
        success:function(json){
         
          console.log(json);
           
          $('#yourName').val(json.nomInfrastructure);
            $('#adress').val(json.adresse);
            $('#idinf').val(json.idInfrastructure);
          if(json.genre == "boutique"){
            $('select option[value="boutique"]').attr("selected","selected");
          }
          else if(json.genre == "supermarche")
            $('#select option[value="supermarche"]').attr("selected","selected");
         
          if(json.etat == "actif"){
            $('select option[value="actif"]').attr("selected","selected");
          }
          else if(json.etat == "inactif")
            $('select option[value="inactif"]').attr("selected","selected");

        }
      });
      //$('#nom').val($(this).attr('data-infrastructure'));
    });
      $('.Evaluation').on('click',function(){
        
  
var idinf = $(this).attr('data-evaluation');
      $.ajax({
        url:'<?php echo site_url('Evaluation/Evaluation');  ?>',
        type:'POST',
        dataType:'json',
        data:{idinf:idinf},
        success:function(json){
    $('#nomevalue').val(json.nomInfrastructure);
    $('#adressevalue').val(json.adresse);
    $('#iduser').val(json.id);

    $('#idinfevalue').val(json.idInfrastructure);

          
         
       
           
          

        }
      });
        
       

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