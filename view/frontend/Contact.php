

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