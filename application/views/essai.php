<?php
$this->load->view('base/header');
$this->load->view('base/navbar');
$this->load->view('base/sidebar'); ?>
<div class="row">
      <div class="col-md-4 col-sm-12 col-xs-12">
        <div class="x_panel" style="height:160px;">
          <div class="x_title">
                <h2>Infos Contribuable</h2>
            <div class="clearfix"></div>
          </div>
          <div class="animated flipInY col-md-12 col-sm-12 col-xs-12 tile_stats_count">
            <div class="right">
              <span class="count_top"><i class="fa fa-clock-o"></i> Dernière connexion</span>
              <div class="count">28 FÉV 2022</div>
              <span class="count_bottom">à <i class="green">04:37:12</i> depuis <i class="green">10.5.0.106 </i></span>
            </div>
          </div>
        </div>
      </div>

          <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="x_panel" style="height:160px;">
              <div class="x_title">
                <h2>Nombre de documents</h2>

                <div class="clearfix"></div>
              </div>
              <div class="animated flipInY col-md-12 col-sm-12 col-xs-12 tile_stats_count">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="right">
                    <span class="count_top"><i class="fa fa-sign-in"></i> Reçu(s)</span>
                    <div class="count"><font size="14">0</font></div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="right">
                    <span class="count_top"><i class="fa fa-sign-out"></i> Envoyé(s)</span>
                    <div class="count"><font size="14">0</font></div>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="x_panel" style="height:160px;">
              <div class="x_title">
                <h2>Autres statistiques</h2>

                <div class="clearfix"></div>
              </div>
              <div class="animated flipInY col-md-12 col-sm-12 col-xs-12 tile_stats_count">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="right">
                    <span class="count_top"><i class="fa fa-table"></i> Déclaration(s)</span>
                    <div class="count"><font size="14">47</font></div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="right">
                    <span class="count_top"><i class="fa fa-comments"></i> Echange(s)</span>
                    <div class="count"><font size="14">3</font></div>
                  </div>
                </div>
              </div>
            </div>
          </div>

    </div>
  <?=  $this->load->view('base/footer'); ?>