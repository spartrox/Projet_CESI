
<!-- Template, page de base -->
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
		  <link rel="stylesheet" href="<?= BASE_SITE . DS . "css". DS ."style.css" ?>">
	      <link rel="stylesheet" href="<?= BASE_SITE . DS . "css". DS ."bootstrap.min.css" ?>">
   		  <link href='https://fonts.googleapis.com/css?family=Raleway:100,400' rel='stylesheet' type='text/css'>
		  <link rel="stylesheet" href="<?= BASE_SITE . DS . "css". DS ."font-awesome.css" ?>">
		  <script src="https://kit.fontawesome.com/165449b566.js" crossorigin="anonymous"></script>
    	  <link rel="shortcut icon" href="<?= BASE_SITE . DS . "images". DS ."logoMenu.png" ?>">
	      <script src="<?= BASE_SITE . DS . "jquery". DS ."jquery-3.4.1.js" ?>"></script>
	      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>	
		  <script src="<?= BASE_SITE . DS . "jquery". DS ."actionAjax.js" ?>" type="text/javascript"></script>
	</head>
	<div>
    	<nav class="navbar navbar-expand-lg navbar-light " id="fondMenu" style="position:fixed; background-color:#D4D6D4; width:100%;z-index: 10" >
			<a class="navbar-brand" href="<?= BASE_URL . DS . "frontend/Accueil" ?>"><img src="<?= BASE_SITE . DS . "/images/logoMenu.png" ?>"></img></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			  
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link" href="<?= BASE_URL . DS . "frontend/Accueil" ?>">ACCUEIL</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-uppercase" href="<?= BASE_URL . DS . "backend/Catalogue" ?>">Catalogue</a>
						</li>

						<!-- Début du menu backend -->
					<?php if (isset($_SESSION['id'])): ?> 
	
						<div class="btn-group">
							<a type="button" href="<?= BASE_URL . DS . "backend/Tableaudebord" ?>" class="nav-link text-uppercase">Tableau de bord</a>
							<a type="button" class="btn dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
							</a>
							<div class="dropdown-menu">
								<a class="dropdown-item text-uppercase" href="<?= BASE_URL . DS . "backend/Favoris" ?>">Favoris</a>
								<a class="dropdown-item text-uppercase" href="<?= BASE_URL . DS . "backend/MisDeCote" ?>">Mis de coté</a>
								<a class="dropdown-item text-uppercase" href="<?= BASE_URL . DS . "backend/CreationEdition" ?>">Création/Édition</a>
							</div>
						</div>

						<li class="nav-item">
							<a class="nav-link text-uppercase" href="<?= BASE_URL . DS . "backend/Profil" ?>">Profil</a>
						</li>

						<li class="nav-item">
							<a class="nav-link text-uppercase" href="<?= BASE_URL . DS . "backend/Deconnexion" ?>">Déconnexion</a>
						</li>

						<!-- Début du menu backend admin -->
					<?php elseif (isset($_SESSION['admin'])): ?>  

						<li class="nav-item">
							<a class="nav-link text-uppercase" href="<?= BASE_URL . DS . "backend/Admin" ?>">Administrateur</a>
						</li>	

						<!-- Fin du menu backend -->
					<?php endif; ?> 
						
					<?php if (!isset($_SESSION['id'])): ?> 					
						<li class="nav-item">
							<a class="nav-link text-uppercase" href="<?= BASE_URL . DS . "frontend/Inscription" ?>">Inscription</a>
						</li>

						<li class="nav-item">
							<a class="nav-link text-uppercase" href="<?= BASE_URL . DS . "frontend/Connexion" ?>">Connexion</a>
						</li>	
						
					<?php endif; ?> 

						<form class="form-inline">
							<input class="form-control" type="text" placeholder="Recherche" aria-label="Recherche">
						</form>

						
				</ul>
  			</div>	
		</nav>	
	</div>
	
	<body>
		<?= $content_for_layout ?>
    </body>

	<?php require_once ROOT . DS . "view/frontend/affichageFooter.php" ?>

</html>
