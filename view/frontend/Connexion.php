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
<h2 class="titrePage">Connexion</h2>	
		<br><br>
			<div class="container">
				<form class="container col-md-5 formulaire"  method="post">			
					
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
							<input class="form-control" type="text" name="pseudo" placeholder="Pseudo" required>
					</div>

					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
							<input class="form-control" type="password" name="password" placeholder="Mot de passe" required>
					</div>

					<div class="form-group">
						<input type="submit" value="Se connecter" class="btn btn-primary mt-2" >
					</div><br>

				</form><br>
			</div>

			<div class="messageConnexion" >
				<p>Vous n'avez pas de compte ? <a href="Inscription"> Cliquez ici pour vous inscrire !</a></p>
			</div>
                
<!-- script pour faire fonctionner le modal Erreur -->
<script> $('#exampleModal').modal('show') </script>