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
	      <link rel="stylesheet" href="<?= BASE_SITE . DS . "/css/bootstrap.min.css" ?>">
	      <link rel="stylesheet" type="text/css" href="<?= BASE_SITE . DS . "/css/style.css" ?>">
   		  <link href='https://fonts.googleapis.com/css?family=Raleway:100,400' rel='stylesheet' type='text/css'>
		  <link rel="stylesheet" href="<?= BASE_SITE . DS . "/css/font-awesome.css" ?>">
		  <script src="https://kit.fontawesome.com/165449b566.js" crossorigin="anonymous"></script>
    	  <link rel="shortcut icon" href="<?= BASE_SITE . DS . "/images/logoMenu.png" ?>">
	      <script src="<?= BASE_SITE . DS . "/jquery/jquery-3.4.1.js" ?>"></script>
	      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>	
	   
	</head>
	<div id="menu">
    	<nav class="navbar navbar-expand-lg navbar-light" id="fondMenu">
			<a class="navbar-brand" href="Accueil"><img src="<?= BASE_SITE . DS . "/images/logoMenu.png" ?>"></img></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
      
	  
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul>
					<li class="nav-item">
						<a class="nav-link" href="Accueil">Accueil</a>
					</li>

				<?php if(isset($_SESSION['id'])): ?>
            
					<li class="nav-item">
						<a class="nav-link" href="">Tableau de bord</a>
					</li>	

					<li class="nav-item">
						<a class="nav-link" href="">Profil</a>
					</li>

					<li class="nav-item">
<<<<<<< HEAD
						<a class="nav-link" href="">Favoris</a>
=======
                 	 	<a class="nav-link" href="Connexion">Connexion</a>
>>>>>>> eaca720a8989d213531c7b80dabb713296b74451
					</li>

					<li class="nav-item">
						<a class="nav-link" href="">Deconnexion</a>
					</li>
				<?php endif;
					// else: ?> 
					<li class="nav-item">
<<<<<<< HEAD
                 	 	<a class="nav-link" href="">Inscription</a>
					</li>
					<li class="nav-item">
	                  	<a class="nav-link" href="">Connexion</a>
					  </li>
				
				
=======
	                  	<a class="nav-link" href="Inscription">Inscription</a>
              		</li>
>>>>>>> eaca720a8989d213531c7b80dabb713296b74451
				</ul>
			
			</div>
		</nav>	
    </div>
	<body>
		<?= $content_for_layout ?>
    </body>

	<?php require_once ROOT . DS . "view/frontend/affichageFooter.php" ?>

	

</html>
