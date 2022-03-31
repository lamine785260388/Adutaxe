<?php $this->load->view('base/header');
$this->load->view('base/navbar');
$this->load->view('base/sidebar');?>
 <main id="main" class="main">
  <div class="container-fluide">
 <div class="item form-group">
  <form method="POST" action="<?= site_url('gerant/envoiemail');?>">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="objet">Objet <span class="required">*</span>
                </label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  <input id="objet" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="objet" placeholder="objet de votre réclamation" required="required" type="text" maxlength="255" value="<?= $object;?>">
                </div>
              </div>
              <div class="item form-group hidden">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="urgence">Priorité <span class="required">*</span>
                </label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  <select id="urgence" required="required" name="urgence" class="form-control col-md-7 col-xs-12">
                    <option>Basse</option>
                    <option selected>Moyenne</option>
                    <option>Elevée</option>
                  </select>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contenu">Votre message <span class="required">*</span>
                </label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  <textarea name="message" id="contenu" required="required" data-validate-length-range="1,500" placeholder="500 caractères au maximum" name="contenu" rows="18" maxlength="500" class="form-control col-md-7 col-xs-12"></textarea>
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  <button type="reset" class="btn btn-primary">Annuler</button>
                  <button type="submit" class="btn btn-success">Valider</button>
                </div>
              </div>
            </form>
          </div>
          </div>
          </main>

          <?php $this->load->view('base/footer'); ?>