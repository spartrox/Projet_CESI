<?php 

class Membre  extends Model {
	var $table = "member";
    
    //Récupération du pseudo
    public function loginMember($pseudo){

    	// Connexion à la base de données
    	$bdd = $this->Conf();

        $req = $bdd->prepare('SELECT type_account, id, pseudo, password FROM member WHERE pseudo = ?');
        $req->execute(array($pseudo));
        $member = $req->fetch();

        return $member;
    }		

    //Vérification si le pseudo existe
    public function checkPseudo($pseudo){

    	// Connexion à la base de données
    	$bdd = $this->Conf();

		$req = $bdd->prepare('SELECT pseudo FROM member WHERE pseudo = ?');
		$req->execute(array($pseudo));
		$pseudoExist = $req->fetch();

		return $pseudoExist;
	}

	//Vérification si le mail existe
	public function checkMail($email){

		// Connexion à la base de données
		$bdd = $this->Conf();

		$req = $bdd->prepare('SELECT email FROM member WHERE email = ?');
		$req->execute(array($email));
		$emailExist = $req->fetch();

		return $emailExist;
    }

    // Création du membre
	public function createMember($pseudo, $mdp, $email){

		// Connexion à la base de données
		$bdd = $this->Conf();

        $newMember = $bdd->prepare("INSERT INTO member(type_account, pseudo, password, first_name, last_name, birth_date, email, mobile_number, avatar, register_date ) VALUES('', ?, ?, '', '', '', ?, '', '', NOW())");
        $newMember->execute(array($pseudo, $mdp, $email));		

        return $newMember;
	}
}