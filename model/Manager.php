<?php

class Manager{

	protected function bddConnect(){
		
		// Connexion à la base de données
			$bdd = new \PDO('mysql:host=localhost;dbname=', 'root', '' );

			
			return $bdd;
	}
}