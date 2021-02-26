

<!--
Les balises <form> sert à dire que c'est un formulaire
on lui demande de faire fonctionner la page contact.php
une fois le bouton "Envoyer" cliqué on lui dit également que c'est un formulaire de type "POST"
Les balises <input> sont les champs de formulaire
type="text" sera du texte
la balise <textarea> sert à dire qu'il faut afficher un champ de texte rectangulaire (les sauts de ligne sont possibles) au contraire des champ input text
Vous remarquerez que l'ont ne renseigne pas le type (type="") pour la balise textarea
cols="nombre de colone horizontale" rows="nombre de colone verticales"
type="submit" sera un bouton pour valider le formulaire
name="nom de l'input" sert à le reconnaitre une fois le bouton submit cliqué, pour le code PHP contact.php

<form action="contact.php" method="post">
    Mail: <input type="text" name="mail" value="" />
    <br />
    Sujet: <input type="text" name="sujet" value="" />
    <br />
    Message: <textarea name="message" cols="40" rows="20"></textarea>
    <br />
    <input type="submit" name="envoyer" value="Envoyer" />
</form>
-->

<!DOCTYPE html>
<html lang="fr">
<div class="contact">
	<head>
		<title>Nous contacter</title>
		<link rel="stylesheet" type="text/css" href="custom.css">
		<link href="https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed" rel="stylesheet">
	</head>
	<body>
		<div class="form ">
			<div class="hedding-title">
				<h1>Contactez-nous</h1><br>
			</div>
			<div class="hedding-description">
				<p>Pour nous contacter directement par mail il vous suffit de compléter le formulaire de contact
				ci-dessous en renseignant les champs demandés.</p>
			</div>
			<div class="form-input">
            <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nom entier :</label><br>
                        <input type="text" class="form-group" name="Sujet" placeholder="Nom entier...."><br>
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Email :</label><br>
                        <input type="text" class="form-group" name="Sujet" placeholder="Email...."><br>
                    </div>
                    <div class="form-group form-check">
                    <label for="exampleInputEmail1">Message :</label><br>
                    <textarea rows="4" class="form-group" name="Message" placeholder="Message.."></textarea><br>
                    </div>
                    <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>

            <!--
				<form action="Contact" method="post">
					Nom entier :<br>
					<input type="text" name="Sujet" placeholder="Nom entier...."><br>
					<br>
					Email:<br>
					<input type="text" name="Mail" placeholder="Email..."></br>
					<br>
					Message:<br>
					<textarea rows="4" name="Message" placeholder="Message.."></textarea><br>
					<br>
					<button class="button">Envoyer</button>
				</form>
                -->
			</div>
		</div>
	</body>
</div>
</html>

<!--
<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
-->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<div class="container">
	<div class="row justify-content-center">
		<div class="col-12 col-md-8 col-lg-6 pb-5">


                    <!--Form with header-->

                    <form action="mail.php" method="post">
                        <div class="card border-primary rounded-0">
                            <div class="card-header p-0">
                                <div class="bg-info text-white text-center py-2">
                                    <h3><i class="fa fa-envelope"></i> Nous contacter</h3>
                                    <p class="m-0">Remplissez les champs ci-dessous :</p>
                                </div>
                            </div>
                            <div class="card-body p-3">

                                <!--Body-->
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                        </div>
                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nom et prénom" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>
                                        </div>
                                        <input type="email" class="form-control" id="nombre" name="email" placeholder="exemple@gmail.com" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-comment text-info"></i></div>
                                        </div>
                                        <textarea class="form-control" placeholder="Votre message...." required></textarea>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <input type="submit" value="Envoyer" class="btn btn-info btn-block rounded-0 py-2">
                                </div>
                            </div>

                        </div>
                    </form>
                    <!--Form with header-->


                </div>
	</div>
</div>