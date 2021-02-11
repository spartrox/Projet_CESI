<!-- Appel le message erreur associé -->
<?php if($erreur){ ?>

<!-- Bouton modal erreur -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Erreur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo($msgErreur); ?> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>

<?php  } ?>

  <!-- Début du Frontend de la page inscription -->
<h2 class="titrePage">INSCRIPTION</h2>
  <br/><br />
      <div class="container">
          <form class="col-md-5 container" method="post">
              <div class="form-group input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                  </div>
                      <input class="form-control" name="pseudo" id="pseudo" placeholder="Pseudo" type="text" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" required>
              </div>

              <div class="form-group input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-envelope" ></i> </span>
                  </div>
                      <input class="form-control" name="email" placeholder="Mail" id="email" type="email" value="<?php if(isset($email)) { echo $email; } ?>" required>
              </div>

              <div class="form-group input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                  </div>
                      <input class="form-control" placeholder="mot de passe" id="mdp" name="mdp" type="password" required>
              </div>

              <div class="form-group input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                  </div>
                      <input class="form-control" placeholder="confirmer votre mot de passe" id="mdp2" name="mdp2" type="password" required>
              </div>

              <div class="form-group"><br/> 
                  <input type="submit" class="btn btn-primary" name="forminscription" value="Je m'inscris" id="inscription"/>
              </div>

          </form><br>
              <p class="messageConnexion">Déja un compte ? <a href="Connexion">Connectez-vous!</a></p>
      </div>  

<!-- script pour faire fonction le modal Erreur -->
<script> $('#exampleModal').modal('show') </script>