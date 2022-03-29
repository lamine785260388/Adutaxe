<!doctype html>
<html lang="en" dir="ltr">


<!-- Mirrored from laravel8.spruko.com/sash/edit-table by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Feb 2022 11:01:58 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Users / Profile - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url('assets/assets/img/favicon.png'); ?>" rel="icon">
  <link href="<?php echo base_url('assets/assets/img/apple-touch-icon.png');?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url('assets/assets/vendor/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/assets/vendor/bootstrap-icons/bootstrap-icons.css');?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/assets/vendor/boxicons/css/boxicons.min.css');?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/assets/vendor/quill/quill.snow.css');?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/assets/vendor/quill/quill.bubble.css');?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/assets/vendor/remixicon/remixicon.css')?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/assets/vendor/simple-datatables/style.css');?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url('assets/assets/css/style.css')?>" rel="stylesheet">

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sash –  Laravel Bootstrap 5 Admin & Dashboard Template">
    <meta name="author" content="SPRUKO™">
    <meta name="keywords" content="admin, admin dashboard, admin dashboard template, bootstrap admin, bootstrap dashboard, dashboard laravel, dashboard template, laravel admin, laravel admin dashboard, laravel admin dashboard template, laravel admin panel, laravel admin template, laravel dashboard template, laravel template, laravel ui template">

    <!-- title -->
    <title>Sash  –  Laravel Bootstrap 5 Admin & Dashboard Template</title>

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/newtab/assets/images/brand/favicon.ico');?>" />

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="<?= base_url('assets/newtab/assets/plugins/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="<?= base_url('assets/newtab/assets/css/style.css');?>" rel="stylesheet" />
    <link href="<?= base_url('assets/newtabassets/css/dark-style.css');?>" rel="stylesheet" />
    <link href="<?= base_url('assets/newtab/assets/css/transparent-style.css');?>" rel="stylesheet">
    <link href="<?= base_url('assets/newtab/assets/css/skin-modes.css');?>" rel="stylesheet" />

    
    
    <!--- FONT-ICONS CSS -->
    <link href="<?= base_url('assets/newtab/assets/plugins/icons/icons.css');?>" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="<?= base_url('assets/newtab/assets/css/color1.css');?>" />

    <!-- INTERNAL Switcher css -->
    <link href="<?= base_url('assets/newtab/switcher/css/switcher.css');?>" rel="stylesheet" />
    <link href="<?= base_url('assets/newtab/assets/switcher/demo.css');?>" rel="stylesheet" />

</head>

