  <?php if ($this->ion_auth->is_admin() || $this->ion_auth->in_group("agent")){?>
  <aside id="sidebar" class="sidebar" >

    <ul class="sidebar-nav" id="sidebar-nav">
       <li class="nav-item">
              <a class="nav-link collapsed" href="<?php echo site_url('users/tableaudeboard');?>">
              <i class="bi bi-house-fill" style="font-size:24px;"></i><span>tableau de bord</span>
            </a>
          </li>
          

      <li class="nav-item" >
        <a class="nav-link collapsed" href="<?= site_url('Users/acceuil');?>">
          <i class="bi bi-person-fill" style="font-size:24px;" ></i>
          <span>Profile</span>
        </a>
      </li><!-- End Dashboard Nav -->
      
 
     <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav34" data-bs-toggle="collapse" href="#">
          <i class="bi bi-calculator" style="font-size:24px;"></i><span>Gestion Taxes</span><i class="bi bi-chevron-down ms-auto"></i>
        </a> 
        <ul id="icons-nav34" class="nav-content collapse " data-bs-parent="#sidebar-nav">
         
         <li class="nav-item">
              <a class="nav-link collapsed" href="<?php echo site_url('Evaluation/ListeDesinfevalue');?>">
              <i style="font-size:14px"; ></i><span style="font-size:14px;">listes des infrastrucures évalué</span>
            </a>
          </li>
          <?php if($this->ion_auth->is_admin()){?>
            <li  class="nav-item" >
              <a class="nav-link collapsed" href="<?php echo site_url('infrastructure/listeDemandePaiement');?>">
            
              <i class="fa fa-currency-euro" style="font-size: 59px"></i><span >liste des demandes de paiement</span>
            </a>
          </li> <?php };?>
          

          

        </ul>
      </li>
  

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-grid-3x3-gap-fill"style="font-size:24px;"></i><span>Gestion infrastructure</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
         
         <li class="nav-item">

            <a class="nav-link collapsed" href="<?php echo site_url('infrastructure/listdesinfras');?>">
              <i class="bi bi-circle"></i><span >liste des infrastructures marchandes</span>
            </a></li>
         

        </ul>
      </li>
      <?php if($this->ion_auth->is_admin() || $this->ion_auth->in_group("agent")){ ?>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people-fill" style="font-size:24px;"></i><span>Gestion Utilisateur</span><i class="bi bi-chevron-down ms-auto"></i>
        </a> <?php };?>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <?php if($this->ion_auth->is_admin()){?>
          <li class="nav-item">
            <a  class="nav-link collapsed" href="<?php echo site_url('users/listeagent');?>">
              <i style="font-size:14px;"></i><span style="font-size:14px;">liste des agents</span>
            </a></li><?php };?>
         <li class="nav-item">
              <a class="nav-link collapsed" href="<?php echo site_url('users/listegerant');?>">
              <i  style="font-size:14px"; ></i><span style="font-size:14px;">liste des gérants</span>
            </a>
          </li>
          

          

        </ul>
      </li>






  </aside><!-- End Sidebar--> 
  <?php };?>

<!-- gerant--> 
  <?php if ($this->ion_auth->in_group("gerant")){?>
  <aside id="sidebar" class="sidebar" >

    <ul class="sidebar-nav" id="sidebar-nav">
       <li class="nav-item">
              <a class="nav-link collapsed" href="<?php echo site_url('users/tableaudeboard');?>">
              <i class="bi bi-house-fill" style="font-size:24px;"></i><span>tableau de bord</span>
            </a>
          </li>
          

      <li class="nav-item" >
        <a class="nav-link collapsed active" href="<?= site_url('Users/acceuil');?>">
          <i class="bi bi-person-fill" style="font-size:24px;" ></i>
          <span>Profile</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav2" data-bs-toggle="collapse" href="#">
          <i class="bi bi-shop"style="font-size:24px;"></i><span>Mes infrastructures</span>
        </a>
        <ul id="forms-nav2" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          
          
     
          <li class="nav-item collapsed">
                <a class="nav-link collapsed" href="<?php echo site_url('gerant/mesinfrastructures');?>">
                  <i class="fa fa-home"></i><span>mes infrastructures</span>
            </a>
            </li>

         

          <li class="nav-item collapsed">
                <a class="nav-link collapsed" href="<?php echo site_url('gerant/edit/'.$user->id."/ajouter");?>">
                  <i class="fa fa-home"></i><span>ajouter infrastructure</span>
            </a>
            </li>

           
            
              
         
       
         

        </ul>
      </li>
      <li class="nav-item ">
            <a class="nav-link collapsed" data-bs-target="#forms-nav21" data-bs-toggle="collapse" href="#">
          <i class="bi bi-cart3"style="font-size:24px;"></i><span>Paiements</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav21" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          
          <li class="nav-item">
            <a class="nav-link collapsed" href="<?= site_url('gerant/MesFactures');?>">
              <i class="bi bi-circle"></i><span>Mes Factures </span>
            </a>
          </li> 
           
       
          <li  class="nav-item" >
              <a class="nav-link collapsed" href="<?= site_url('gerant/MesPaiement');?>">
            
              <i class="fa fa-currency-euro" style="font-size: 59px"></i><span >Mes paiements</span>
            </a>
          </li>
        </ul>
      </li>
 <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav213" data-bs-toggle="collapse" href="#">
          <i class="bi bi-pencil-square"style="font-size:24px;"></i><span>Déclarations</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav213" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          
           
          <li  class="nav-item" >
              <a class="nav-link collapsed" href="<?php echo site_url('gerant/Mesdeclaration');?>">
            
              <i class="fa fa-currency-euro" style="font-size: 59px"></i><span >Mes déclarations</span>
            </a>
          </li>
          <li  class="nav-item collapsed">
              <a class="nav-link collapsed" href="<?= site_url('gerant/choixdeclarationtypedeclaration');?>">
            
              <i class="fa fa-currency-euro" style="font-size: 59px"></i><span >Nouvelle déclaration</span>
            </a>
          </li>

         

           
            
              
         
          
       
         

        </ul>
      </li>
      
      <li class="nav-item ">
        <a class="nav-link collapsed" data-bs-target="#forms-nav21345" data-bs-toggle="collapse" href="#">
          <i class="bx bxs-comment"style="font-size:24px;"></i><span>Communications</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav21345" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          
           
          <li  class="nav-item collapsed" >
              <a class="nav-link collapsed" href="<?= site_url('gerant/message/Aide');?>">
            
              <i class="fa fa-currency-euro" style="font-size: 59px"></i><span >Besoins d'aide ?</span>
            </a>
          </li>
          <li  class="nav-item" >
              <a class="nav-link collapsed" href="<?= site_url('gerant/message/Suggestion')?>">
            
              <i class="fa fa-currency-euro" style="font-size: 59px"></i><span >Faire une suggestion</span>
            </a>
          </li>

         

           
            
              
         
          
       
         

        </ul>
        
      </li>
      
    
      




  </aside><!-- End Sidebar--> 
  <?php };?>
  <!-- geant sidebar-->

