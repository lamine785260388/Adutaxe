<?php 
$this->load->view('base/header');
$this->load->view('base/navbar');
$this->load->view('base/sidebar');?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>listes des gérants</h1>
              <span>  <?php if($this->session->message){;?>
   

       
<div class="alert alert-danger alert-dismissible fade show" role="alert">
               <?= $this->session->message;?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>    
 <?php  };?></span>
      
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
       


          <div class="card">
     
            <div class="card-body">
              <h5 class="card-title"</h5>
             
              <!-- Active Table -->
              <table  class="table table-bordered">
                <thead>
                 
    
                  <tr style="background-color: #154360; color: white;">
                  
                    <th scope="col">#</th>
                    <th scope="col">Ninéa</th>
                    <th scope="col">prenom</th>
                    <th scope="col">nom</th>
                    <th scope="col">email</th>
                    <th scope="col">telephone</th>
                    <th scope="col">Statut</th>
                    <th scope="col">Action</th>
                     
                  </tr>
                 
                </thead>
                <tbody>
                  <?php $i=1;   foreach ($users as $row ) {
     ?>
                  <tr>
                   <td><?php echo $i;$i++;  ?></td>
                    <td> <?php echo $row->id ?></</td>
                    <td><?php echo $row->first_name  ?></td>
                    <td><?php echo $row->last_name ?></td>
                     <td><?php echo $row->email ?></td>
                    <td><?php echo $row->phone ?></td>
                    <td><?php if($row->active==1){ echo "active"; } else{ echo "desactive";} ?></td>

                     
                     <td>
                      
                   <a  class="btn btn-success
                      " href="<?php echo base_url().'index.php/infrastructure/edit/'.$row->id."/ajouter"?>"><i class="bi bi-plus-lg"></i> &nbsp; Infrastructure</a>
                      <?php if($this->ion_auth->is_admin()){?>
                        
                      <a onclick=" return confirmation();" href="<?= site_url('users/delete/'.$row->id.'/desactive');?>" class="btn btn-danger" ><i style="font-size:15px;" class="bi bi-x-octagon-fill" ></i>&nbsp;desactiver</a>
                        <a class="btn btn-warning" href="<?= site_url('users/delete/'.$row->id.'/active');?>"><i style="font-size:15px;" class="bi bi-check-lg"></i>&nbsp;activer</a>
                           <?php };?>
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

    <script type="text/javascript">
      function confirmation(){
        return confirm("Voulez vous désactiver cette compte d'utilisateur");
      }
    </script>

  </main><!-- End #main -->

 <?php $this->load->view('base/footer'); ?> 