<body class="app sidebar-mini ltr">
      <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="#" class="logo d-flex align-items-center">
        <img src="<?php echo base_url('assets/assets/img/logo.png');?>" alt="">
        <span class="d-none d-lg-block">Adutaxe!</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="<?php echo base_url('assets/assets/img/messages-1.jpg');?>" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="<?php echo base_url('assets/assets/img/messages-2.jpg')?>" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="<?php echo base_url('assets/assets/img/messages-3.jpg');?>" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperioresNN et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?php echo base_url('assets/img/avatar.png');?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">compte</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $user->first_name." ".$user->last_name; ?></h6>
              <span>gerant</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>Mon Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Paramétre compte</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Besoin d'aide?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?php echo site_url("auth/logout");?>">
                <i class="bi bi-box-arrow-right"></i>
                <span>Déconnecter</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header>
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.html">
          <i class="bi bi-grid"></i>
          <span>acceuil</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Menue</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
              <?php $group="gerant"; if ($this->ion_auth->in_group($group) || $this->ion_auth->is_admin()){ ?>
            <a href="<?php echo site_url('profile/demandeDepaiement');?>">
              <i class="bi bi-circle"></i><span>Demande de paiement</span>
            </a>
          </li>
          <li>
            <a href="<?php echo site_url('profile/demanderevaluation');?>">
              <i class="bi bi-circle"></i><span>Demande de révaluation</span>
            </a>
          </li>
          <l
          <li>
            <a href="formulaire.html">
              <i class="bi bi-circle"></i><span>Consulter etat de paiement</span>
            </a>
          </li>
          <?php } ; ?>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <?php $group="agent"; if ($this->ion_auth->in_group($group) || $this->ion_auth->is_admin()){ ?>
            <a href="#">
              <i class="bi bi-circle"></i><span>Réevaluation</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>liste infractrucstures a réevaluer</span>
            </a>
          </li>
          <l
          <li>
            <a href="<?php echo site_url('profile/form')?>">  
              <i class="bi bi-circle"></i><span>Inscription</span>
            </a>
        </ul><?php } ; ?>
        <?php if($this->ion_auth->is_admin()){ ?>
        <li>

            <a href="<?php echo site_url('users/tem');?>">
              <i class="bi bi-circle"></i><span>liste des infrastructures marchande</span>
            </a>
          </li>
          <?php } ?>
      </li><!-- End Components Nav -->
      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link " href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.html">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.html">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li><!-- End Login Page Nav -->


    </ul>

  </aside><!-- End Sidebar--> 


                                
                           <!-- PAGE-HEADER -->
                          
                        <!-- PAGE-HEADER END -->
 <main>
                        <!-- Row -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Basic Edit Table</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered border text-nowrap mb-0" id="basic-edit">
                                                <thead>
                                                    <tr>
                                                        <th>First name</th>
                                                        <th>Last name</th>
                                                        <th>Position</th>
                                                        <th>Start date</th>
                                                        <th>Salary</th>
                                                        <th>E-mail</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Bella</td>
                                                        <td>Chloe</td>
                                                        <td>System Developer</td>
                                                        <td>2018/03/12</td>
                                                        <td>$654,765</td>
                                                        <td>b.Chloe@datatables.net</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Donna</td>
                                                        <td>Bond</td>
                                                        <td>Account Manager</td>
                                                        <td>2012/02/21</td>
                                                        <td>$543,654</td>
                                                        <td>d.bond@datatables.net</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Harry</td>
                                                        <td>Carr</td>
                                                        <td>Technical Manager</td>
                                                        <td>20011/02/87</td>
                                                        <td>$86,000</td>
                                                        <td>h.carr@datatables.net</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Lucas</td>
                                                        <td>Dyer</td>
                                                        <td>Javascript Developer</td>
                                                        <td>2014/08/23</td>
                                                        <td>$456,123</td>
                                                        <td>l.dyer@datatables.net</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Karen</td>
                                                        <td>Hill</td>
                                                        <td>Sales Manager</td>
                                                        <td>2010/7/14</td>
                                                        <td>$432,230</td>
                                                        <td>k.hill@datatables.net</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Dominic</td>
                                                        <td>Hudson</td>
                                                        <td>Sales Assistant</td>
                                                        <td>2015/10/16</td>
                                                        <td>$654,300</td>
                                                        <td>d.hudson@datatables.net</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Row -->

                        <!-- Row -->
                     


        
                            </div>
                            <!-- container-closed -->
                        </div>
                    </div>
                    <!--app-content closed-->
                </div>
                <!-- page-main closed -->

            

            <!-- Country-selector modal-->
        <div class="modal fade" id="country-selector">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content country-select-modal">
                    <div class="modal-header">
                        <h6 class="modal-title">Choose Country</h6><button aria-label="Close" class="btn-close"
                            data-bs-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <ul class="row p-3">
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block active">
                                    <span class="country-selector"><img alt="" src="<?= base_url('assets/newtab/assets/images/flags/us_flag.jpg');?>"
                                            class="me-3 language"></span>USA
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                        src="<?= base_url('assets/newtab/assets/images/flags/italy_flag.jpg');?>"
                                        class="me-3 language"></span>Italy
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                        src="<?= base_url('assets/newtab/assets/images/flags/spain_flag.jpg');?>"
                                        class="me-3 language"></span>Spain
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                        src="<?= base_url('assets/newtab/assets/images/flags/india_flag.jpg');?>"
                                        class="me-3 language"></span>India
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                        src="<?= base_url('assets/newtab/assets/images/flags/french_flag.jpg');?>"
                                        class="me-3 language"></span>French
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                        src="<?= base_url('assets/newtab/assets/images/flags/russia_flag.jpg');?>"
                                        class="me-3 language"></span>Russia
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                        src="<?= base_url('assets/newtab/assets/images/flags/germany_flag.jpg');?>"
                                        class="me-3 language"></span>Germany
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                        src="<?= base_url('assets/newtab/assets/images/flags/argentina.jpg');?>"
                                        class="me-3 language"></span>Argentina
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt="" src="<?= base_url('assets/newtab/assets/images/flags/malaysia.jpg');?>"
                                        class="me-3 language"></span>Malaysia
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt="" src="<?= base_url('assets/newtab/assets/images/flags/turkey.jpg');?>"
                                        class="me-3 language"></span>Turkey
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Country-selector modal-->
    </main>

            
            <!-- FOOTER -->
        <footer class="footer">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-md-12 col-sm-12 text-center">
                        Copyright © 2022 <a href="javascript:void(0)">Sash</a>. Designed with <span class="fa fa-heart text-danger"></span> by <a href="javascript:void(0)"> Spruko </a> All rights reserved.
                    </div>
                </div>
            </div>
        </footer>
        <!-- FOOTER CLOSED -->

        </div>
        <!-- page -->

        <!-- BACK-TO-TOP -->
        <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

        <!-- JQUERY JS -->
        <script src="<?= base_url('assets/newtab/assets/plugins/jquery/jquery.min.js');?>"></script>

        <!-- BOOTSTRAP JS -->
        <script src="<?= base_url('assets/newtab/assets/plugins/bootstrap/js/popper.min.js');?>"></script>
        <script src="<?= base_url('assets/newtab/assets/plugins/bootstrap/js/bootstrap.min.js');?>"></script>

        <!-- INPUT MASK JS-->
        <script src="<?= base_url('assets/newtab/assets/plugins/input-mask/jquery.mask.min.js');?>"></script>

        <!-- SIDE-MENU JS -->
        <script src="<?= base_url('assets/newtab/assets/plugins/sidemenu/sidemenu.js');?>"></script>

        <!-- SIDEBAR JS -->
        <script src="<?= base_url('assets/newtab/assets/plugins/sidebar/sidebar.js');?>"></script>

        <!-- Perfect SCROLLBAR JS-->
        <script src="<?= base_url('assets/newtab/assets/plugins/p-scroll/perfect-scrollbar.js');?>"></script>
        <script src="<?= base_url('assets/newtab/assets/plugins/p-scroll/pscroll.js');?>"></script>
        <script src="<?= base_url('assets/newtab/assets/plugins/p-scroll/pscroll-1.js');?>"></script>

        
    <!-- Select2 js-->
    <script src="<?= base_url('assets/newtab/assets/plugins/select2/select2.full.min.js');?>"></script>

    <!-- INTERNAL Edit-Table JS -->
    <script src="<?= base_url('assets/newtab/assets/plugins/edit-table/bst-edittable.js');?>"></script>
    <script src="<?= base_url('assets/newtab/assets/plugins/edit-table/edit-table.js');?>"></script>

    
        <!-- Color Theme js -->
        <script src="<?= base_url('assets/newtab/assets/js/themeColors.js');?>"></script>

        <!-- Sticky js -->
        <script src="<?= base_url('assets/newtab/assets/js/sticky.js');?>"></script>

        <!-- CUSTOM JS -->
        

        <!-- Switcher js -->
        <script src="<?= base_url('assets/newtab/assets/switcher/js/switcher.js');?>"></script>
        <script src="<?php echo base_url('assets/assets/vendor/apexcharts/apexcharts.min.js')?>"></script>
  <script src="<?php echo base_url('assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
  <script src="<?php echo base_url('assets/assets/vendor/chart.js/chart.min.js');?>"></script>
  <script src="<?php echo base_url('assets/assets/vendor/echarts/echarts.min.js');?>"></script>
  <script src="<?php echo base_url('assets/assets/vendor/quill/quill.min.js');?>"></script>
  <script src="<?php echo base_url('assets/assets/vendor/simple-datatables/simple-datatables.js');?>"></script>
  <script src="<?php echo base_url('assets/assets/vendor/tinymce/tinymce.min.js');?>"></script>
  <script src="<?php echo base_url('assets/assets/vendor/php-email-form/validate.js');?>"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url('assets/assets/js/main.js');?>"></script>



    </body>


<!-- Mirrored from laravel8.spruko.com/sash/edit-table by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Feb 2022 11:01:59 GMT -->
</html>
