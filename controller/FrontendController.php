<?php
class FrontendController extends Controller
{
    private $modChamp = null;

    function Accueil()
    {
        $this->render("Accueil");
    }


    function Inscription()
    {
        // Par défaut il est faux
        $d["erreur"] = false;
        $d["msgErreur"] = false;
        $this -> set($d);

        // Permet de savoir si on a reçus un formulaire
        if (!empty($_POST)){ 

            $d = $this->CheckFormulaire();
            $this -> set($d);

            // si y a une erreur = true, sinon y a pas d'erreurs
            if($d["erreur"] == false){
        
                // Sert à charger le model
                $modmembre = $this->loadModel("membre");

                // Colonnes à utiliser de la BDD
                $colonnes = ["pseudo", "email", "pasword"];

                // Déterminer les données récupérées depuis le formulaire, qui seront utilisées
                $donnees = [ $_POST["pseudo"], $_POST["email"], $_POST["mdp"] ];

                // 
                $modmembre-> InsertAI($colonnes,$donnees);

                // Redirection sur la page Connexion
                $this->redirect("/frontend/Connexion");
            }

        }



        $this->render("Inscription");

    }
    
    function Connexion()
    {
        $this->render("Connexion");
    }

    function  Contact()
    {
        $this->render("Contact");
    }

    function CheckFormulaire(){

        $pseudo = $_POST["pseudo"];
        
        // Sert à charger le model
        $modmembre = $this->loadModel("membre");
        
        //Select table membre et vérification si le pseudo existe ou pas 
        $params = ["projection" => "member.pseudo","conditions" => "pseudo = '$pseudo'"];

        // Lance la requête
        $pseudoExiste = $modmembre->findFirst($params); 

        // Par défaut c'est a false
        $d["erreur"] = false;

        //différent de null
        if($pseudoExiste != null){

            // Si y il a un problème sa passe à true
            $d["erreur"] = true;
            $d["msgErreur"] = "Pseudo déja utilisé";

        } 
        return $d;
     }
/*
           //Bouton page connexion
           function pageConnexionSubmit($pseudo){
            $memberManager = new Membre();
    
              $member = $memberManager->loginMember($pseudo);
              $mdpCorrect = password_verify($_POST['mdpConnect'], $member['password']);
    
                if (!isset($member['id'])):
                      throw new \Exception("Mauvais identifiant !");
                  
                    else:
                        if ($mdpCorrect):
    
                            $_SESSION['id'] = $member['id'];
                            $_SESSION['pseudo'] = $member['pseudo'];
                            $_SESSION['super_admin'] = $member['super_admin']; // A GÉRER AVEC ÉNUM DE LA BDD
                            $_SESSION['admin'] = $member['admin'];
                            $_SESSION['moderateur'] = $member['moderateur'];
                            $_SESSION['citoyen'] = $member['citoyen'];

                            header('Location: index.php');
                          
                        else:
                            throw new \Exception("Mauvais mot de passe !");
                        endif;
    
                    endif;     
          }
*/

}