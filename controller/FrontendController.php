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

    function addMember($pseudo, $email, $mdp){
        $memberManager = new Membre();
           
          $pseudoExist = $memberManager->checkPseudo($pseudo);
         $mailExist = $memberManager->checkMail($email);  

             if ($pseudoExist):
                 throw new \Exception('Pseudo déja utilisé, veuillez en trouver un autre !');     
             endif;

             if ($mailExist):
                 throw new \Exception('Adresse email déja utilisé, veuillez en trouver une autre !');
             endif; 
                 
                 if (!($pseudoExist) && !($mailExist)):

                     $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
                     $newMember = $memberManager->createMember($pseudo, $email, $mdp);

                     header('Location: Connexion');
                 else:
                         throw new \Exception('Erreurs lors de l\'inscription veuillez recommencer !');
                    endif;

           return $newMember;
     }

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


}