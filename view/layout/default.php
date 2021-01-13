<!DOCTYPE html>
<html lang="FR">
	<head>
	    <!-- COMPATIBILITÉ -->
	    <meta charset="utf-8"/>
	    <meta name="viewport" content="width=device-width" />
		<meta http-equiv="x-ua-compatible" content="ie=edge" />
		
		<!-- Titre -->
		<title>(Re)Sources/Lationelles</title>

		  <!-- CSS/JQUERY/JAVASCRIPT -->
		  <link rel="stylesheet" href="<?= BASE_SITE . DS . "css/style.css" ?>">
	      <link rel="stylesheet" href="<?= BASE_SITE . DS . "css/bootstrap.min.css" ?>">
   		  <link href='https://fonts.googleapis.com/css?family=Raleway:100,400' rel='stylesheet' type='text/css'>
		  <link rel="stylesheet" href="<?= BASE_SITE . DS . "/css/font-awesome.css" ?>">
		  <script src="https://kit.fontawesome.com/165449b566.js" crossorigin="anonymous"></script>
    	  <link rel="shortcut icon" href="<?= BASE_SITE . DS . "/images/logoMenu.png" ?>">
	      <script src="<?= BASE_SITE . DS . "/jquery/jquery-3.4.1.js" ?>"></script>
	      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>	
	   
	</head>
	<div style="">
    	<nav class="navbar navbar-expand-lg navbar-light " id="fondMenu" style="position:fixed; background-color:#D4D6D4; width:100%" >
			<a class="navbar-brand" href="<?= BASE_URL . DS . "frontend/Accueil" ?>"><img src="<?= BASE_SITE . DS . "/images/logoMenu.png" ?>"></img></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>

			  
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="<?= BASE_URL . DS . "frontend/Accueil" ?>">ACCUEIL</a>
					</li>

				<?php if(isset($_SESSION['id'])): ?> <!-- Début du menu backend -->
					<?php endif;
					// else: ?>  <!-- Fin du menu backend -->
					
					<div class="dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="tableauDeBord/Tableaudebord" role="button" aria-haspopup="true" aria-expanded="false">TABLEAU DE BORD</a> 
						<div class="dropdown-menu">
							<a class="dropdown-item" href="<?= BASE_URL . DS . "backend/Catalogue" ?>">CATALOGUE</a>
							<a class="dropdown-item" href="<?= BASE_URL . DS . "backend/CreationEdition" ?>">CRÉATION/ÉDITION</a>
							<a class="dropdown-item" href="<?= BASE_URL . DS . "backend/AutresActions" ?>">AUTRES ACTIONS</a>
						</div>
					</div>

					<li class="nav-item">
						<a class="nav-link" href="<?= BASE_URL . DS . "backend/Favoris" ?>">FAVORIS</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="<?= BASE_URL . DS . "backend/Profil" ?>">PROFIL</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="<?= BASE_URL . DS . "backend/Deconnexion" ?>">DECONNEXION</a>
					</li>



					<li class="nav-item">
	                  	<a class="nav-link" href="<?= BASE_URL . DS . "frontend/Inscription" ?>">INSCRIPTION</a>
              		</li>

					<li class="nav-item">
                 	 	<a class="nav-link" href="<?= BASE_URL . DS . "frontend/Connexion" ?>">CONNEXION</a>
					</li>
					<form class="form-inline">
						<input class="form-control" type="text" placeholder="Recherche" aria-label="Recherche">
					</form>
  </div>	
					
				</ul>		
			</div>
		</nav>	
	</div>
	
	<body>
		<?= $content_for_layout ?>
    </body>

	<?php require_once ROOT . DS . "view/frontend/affichageFooter.php" ?>

	

</html>
